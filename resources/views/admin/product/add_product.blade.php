@extends('layouts.adminLayout.admin_design')

<style>
  .radio-but {
    opacity: 1 !important;
  }
  input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}
</style>
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Product</a> </div>
    <h1>Product Adddition Page</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product</h5>
          </div>
          <div class="widget-content nopadding">

            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-product') }}" name="add_product" id="add_product" novalidate="novalidate">  @csrf
              <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="name" id="name">
                </div>
              </div>


              <div class="control-group">
                <label class="control-label"> Under Category</label>
                <div class="controls">
                  <input type="hidden" value="{{csrf_token()}}" name="_mainmenuid" />



                  {!! Form::select('category_id',$product_cat, null, ['class' => '','placeholder'=>'Select the Category']) !!}
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Product Code</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code">

                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Product Color</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description" class="descp"></textarea>
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Regular Price</label>
                <div class="controls">
                  <input type="number" name="regular_price" id="price">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Sale Price</label>
                <div class="controls">
                  <input type="number" name="sale_price" id="price">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Availablity</label>
                <div class="controls">
                  <input type="number" name="available_quantity" id="available_quantity">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Stock</label>
                <div class="controls d-flex">
                  <input type="radio" class="radio-but" name="in_out_stock" value=1 checked>On Stock
                  <input type="radio" class="radio-but" name="in_out_stock" value=0>Off Stock
                </div>
                <label class="control-label">Top Products</label>
                <div class="controls d-flex">
                  <input type="radio" class="radio-but" name="top_product" value=1 checked>Yes
                  <input type="radio" class="radio-but" name="top_product" value=0>No
                </div>
                <label class="control-label">Featured Products</label>
                <div class="controls d-flex">
                  <input type="radio" class="radio-but" name="feature_product" value=1 checked>Yes
                  <input type="radio" class="radio-but" name="feature_product" value=0>No
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Product Advisory</label>
                <div class="controls">
                  <textarea name="advisory_information" id="advisory_information" class="descp"></textarea>
                </div>
              </div>
              <!-- <div class="control-group">
              <label class="control-label">Project Images</label>
              <div class="controls">
              <input type="file" id="filjes" name="filejs[]" multiple />
               </div>
            </div> -->
              <div class="control-group">
                <label class="control-label">Project Image</label>
                <div class="field" align="left">
                  <input type="file" id="product_image" class="form-control" name="product_image" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Feature Images</label>
                <div class="controls">
                  <input required type="file" class="form-control" id="files" name="featured_image[]" placeholder="address" multiple>
                </div>
                <div id="Pictures">
                      </div>
              </div>

           


              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success edit-button">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
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

            $(".remove").click(function() {
              $(this).parent(".pip").remove();
            });

         

          });
          fileReader.readAsDataURL(f);
        }
      });
    } else {
      alert("Your browser doesn't support to File API")
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
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
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
      console.log(files);
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script>


@endsection