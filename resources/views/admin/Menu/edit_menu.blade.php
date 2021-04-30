 @extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Product</a> </div>
    <h1>Menu Edit Page</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
            <form method="post" action="/admin/edit-menu/{{$menu->id}}" enctype="multipart/form-data">
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
                @if( !empty($menu->featured_image) )
                  <img src="/images/backend_images/Menu/small/{{ $menu->featured_image }}" class="dealer_logo_url">
                @else
                  <img src="{{ url('images/backend_images/gallery/card_upload.svg') }}" class="dealer_logo_url">
                  @endif
                  <input type="file" name="featured_image" class="card_img_file">
                  <h6>Upload Photo</h6>
              </div>
          </div>
          <div class="col-sm-10 mt-10">
            <div class="form-group">
              <input type="hidden" value="{{csrf_token()}}" name="_menuName"/>
              <label for="menuName">Menu Name:</label>
              <input class="form-control height" type="text" name="menuName" value='{{ $menu->menuName }}'/>
            </div>
            <!-- <div class="form-group">
              <label for="order">Menu Order:</label>
              <input class="form-control" type="number" name="order" value="{{ $menu->order}}"/>
            </div> -->
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