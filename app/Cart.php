<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
//    public $items;
//    public $totalQty=0;
//    public $totalPrice=0;

//    public function __construct($oldCart){
//        if($oldCart){
//            $this->items=$oldCart->items;
//            $this->totalQty=$oldCart->totalQty;
//            $this->totalPrice=$oldCart->totalPrice;
//        }else{
//         $this->items=null;
//        }
//    }

//    public function add($item,$id){
      
//     $storedItem=['qty'=>0,'price'=>$item->sale_price,'item'=>$item];
//     if($this->items){
//         if(array_key_exists($id,$this->items)){
//             $storedItem=$this->items[$id];
//         }
//     }
//     $storedItem['qty']++;
//     $storedItem['price']=$item->sale_price * $storedItem['qty'];
//     $this->items[$id]=$storedItem;
//     $this->totalQty++;
//     $this->totalPrice+=$item->price;
//    }

public function product()
{
    return $this->belongsTo(Product::class,'product_id');
}

}
