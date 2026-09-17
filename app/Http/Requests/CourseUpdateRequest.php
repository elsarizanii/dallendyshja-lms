<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Course;

class CourseUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (!auth()->check()) {
            return false;
        }

        $courseId = $this->route('course') ?? $this->route('id');
        $course = Course::find($courseId);

        if (!$course) {
            return false;
        }

        $user = auth()->user();
        
        if ($user->role === 'Manager') {
            return true;
        }

        if ($user->id === $course->instructor_id) {
            return true;
        }

        return false;
    }

    public function rules(): array
    {
        $courseId = $this->route('course') ?? $this->route('id');
        
        return [
            'titulli' => 'required|string|max:255|unique:courses,titulli,' . $courseId,
            'pershkrimi' => 'nullable|string',
            'cmimi' => 'nullable|numeric|min:0',
            'level' => 'nullable|in:beginner,intermediate,advanced',
            'category_id' => 'nullable|exists:categories,id',
            'instructor_id' => 'nullable|exists:staff,user_id',
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:5120',
                'dimensions:min_width=400,min_height=200,max_width=4000,max_height=4000',
            ],
            'remove_thumbnail' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'titulli.required' => 'Course title is required.',
            'titulli.unique' => 'A course with this title already exists.',
            'thumbnail.image' => 'The file must be a valid image.',
            'thumbnail.mimes' => 'Only JPEG, PNG, GIF, and WebP images are allowed.',
            'thumbnail.max' => 'Image size cannot exceed 5MB.',
            'thumbnail.dimensions' => 'Image must be at least 400x200 pixels.',
            'category_id.exists' => 'Selected category does not exist.',
            'level.in' => 'Level must be beginner, intermediate, or advanced.',
        ];
    }
}