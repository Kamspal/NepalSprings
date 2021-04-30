@extends('layouts.adminLayout.admin_design')
@section('content')
<style>
tr.gradeX img {
    width: 26%;
}
</style>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Popup</a> <a href="#" class="current">View Popup</a> </div>
    <h1>Popup</h1>
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
            <h5>View Slider</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Popup ID</th>
                  <th>Title</th>
                  
                  <th>Image</th>
                   <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($popup as $popup)
                <tr class="gradeX">
                  <td>{{ $popup->id }}</td>
                 <td>{{ $popup->title }}</td>
                
                 <td> <img src="/images/backend_images/popup/small/{{$popup->image}}" ></td>
                    </td>
           
                    <td class="center">
                      <a href="/popup/{{ $popup->id }}/edit" class="btn btn-primary btn-mini">Edit Popup</a>
                     <a href="/popup/{{ $popup->id }}/delete" class="btn btn-primary btn-mini">Delete</a> 

                  
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



