<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponType;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CouponController extends Controller
{
    // teacher role is 2 on the user_role table and 0 is the default role created with the new users


    function generateCode($prevCode): string
    {

        $code = substr(uniqid(), 0, 8);
        $exists = Coupon::where([['code','=',$code]])->count();
        if($exists > 0 || ($prevCode != null && $code == $prevCode)){
           $code = $this->generateCode($prevCode);
        }
        return $code;
    }
    public function getCoupons()
    {
        return Coupon::all();
    }
    public function getCoupon($id)
    {
        return Coupon::where([['coupons.id','=',$id]])->get()->first();
    }
    public function index()
    {
        $coupons = $this->getCoupons();

       //return Inertia::render('Admin/Coupons/SignUpForm', ['coupons' => $coupons]);
       return view('admin.Coupons.index',compact(['coupons']));
    }

    public function insert(Request $request)
    {
        $prevCode = '';
        $num = intval( $request->input("numberOfCoupons" ) ) ?? 1;
        for( $i = 0 ; $i < $num ; $i++ )
        {
            $coupon = new Coupon();
        $coupon->code = $this->generateCode($prevCode);
        $coupon->expire_date = $request->input("expire_date");
        $coupon->coupon_type_id = $request->input("coupon_type_id");
        $coupon->activated = 0;
        $coupon->save();
        $prevCode = $coupon->code;
        }
        return redirect('/coupons')->with('status','Coupon added successfully');
    }
    public function add()
    {
        $couponTypes = CouponType::all();
        return view('admin.Coupons.insert',compact(['couponTypes']));
    }
    public function edit($id)
    {
        $coupon = $this->getCoupon($id);
        if($coupon->activated)  return redirect('/coupons')->with('status','Cannot Edit Activated Coupon');
        $couponTypes = CouponType::all();
        return view('admin.Coupons.edit',compact(['coupon','couponTypes']));

    }
    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        if($coupon->activated)  return redirect('/coupons')->with('status','Cannot Update Activated Coupon');
        $coupon->expire_date = $request->input('expire_date');
        $coupon->coupon_type_id = $request->input("coupon_type_id");
        $coupon->save();
        return redirect('/coupons')->with('status','Coupon updated successfully');

    }
    public function delete($id)
    {

        $coupon = Coupon::where('id','=',$id)->first();
        if($coupon->activated)  return redirect('/coupons')->with('status','Cannot Delete Activated Coupon');
        $coupon->delete();
        return redirect('/coupons')->with('status','Coupon deleted successfully');
    }
}
