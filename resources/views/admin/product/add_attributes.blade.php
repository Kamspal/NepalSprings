@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add Product Attributes</a> </div>
    <h1>Product Attributes Addition Page</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
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
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product Attributes</h5>
          </div>
          <div class="widget-content nopadding">
             
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('admin/add-attribute/'.$product->id) }}" name="add_product" id="add_product" > {{ csrf_field() }}

            	 <div class="control-group">
                <label class="control-label">Product Name</label>
                  <label class="control-label"><strong>{{$product->product_name}}</strong></label>
                
              </div>

              <div class="control-group">
                <label class="control-label">Product Code</label>
                <label class="control-label"><strong>{{$product->product_code}}</strong></label>
              </div>


 				<div class="control-group">
                <label class="control-label">Product Code</label>
                <label class="control-label"><strong>{{$product->product_color}}</strong></label>
              </div>


              <!-- hidden product_id -->
              <input type="hidden" name="product_id" id="product_id" value={{$product->id}} />

               <div class="control-group">
                <label class="control-label">Price</label>
                    <div class="field_wrapper">
   					 <div>
			        <input required type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 150px"  />
			        <input required type="text" name="size[]" id="size" placeholder="Size" style="width: 150px"  />
			        <input required type="text" name="price[]" id="price" placeholder="price" style="width: 150px"  />
			        <input required type="text" name="stock[]" id="stock" placeholder="stock" style="width: 150px"  />


			        <a href="javascript:void(0);" class="add_button" title="Add field">ADD</a>
			    	</div>
					</div>
              </div>

         
            
            
              <div class="form-actions">
                <input type="submit" value="Add Product Attributes" class="btn btn-success">
              </div>
            </form>


             <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Attribute ID</th>
                   <th>SKU</th>
                  <th>Size</th>
                  <th>Price</th>
                   <th>Stock</th>
                   <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($product['attributes'] as $product)
                <tr class="gradeX">
                  <td>{{ $product->id }}</td>
                  <td>{{$product->sku}}</td>
                   <td>{{$product->size}}</td>
                  <td>{{$product->price }}</td>
                   <td>{{$product->stock }}</td>
                  
                    <td class="center">
                       <a id="productdel" href="{{ url('/admin/delete-product-attributes/'.$product->id)}}" class="btn btn-danger btn-mini deleteProductAttributes">Delete</a>

                  
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
   
  </div>
</div>



@endsection