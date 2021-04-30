@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Product</a> </div>
    <h1>Order Value Edit Page</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Order Value</h5>
          </div>
          <div class="widget-content nopadding">
            <form method="post" action="/admin/edit-order-value/{{$order_value->id}}" enctype="multipart/form-data">
      @csrf
      <div class="sucess-error-message">
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
        
        <div class="row">
       
          <div class="col-sm-10 mt-10">
            <div class="form-group">
              <label for="menuName">Order Value Name:</label>
              <input class="form-control height" type="text" name="orderName" value='{{ $order_value->name }}'/>
            </div>
            <div class="col-sm-10 mt-10">
            <div class="form-group">
              <label for="menuName">Order Value :</label>
              <input class="form-control height" type="number" name="orderValue" value='{{ $order_value->value }}'/>
            </div>
        
            <div class="form-group">
              <button type="submit" class="form-control btn btn-primary btn-block edit-button mr12">Submit</button>
            </div>
          </div>
        </div>
      </form>  
           
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>



@endsection