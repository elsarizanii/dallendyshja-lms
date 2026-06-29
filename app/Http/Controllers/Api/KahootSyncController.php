<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Grade;
use App\Models\SyncLog;
use Illuminate\Support\Facades\DB; 

class KahootSyncController extends Controller
{
    public function sync(Request $request)
    {
        $payload = $request->all();

        if (!$request->has(['email', 'score', 'max_points', 'lesson_id'])) {
            SyncLog::create([
                'source' => 'Kahoot',
                'payload' => $payload,
                'status' => 'Fail',
                'error_message' => 'Missing required fields in request.'
            ]);

            return response()->json([
                'error' => 'Missing required fields: email, score, max_points, and lesson_id are mandatory.'
            ], 400);
        }

        $user = User::where('email', $request->email)->first();
        
        if(!$user){
            SyncLog::create([
                'source' => 'Kahoot',
                'payload' => $payload,
                'status' => 'Fail',
                'error_message' => 'Student with email ' . $request->email . ' not found.'
            ]);

            return response()->json(['error' => 'Student was not found'], 404);
        }

        $pointsTaken = (float) $request->score;
        $pointsMax = (float) $request->max_points;
        $lessonId = $request->lesson_id;

        if ($pointsMax <= 0) {
            return response()->json(['error' => 'Max points must be greater than 0'], 400);
        }

        $percentage = round(($pointsTaken / $pointsMax) * 100, 2);
        $hasPassed = $percentage >= 70;
        $activityName = 'Kahoot Quiz - Lesson ' . $lessonId;

        DB::beginTransaction();

        try {
            $existingGrade = Grade::where('user_id', $user->id)
                ->where('activity_name', $activityName)
                ->first();

            if ($existingGrade) {
                if ($percentage > $existingGrade->percentage) {
                    $existingGrade->update([
                        'raw_score'  => $pointsTaken,
                        'percentage' => $percentage,
                        'is_passed'  => $hasPassed,
                    ]);
                }
            } else {
                Grade::create([
                    'user_id'       => $user->id,
                    'activity_name' => $activityName,
                    'raw_score'     => $pointsTaken,
                    'percentage'    => $percentage,
                    'is_passed'     => $hasPassed
                ]);
            }

            DB::table('lesson_progress')->updateOrInsert(
                ['user_id' => $user->id, 'lesson_id' => $lessonId],
                [
                    'is_completed' => true,
                    'completed_at' => now(),
                    'updated_at'   => now()
                ]
            );

            DB::commit();

            SyncLog::create([
                'source' => 'Kahoot',
                'payload' => $payload,
                'status' => 'Success'
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Gradebook persistence secured and lesson marked complete.',
                'data' => [
                    'student' => $user->email,
                    'final_percentage' => $percentage . '%',
                    'passed' => $hasPassed,
                    'lesson_status' => 'Completed'
                ]
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            
            SyncLog::create([
                'source' => 'Kahoot',
                'payload' => $payload,
                'status' => 'Fail',
                'error_message' => 'Database/System Error: ' . $e->getMessage()
            ]);

            Log::error('Persistence Error: ' . $e->getMessage());
            
            return response()->json([
                'error' => 'Database Error',
                'message' => $e->getMessage() 
            ], 500);
        }
    }
}