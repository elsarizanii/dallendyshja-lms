<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\CourseSearchRequest;
// Change JsonResponse to standard Response/View types
use Illuminate\Contracts\View\View; 

class CourseController extends Controller
{
    /**
     * @param CourseSearchRequest $request
     * @return View
     */
    public function index(CourseSearchRequest $request): View
    {
        $query = Course::with('category');

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'ILIKE', '%' . $searchTerm . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        $kurset = $query->latest()->paginate(12);
        
        return view('courses.index', compact('kurset'));
    }
}