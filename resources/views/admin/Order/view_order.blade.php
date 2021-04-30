@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Order</a> </div>
    <h1>Order</h1>
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
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>User Id</th>
                  <th>Category Id</th>
                  <th>Product Id</th>
                  <th>Order Quantity</th>
                  <th>Sale Price</th>
                  <th>Coupon Discount</th>
                  <th>Total Amount Calculated</th>
                  <th>Total Amount Payable</th>
                  <th>Out in Stock</th>
                  <th>Advisory Information</th>
                  <th>Shipping Status</th>
                  <th>Delivered</th>
                </tr>
              </thead>
              <tbody>
                @foreach($orders as $order)
                <tr class="gradeX">
                  <td>{{ $order->id }}</td>
                  <td>{{ $order->user_id }}</td>
                  <td>{{ $order->category_id }}</td>
                  <td>{{$order->product_id}}</td>
                  <td>{{$order->order_qty}}</td>
                  <td>{{ $order->sale_price }}</td>
                  <td>{{ $order->coupon_discount }}</td>
                  <td>{{ $order->total_amount_calculated }}</td>
                  <td>{{ $order->total_amount_payable }}</td>
                  <td>{{ $order->out_in_stock }}</td>
                  <td>{{ $order->advisory_information }}</td>
                  <td>{{ $order->shipping_status }}</td>
                  <td>{{ $order->delivered }}</td>
                </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
@endsection

