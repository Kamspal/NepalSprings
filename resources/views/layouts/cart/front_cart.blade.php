@extends('layouts.adminLayout.admin_front_header')


<style>
   .text-center1 {
      display: inline-block;
  }
  
span.product-cost input {
    border: none;
    font-weight: bold;
    display: inline;
    font-family: inherit;
    font-size: inherit;
    width: auto;
}
.cart-page .modal-header {
    background: #AB020E;
    color: #fff;
}
.cart-page .close {
    padding-left: 2px !important;
    margin-left: 2px !important;
}
.cart-page h4 {
    text-align: center !important;
    width: 500px;
}
.mt-100 {
    margin-top: 100px
}

.card {
    margin-bottom: 30px;
    border: 0;
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    letter-spacing: .5px;
    border-radius: 8px;
    -webkit-box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05);
    box-shadow: 1px 5px 24px 0 rgba(68, 102, 242, .05)
}

.card .card-header {
    background-color: #fff;
    border-bottom: none;
    padding: 24px;
    border-bottom: 1px solid #f6f7fb;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px
}

.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
}

.card .card-body {
    padding: 30px;
    background-color: transparent
}

.btn-primary,
.btn-primary.disabled,
.btn-primary:disabled {
    background-color: #4466f2 !important;
    border-color: #4466f2 !important
}

.bg-cart {
  background-color: #AC030F !important;
  color: #fff !important;
}

.cart-title {
  font-size: 2.125rem !important;
}
.border-n {
  border: none !important;
}

.bottom-b {
  border-top: 1px solid #AC030F !important;
}

.input-f {
  color: #AC030F !important;
  font-weight: bold !important;
}

.modal-body {
  text-align: left;
}
.modal-header {
  border-bottom: none !important;
}

.modal-footer {
  border-top: none !important;
}

.fa-exclamation-triangle {
  font-size: 55px;
}

.w100 {
  width: 50%;
}

.width {
  width: 63% !important;
}

.text-right p span {
    font-size: 24px !important;
    line-height: 36px !important;
    color: #AC030F !important;
}

.color000 {
  color: #000 !important;
  font-size: 22px;
}

.close {
  color: #fff !important;
  opacity: 1;
}

.width {
  width: 73%;
}

@media screen and (max-width: 768px) {
  .quantity span {
    margin-left: 41px;
  }

  .w100 {
    width: 60% !important;
  }

  .safari-only {
    width: 66% !important;
  }

  .pad-left {
  padding-left: 475px !important;
}
}

@media screen and (max-width: 425px) {
      .quantity span {
        margin-right: 68px !important;
      }
      .mr-1 {
        top: 63% !important;
      }

      .text-center1 {
        justify-content: center !important;
      }

      .height {
        height: auto !important;
      }

      #left {
        margin-left: 0 !important;
      }

      #margin11 {
        margin-top: 0 !important;
      }

      #left {
        margin-top: 0 !important;
      }
      .center-img {
        text-align: center !important;
      }

      .w100 {
        width: 100% !important;
      }

      .width {
      width: 60% !important;
}
    .pad-left {
  padding-left: 175px !important;
}
}

@media screen and (max-width:375px) {
    .list-group-item p .responsive1 {
  margin-left: -10px;
}

.pad-left {
    padding-left: 122px !important;
}
}

@media screen and (max-width:320px) {
  .width {
    width: 54% !important;
}

  .pad-left {
    padding-left: 67px !important;
}
}
</style>

@section('content')


<!-- Fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

 
  <!--Main layout-->
  <main>
  @if(!empty($cart))
    <div class="container">
    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/guest-checkout') }}" name="checkout" id="checkout" novalidate="novalidate"> {{ csrf_field() }}
               
                
      <!--Section: Block Content-->
      <section class="mt-5 mb-4">

        <!--Grid row-->
        <div class="row">

          <!--Grid column-->
          <div class="col-lg-8">

            <!-- Card -->
            <div class="card wish-list mb-4">
              <div class="card-body">
            
                <h5 class="mb-4 input-f">Cart (<span id="total-in-cart"><span id="item-cart"><?php echo count($cart); ?></span></span> items)</h5>
              
                @foreach($cart as $key=>$item)
                <?php 
                          
                          $product=App\Product::where('id',$key)->first();
