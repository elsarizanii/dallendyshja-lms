<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $kurset = Course::all();
        return view('courses.index', ['kurset' => $kurset]);
    }
}