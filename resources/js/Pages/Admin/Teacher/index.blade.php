@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> Teachers Page </h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User ID</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                    <tr>
                        <td>{{$teacher->id}}</td>
                        <td>{{$teacher->name}}</td>
                        <td>{{$teacher->email}}</td>
                        <td>{{$teacher->user_id}}</td>
                        <td>
                            <a href="{{url('edit-teacher/'.$teacher->user_id)}}" class="btn btn-primary"> Edit </a>
                            <a href="{{url('delete-teacher/' .$teacher->user_id)}}" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
