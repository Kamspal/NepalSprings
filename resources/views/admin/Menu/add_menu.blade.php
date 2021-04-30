@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Product</a> </div>
    <h1>Menu Adddition Page</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Menu</h5>
          </div>
          <div class="widget-content nopadding">
             
      
<form method="post" action="/admin/add-menu" enctype="multipart/form-data">
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
          <div class="col-sm-2 picture-container dealer_setting_img mt-10">
              <div class="card_img_box picture pic12 top_10">
              
                  <img src="{{ url('images/backend_images/gallery/card_upload.svg') }}" class="dealer_logo_url">
                  <input type="file" name="featured_image" class="card_img_file">
                  <h6>Upload Photo</h6>
              </div>
          </div>
          <div class="col-sm-10 create-form-group pl-30 mt-10">
            <div class="form-group">
              <input type="hidden" value="{{csrf_token()}}" name="_menuName"/>
              <label for="menuName">Menu Name:</label>
              <input class="form-control height" type="text" name="menuName"/>
            </div>
            
            <div class="form-group">
              <button type="submit" class="form-control btn btn-primary edit-button mr12">Submit</button>
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