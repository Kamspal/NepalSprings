@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Menu</a> <a href="#" class="current">View Menu</a> </div>
    <h1>Menu</h1>
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
            <h5>View Menu</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Menu ID</th>
                  <th>Menu Name</th>
                  <th>Order</th>
                   <th>Menu Image</th>
                   <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($menu as $menus)
                <tr class="gradeX">
                  <td>{{ $menus->id }}</td>
                  <td>{{$menus->menuName}}</td>
                    <td>order</td>
                   
                  <td>
                    @if(!empty($menus->featured_image))
                    <img src="/images/backend_images/Menu/small/{{$menus->featured_image }}" style="width:50px;"></td>
                    
                    @elseif(empty($menus->featured_image))
                    <img src="/images/backend_images/products/small/26073.png" style="width:50px;"></td>
                    @endif
                
                    <td class="center">
                      <a href="/admin/edit-menu/{{ $menus->id }}" class="btn btn-primary btn-mini">Edit Menu</a>
                     <a href="/admin/delete-menu/{{ $menus->id }}" class="btn btn-primary btn-mini">Delete</a> 

                  
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