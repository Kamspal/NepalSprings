@extends('layouts.adminLayout.admin_design')
@section('content')
<style>
.modal-header {
    padding: 36px !important;
    border-bottom: 1px solid #e5e5e5;
}
.modal-footer {
    padding: 30px !important;
    
}
</style>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders</a> </div>
    <h1>Order Status</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
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
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Orders</h5>
          </div>
          <div class="widget-content nopadding">
            <table id="datatable" class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Username</th>
                 
                   <th>Amount Payable</th>
                   <th>Order Date</th>
                   <th>Status</th>
                   <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order as $orders)
                <tr class="gradeX">
                  <td>{{ $orders->id }}</td>
                  <td><?php 
                   $user=App\User::where('id',$orders->user_id)->first();
                  
                   echo $user['name'];
                   
                  
                  ?></td>
               
                 <td>{{ $orders->total_amount_payable}}</td>
                 <td>{{ $orders->created_at}}</td>
                 <td>   <div class="controls d-flex">
                  <select class="select4" name="status" onchange="status{{ $orders->id }}()" id="status{{ $orders->id }}">
<option value="">Please Select</option>
 @foreach($status as $stat)
<option value="{{$stat->id}}" {{$orders->shipping_status == $stat->id  ? 'selected' : ''}}>{{$stat->status}}</option>
 @endforeach</select>
                </div></td>
                <script>

function status{{ $orders->id }}() {
    
    var x = document.getElementById("status{{ $orders->id }}").value;
   
    var url = "/change-status";
        var Url = url+"/"+{{ $orders->id }};

       
        $.ajax({
			url: Url,
			type: "post",
			cache: false,
      data: {
                   '_token': '{!! csrf_token() !!}',
                   'id' : {{ $orders->id }}, 
                   'status' : x
                 },
      success :function(id){
        console.log(id);
      }
    

        });
    
    
}
                </script>
                    <td class="center">
                      <a onclick="showModal{{ $orders->id }}()" class="btn btn-primary btn-mini">View</a>
                     <a href="/admin/order-delete/{{ $orders->id }}" class="btn btn-primary btn-mini">Delete</a> 
                     <button id="printing{{ $orders->id }}" class="btn btn-md" style="background-color:#AD0313; color:#fff;"><i class="fa fa-print"></i> Print</button>
       
                     <div class="toolbar hidden-print">
        <div class="text-right" style="text-align: right !important;">
       
        </div>
        <hr>
    </div>
        
          
                    </td>
                </tr>

<script>
$('#printing{{ $orders->id }}').on('click', function() {

let CSRF_TOKEN = $('meta[name="csrf-token"').attr('content');

$.ajaxSetup({
  url: '/print/{{ $orders->id }}',
  type: 'get',
  data: {
    _token: CSRF_TOKEN,
  },
  dataType: 'html',
  beforeSend: function() {
    console.log('printing ...');
  },
  complete: function() {
    console.log('printed!');
  }
});

$.ajax({
  success: function(viewContent) {
    var w = window.open("", "PrintWindow", "top=50,left=50,toolbars=no,scrollbars=yes,status=no,resizable=yes");
    
    
            w.document.open();
            w.document.write(viewContent);
            w.document.close();
            w.window.print();
    console.log(viewContent); // This is where the script calls the printer to print the viwe's content.
  }
});
});

</script>
              
               <script>
function showModal{{ $orders->id }}() {
  $('#myModal{{ $orders->id }}').modal('show');
}
               </script>
<div class="modal fade userdetails" id="myModal{{ $orders->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="position: relative;background-color: #FFF;padding: 15px;left: 24% !important;
    width: 1000px !important;  background:none;  height: auto;">
    <div id="userdetails{{ $orders->id }}">
  
