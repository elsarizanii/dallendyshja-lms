<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SyncLog;

class SyncLogController extends Controller
{
    public function index()
    {
        $logs = SyncLog::latest()->paginate(15);
        
        return view('admin.sync_logs.index', compact('logs'));
    }
}