<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CoverImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Check if user is logged in and can edit courses
        return auth()->check() && auth()->user()->can('update', Course::class);
    }

    public function rules(): array
    {
        return [
            'cover_image' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,webp',
                'max:5120',
                'dimensions:min_width=400,min_height=200,max_width=4000,max_height=4000',
            ],
            'remove_cover_image' => 'sometimes|boolean',
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'category_id' => 'sometimes|exists:categories,id',
            'price' => 'sometimes|numeric|min:0',
            'level' => 'sometimes|in:beginner,intermediate,advanced',
        ];
    }

    public function messages(): array
    {
        return [
            'cover_image.image' => 'The file must be a valid image.',
            'cover_image.mimes' => 'Only JPEG, PNG, GIF, and WebP images are allowed.',
            'cover_image.max' => 'Image size cannot exceed 5MB. Please compress your image.',
            'cover_image.dimensions' => 'Image must be at least 400x200 pixels for best display.',
            'cover_image.uploaded' => 'Failed to upload image. Please try again.',
        ];
    }
}
