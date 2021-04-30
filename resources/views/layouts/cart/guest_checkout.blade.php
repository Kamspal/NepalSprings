@extends('layouts.adminLayout.admin_front_header')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!} </strong>
            </div>
            @endif
            @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_success') !!} </strong>
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-6">

            <style>


.payment-option img {
    width: 58px;
    height: 50px;
    padding: 2px;
}

.payment-option input[type=radio] {
  display: none;
}

.payment-option img:hover {
  opacity:0.6;
  cursor: pointer;
}

.payment-option img:active {
  opacity:0.4;
  cursor: pointer;
}

.payment-option input[type=radio]:checked + label > img {
    border: 11px solid rgb(185 6 6);
}
.payment-option label {
    padding: 20px 0px 20px 14px;
}
.payment-option h6 {
    text-align: center;
    color: red;
    padding: 2px 90px 2px 90px;
}
            
                .billing {
                    color: #fff;
                    border: 1px solid #AB020E;
                    background: #AB020E;
                }

                .billing:hover {
                    color: #fff;
                }

                .billing-details {
                    color: #000;
                    padding-left: 10px;
                }

                .billing-details a,
                .registerAccount {
                    color: #AB020E;
                }

                .pay-btn {
                    background: #AC030F;
                    color: #fff;
                }

                .pay-btn:hover {
                    color: #fff;
                }

                .registerAccount:hover {
                    color: #AB020E;
                }

                .panel-info>.panel-heading {
                    color: #fff !important;
                    background-color: #AB020E !important;
                    border-color: #AB020E !important;
                    text-shadow: 2px 2px 6px black;
                }

                .panel.panel-info {
                    width: 100%;
                    margin-left: auto;
                    margin-right: auto;
                    border: 1px solid #AB020E;
                }

                .h5 {
                    margin-top: 10px;
                    margin-left: 10px;
                }

                .textarea1 {
                    width: 100%;
                    height: 100px;
                }

                .sq1 {
                    margin-left: 40px;
                }

                .pr1 {
                    padding-right: 50px;
                }

                .pr2 {
                    padding-left: 0px;
                }

                @media screen and (max-width: 768px) {
                    .form-inline .form-input {
                 width: 70% !important;   
                }

                .billing-details {
                    padding-left: 0;
                }

                .marginr {
                    margin-right: 28px;
                }
                }

                @media screen and (max-width: 425px) {
                    .form-inline .form-input {
                    width: 58% !important;
                }

                .full {
                    width: 100% !important;
                }

                .width20 {
                    width: 20%;
                }

                .sq1 {
                    margin-left: 20px;
                }
                }

                @media screen and (max-width:320px) {
                    .width20 {
                    width: 19%;
                }

                .pr1 {
                    left: 16px;
                }

                .mrl10 {
                    margin-left: 10px;
                }

                .mr10 {
                    margin-right: 4px;
                }
                }
            </style>
         
            <form class="form-horizontal" role="form" method="post" action="/payment" id="FormCreate">
                {!! csrf_field() !!}
                @foreach($product_id as $key=>$order)
                        <div class="row giveborder">
                            <div class="col-sm-6 col-xs-5">
                            <?php 
                             $product=App\Product::where('id',$order)->first();
                            ?>
                                
                                <input type="hidden" name="product_id[]" value="{{$order}}">
                                <input type="hidden" name="checkout_quantity[]" value="{{$checkout_quantity[$key]}}">
                                <input type="hidden" name="totalprice_product[]" value="{{$totalprice_product[$key]}}">
                                <input type="hidden" name="total_discount" value="{{$total_discount}}">
                                <input type="hidden" name="total_amount_payable" value="{{$total_amount_checkout}}">
                             </div>
                            </div>
                            @endforeach
                <div id="paypal ml-2">
                <p class="billing-details"><span class="fa fa-user"></span> Existing Customers <button type="submit" class="btn billing" name="paymentMode" value="paypal">
                            Checkout with your Login ID

                        </button></p>
            </div>

                <div class="row">

                    <div class="col-sm-12 register-form-user">

                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h5 class="ml-2 pt-2"><span class="fa fa-truck"></span> DELIVERY DETAILS</h5>
                                        </div>

                                    </div>
                                </div>
                            </div>
                      
                            @foreach($product_id as $key=>$order)
                            <div class="row">
                                <div class="col-sm-6 col-xs-5">
                                    <?php
                                    $product = App\Product::where('id', $order)->first();
                                    ?>

                                    <input type="hidden" name="product_id[]" value="{{$order}}">
                                    <input type="hidden" name="checkout_quantity[]" value="{{$checkout_quantity[$key]}}">
                                    <input type="hidden" name="totalprice_product[]" value="{{$totalprice_product[$key]}}">
                                    <input type="hidden" name="total_discount" value="{{$total_discount}}">
                                    <input type="hidden" name="total_amount_payable" value="{{$total_amount_checkout}}">
                                </div>
                            </div>
                            @endforeach
                        
            </form>

            {!! Form::open(array('url'=>'/orders','method'=>'POST','files' => true )) !!}

            <div class="panel-body checkoutguest">

                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                    <label for="name" class="col-md-12 control-label pt-2">Name *</label>

                    <div class="col-md-12">
                        <input id="name" type="text" class="form-input form-control full" name="name" value="{{ old('name') }}" placeholder="Enter your Name" required autofocus>

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" style="padding-top: 10px;" class="col-md-12 control-label">E-Mail Address *</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-input form-control full" name="email" value="{{ old('email') }}" placeholder="Enter Valid Email Address" required>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <label for="phone" style="padding-top: 10px;" class="col-md-12 control-label">Phone Number *</label>

                    <div class="col-md-12">
                        <input id="phone" type="phone" class="form-input form-control full" name="phone" value="{{ old('phone') }}" placeholder="Enter Valid Phone Number" required>

                        @if ($errors->has('phone'))
                        <span class="help-block">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" style="padding-top: 10px;" class="col-md-12 control-label">Delivery Address with Landmark *</label>

                    <div class="col-md-12">
                        <input id="address" type="text" class="form-input form-control full" name="address" placeholder="Address with Landmark" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="email" class="col-md-12 control-label" style="margin-top:15px;">Order notes (optional)</label>

                    <div class="col-md-12">

                        <textarea id="order_notes" class="textarea1" type="textarea" name="review" placeholder="Notes about your order, eg special notes for delivery"></textarea>
                    </div>
                </div>

                <div style="margin-top:10px;padding-left:10px">
                    <a onclick="openPasswordSection();" class="registerAccount">
                        If you would like to keep track of your order and make your future orders easier, please check your mail for login details</a>
                </div>





            </div>
        </div>
    </div>


