@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> Add Coupon</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-coupon')}}" method="post" enctype="multipart/form-data">

                <div class="col-md-6 mb-3">
                    <label for="">Number of Coupons </label>
                    <input type="text" class="form-control" name="numberOfCoupons">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Expiry Date</label>
                    <input type="text" class="form-control" name="expire_date">
                </div>
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select" name="coupon_type_id">
                            <option value="">Select Coupon Type </option>
                            @foreach($couponTypes as $couponType)
                                <option value="{{$couponType->id}}">{{$couponType->name}}</option>
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
