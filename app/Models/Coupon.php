<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupons';
    protected $fillable = ['code','coupon_type_id','expire_date','activated'];

    public function course(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
    public function coupon_type(): HasOne
    {
        return $this->hasOne(CouponType::class, 'id' , 'coupon_type_id');
    }
}
