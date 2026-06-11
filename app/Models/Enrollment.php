<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function isPaid() {
    return $this->payments()->where('status', 'success')->sum('amount') >= $this->course->cmimi;
    }
    
}
