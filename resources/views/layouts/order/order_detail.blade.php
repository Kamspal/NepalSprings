@extends('layouts.adminLayout.admin_front_header')
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

.Amount-payable span {
    display: block;
    font-weight: bold;
}
.Amount-payable {
    padding-top: 8px;
    border-top: 2px solid #aa000d;
    float: right;
    padding-left: 3px;
}
.Amount-payable p {
    width: 143px;
    display: inline-block;
    padding-right: 17px;
}
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}
header.card-header {
    background: #aa000d;
    color: #fff;
}
.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #FF5722
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
}
</style>
@section('content')
@if($ordered->count()!=0)
<div class="container">
    <article class="card">
    @foreach($ordered as $orders)
        <header class="card-header" onclick="ordered()"> My Orders / Tracking</header>

<div class="ordered_product" id="ordered">
  
    <h2>Ordered Product</h2>
       
        <div class="card-body">
            <h6>Order ID: {{'0RAS2021'.$orders->id}} </h6>
            <article class="card">

                <div class="card-body row">
                    <div class="col"> <strong>Ordered Date:</strong> <br>{{$orders->created_at}} </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> RASANMART, | <i class="fa fa-phone"></i> 01-5355000  </div>
                    <div class="col"> <strong>Status:</strong> <br> Order has been placed </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> {{'0RAS2021'.$orders->id}}  </div>
                </div>
            </article>
            <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <?php
                                
                                $o=json_decode($orders['product_id']);
                                $oder_qty=json_decode($orders['order_qty']);
                                $total_amount_calculated=json_decode($orders['total_amount_calculated']);
                                  
                                $regular_sum=0;
                                ?>
                                   @foreach($o as $key=>$or)
                                        
                                <tr>
                               
                                <?php $prod=DB::table('products')->select('product_name','product_image','sale_price','regular_price')->where('id',$or)->first();
                                  $product=json_decode(json_encode($prod), true);
                                    $regular_sum+=$product['regular_price']*$oder_qty[$key];
                                  ?>
                                 
                                    <td width="10%"> <img src="/images/backend_images/products/small/<?php
                                    echo $product['product_image']; ?>" width="90"> </td>
                                    <td width="20%"> <span class="font-weight-bold">
                                    
                                  <?php
                                    echo $product['product_name']; ?></span>
                                        <div class="product-qty"> <span class="d-block">Quantity:{{$oder_qty[$key]}}</span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-left"> <span class="font-weight-bold">Regular Price: <?php
                                    echo $product['regular_price']; ?></span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-left"> <span class="font-weight-bold">Sale Price: <?php
                                    echo $product['sale_price']; ?></span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-left"> <span class="font-weight-bold"> Amount: {{$total_amount_calculated[$key]}}</span> </div>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="Amount-payable">
                        <span><p>Sub Amount:</p> {{$regular_sum}}</span>
                        <span><p>Discount Amount:</p> {{$regular_sum-$orders['total_amount_payable']}}</span>
                        <span><p>Total Amount:</p> {{$orders['total_amount_payable']}}</span>
                        </div>
                    </div>
           
            <hr>
         
            <hr>
                   </div>
                   
                   </div>
               @endforeach    
                 

    </article>
</div>
@endif
  <!-- Ordered Product End -->
  
                                <!-- Processed Product Start -->
@if($order_processed->count()!=0)
<div class="container">
    <article class="card">
    

    <header class="card-header" onclick="order_processed()"> Processed Product</header>

<div class="ordered_product" id="order_shipped">
    

    <div class="ordered_product">
    
        @foreach($order_processed as $orders)
        <div class="card-body">
            <h6>Order ID: {{'0RAS2021'.$orders->id}} </h6>
            <article class="card">

                <div class="card-body row">
                    <div class="col"> <strong>Ordered Date:</strong> <br>{{$orders->created_at}} </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> RASANMART, | <i class="fa fa-phone"></i> 01-5355000  </div>
                    <div class="col"> <strong>Status:</strong> <br> Order Processed </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> {{'0RAS2021'.$orders->id}} </div>
                </div>
            </article>
            <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <?php
                                
                                $o=json_decode($orders['product_id']);
                                $oder_qty=json_decode($orders['order_qty']);
                                $total_amount_calculated=json_decode($orders['total_amount_calculated']);
                                $regular_sum=0;
                                 ?>
                                   @foreach($o as $key=>$or)
                                        
                                <tr>
                               
                                <?php $prod=DB::table('products')->select('product_name','product_image','sale_price','regular_price')->where('id',$or)->first();
                                  $product=json_decode(json_encode($prod), true);
                                  $regular_sum+=$product['regular_price']*$oder_qty[$key];
                                    
                                  ?>
                                
                                    <td width="10%"> <img src="/images/backend_images/products/small/<?php
                                    echo $product['product_image']; ?>" width="90"> </td>
                                    <td width="20%"> <span class="font-weight-bold">
                                    
                                  <?php
                                    echo $product['product_name']; ?></span>
                                        <div class="product-qty"> <span class="d-block">Quantity:{{$oder_qty[$key]}}</span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-left"> <span class="font-weight-bold">Sale Price: <?php
                                    echo $product['sale_price']; ?></span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-left"> <span class="font-weight-bold">Total Amount Caluclated: {{$total_amount_calculated[$key]}}</span> </div>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="Amount-payable">
                        <span><p>Sub Amount:</p> {{$regular_sum}}</span>
                        <span><p>Discount Amount:</p> {{$regular_sum-$orders['total_amount_payable']}}</span>
                        <span><p>Total Amount:</p> {{$orders['total_amount_payable']}}</span>
                        
                       </div>
                    </div>
           
            <hr>
         
            <hr>
                   </div>
                   @endforeach
                   </div>
             
                   

    </article>