?>
                <div id="h{{$key}}" class="cart-total" >
                <div class="row">
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    <div class="mb-3 center-img">
                      <img class="img-fluid w-90"
                        src="/images/backend_images/products/small/<?php echo $product->product_image; ?>" alt="Sample">
                    </div>
                  </div>
                  <div class="col-md-10 col-lg-10 col-xl-10">
                    <div class="text-center1">
                      <div class="d-flex justify-content-between">
                      <h5 class="font-weight-bold fonts w100">
                  
                  <?php
                                            echo $product->product_name; ?>
                                           
                                            </h5>
                        <div class="title-font">
                      
                        </div>
                         
                      <br>
                        <div>
                          <div class="def-number-input number-input safari_only mb-0 w-100">
                          <div class="input-group float-right quantity">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease"  onclick="decreaseValue{{$key}}()" value="Decrease Value" style="height: 19px;border-radius: 24px 0 0 24px;">-</div> 
                            
                            
                            <input type="number" id="quantity{{$key}}" name="quantit[]" value="{{$item['quantity']}}"style="height: 19px;text-align: right;border: 1px solid #ccc;" readonly/>
                           
                               <div class="input-group-text" id="increase" onclick="increaseValue{{$key}}()" value="Increase Value" style="height: 19px;border-radius: 0 24px 24px 0;">+</div>
                               <div id="">
                             <!-- <span class="product-cost">  <input type="hidden" id="pric{{ $product->sale_price}}" name="price" value="{{$product->sale_price}}" />
                        </span> -->
        <input type="hidden" id="product-pric{{$key}}" name="totalprice" value="{{$product->sale_price}}">
        <input type="hidden" id="regular-pric{{$key}}" name="regularprice" value="{{$product->regular_price}}">
        <!-- <span class="product-cost total">    <input type="text" id="productpric{{$key}}" name="totalprice" value="{{$item['totalprice']}}">
       
                       </span>   -->
                        </div>
                          </div>
                          </div>
                          <input type="hidden" id="product_id" name="product_id[]" value="{{$item['product_id']}}" />
                        </div>
                      </div>
                      <div class="d-flex justify-content-between align-items-center height" style="height:10px">
                        <div class="margin">
                          <a href="/delete-cart/{{$key}}" type="button" class="card-link-secondary small text-uppercase mr-3 text-dark cart-data-details__total"><i
                              class="fa fa-times mr-1" data-id="{{ $key }}" style="position: absolute;top: 70%;right: 0px;bottom: 0px;color:#AB020E;font-size:19px"></i></a>

                              <!-- <div class="cart-data-details__total d-inline-flex float-left">
    
                                <i class="fa fa-times" data-id="{{ $key }}"></i>
                            </div> -->
                        </div>
                        <p id="left" class="mb-0 mt-5" style="margin-left: 200px">  <span class="product-cost">  <span><strong>Rate (NRs.): </strong> <input type="text" id="price{{ $product->sale_price}}" name="price" value="{{$product->sale_price}}" style="width: 50px;"/></span>
                        </span>
                         <input type="hidden" id="product-price{{$key}}" name="totalprice" value="{{$product->sale_price}}">
          </p>
                        <p id="margin11" class="mb-0 mt-5"> <span class="product-cost total">  <span><strong>Cost (NRs.): </strong> <input type="text" id="productprice{{$key}}" onchange="myFunction()" class="totalprice" name="totalprice" value="{{$item['totalprice']}}" style="width: 51px;"></span>
                        
       </p>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
                <hr class="mb-4">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
                <script type="text/javascript">
 var p = parseInt(document.getElementById('price{{ $product->sale_price}}').value, 10);

 
