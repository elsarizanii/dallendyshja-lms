<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model {    
    
    use HasFactory; 

    public $timestamps = false;

    protected $fillable = ['titulli', 'pershkrimi', 'cmimi', 'category_id', 'instructor_id'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function instructor() {
        return $this->belongsTo(Staff::class, 'instructor_id', 'user_id');
    }

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }
}