<div class="modal-dialog " style="margin: auto;width: 1000px !important;">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Modal</h4>
      </div>
      <div class="modal-body">
      <div class="col-sm-12 order-product" style="padding-top: 20px;">
      <div class="col-sm-2">
      <strong>Product Image</strong>
      </div>
      <div class="col-sm-4">
      <strong>Product Name</strong>
      </div>
      <div class="col-sm-4">
      <span class="sale-price-list" style="text-align: center;display: inline-block;width: 107px;"><strong>Sale Price</strong></span>
      <span class="qty-list" style="display: inline-block;width: 66px;"><strong>QTy</strong></span>
      <span class="amount-list"><strong>Amount</strong></span>
      
      </div>
      </div>
      <?php 
      $total_regular=0;
      $oder_qty=json_decode($orders['order_qty']);
      $total_amount_calculated=json_decode($orders['total_amount_calculated']);
     
      ?>
      @foreach(json_decode($orders->product_id) as $key=>$orde)
    
      <div class="col-sm-12 order-product-list" style="padding-bottom: 8px;border-bottom: 1px solid #800808;padding-top: 12px;">
      <div class="col-sm-2">
      <?php 
                             $product=App\Product::where('id',$orde)->first();
                             ?>
                            <img src="/images/backend_images/products/small/<?php echo $product['product_image']?>" style="border: 3px solid #e9e1e1;width: 50%;">
      </div>
      <div class="col-sm-4">
    {{$product['product_name']}}
                  </div>
      <div class="col-sm-4">
      <span class="sale-price-list" style="text-align: center;display: inline-block;width: 107px;"><?php 
                           
                            echo $product['sale_price']; ?>
                            </span>
                            <span class="qty-list" style="display: inline-block;width: 66px;"><?php 
                           
                           echo json_decode($orders->order_qty)[$key]; ?>
                           </span>
                           <span class="amount-list"><?php 
                           
                           echo json_decode($orders->total_amount_calculated)[$key]; ?>
                           </span>
                           
      </div>
      <div class="col-sm-2">
      <?php 
$discount[$key]=$product['regular_price']-$product['sale_price'];
$product_with_qty=$product['regular_price']*$oder_qty[$key];
$total_regular=$total_regular+$product_with_qty;
      ?>
                          
      </div>
      </div>
      @endforeach
     <div class="subtotal-box">
     <div class="col-sm-12">
     <div class="col-sm-offset-8 checkout-total" style="padding-top: 20px;">
    <div class="col-sm-4"> <strong>SUBTOTAL</strong></div>
    <div class="col-sm-8">{{$total_regular}} </div>
    <div class="col-sm-4"><strong> Discount</strong></div>
    <div class="col-sm-8">{{$total_regular-$orders['total_amount_payable']}} </div>
    <div class="col-sm-4"><strong> Payment</strong></div>
    <div class="col-sm-8"> {{$orders->total_amount_payable}}</div>
 
     </div>
      </div>
      <div class="address-view-order" style="font-weight: bold;padding-left: 30px;padding-right: 30px;">Address:<span class="view-order-in" style="color: #d70101;left: ;display: inline-block;padding-left: 10px;"><?php 
      
                  
      echo $user['address'];
     ?></span></div>
        <div class="address-view-order" style="font-weight: bold;padding-left: 30px;padding-right: 30px;">Phone Number:<span class="view-order-in" style="color: #d70101;left: ;display: inline-block;padding-left: 10px;"><?php 
     
                 
     echo $user['phone_number'];
    ?></span>
    </div>
    <div class="address-view-order" style="font-weight: bold;padding-left: 30px;padding-right: 30px;">Additional Information:<span class="view-order-in" style="color: #d70101;left: ;display: inline-block;padding-left: 10px;"><?php 
     
                 
     echo $orders->advisory_information;
    ?></span>
     <div class="address-view-order" style="font-weight: bold;padding-left: 30px;padding-right: 30px;">Payment Mode:<span class="view-order-in" style="color: #d70101;left: ;display: inline-block;padding-left: 10px;"><?php 
     
          if($orders->payment==1){
            echo 'ESewa';
          } else if($orders->payment==2){
            echo 'POS Machine';
          }     
     echo $orders->payment;
    ?></span>
    </div>
   
      
    </div>
    
  </div>

</div>
<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> 
</div>
                @endforeach
       
               
              </div></div></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>

<script>

</script>
@endsection