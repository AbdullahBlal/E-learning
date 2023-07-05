@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> update Course</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-course/'.$course->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Title</label>
                        <input type="text" value="{{ $course->title }}" class="form-control" name="title">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $course->slug }}" value="form-control" name="slug">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Educational Level</label>
                        <input type="text" value="{{ $course->educational_level }}" class="form-control" name="educational_level">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Teacher</label>
                        <input type="text" value="{{ $course->teacher_id }}" class="form-control" name="teacher_id">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description"  rows="3" class="form-control"> value="{{ $course->description }}"</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" {{ $course->status == "1" ? 'checked':'' }} name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Popular</label>
                        <input type="checkbox" {{ $course->status == "1" ? 'checked':'' }} name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <textarea name="meta_title" rows="3" class="form-control">{{ $course->meta_title }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{ $course->meta_description }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control"> {{ $course->meta_keywords }}</textarea>
                    </div>
                    @if($course->image)
                        <img src="{{asset('assets/uploads/courses/' .$course->image) }}" alt="Image Here">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
