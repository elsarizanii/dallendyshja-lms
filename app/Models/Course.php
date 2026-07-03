<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Course extends Model {    
    
    use HasFactory; 

    public $timestamps = true; 

    protected $fillable = [
        'titulli', 'slug', 'pershkrimi', 'cmimi', 
        'thumbnail', 'level', 'category_id', 'instructor_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($course) {
            if (empty($course->slug)) {
                $course->slug = Str::slug($course->titulli);
            }
        });
    }

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