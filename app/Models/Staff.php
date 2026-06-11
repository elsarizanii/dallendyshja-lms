<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model {
    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $fillable = ['user_id', 'hire_date', 'department', 'specialization'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function courses() {
        return $this->hasMany(Course::class, 'instructor_id', 'user_id');
    }
}