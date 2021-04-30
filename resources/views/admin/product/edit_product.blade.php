@extends('layouts.adminLayout.admin_design')
<style>
.radio-but {
    opacity: 1 !important;
}
img.imageThumb {
    border: 2px solid;
    width: 15%;
}
</style>
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Product</a> </div>
    <h1>Product Addition Page</h1>
  </div>
  <div class="container-fluid"><hr>
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
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">
             
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-product/'.$productDetails->id) }}" name="edit_product" id="edit_product" novalidate="novalidate"> {{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text"  name="name" id="name" value="{{$productDetails->product_name}}">
                </div>
              </div>


              <div class="control-group">
                <label class="control-label"> Under Category</label>
                <div class="controls">
                           {!! Form::select('category_id',$product_cat, $productDetails->category_id, ['class' => '','id'=>'category_id']) !!}
                           </div>
              </div>

 <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                       <input type="text" name="product_code" id="code" value="{{$productDetails->product_code}}" >
                
                </div>
              </div>


              <div class="control-group">
                <label class="control-label">Product Color</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color" value="{{$productDetails->product_color}}">
                </div>
              </div>
                <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description" class="descp">{{$productDetails->description}}</textarea>
                </div>
              </div>

               <div class="control-group">
                <label class="control-label">Regular Price</label>
                <div class="controls">
                       <input type="text" name="regular_price" id="regular_price" value="{{$productDetails->regular_price}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Sale Price</label>
                <div class="controls">
                       <input type="text" name="sale_price" id="sale_price" value="{{$productDetails->sale_price}}">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Availablity
</label>
                <div class="controls">
                       <input type="text" name="available_quantity" id="available_quantity" value="{{$productDetails->available_quantity}}">
                </div>
              </div>
              <div class="control-group">
              <label class="control-label">Stock</label>
              <div class="controls d-flex">
          
            <input type="radio"  class="radio-but" name="in_out_stock" value=1 {{ $productDetails->in_out_stock == 1 ? 'checked' : ''}} >On Stock
             <input type="radio"  class="radio-but" name="in_out_stock" value=0 {{ $productDetails->in_out_stock == 0 ? 'checked' : ''}}>Off Stock
              </div>

              <label class="control-label">Top Products</label>
                <div class="controls d-flex">
                  <input type="radio" class="radio-but" name="top_product" value='1' {{$productDetails->top_product== '1'  ? 'checked' : ''}} >Yes
                  <input type="radio" class="radio-but" name="top_product" value='0' {{$productDetails->top_product==0 ? 'checked' : ''}}>No
                </div>

              
                <label class="control-label">Featured Products</label>
                <div class="controls d-flex">
                  <input type="radio" class="radio-but" name="featured_product" value='1' {{$productDetails->featured_product== '1'  ? 'checked' : ''}}>Yes
                  <input type="radio" class="radio-but" name="featured_product" value='0' {{$productDetails->featured_product== '0'  ? 'checked' : ''}}>No
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Product Advisory
</label>
                <div class="controls">
                  <textarea name="advisory_information" id="advisory_information" class="descp">{{$productDetails->advisory_information }}</textarea>
                </div>
              </div>

              <div class="control-group">
              <label class="control-label">Project Image</label>
              <div class="field" align="left">
                <input type="file" id="product_image" name="product_image" />
                <span class="pip">
                <img class="imageThumb" src="{{'/images/backend_images/products/small/'.$productDetails->product_image}}" title="undefined">

                </span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">File upload input</label>
              <div class="controls">
              <div class="col-sm-12">
                <input type="file" name="featured_image[]" id="files" multiple="" size="19.5" style="opacity: 0;">
               </div>
                
               <div class="col-sm-12">
                @if(!empty($productDetails->featured_image1))
                @foreach(json_decode($productDetails->featured_image1) as $image)
                    
            
                   <!-- <img src="/images/backend_images/products/Feature_Images/small/{{$image}}" id="profile-img-tag" style=" width:50px " ></td>
                      -->
                    <span class="pip">
            <img class="imageThumb" src="/images/backend_images/products/Feature_Images/small/{{$image}}"  name="featured_image[]" title=file.name>
            <input type="hidden" name="str_image[]"  value={{$image}}>
            <span class="remove">Remove image</span>
            </span>

                    @endforeach
                    @elseif(empty($productDetails->featured_image1))
                    <img src="/images/backend_images/products/small/26073.png"  style=" width:50px " ></td>
                    @endif

</div>
               
                <!-- |<a href="{{url('/admin/delete-product-image/'.$productDetails->id) }}">Delete</a> -->
              </div>
            </div> 






            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>

$(document).ready(function() {

  $(".remove").click(function(){
            
            $(this).parent(".pip").remove();
          });

  if (window.File && window.FileList && window.FileReader) {
    $("#product_image").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#product_image");
          $(".remove").click(function(){
            alert('hello');
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("l[kYour browser doesn't support to File API")
  }
});

$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" name=\"featured_image[]\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
  </script>




            
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>

@endsection