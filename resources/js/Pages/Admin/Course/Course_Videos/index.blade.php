@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> Course Videos Page </h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Course</th>
                    <th>Video</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                @foreach($course_videos as $video)
                    <tr>
                        <td>{{$video->id}}</td>
                        <td>{{$video->course_id}}</td>
                        <td>{{$video->Video}}</td>
                        <td>{{$video->description}}</td>
                        <!-- <td> <img src="{{asset('assets/uploads/courses/'.$item->image)}}" class = "cate-image" alt="Image Here"> </td> -->
                        <td>
                            <a href="{{url('edit-course/'.$item->id)}}" class="btn btn-primary"> Edit </a>
                            <a href="{{url('delete-course/' .$item->id)}}" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
