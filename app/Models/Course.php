<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model {     
    
    use HasFactory, HasSlug;

    public $timestamps = true; 

    protected $fillable = [
        'titulli', 'slug', 'pershkrimi', 'cmimi', 
        'thumbnail', 'level', 'category_id', 'instructor_id'
    ];

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