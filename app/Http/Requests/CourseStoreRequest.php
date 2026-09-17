<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'titulli' => 'required|string|max:255|unique:courses,titulli',
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
        ];
    }

    public function messages(): array
    {
        return [
            'titulli.required' => 'Course title is required.',
            'titulli.unique' => 'A course with this title already exists.',
            'titulli.max' => 'Course title cannot exceed 255 characters.',
            'thumbnail.image' => 'The file must be a valid image.',
            'thumbnail.mimes' => 'Only JPEG, PNG, GIF, and WebP images are allowed.',
            'thumbnail.max' => 'Image size cannot exceed 5MB.',
            'thumbnail.dimensions' => 'Image must be at least 400x200 pixels.',
            'category_id.exists' => 'Selected category does not exist.',
            'instructor_id.exists' => 'Selected instructor does not exist.',
            'level.in' => 'Level must be beginner, intermediate, or advanced.',
            'cmimi.numeric' => 'Price must be a valid number.',
            'cmimi.min' => 'Price cannot be negative.',
        ];
    }
}