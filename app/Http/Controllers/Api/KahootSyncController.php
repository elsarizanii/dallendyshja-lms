<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

        return response()->json([
            'status' => 'success',
            'message' => 'Data received and logged',
            'received_data' => $request->only(['email', 'score'])
        ], 200);
    }
}