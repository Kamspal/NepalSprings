<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [ 'user_id','category_id','payment','product_id','order_id', 'order_qty','delivery_charge','coupon_discount','total_amount_calculated','total_amount_payable'
    ,'advisory_information','shipping_status','delivered'];
       
   
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
