@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> update Coupon</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-coupon/'.$coupon->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="">Expiry Date</label>
                        <input type="text" value="{{$coupon->expire_date }}" class="form-control" name="expire_date">
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <select class="form-select" name="coupon_type_id">
                                <option value="{{$coupon->coupon_type->id ?? ""}}">Select Coupon Type </option>
                                @foreach($couponTypes as $couponType)
                                    <option value="{{$couponType->id}}">{{$couponType->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary"> Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
