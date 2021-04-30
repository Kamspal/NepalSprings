@extends('layouts.adminLayout.admin_design')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
  .radio-but {
    opacity: 1 !important;
  }

  div.uploader {
    width: 23px;
    height:200px ;
    display: inline-block;
    position: relative;
    overflow: hidden;
    cursor: default;
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
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Sliders</a> <a href="#" class="current">Add Slider</a> </div>
    <h1>Popup Edit Page</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Popup</h5>
          </div>
          <div class="widget-content nopadding">
            <form action="/popup/{{$popup->id}}/update" method="post" enctype="multipart/form-data">
              @csrf
              
              <div class="row">
                <div class="create-form-group col-sm-10 pl-30 ml123 mt-10">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="height height1" name="title" id="title" value="{{ $popup->title }}">
                    @error('title')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                  </div>
    

                  <div class="form-group mb-10">
                    <label class="control-label">Popup Image</label>
                    <div class="field" align="left">
                      <input type="file" id="popup_image" name="popup_image" /><img src="/images/backend_images/popup/small/{{$popup->image}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="cancel" class="btn btn-secondary"><a class="text-white" href="/profile">Cancel</a></button>
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


<script>
  $(document).ready(function() {
    if (window.File && window.FileList && window.FileReader) {
      $("#popup_image").on("change", function(e) {
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
              "</span>").insertAfter("#popup_image");
            $(".remove").click(function() {
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



@endsection