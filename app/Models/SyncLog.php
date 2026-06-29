<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SyncLog extends Model
{
    protected $fillable = ['source', 'payload', 'status', 'error_message'];

    protected $casts = [
        'payload' => 'array',
    ];
}

