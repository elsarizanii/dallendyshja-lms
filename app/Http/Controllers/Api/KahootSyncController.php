<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Grade; 

class KahootSyncController extends Controller
{
    public function sync(Request $request)
    {
        Log::info('Kahoot Data Received:', $request->all());

        if (!$request->has('email') || !$request->has('score') || !$request->has('max_points')) {
            return response()->json([
                'error' => 'Missing required fields: email, score, and max_points are mandatory.'
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json(['error' => 'Student was not found'], 404);
        }

        $pointsTaken = (float) $request->score;
        $pointsMax = (float) $request->max_points;

        if ($pointsMax <= 0) {
            return response()->json(['error' => 'Max points must be greater than 0'], 400);
        }

        $percentage = ($pointsTaken / $pointsMax) * 100;

        $hasPassed = $percentage >= 70;

        try {
            $grade = Grade::create([
                'user_id'       => $user->id,
                'activity_name' => 'Kahoot Quiz',
                'raw_score'     => $pointsTaken,
                'percentage'    => round($percentage, 2),
                'is_passed'     => $hasPassed
            ]);
        } catch (\Exception $e) {
            Log::error('Database Error: ' . $e->getMessage());
            return response()->json(['error' => 'Could not save grade to database'], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data processed, normalized and saved to database',
            'data' => [
                'email' => $user->email,
                'score_raw' => $pointsTaken,
                'score_percentage' => round($percentage, 2) . '%',
                'passed' => $hasPassed,
                'status' => $hasPassed ? 'Passed' : 'Did not pass',
                'record_id' => $grade->id
            ]
        ], 200);
    }
}