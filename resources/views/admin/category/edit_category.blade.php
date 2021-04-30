@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Catagories</a> <a href="#" class="current">Edit Category</a> </div>
    <h1>Category Edit Page</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Category</h5>
          </div>
          <div class="widget-content nopadding">
           
            <form class="form-horizontal" method="post" action="{{ url('/admin/edit-category/'.$category->id) }}" name="edit_category" enctype="multipart/form-data" id="edit_category" novalidate="novalidate"> {{ csrf_field() }}
              <div class="col-sm-2 picture-container dealer_setting_img">
                                            <div class="card_img_box picture pic1 top_10">
                                              @if( file_exists(public_path('/images/backend_images/category/small/').$category->featured_image) )
                                                <img class="dealer_logo_url" src='/images/backend_images/category/small/{{$category->featured_image}}' >
                                              @else
                                                <img src="{{ url('images/icons/card_upload.svg') }}" class="dealer_logo_url">
                                                @endif
                                                <input type="file" name="featured_image" class="card_img_file">
                                                <h6 class="upload1">Upload Photo</h6>
                                            </div>
                                         
                                        </div>
              <div class="control-group">
                <label class="control-label label1">Category Name</label>
                <div class="controls">
                  <input type="text" name="name" value="{{$category->name}}"" id="name">
                </div>
              </div>

            <!--    <div class="control-group">
                <label class="control-label">Category Level</label>
                <div class="controls">
                 <select name="parent_id" style=" width:220px;">
                  <option value="0">Main Category</option>
                  @foreach($levels as $lev)
                  <option value="{{ $lev->id}}" @if($lev->id==$category->parent_id) Selected  @endif>{{$lev->name}}</option>
                  @endforeach
                 </select>
                </div>
              </div> -->
             <!-- <div class="control-group">
                <label class="control-label">Main Menu</label>
                <div class="controls">
                {!! Form::select('selectmainmenu', $mainmenu, $category->selectmainmenu, ['class' => '','id'=>'mainmenu','placeholder' => 'Select main menu']); !!}
              </div>
            </div> -->
               <div class="control-group">
                <label class="control-label">Sub Menu</label>
                <div class="controls">
        {!! Form::select('selectsubmenu', $submenu, $category->selectsubmenu, ['class' => '','id'=>'subMenu','placeholder' => 'Select Sub menu']); !!}
              </div>
            </div>

                <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <input type="textarea" name="description" value="{{$category->description}}" id="description">
                </div>
              </div>

              
            
              <div class="control-group">
                <label class="control-label">URL</label>
                <div class="controls">
                  <input type="text" name="url" value="{{$category->url}}"  id="url">
                </div>
              </div>
              <div class="form-actions">
                <input type="submit" value="Edit Category" class="btn btn-success edit-button">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>

@endsection