function increaseValue{{$key}}() {

  var value = parseInt(document.getElementById('quantity{{$key}}').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('quantity{{$key}}').value = value;
  var x = parseInt(document.getElementById('price{{$product->sale_price}}').value, 10);
  var regular = parseInt(document.getElementById('total_cost_calc').value, 10);
  var single_regular=parseInt(document.getElementById('regular-pric{{$key}}').value, 10); 
  var total_regular_price=regular+single_regular;
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  var quantity=value;
  var totalprice=u_price
  var url = "/add-to-session";
        var Url = url+"/"+{{$key}};

       
        $.ajax({
			url: Url,
			type: "post",
			cache: false,
      data: {
                   '_token': '{!! csrf_token() !!}',
                   'quantity' : quantity, 
                   'totalprice' : totalprice
                 },
      success :function(cart){
        
      }
    

        });
    var arr = [];
  var loop=[];
  arr = document.getElementById('productpricee{{$key}}');
  loop=$('.totalprice').length;

  
  var array = [];
    for(var i = 1; i <= loop; i++)
    {
       array.push(i);
    }
    
    var tot=0;

    $(".totalprice").each(function myFunction(){
      
      
    tot =tot+ Number($(this).val());
  });
  tot=tot+x;
  var discount=total_regular_price-tot;
  
  document.getElementById('costing').value=tot;
  document.getElementById('productprice{{$key}}').value=u_price;
  document.getElementById('productpricee{{$key}}').value=u_price;
  document.getElementById('total_amount_checkout').value=tot;
  document.getElementById('total_discount').value=discount;
  document.getElementById('total_cost_calc').value=total_regular_price;
  
 
  
    
  
}


function decreaseValue{{$key}}() {
  var value = parseInt(document.getElementById('quantity{{$key}}').value, 10);
  var x = parseInt(document.getElementById('price{{$product->sale_price}}').value, 10);
  var regular = parseInt(document.getElementById('total_cost_calc').value, 10);
  var single_regular=parseInt(document.getElementById('regular-pric{{$key}}').value, 10); 
 var final_value=value-1;
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  
  
  value--;
  
  
  document.getElementById('quantity{{$key}}').value = value;

  var total_regular_price=regular-single_regular;
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
 
  var quantity=value;
  var totalprice=u_price
  var url = "/add-to-session";
        var Url = url+"/"+{{$key}};

       
        $.ajax({
			url: Url,
			type: "post",
			cache: false,
      data: {
                   '_token': '{!! csrf_token() !!}',
                   'quantity' : quantity, 
                   'totalprice' : totalprice
                 },
      success :function(cart){
        
      }
    

        });
  var arr = [];
  var loop=[];
 var a = parseInt(document.getElementById('total_amount_checkout').value, 10);
 
  tot= a-x;
  if(final_value>=1){
    var discount=total_regular_price-tot;
  document.getElementById('total_discount').value=discount;
  document.getElementById('costing').value=tot;
  document.getElementById('productprice{{$key}}').value=u_price;
  document.getElementById('productpricee{{$key}}').value=u_price;
  document.getElementById('total_amount_checkout').value=tot;
  document.getElementById('total_cost_calc').value=total_regular_price;
  } 


}



var price = '$'+`<span>${p}</span>`;
document.getElementById('product-price{{$key}}').innerHTML=price;

</script>
<script type="text/javascript">
(function() {

$('.fa-times').click(function (e) {
  
    var $removeBtn = $(this);
    var id = $removeBtn.data('id');
   

    var url = "/delete-cart";
        var dltUrl = url+"/"+id;
       
		$.ajax({
			url: dltUrl,
			type: "GET",
			cache: false,
			data:{
				_token:'{{ csrf_token() }}'
			},
			success: function(data){
        if(data==0){
           
            window.location.reload(true);
          }
          else{

          $('#h'+id).remove();
          $('#calc-amount'+id).remove();
          $('#item-cart').remove();
          document.getElementById('total-in-cart').innerHTML=data.counting;
          
          

  document.getElementById('total_amount_checkout').value=data.total;
document.getElementById('total_discount').value=data.discount;     
document.getElementById('total_cost_calc').value=data.regular_price; 
}

 
         
             // assumes that the wrapper for each line item is cart-data-details__total
        }               
    });

    return false;
});

})(); 

  
function validate(coupon) {

var p = parseInt(document.getElementById('costing').value, 10);

console.log(coupon);
var url = "/check-coupon";
     
  $.ajax({
    url: url,
    type: "GET",
    cache: false,
    
    success: function(discount){
      $("#total_amount_after_discount").empty();
      $("#discount_amount").empty();
      
        if(discount==0){
          total_sum=(p);
          console.log(total_sum);
          $('#total_amount_checkout').val(total_sum);
          $('#total_discount').val(discount);
          
          discount_amount='<div><span>Total Sum:'+0+'</span></div>'
           // html='<div><input type=text id=discount name=discount value=' + discount +' ><input type=text id=total_sum name=total_sum value=' + total_sum +' ><span>Total Sum after Discount'+total_sum+'</span></div>'
            html='<div><span>Total Sum after Discount'+total_sum+'</span></div>'
   
        $("#total_amount_after_discount").append(html);
        $("#discount_amount").append(discount_amount);
        }else{
          console.log(discount);
        console.log(p);
        discount=(discount/100)*p;
        total_sum=(p-discount);
        console.log(discount);
        console.log(total_sum);
        $('#total_discount').val(discount);
        $('#total_amount_checkout').val(total_sum);
        discount_amount='<div><span>Total Sum'+discount+'</span></div>'
        html='<div><span>Total Sum after Discount'+total_sum+'</span></div>'
        $("#total_amount_checkout").value(discount);
        $("#total_amount_after_discount").append(html);
        $("#discount_amount").append(discount_amount);
        }
       
           // assumes that the wrapper for each line item is cart-data-details__total
      }               
  });
}


    </script>
                
                @endforeach
               
                <p class="mb-0 text-dark"><i class="fa fa-info-circle mr-1"></i> Do not delay the purchase, adding
                  items to your cart does not mean booking them.</p>

              </div>
            </div>
            <!-- Card -->

            <!-- Card -->
            <!-- <div class="card mb-4">
              <div class="card-body">

                <h5 class="mb-4">Expected shipping delivery</h5>

                <p class="mb-0"> Thu., 12.03. - Mon., 16.03.</p>
              </div>
            </div> -->
            <!-- Card -->

            <!-- Card -->
            <!-- <div class="card mb-4">
              <div class="card-body">

                <h5 class="mb-4">We accept</h5>

                <img class="mr-2" width="45px"
                  src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                  alt="Visa">
                <img class="mr-2" width="45px"
                  src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                  alt="American Express">
                <img class="mr-2" width="45px"
                  src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                  alt="Mastercard">
                <img class="mr-2" width="45px"
                  src="https://z9t4u9f6.stackpathcdn.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
                  alt="PayPal acceptance mark">
              </div>
            </div> -->
            <!-- Card -->

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-4">

            <!-- Card -->
            <div class="card mb-4">
              <div class="card-body" id="total-container">

                <h5 class="mb-3 font-weight-bolder">Total Cost</h5>

                <ul class="list-group list-group-flush">
                <?php $total=0; ?>
                @foreach($cart as $key=>$item)
                  <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0 text-left" id="calc-amount{{$key}}">
                  <span class="width"><?php 
                          $product=App\Product::where('id',$key)->first();
                          echo $product->product_name; 
                          $total+=$item['totalprice'];
                          ?>
                  </span> 
                      <p class="mb-0">
                       <span class="responsive1" style="color: #000;">NRs.</span> <span class="product-cost total"><input type="text" id="productpricee{{$key}}" name="totalprice[]" value="{{$item['totalprice']}}" class="text-right" style="width: 47px;"></span></p>
                  </li>
                  @endforeach
               
                  <li class="list-group-item d-flex justify-content-between align-items-center px-0 pb-0 font-weight-bold">
                  <span class="width">Sub Total cost</span>  
                  <p class="mb-0"> <span style="color: #000;">NRs.</span>
                  <input type="text" class="border-n text-right font-weight-bold" id="total_cost_calc" style="width: 46px;" name="total_cost_calc" value=" {{$regular_price_total}}"></p>
                  </li>

                  <li class="list-group-item d-flex justify-content-between align-items-center px-0 pb-0 font-weight-bold" style="border-top: 1px solid #AC030F;">
                  <span class="width">Discount</span> 
                  <p class="mb-0">   <span style="color: #000;">NRs.</span>      
                <!-- When Cupon on used
                  <input type="text" class="form-control" id="total_discount" name="total_discount" value=0></p>
                   -->
                   <input type="text" class="border-n text-right font-weight-bold" id="total_discount" style="width: 46px;" name="total_discount" value="{{$regular_price_total-$total}}"></p>
           
                     </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center px-0 bottom-b input-f">
                  <div>Total Cost</div><input type="hidden" id="costing" name="totalpric" value=" {{$total}}" >
                  
                  <div class="pad-left" style="padding-left:104px">NRs.</div><input style="width:46px" type="text" class="form-control border-n text-right input-f m-0 p-0"  id="total_amount_checkout" name="total_amount_checkout" value="{{$total}}">
</div></li>
 
                 
                
       
        
              
                  <!-- <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                  <input class="form-control" type="text" name="text1" style="width: 50%;">
                    <input class="form-control" type="button" value="Apply Coupon" name="Submit" id="submit_cupon" onclick="validate(document.getElementsByName('text1')[0].value)" style="width:39%">
                  </li>
                  -->
                </ul>
            
               
                <div class="form-actions text-right pb-3 pr-3">
                 <!-- Button trigger modal -->
                 <input type="submit" id="checkout_button" value="Checkout" placeholder="Checkout" class="btn edit-button text-white"  onclick="return checkoutAmount()" style="background-color: #AB020E;">
             
  <!-- Modal -->
  <div class="modal fade cart-page" id="myModa" role="dialog">
        <div class="modal-dialog" role="document">
               <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Warning!!!</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="text-center">
            <p class="fa fa-exclamation-triangle mb-2"></p>
          </div>
          <p class="color000 text-center"> Checkout Amount must be above <strong>NRs.999</strong> <br><span>Please add more product in your cart list in order to continue...</span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
        </div>
    </div>
<!-- End Modal -->
          

                @else
                  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="cart-title">Cart</h5>
                </div>
                <div class="card-body cart">
                    <div class="col-sm-12 empty-cart-cls text-center"> <img src="\images\frontend_images\cart\cart-logo.png" width="130" height="130" class="img-fluid mb-4 mr-3">
                        <h3><strong>Your Cart is Empty</strong></h3>
                        <h4>Add something to make me happy :)</h4> <a href="\" class="btn cart-btn-transform m-3 bg-cart" data-abc="true">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif



