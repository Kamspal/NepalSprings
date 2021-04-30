@extends('layouts.adminLayout.admin_design')
@section('content')
<style>
tr.gradeX img {
    width: 26%;
}
</style>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Slider</a> <a href="#" class="current">View Slider</a> </div>
    <h1>Slider</h1>
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
                  <th>Slider ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                   <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($sliders as $slider)
                <tr class="gradeX">
                  <td>{{ $slider->id }}</td>
                 <td>{{ $slider->title }}</td>
                 <td>{{ $slider->description }}</td>
                 <td> <img src="/images/backend_images/slider/small/{{$slider->image}}" ></td>
                    </td>
           
                    <td class="center">
                      <a href="/slider/{{ $slider->id }}/edit" class="btn btn-primary btn-mini">Edit slider</a>
                     <a href="/slider/{{ $slider->id }}/delete" class="btn btn-primary btn-mini">Delete</a> 

                  
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



