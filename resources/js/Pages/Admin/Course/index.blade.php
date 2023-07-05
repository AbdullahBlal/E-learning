@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> Courses Page </h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Teacher</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Educational Level</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($courses as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->teacher_id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->duration}}</td>
                        <td>{{$item->educational_level}}</td>
                        <td> <img src="{{asset('assets/uploads/courses/'.$item->image)}}" class = "cate-image" alt="Image Here"> </td>
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