<script>
                                        function checkoutAmount() {
                                          var value = parseInt(document.getElementById('total_amount_checkout').value, 10);
                                          var order_value = parseInt(document.getElementById("order_value").value, 10);
                                              
                                              if(value<=order_value){
                                         
                                              $("#myModa").modal("show");
                                             // jQuery("#myModa").modal();
                                                return false;
                                            }
                                            else{
                                             
                                                return true;
                                            }
                                            
}
                                        </script>
              
                      
              </div>

              </div>
            </div>
            <!-- Card -->

            <!-- Card -->
            <script>
 


// this is the id of the submit button
$("#submitButtonId").click(function() {
alert('hello');
var url = "path/to/your/script.php"; // the script where you handle the form input.

$.ajax({
       type: "POST",
       url: url,
       data: $("#idForm").serialize(), // serializes the form's elements.
       success: function(data)
       {
           alert(data); // show response from the php script.
           
       }
     });

return false; // avoid to execute the actual submit of the form.
});
</script>
          
            <!-- Card -->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <!--Section: Block Content-->

    </div>
    </form>
  </main>
  <!--Main layout-->
  @include('layouts.frontLayout.footer')
  <!-- SCRIPTS -->
  <!-- JQuery -->
  

    
  <script>
  
$('.add-to-cart').on('click', (e) => {
  addToCart(e.currentTarget)
})

const addToCart = (product) => {
  const productId = $(product).attr('productId');
  const isAlreadyInCart = $.grep(productsInCart, el => {return el.id == productId}).length;

  if (isAlreadyInCart) {
    $.each(storageData, (i, el) => {
      if (productId == el.id) {
        el.itemsNumber += 1;
      }
    })
  } else {
    const newProduct = {
      id: Number(productId),
      itemsNumber: 1
    }

    storageData.push(newProduct);
  }

  updateCart();
  updateProductList();
}
  </script>
@endsection