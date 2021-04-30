@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Menu</a> <a href="#" class="current">View Menu</a> </div>
    <h1>Order Value</h1>
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
            <h5>View Order Value</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th> ID</th>
                  <th>Order Value Name</th>
                  <th>Order Value</th>
                   <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($order_value as $order)
                <tr class="gradeX">
                  <td>{{ $order->id }}</td>
                  <td>{{$order->name}}</td>
                  <td>{{$order->value}}</td>
                  <td class="center">
                      <a href="/admin/edit-order-value/{{ $order->id }}" class="btn btn-primary btn-mini">Edit Order Value</a>
                     

                  
                    </td>
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