<?php

namespace App;
use App\Cart;
use Kyslik\ColumnSortable\Sortable;

use App\OrderDetail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use Sortable;
	public $sortable = ['id', 'product_name', 'sale_price','details', 'updated_at', 'updated_at'];
    public function attributes(){
    	return $this->hasMany('App\ProductsAttribute','product_id');
    }

    public function carts(){
    	return $this->hasMany(Cart::class,'product_id');
    }
    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}