</div>

</div>
<div class="col-lg-6 col-md-12 col-sm-6">
    <div class="panel panel-info" style="margin-top:54px;">
        <div class="panel-heading">
            <div class="panel-title">
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="ml-2 pt-2"><span class="fa fa-shopping-cart"></span> YOUR PAYMENT DETAILS</h5>
                    </div>

                </div>
            </div>
        </div>
        <div class="panel-body guestcheckoutbox">
            <div class="p-3">
                <div class="row">

                    <div class="col-sm-6 col-xs-6 width20"><strong>Product</strong></div>
                    <div class="col-sm-1 col-xs-1 text-right width20 mrl10"><strong class="pr-3">Qty</strong></div>
                    <div class="col-sm-2 col-xs-2 text-right width20 mr10"><strong>Regular Price</strong></div>
                    <div class="col-sm-1 col-xs-1 text-right width20"><strong>Sale Price</strong></div>
                    <div class="col-sm-2 col-xs-2 text-right width20"><strong class="marginr">Price</strong></div>

                </div>
                <hr>

                <div class="extrasnacks-checkout-box">
                    @foreach($checkout as $check)

                    @foreach($check['product_id'] as $key=>$order)
                    <div class="row giveborder">
                        <div class="col-sm-6 col-xs-5 width20">
                            <?php
                            $product = App\Product::where('id', $order)->first();
                            echo $product['product_name']; ?>



                            <input type="hidden" name="product_id[]" value="{{$order}}">
                            <input type="hidden" name="checkout_quantity[]" value="{{$checkout_quantity[$key]}}">
                            <input type="hidden" name="totalprice_product[]" value="{{$totalprice_product[$key]}}">
                            <input type="hidden" name="total_discount" value="{{$total_discount}}">
                            <input type="hidden" name="total_amount_payable" value="{{$total_amount_checkout}}">

                        </div>

                        <div class="col-sm-2 col-xs-3 clean text-center pr1 width20">
                            <span class="shop-quantity"> {{$checkout_quantity[$key]}}</span>
                        </div>
                        <div class="col-sm-1 col-xs-3 clean text-center pr2 width20">
                            <span class="shop-quantity"> {{$product['regular_price']}}</span>
                        </div>
                        <div class="col-sm-1 col-xs-3 clean text-center width20">
                            <span class="shop-quantity">{{$product['sale_price']}}</span>
                        </div>
                        <div class="col-sm-2 col-xs-4 del text-right mb10 width20">

                            <div class="row">

                                <div class="shop-quantity sq1 width20"> {{$totalprice_product[$key]}}</div>

                            </div>


                        </div>
                        <hr>
                    </div>



                    @endforeach
                    @endforeach






                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            Sub-total:
                                        </td>
                                        <td class="text-right">
                                            {{$total_cost_calc}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Discount:
                                        </td>
                                        <td class="text-right">
                                            {{$total_discount}}
                                        </td>
                                    </tr>
                                    <hr>
                                    <tr>
                                        <td>
                                            Amount After Discount:
                                        </td>
                                        <td class="text-right">
                                            {{$total_amount_checkout}}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr>
                        </div>

                        <div class="col-sm-12">

                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td> Delivery Charge : <br>1 deliveries x </td>
                                        <td>
                                        </td>
                                        <td class="text-right"> Free</td>
                                    </tr>
                                </tbody>
                            </table>

                            <hr>
                        </div>


                        <div class="col-sm-12">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td> <strong>TOTAL PRICE:</strong> </td>
                                        <td class="text-right">

                                            <span id="totalAmt">
                                            </span>
                                            <strong>
                                                NRs. {{$total_amount_checkout}}
                                            </strong>


                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <hr>
                        </div>
                        <div class="payment-option">
                        <h6> Dear Customer, Please Select one of the option below !! <p> How would you like to pay the bills during cash on delivery?</p></h6>
                        <input type="radio" name="payment" id="choose-1" value="1" required/>
<label for="choose-1">
  <img src="https://nepallife.com.np/storage/files/how-to-create-e-sewa-account-and-pay-internet-bill-through-e-sewa.jpg" />
</label>

<input type="radio" name="payment" id="choose-2" value="2" required/>
<label for="choose-2">
  <img src="https://nepallife.com.np/storage/files/connectips-gains-rapid-popularity-among-users.png" />
</label>
<input type="radio" name="payment" id="choose-3" value="3" required/>
<label for="choose-3">
  <img src="https://nepallife.com.np/storage/files/fonepay.png" />
</label>
<input type="radio" name="payment" id="choose-4" value="4" required/>
<label for="choose-4">
  <img src="https://nepallife.com.np/storage/files/khalti.png" />
</label>
<input type="radio" name="payment" id="choose-5" value="5" required/>
<label for="choose-5">
  <img src="https://freepikpsd.com/wp-content/uploads/2019/10/mobile-banking-icon-png-3-Transparent-Images.png" />
</label>
<input type="radio" name="payment" id="choose-6" value="6" required/>
<label for="choose-6">
  <img src="https://5.imimg.com/data5/GE/HA/MY-22553721/gprs-pos-machine-500x500.jpg" />
</label>
<input type="radio" name="payment" id="choose-7" value="7" required/>
<label for="choose-7">
  <img src="data:image/jpeg;base64,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" />
</label>
</div>

                        <div class="cols-sm-12">
                            <div class="col-sm-12 couponDiv">
                                <p class="extra-added"><b>Would you like to check your Order?</b>
                                    If you would like to keep track of your order and make your future orders easier, please check your mail for login details
                            </div>
                        </div>
                    </div>



                    <div class="cols-sm-12">
                        <div class="col-sm-12 couponDiv">
                            <div class="row">
                                <div class="col-sm-12">




                                </div>

                                <div class="col-sm-12 text-right">

                                    <div id="paypal">
                                        <button type="submit" class="btn btn-o pay-btn" >
                                          Pay Total NRs. {{$total_amount_checkout}}

                                        </button>


                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                </div>



            </div>
        </div>


        {{ Form:: close() }}
        
        <script>
            function openPasswordSection() {
                var x = document.getElementById("passwordSection");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }

            $('#password, #confirm_password').on('keyup', function() {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#message').html('Matching').css('color', 'green');
                } else
                    $('#message').html('Not Matching').css('color', 'red');
            });
        </script>
        
        @endsection
       