</div>
@endif
             
             <!-- Processed Product End -->
              
              
                                <!-- Shipped Product Start -->
@if($order_shipped->count()!=0)
<div class="container">
    <article class="card">
    

    <header class="card-header" onclick="order_shipped()"> Shipped Product</header>

<div class="ordered_product" id="order_shipped">
    

    <div class="ordered_product">
    
        @foreach($order_shipped as $orders)
        <div class="card-body">
            <h6>Order ID: {{'0RAS2021'.$orders->id}} </h6>
            <article class="card">

                <div class="card-body row">
                    <div class="col"> <strong>Ordered Date:</strong> <br>{{$orders->created_at}} </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> RASANMART, | <i class="fa fa-phone"></i> 01-5355000  </div>
                    <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> {{'0RAS2021'.$orders->id}} </div>
                </div>
            </article>
            <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                            <?php
                                
                                $o=json_decode($orders['product_id']);
                                $oder_qty=json_decode($orders['order_qty']);
                                $total_amount_calculated=json_decode($orders['total_amount_calculated']);
                                $regular_sum=0;
                                 ?>
                                   @foreach($o as $key=>$or)
                                        
                                <tr>
                               
                                <?php $prod=DB::table('products')->select('product_name','product_image','sale_price','regular_price')->where('id',$or)->first();
                                  $product=json_decode(json_encode($prod), true);
                                  $regular_sum+=$product['regular_price']*$oder_qty[$key];
                                    
                                  ?>
                                
                                    <td width="10%"> <img src="/images/backend_images/products/small/<?php
                                    echo $product['product_image']; ?>" width="90"> </td>
                                    <td width="20%"> <span class="font-weight-bold">
                                    
                                  <?php
                                    echo $product['product_name']; ?></span>
                                        <div class="product-qty"> <span class="d-block">Quantity:{{$oder_qty[$key]}}</span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-left"> <span class="font-weight-bold">Sale Price: <?php
                                    echo $product['sale_price']; ?></span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-left"> <span class="font-weight-bold">Total Amount Caluclated: {{$total_amount_calculated[$key]}}</span> </div>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="Amount-payable">
                        <span><p>Sub Amount:</p> {{$regular_sum}}</span>
                        <span><p>Discount Amount:</p> {{$regular_sum-$orders['total_amount_payable']}}</span>
                        <span><p>Total Amount:</p> {{$orders['total_amount_payable']}}</span>
                        
                       </div>
                    </div>
           
            <hr>
         
            <hr>
                   </div>
                   @endforeach
                   </div>
             
                   

    </article>
</div>
@endif
             
             <!-- Shipped Product End -->
                                <!-- Delivered Product Start -->
@if($order_delivered->count()!=0)
<div class="container">
    <article class="card">
        <header class="card-header" onclick="order_delivered()"> Delivered Product </header>

    <div class="ordered_product" id="order_delivered">
    
        @foreach($order_delivered as $orders)
        <div class="card-body">
            <h6>Order ID: {{'0RAS2021'.$orders->id}} </h6>
            <article class="card">

                <div class="card-body row">
                    <div class="col"> <strong>Ordered Date:</strong> <br>{{$orders->created_at}} </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> RASANMART, | <i class="fa fa-phone"></i> 01-5355000  </div>
                    <div class="col"> <strong>Status:</strong> <br> Order delivered </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> {{'0RAS2021'.$orders->id}}  </div>
                </div>
            </article>
            <div class="product border-bottom table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                           
                                                        <?php
                                
                                $o=json_decode($orders['product_id']);
                                $oder_qty=json_decode($orders['order_qty']);
                                $total_amount_calculated=json_decode($orders['total_amount_calculated']);
                                  
                                $regular_sum=0;
                                ?>
                                   @foreach($o as $key=>$or)
                                        
                                <tr>
                               
                                <?php $prod=DB::table('products')->select('product_name','product_image','sale_price','regular_price')->where('id',$or)->first();
                                  $product=json_decode(json_encode($prod), true);
                                    $regular_sum+=$product['regular_price']*$oder_qty[$key];
                                  ?>
                                    <td width="10%"> <img src="/images/backend_images/products/small/<?php
                                    echo $product['product_image']; ?>" width="90"> </td>
                                    <td width="20%"> <span class="font-weight-bold">
                                    
                                  <?php
                                    echo $product['product_name']; ?></span>
                                        <div class="product-qty"> <span class="d-block">Quantity:{{$oder_qty[$key]}}</span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-left"> <span class="font-weight-bold">Sale Price: <?php
                                    echo $product['sale_price']; ?></span> </div>
                                    </td>
                                    <td width="20%">
                                        <div class="text-left"> <span class="font-weight-bold">Total Amount Caluclated: {{$total_amount_calculated[$key]}}</span> </div>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="Amount-payable">
                        <span><p>Sub Amount:</p> {{$regular_sum}}</span>
                        <span><p>Discount Amount:</p> {{$regular_sum-$orders['total_amount_payable']}}</span>
                        <span><p>Total Amount:</p> {{$orders['total_amount_payable']}}</span>
                        
                        </div>
                    </div>
           
            <hr>
         
            <hr>
                   </div>
                   @endforeach
                   </div>
             
                   

    </article>
</div>
@endif
<script>
function ordered() {
  var x = document.getElementById("ordered");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function order_processed() {
  var x = document.getElementById("order_processed");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function order_shipped() {
  var x = document.getElementById("order_shipped");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function order_delivered() {
  var x = document.getElementById("order_delivered");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
             <!-- Delivered Product End -->

             
@endsection