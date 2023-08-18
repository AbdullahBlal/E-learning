@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> Add Teacher</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-teacher')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="user_id">
                            <option value="">Select User</option>
                            @foreach($teachers as $teacher)
                                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"> Submit </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
