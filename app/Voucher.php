<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voucher extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    protected $fillable = [
    	'voucher_code',
    	'total_price',
    	'total_quantity',
    	'sale_by',
    	'type',
    	'voucher_date',
    	'status',
    	'deleted_at',
        'date',
        'foc_flag',
        'foc_value',
        'discount_flag',
        'tax_flag',
        'tax_value',
        'net_price',
        'pay_type',
        'service_value',
        'pay_remark'
    ];

    public function option() {
        return $this->belongsToMany(Option::class)->withPivot('quantity','price','date');
    }

    public function user()
    {
        return $this->belongsTo('App\User','sale_by');
    }
    public function shopOrder()
    {
        return $this->hasOne(ShopOrder::class);
    }
    public function order()
    {
        return $this->hasOne(Order::class);
    }
    public function getVoucherDateAttribute($value)
    {
        return date('Y-m-d h:i A',strtotime($value));
    }
}
