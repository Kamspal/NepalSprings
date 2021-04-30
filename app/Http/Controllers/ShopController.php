<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ShopController extends Controller
{
    

    public function shop(){
        $product=Product::sortable()->latest()->paginate(20);
        return view('layouts.frontLayout.shop',compact('product'));
   
  
    }
}
