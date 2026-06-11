<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}