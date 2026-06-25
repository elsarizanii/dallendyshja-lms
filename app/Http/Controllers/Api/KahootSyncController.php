<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class KahootSyncController extends Controller
{
    public function sync(Request $request)
    {
        Log::info('Kahoot Data Received:', $request->all());

        if (!$request->has('email') || !$request->has('score')) {
            return response()->json([
                'error' => 'Missing required fields: email and score are mandatory.'
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json(['error' => 'Student was not found'], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data received and logged',
            'received_data' => $request->only(['email', 'score'])
        ], 200);
    }
}