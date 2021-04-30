<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>User Profile</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
</head>

<body style="font-family: 'Nunito';">
    <!-- Header Content-->
    @include('layouts.adminLayout.admin_front_header')
<style>
    @media screen and (max-width:425px) {
    section.bg.sticky-top {
    right: 0;
    top: 0px;
    height: 53px;
}

.nav-btn {
    top: 53px;
}
    }
</style>
   

    <div class="wrapper1">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Dashboard</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="bottom-border active">
                    <a onclick="openCity('dashboard')">User Details</a>
                </li>
                <li class="bottom-border">
                    <a onclick="openCity('update-password')">Update Password</a>
                </li>
                <li class="bottom-border">
                    <a onclick="openCity('update-profile')">Update Profile</a>
                </li>
                <li>
                    <a onclick="openCity('view-order')">View Order History</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content Holder -->

        <div id="content">
            <nav class="navbar navbar-expand-lg">

                <button type="button" id="sidebarCollapse" class="btn btn-r text-white" style="background-color: #980B16">
                    <i class="fa fa-align-left" style="font-size: 20px;"></i>
                    <span style="font-size: 20px;">Toggle Sidebar</span>
                </button>
                <!-- <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-align-justify"></i>
                </button> -->

            </nav>

            <div id="dashboard" class="city pt-3 bg-white">
                <h1 style="font-size: 28px;" class="p-0 m-0">My Account</h1>
                <div class="row">
                    <div class="col-md-4 anchor1">
                        <p class="text-dark">Name: {{$normalUsers->name}}</p>
                        <p class="text-dark">Email: {{$normalUsers->email}}</p>
                        @if($normalUsers->phone_number)
                        <p class="text-dark">Phone.no: {{$normalUsers->phone_number}}</p>
                        @else
                        <p class="text-danger" style="font-size:15px;">* Please provide you phone number.</p>
                        @endif
                        @if ($normalUsers->address)
                        <p class="text-dark">Address: {{$normalUsers->address}}</p>
                        @else
                        <p class="text-danger" style="font-size:15px;">* Please provide your address.</p>
                        @endif
                        <button class="btn btn-mdd-inline mb-3" style="background-color: #AB020E;color:#fff" onclick="openCity ('update-profile')">Edit Profile</button>
                    </div>
                </div>
            </div>

            <div id="update-password" class="city pt-3 text-left" style="display:none">
            <h1 style="font-size: 28px;">Change your Password</h1>
                <form method="POST" action="change-password">
                    @csrf
                    @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                    @endforeach

                    <div class="form-group">
                        <label for="password" class="col-form-label">Current Password</label>


                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password" required>
                    </div>



                    <div class="form-group">
                        <label for="password" class="col-form-label">New Password</label>


                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" required>
                        <!-- <p class="text-muted">Password must contain 1 uppercase, 1 lowercase, 1 numeric and 1 special character.</p> -->
                    </div>


                    <div class="form-group">
                        <label for="password" class="col-form-label">New Confirm Password</label>


                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password" required>
                    </div>


                    <div class="form-group mb-0">

                        <button type="submit" class="btn btn-primary btn-danger mb-3">
                            Update Password
                        </button>

                    </div>
                </form>
            </div>

            <div id="update-profile" class="city pt-3" style="display:none">
            <h1 style="font-size: 28px;">Update your Profile</h1>
                <form action="/normaluser/update/{{$normalUsers->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Name">Name</label>
                        <input type="name" name="name" class="form-control" placeholder="Password" value="{{$normalUsers->name}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email" value="{{$normalUsers->email}}">
                    </div>

                    <div class="form-group">
                        <label for="phone-number">Phone No.</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="Phone No." value="{{$normalUsers->phone_number}}">
                    </div>
                    <div class="form-group">
                        <label for="phone-number">Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{$normalUsers->address}}">
                    </div>
                    <div class="form-group">
                        <label for="image">Profile Image</label>
                        <input type="file" id="image" name="image" />
                        <img class="imageThumb" src="{{'/images/backend_images/user_image/small/'.$normalUsers->image}}" title="">
                    </div>
                    <div class="form-group d-inline">
                        <button type="submit" class="btn btn-danger mb-3">Update</button>
                        <button type="submit" class="btn btn-danger mb-3">Cancel</button>
                    </div>
                </form>
            </div>
            <div id="view-order" class="city pt-3" style="display:none">
            <h1 style="font-size: 28px;">Here is your order lists..</h1>
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
                    input.radio-but {
                        display: block;
                        opacity: 9999 !important;
                    }

                    .order-product-list img {
                        border: 3px solid #e9e1e1;
                        width: 50%;
                    }


                    .order-product-list {
                        padding-bottom: 8px;
                        border-bottom: 1px solid #800808;
                        padding-top: 12px;
                    }

                    span.sale-price-list {
                        text-align: center;
                        display: inline-block;
                        width: 107px;
                    }

                    span.qty-list {
                        display: inline-block;
                        width: 66px;
                    }

                    .order-product {
                        padding-top: 20px;
                    }

                    .modal.fade.in {
                        left: 14% !important;
                        width: 1000px !important;
                    }

                    .modal-dialog {
                        width: 1000px !important;
                        margin: auto;
                    }

                    .checkout-total {
                        padding-top: 20px;
                    }

                    .modal.fade.in {
                        background: no-repeat;
                        margin: auto;
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

<div class="ordered_product" id="order_processed" style="display:none;">
    
        @foreach($order_processed as $orders)
        <div class="card-body">
            <h6>Order ID: {{'0RAS2021'.$orders->id}} </h6>
            <article class="card">

                <div class="card-body row">
                    <div class="col"> <strong>Ordered Date:</strong> <br>{{$orders->created_at}} </div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> RASANMART, | <i class="fa fa-phone"></i> 01-5355000  </div>
                    <div class="col"> <strong>Status:</strong> <br> Order processed </div>
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
                               
                                <?php $prod=DB::table('products')->select('product_name','product_image','regular_price','sale_price')->where('id',$or)->first();
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
                               
                                <?php $prod=DB::table('products')->select('product_name','product_image','regular_price','sale_price')->where('id',$or)->first();
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
                               
                                <?php $prod=DB::table('products')->select('product_name','product_image','regular_price','sale_price')->where('id',$or)->first();
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

            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

    <script>
        function openCity(cityName) {
            var i;
            var x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(cityName).style.display = "block";
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.components li').click(function() {
                $(this).addClass('active');
                $(this).siblings().removeClass('active');

            });

        });
    </script>




    @include('layouts.frontLayout.footer')


</body>

</html>