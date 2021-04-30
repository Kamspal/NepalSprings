@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Catagories</a> <a href="#" class="current">Add Category</a> </div>
    <h1>Category Addition Page</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Category</h5>
          </div>
          <div class="widget-content nopadding">
           
            <form class="form-horizontal" method="post" action="{{ url('/admin/add-category') }}" name="add_category" id="add_category" enctype="multipart/form-data" novalidate="novalidate"> {{ csrf_field() }}
       
        <div class="row top_50">
           <div class="col-sm-2 picture-container dealer_setting_img">
               <div class="card_img_box picture top_10">
                                            
                    <img src="{{ url('images/backend_images/gallery/card_upload.svg') }}" class="dealer_logo_url">
                   <input type="file" name="featured_image" class="card_img_file">
                                                <h6>Upload Photo</h6>
                                            </div>
                                         
                                        </div>
                                        <div class="col-sm-10 create-form-group pl-30 mt1">
                                            <div class="row mt-6n">
                                               <div class="col-sm-6">
                                                    {!! Form::text('name','', ['class' => 'w','placeholder' => 'Category Name']) !!}
                                                </div>
                                               

                                            </div>

                                           
                                           

                                            <div class="row mt-24">
                                   
                                                <div class="col-sm-6 pl-25">

                                                    {!! Form::select('subMenuName', $submenu, null, ['class' => 'aanil1','id'=>'subMenu','placeholder' => 'Select Sub menu']); !!}


                                                    {{--<input type="hidden" class="form-control" name="mainmenuidvalue" id="mainmenuidvalue"/>--}}
                                                    {{--<select class="form-control" name="selectsubmenu" id="submenu">--}}
                                                       {{--<option>Select Sub Category</option>--}}
                                                       {{--@foreach($submenu as $sub)--}}
                                                                {{--<option>{{$sub->subMenuName}}</option>--}}
                                                       {{--@endforeach--}}
                                                   {{--</select>--}}
                                                </div>
                                            </div>

                                             <div class="row mt-24" style="margin-top:20px;">
                                                <div class="col-sm-12 mt-24">
                                                   {!! Form::textarea('description','', ['class' => 'form-control text-area des','placeholder' => 'Description']) !!}
                                                </div>
                                               
                                            </div>




                                            <div class="row mt-24 mb-12">
                                                <div class="col-sm-6">
                                                    <a href="#" class="btn btn-danger btn-md">Cancel</a>
                                                </div>
                                                <div class="col-sm-6 pl-25">
                                                    {{ Form::submit('Save', ['class' => 'btn btn-primary btn-md right']) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>      

            <!--   <div class="control-group">
                <label class="control-label">Category Level</label>
                <div class="controls">
                 <select name="parent_id" style=" width:220px;">
                  <option value="0">Main Category</option>
                  @foreach($levels as $lev)
                  <option value="{{ $lev->id }}">{{$lev->name}}</option>
                  @endforeach
                 </select>
                </div>
              </div> -->

               

              
            
             
            
            </form>
          </div>
        </div>
      </div>
    </div>
   
  </div>
</div>
 <script type="text/javascript" src='https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

    <script type="text/javascript">


        $.ajaxSetup({
            headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
        });

        function myFunction(){
     
            var modelid =   document.getElementById("mainmenuu").value;

                 alert(modelid);

            //Here you can use ajax to call php function
            $.ajax({
                url: '/find-sub-menu/',
                type: 'POST',
                dataType: "json",
                data: {
                    menu_id: menuId
                },

                success: function (ret_data) {


                    $('select[name="submenu"]').empty();

                    $('select[name="submenu"]').append('<option value="0">Select Sub Menu</option>');
                    $.each(ret_data, function (key, value) {


                        $('select[name="series"]').append('<option value="' + value['series'] + '">' + value['series'] + '</option>');
                    });


                }
            });
        }


    </script>
   
@endsection

   
