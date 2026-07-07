<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\CourseSearchRequest;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
   /**
     * @param CourseSearchRequest $request
     * @return JsonResponse
     */
    public function index(CourseSearchRequest $request): JsonResponse
    {
        $query = Course::with('category');

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where('title', 'ILIKE', '%' . $searchTerm . '%');
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        $courses = $query->latest()->paginate(12);

        return response()->json($courses, 200);
    }
}