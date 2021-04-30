 @extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Sub Menu</a> <a href="#" class="current">Edit Sub Menu</a> </div>
    <h1>Sub Menu Edit Page</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Sub Menu</h5>
          </div>
          <div class="widget-content nopadding">
            <form method="post" action="/admin/edit-submenu/{{$submenu->id}}" enctype="multipart/form-data">
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
        
          <div class="col-sm-12 ml123 mt-10">
         <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_subMenuName"/>
          <label for="subMenuName">Sub Menu Name:</label>
          <input class="height" type="text" name="subMenuName" value="{{ $submenu->subMenuName}}"/>
        </div>
      <!--   <div class="form-group">
          <label for="order">Sub Menu Order:</label>
          <input class="form-control" type="number" name="order" value="{{ $submenu->order}}"/>
        </div> -->
        <!-- <div class="form-group">
          <input type="hidden" value="{{csrf_token()}}" name="_mainmenuid"/>
          <label for="mainmenuid">Select main menu:</label>
          {!! Form::select('mainmenuid', $main_Menu, $submenu->mainmenuid, ['class' => 'height','id'=>'mainmenu','placeholder' => 'Select Main Menu']); !!}
        </div> -->
            <div class="form-group">
              <button type="submit" class="form-control btn btn-primary btn-block edit-button pic12">Submit</button>
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