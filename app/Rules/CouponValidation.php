<?php

namespace App\Rules;

use App\Models\Coupon;
use Illuminate\Contracts\Validation\Rule;

class CouponValidation implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->isValidCoupon($value);
    }
    function isValidCoupon($couponCode)
    {
        $coupon = Coupon::where("code","=","$couponCode")->first();
        if($coupon != null && !$coupon->activated && $coupon->coupon_type->id == 1 ){    // will add Date check later
            return true;
        }
        return false;
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Please Use Valid Coupon";
    }
}
