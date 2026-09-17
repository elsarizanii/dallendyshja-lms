@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Edit Course: {{ $course->titulli }}</h3>
                    <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-sm">Back</a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- ============================================ --}}
                    {{-- ⭐ SEPARATE UPLOAD FORM (Quick Upload) --}}
                    {{-- ============================================ --}}
                    <div class="form-group mb-4">
                        <label class="fw-bold">Course Thumbnail / Cover Image</label>
                        
                        @if($course->thumbnail)
                            <div class="mb-3 p-3 border rounded bg-light">
                                <p class="text-muted mb-2">Current Image:</p>
                                <img src="{{ $course->thumbnail_url }}" 
                                     alt="{{ $course->titulli }}" 
                                     class="img-fluid rounded" 
                                     style="max-height: 200px; width: auto;">
                            </div>
                        @else
                            <div class="alert alert-info">
                                <i class="fas fa-info-circle"></i> No thumbnail uploaded yet.
                            </div>
                        @endif

                        {{-- ⭐ SEPARATE UPLOAD FORM --}}
                        <div class="mt-3 p-3 border rounded bg-light">
                            <h6>Upload New Thumbnail</h6>
                            <form action="{{ route('courses.upload-thumbnail', $course->id) }}" 
                                  method="POST" 
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row g-2">
                                    <div class="col-md-8">
                                        <input type="file" 
                                               class="form-control @error('thumbnail') is-invalid @enderror" 
                                               name="thumbnail" 
                                               accept="image/jpeg,image/png,image/gif,image/webp"
                                               required>
                                        @error('thumbnail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary w-100">
                                            Upload Image
                                        </button>
                                    </div>
                                </div>
                                <small class="form-text text-muted">
                                    Supported formats: JPEG, PNG, GIF, WebP. Max size: <strong>5MB</strong>. 
                                    Recommended: <strong>800x400 pixels</strong>.
                                </small>
                            </form>
                        </div>

                        {{-- Remove thumbnail button --}}
                        @if($course->thumbnail)
                            <div class="mt-3">
                                <form action="{{ route('courses.delete-thumbnail', $course->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure you want to remove this image?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Remove Current Image
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>

                    <hr>

                    {{-- ============================================ --}}
                    {{-- MAIN COURSE UPDATE FORM --}}
                    {{-- ============================================ --}}
                    <form action="{{ route('courses.update', $course->id) }}" 
                          method="POST" 
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="titulli" class="fw-bold">Course Title</label>
                            <input type="text" 
                                   class="form-control @error('titulli') is-invalid @enderror" 
                                   id="titulli" 
                                   name="titulli" 
                                   value="{{ old('titulli', $course->titulli) }}" 
                                   required>
                            @error('titulli')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="pershkrimi" class="fw-bold">Description</label>
                            <textarea class="form-control @error('pershkrimi') is-invalid @enderror" 
                                      id="pershkrimi" 
                                      name="pershkrimi" 
                                      rows="4">{{ old('pershkrimi', $course->pershkrimi) }}</textarea>
                            @error('pershkrimi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="cmimi" class="fw-bold">Price ($)</label>
                                    <input type="number" 
                                           class="form-control @error('cmimi') is-invalid @enderror" 
                                           id="cmimi" 
                                           name="cmimi" 
                                           step="0.01" 
                                           min="0"
                                           value="{{ old('cmimi', $course->cmimi) }}">
                                    @error('cmimi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="level" class="fw-bold">Level</label>
                                    <select class="form-control @error('level') is-invalid @enderror" 
                                            id="level" 
                                            name="level">
                                        <option value="">Select Level</option>
                                        <option value="beginner" {{ old('level', $course->level) == 'beginner' ? 'selected' : '' }}>
                                            Beginner
                                        </option>
                                        <option value="intermediate" {{ old('level', $course->level) == 'intermediate' ? 'selected' : '' }}>
                                            Intermediate
                                        </option>
                                        <option value="advanced" {{ old('level', $course->level) == 'advanced' ? 'selected' : '' }}>
                                            Advanced
                                        </option>
                                    </select>
                                    @error('level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="category_id" class="fw-bold">Category</label>
                                    <select class="form-control @error('category_id') is-invalid @enderror" 
                                            id="category_id" 
                                            name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="instructor_id" class="fw-bold">Instructor</label>
                                    <select class="form-control @error('instructor_id') is-invalid @enderror" 
                                            id="instructor_id" 
                                            name="instructor_id">
                                        <option value="">Select Instructor</option>
                                        @foreach($instructors as $instructor)
                                            <option value="{{ $instructor->user_id }}" 
                                                {{ old('instructor_id', $course->instructor_id) == $instructor->user_id ? 'selected' : '' }}>
                                                {{ $instructor->name ?? 'Instructor ' . $instructor->user_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('instructor_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Course
                            </button>
                            <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Image preview on file selection
    document.getElementById('thumbnail').addEventListener('change', function(e) {
        const previewContainer = document.getElementById('imagePreviewContainer');
        const preview = document.getElementById('imagePreview');
        
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(this.files[0]);
        } else {
            previewContainer.style.display = 'none';
        }
    });
</script>
@endpush
@endsection