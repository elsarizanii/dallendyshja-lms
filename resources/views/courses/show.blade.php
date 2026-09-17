@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>{{ $course->titulli }}</h3>
                    <div>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    @if($course->thumbnail)
                        <div class="mb-4 text-center">
                            <img src="{{ $course->thumbnail_url }}" 
                                 alt="{{ $course->titulli }}" 
                                 class="img-fluid rounded" 
                                 style="max-height: 300px; width: auto;">
                        </div>
                    @endif

                    <div class="mb-3">
                        <h5>Description</h5>
                        <p>{{ $course->pershkrimi ?? 'No description available.' }}</p>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Price</h5>
                            <p>${{ number_format($course->cmimi ?? 0, 2) }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Level</h5>
                            <p>{{ ucfirst($course->level ?? 'N/A') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Category</h5>
                            <p>{{ $course->category->name ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Instructor</h5>
                            <p>{{ $course->instructor->name ?? 'N/A' }}</p>
                        </div>
                    </div>

                    @if($course->thumbnail)
                        <div class="mt-3">
                            <h5>Thumbnail</h5>
                            <p><strong>File:</strong> {{ $course->thumbnail }}</p>
                            <p><strong>URL:</strong> <a href="{{ $course->thumbnail_url }}" target="_blank">{{ $course->thumbnail_url }}</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection