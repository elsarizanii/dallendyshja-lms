<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class Staff extends Model {    
    use HasFactory;

    public $timestamps = false;

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