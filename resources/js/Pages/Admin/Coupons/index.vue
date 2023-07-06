@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4> Coupons Page </h4>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Coupon Type</th>
                    <th>Expiry Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($coupons as $coupon)
                    <tr>
                        <td>{{$coupon->id}}</td>
                        <td>{{$coupon->code}}</td>
                        <td>{{$coupon->coupon_type->name ?? "No Coupon Type "}}</td>
                        <td>{{$coupon->expire_date}}</td>
                        <td>{{$coupon->activated?"Activated":"Not Activated"}}</td>
                        <td>
                            <a href="{{url('edit-coupon/'.$coupon->id)}}" class="btn btn-primary"> Edit </a>
                            <a href="{{url('delete-coupon/' .$coupon->id)}}" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
