<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function AddToCart(Request $request,$id)
    {
   
        if($request->isMethod('post')){
            
            $cart=session()->get('cart');
           
            // return $cart;
            $session_id=Str::random(30);
            // return $request;
            if(!$cart){
                $cart=[
                    $id => [
                        'session_id'=>$session_id,
                        'product_id'=>$request->product_id,
                        'quantity'=>$request->quantity,
                        'totalprice'=>$request->totalprice

                    ]
                 
                    ];
                    session()->put('cart',$cart);
                    $cart=session()->get('cart');
                    return $cart;
            }

            if(isset($cart[$id])){
                $cart[$id]['quantity']+=$request->quantity;
                $cart[$id]['totalprice']+=$request->totalprice;
                session()->put('cart',$cart);
                $cart=session()->get('cart');
                return $cart;
            }
            $cart[$id] = [

                'session_id'=>$session_id,
                'product_id'=>$request->product_id,
                'quantity'=>$request->quantity,
                'totalprice'=>$request->totalprice
    
            ];
     
            session()->put('cart', $cart);
            // return $cart;
            $cart=session()->get('cart');
            return $cart;
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAddToCart(Request $request,$id)
    {
        if($request->isMethod('post')){
            return $request->all();
        }
        
        // if($request->isMethod('post')){
        //     return $dataString;
        // }
        // if($request->isMethod('post')){
        
        // $totalPrice=$request['quantity']*$request['price'];
        // $session_id=Str::random(40);
        // Session::put('session_id',$session_id);
        // $cart=new Cart;
        // $cart->total_quantity=$request['quantity'];
        // $cart->product_id=1;
        // $cart->user_id=1;
        // $cart->session_id=$session_id;
        // $cart->total_price=$totalPrice;
        // $cart->save();
        // }
    	
        // $product=Product::find($id);
        // $oldCart=Session::has('cart') ? Session::get('cart') : null;
     
        // $cart=new Cart($oldCart);
        
        // $cart->add($product,$product->id);
        // $request->session()->put('cart',$cart);
        // dd($request->session()->get('cart'));
        // return redirect('/');
       
    }
    public function displayCart()
    {
        $cart=Session::get('cart');
       
       if(Session::has('cart')){
        
        $regular_price_total=0;
        foreach($cart as $carts){
          
            $product=Product::where('id',$carts['product_id'])->get();
         
           
        foreach($product as $key=>$prod){
            $regular_price_total+=$carts['quantity']*$prod->regular_price;
         
        }
       
     }
     return view('layouts.cart.front_cart',compact('regular_price_total','cart'));
       }else{
        return view('layouts.cart.front_cart');
       }
      
     
       
    }
    

    public function fetchCart(){
       
        $cart=Session::get('cart');
      
     
            if(!empty($cart))
            {
            $regular_price_total=0;
            $total=0;
            foreach($cart as $carts){
              
                $product=Product::where('id',$carts['product_id'])->get();
             
               
            foreach($product as $key=>$prod){
                $regular_price_total+=$carts['quantity']*$prod->regular_price;
             
            }
        }
    }

        
       
        
            $output = '
            <div class="sidebar-inside">
            <form class="form-inline checkout-tab-header" method="post" action="/guest-checkout">
            <div class="u-sidebar__content">
            <!-- Body -->
       
'. csrf_field() .'
            <div class="card-body ">';
          
            if(!empty($cart))
{
  
    foreach($cart as $key=>$item) {
      
        $product=Product::where('id',$key)->first();

        $total+=$item['totalprice'];

        $discount=$regular_price_total-$total;
      
        $output=$output.'<div id="sidebar-box'.$key.'" class="cart-total" >   
          <div class="media">
        <div class="u-avatar mr-3">
          <img class="img-fluid rounded" src="/images/backend_images/products/small/'.$product->product_image.'" alt="Image Description" style="border:1px solid #eee">
        </div>
        <div class="media-body">
          <div class="d-flex justify-content-between align-items-center">
            <span class="d-block font-weight-semi-bold">'.$product->product_name.'</span>
            <button type="button" id="delete-tab" data-id="'.$key .'" class="close" aria-label="Close" onclick="deleteTab('.$key.')" >
              <span aria-hidden="true" id="delete-tab" style="color:#AB020E">×</span>
            </button>
   
          </div>
     
          <span class="d-block text-primary font-weight-semi-bold">
          <div class="sidebar-price">
          <span>Regular Price:</span>
          <span>NRs.'.$product->regular_price.'</span>
          <div class="saleprice pb-2"> 
          <span>Sale Price:</span>
          NRs.'.$product->sale_price.'
         </div>
         </div>
          </span>
        
          <div id="myDiv">
       
       
                 <div class="input-group  quantity">
                 <span style="margin-right: 10px;">Qty</span> 
                 <div class="input-group-text" id="decrease" onclick="decreaseSidebarModalValue'.$product->id.'()" value="Decrease Value" style="border-radius: 24px 0 0 24px;height:19px"">-</div> 
                 <input type="number" id="quantitySidebarModal'.$product->id.'" name="quantit[]" value="'.$item['quantity'].'" style="text-align: right;border: 1px solid #ccc;height:19px" readonly/>
                    <div class="input-group-text" id="increase" onclick="increaseSidebarModalValue'.$product->id.'()" value="Increase Value" style="border-radius: 0 24px 24px 0;height:19px">+</div>
               </div>
               
               <input type="hidden" id="priceSidebarModal'.$product->sale_price.'" name="price" value="'.$product->sale_price.'" />
               <input type="hidden" id="priceSidebarModal'.$product->id.'" name="product_id[]" value="'.$product->id.'" />
               <input type="hidden" id="sidebar-regular-pric'.$key.'" name="regularprice" value="'.$product->regular_price.'">
      
               <div id="" class="total-amount">
                   <span style="float: left;margin-top:10px">Price (NRs.)</span>
<input type="text" id="sidebar-productpricee'.$key.'" name="totalprice[]" value="'.$item['totalprice'].' " style="border: none;text-align: right;width: 21%;margin-right: 51px;margin-top: 12px;" readonly>
             

                  
                
                            
</div>
                         </div>
        </div>
      </div>
      <script>
     

var p = parseInt(document.getElementById("priceSidebarModal'.$product->sale_price.'").value, 10);
function increaseSidebarModalValue'.$product->id.'() {
  var value = parseInt(document.getElementById("quantitySidebarModal'.$product->id.'").value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById("quantitySidebarModal'.$product->id.'").value = value;
  var x = parseInt(document.getElementById("priceSidebarModal'.$product->sale_price.'").value, 10);
  var regular = parseInt(document.getElementById("sidebar_total_cost_calc").value, 10);
  var single_regular=parseInt(document.getElementById("sidebar-regular-pric'.$key.'").value, 10); 
  var total_regular_price=regular+single_regular;

  u_price=x * value;
 
  document.getElementById("sidebar-productpricee'.$product->id.'").value=u_price;

  var quantity=value;
  var totalprice=u_price
  var url = "/add-to-session";
        var Url = url+"/"+'.$key.';

        $.ajax({
			url: Url,
			type: "post",
			cache: false,
      data: {
                   _token: "'.csrf_token().'",
                   quantity : quantity, 
                   totalprice : totalprice
                 },
      success :function(cart){
        
      }
    

        });
        var tot=0;

     
      var a = parseInt(document.getElementById("sidebar_total_amount_checkout").value, 10);
      tot= a+x;
      var discount=total_regular_price-tot;
        document.getElementById("sidebar_total_cost_calc").value=total_regular_price;
        document.getElementById("sidebar_total_discount").value=discount;
        document.getElementById("sidebar_total_amount_checkout").value=tot;
}
    
function decreaseSidebarModalValue'.$product->id.'() {
    var value = parseInt(document.getElementById("quantitySidebarModal'.$product->id.'").value, 10);
    var x = parseInt(document.getElementById("priceSidebarModal'.$product->sale_price.'").value, 10);
    var regular = parseInt(document.getElementById("sidebar_total_cost_calc").value, 10);
    var single_regular=parseInt(document.getElementById("sidebar-regular-pric'.$key.'").value, 10); 
    var final_value=value-1;
    value = isNaN(value) ? 0 : value;
    value < 2 ? value = 2 : "";
    value--;
    document.getElementById("quantitySidebarModal'.$product->id.'").value = value;
    var total_regular_price=regular-single_regular;

  u_price=x * value;
  
  document.getElementById("sidebar-productpricee'.$product->id.'").value=u_price;

  var quantity=value;
  var totalprice=u_price
  var url = "/add-to-session";
        var Url = url+"/"+'.$key.';

        $.ajax({
			url: Url,
			type: "post",
			cache: false,
      data: {
                   _token: "'.csrf_token().'",
                   quantity : quantity, 
                   totalprice : totalprice
                 },
      success :function(cart){
        
      }
    

        });
        var tot=0;

     
      var a = parseInt(document.getElementById("sidebar_total_amount_checkout").value, 10);
      tot= a-x;
      if(final_value>=1){
      var discount=total_regular_price-tot;
        document.getElementById("sidebar_total_cost_calc").value=total_regular_price;
        document.getElementById("sidebar_total_discount").value=discount;
        document.getElementById("sidebar_total_amount_checkout").value=tot; 
      }
  }
      </script>
        </div>
      <hr>
      ';

     
    
} 
$output=$output. '</div>
</div>' ;   
$output=$output.'<div class="amount-sum-box"><p style="padding:0px 45px;">*You will receive the free delivery within the Kathmandu Valley exceeding amount of NRs. 999.
<br>** We do not accept any transaction below NRS. 999 .
</p> 
<div class="pb-1">
<div class="col-sm-12 pl12" style="padding-left: 40px;padding-bottom: 20px;">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            Sub-Total:
                                        </td>
                                        <td class="text-right">
                                        <div class="inputdiv">
                                        <style>
                                        @media screen and (max-width:425px) {
                                            .form-control {
                                                display: initial !important;
                                            }
                                        }
                                        </style>
                                        NRs. 
                                        <input type="text" class="form-control" id="sidebar_total_cost_calc" name="total_cost_calc" value="'.$regular_price_total.'" style="border:none;width:80px;padding-bottom:8px;font-weight:700;color:#000"> 
                                        </div>
                                        </td>
                                    </tr>
                                    <tr class="tr1">
                                        <td>
                                            Discount:
                                        </td>
                                        <td class="text-right tr1">
                                        <div>
                                        NRs. <input type="text" class="form-control" id="sidebar_total_discount" name="total_discount" value="'.$discount.'" style="border:none;width:80px;padding-bottom:8px;font-weight:700;color:#AC030F">
                                        </div>
                                        </td>
                                    </tr>
                                    <tr class="border-top">
                                        <td> <b>Total Price:</b> </td>
                                        <td class="text-right">
<div>
                                            <span id="totalAmt">
                                            </span>
                                            NRs. 
                                            <input type="text" class="form-control" id="sidebar_total_amount_checkout" name="total_amount_checkout" value="'.$total.'" style="border:none;width:80px;font-size:18px;color:#000;font-weight:700;padding-bottom:8px">
                                           
                                            
                                        </td>
                                        </div>
                                    </tr>
                                </tbody>
                            </table>

</div>
<div class="place-order" style="padding-left: 55px;"><a id="checkOutButton" class="btn btn-danger btn-md sidebar__btn-place-order" title="Check out with this list" href="/cart" style="pointer-events: auto;"><i class="fa fa-shopping-cart pr-2"></i>Go to Cart</a>
<button type="submit"  onclick="return checkoutSidebarAmount()" class="btn btn-danger btn-md sidebar__btn-place-order checkout1"><i class="fa fa-truck pr-2"></i>Checkout</button>
<!-- Modal -->
<style>
.fa-exclamation-triangle {
    font-size: 55px;
  }

  .color000 {
    color: #000 !important;
    font-size: 22px;
  }

  .close11 {
      color: #fff !important;
      opacity:1;
  }

  .color1 {
      color: #AC030F;
</style>
<div class="modal fade cart-page" id="sidebarModal" role="dialog">
      <div class="modal-dialog" role="document">
             <!-- Modal content-->
             <div class="modal-content">
             <div class="modal-header btn-danger">
               <h4 class="modal-title ml-auto">Warning!!!</h4>
               <button type="button" class="close close11" data-dismiss="modal">&times;</button>
             </div>
             <div class="modal-body">
               <div class="text-center">
                 <p class="fa fa-exclamation-triangle mb-2"></p>
               </div>
               <p class="color000 text-center"> Checkout Amount must be above <strong>NRs.999</strong> <br><span class="color1">Please!!! Add more items to your cart list. </span></p>
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
             </div>
           </div>
      </div>
  </div>
<!-- End Modal -->


<script>
                                        function checkoutSidebarAmount() {
                                          var value = parseInt(document.getElementById("sidebar_total_amount_checkout").value, 10);
                                          var order_value = parseInt(document.getElementById("order_value").value, 10);
                                              
                                          if(value<=order_value){
                                              $("#sidebarModal").modal("show");
                                       
                                                return false;
                                            }
                                            else{
                                             
                                                return true;
                                            }
                                            
}
                                        </script>
</div>

</div>';
return $output;
}
  

   
        else{
            $output =$output.'<div class="Empty cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="\images\frontend_images\cart\cart-logo.png" width="130" height="130" class="img-fluid mb-4 mr-3">
            <h3><strong>Your Cart is Empty</strong></h3>
            <h4>Add something to make me happy :)</h4> <a href="\" class="btn cart-btn-transform m-3 bg-cart waves-effect waves-light" data-abc="true">Continue Shopping</a>
        </div></div></div>';
            return $output;
         }

       	 
     
         
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function showCart(Request $request)
    {
        $cart=Cart::get();
       
        return response()->json($cart);
        
    }
    


    public function deleteCart(Request $request,$id)
    {   

        Cart::where('id',$id)->delete();
        $cart=Cart::get();
       
        return response()->json($cart);	
        
    }


    public function sessionDelete($id)
    {

        
        $cart = Session::get('cart'); // Get the array
        //return $cart;
    unset($cart[$id]); // Unset the index you want
    Session::put('cart', $cart); // Set the array again
    $carts=Session::get('cart'); 
    $counting=count($carts);
    if(empty($cart))
    {
    
    $response = 0;
    
    
    return response()->json($response);
}
    $total=0;
    $regular_price_total=0;
    foreach($carts as $cart){
        $total=$total+$cart['totalprice'];
        $product=Product::where('id',$cart['product_id'])->get();
     
       
    foreach($product as $key=>$prod){
        $regular_price_total+=$cart['quantity']*$prod->regular_price;
    
    }
     
    }
    
   
    $idd=$id;
    $discount=$regular_price_total-$total;
    $response = [
        'total' => $total,
        'carts'=>$carts,
        'discount' => $discount,
        'product'=>$product,
        'counting'=>$counting,
        'regular_price'=>$regular_price_total,
    ];
    
    
    return response()->json($response);

     
   
  
   
    }


    public function checkCoupon(Request $request) {
        $r='xzc';
        $coupon='xzc';
        if($coupon==$r){
            $discount=10;
            return $discount;
        }
        else{
            $discount=0;
            return $discount;
        }
        

    }


    
    public function addSession(Request $request,$id) {

        $cart=session()->get('cart');
        
        $session_id=Str::random(30);
        $cart[$id] = [
            'session_id'=>$session_id,
            'product_id'=>$id,
            'quantity'=>$request->quantity,
            'totalprice'=>$request->totalprice

        ];
 
        session()->put('cart', $cart);
        
        return response()->json($cart);
    }
    public function guestCheckout(Request $request) {
   
        if($request->isMethod('post')){
        $all=$request->all();
        
        $checkout_quantity=$request->quantit;
        $totalprice_product=$request->totalprice;

        $product_id=$request->product_id;
        
         $total_discount=round($request->total_discount, 3);;
        $totalpric=$request->totalpric;
        $total_cost_calc=$request->total_cost_calc;
        $total_amount_checkout=$request->total_amount_checkout;
        $all=$request->all();
        // return $all;
        $checkout[]=[
                    'checkout_quantity'=>$request->quantit,
                    'totalprice_product'=>$request->totalprice,
                    'quantity'=>$request->quantity,
                    'product_id'=> $product_id,
                    'total_discount'=>round($request->total_discount, 3),
                   'totalpric'=>$request->totalpric,
                   'total_amount_checkout'=>$request->total_amount_checkout,
                   'payment'=>0,
        ];
             
                session()->put('checkout',$checkout);
           
        
                $checkout=session()->get('checkout');

           
        
        return view('layouts.cart.guest_checkout',compact('all','total_cost_calc','checkout','product_id','total_discount','checkout_quantity','totalprice_product','totalpric','total_amount_checkout'));
        }
        return redirect('cart');
    }
    public function resultCheckout(Request $request)
    {
        return $request;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
