@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> update Course</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-teacher/'.$user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" value="{{ $user->name }}" class="form-control" name="name">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="">Email</label>
                        <input type="text" value="{{ $user->email }}" class="form-control" name="email">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
