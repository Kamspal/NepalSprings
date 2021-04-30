<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 'user_id','category_id','product_id', 'order_qty','delivery_charge','coupon_discount','total_amount_calculated','total_amount_payable'
,'advisory_information','payment','shipping_status','delivered'];
    

public function user()
	{
	    return $this->belongsTo(User::class, 'user_id');
	}
}
