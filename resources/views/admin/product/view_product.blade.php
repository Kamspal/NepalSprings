@extends('layouts.adminLayout.admin_design')
<style>
.modal.fade.in {
    left: 50%;
}
</style>
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Product</a> </div>
    <h1>Product</h1>
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
            <h5>View Products</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="example">
              <thead>
                <tr>
                  <th>Product ID</th>
                   <th>Category ID</th>
                  <th>Product Name</th>
                  <th>Price</th>
                   <th>Product Image</th>
                  <th>Code</th>
                   <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $product)
                <tr class="gradeX">
                  <td>{{ $product->id }}</td>
                  <td>{{$product->category_name}}</td>
                   <td>{{$product->product_name}}</td>
                  <td>{{$product->sale_price }}</td>
                  <td>
                    @if(!empty($product->product_image))
                    <img src="/images/backend_images/products/small/{{$product->product_image }}" style="width:50px;"></td>
                    
                    @elseif(empty($product->product_image))
                    <img src="/images/backend_images/products/small/26073.pn" style="width:50px;"></td>
                    @endif 
                    
                    <!-- <img src="/storage/app/public/slider/{{$product->product_image}}"> -->
                  <td>{{$product->product_code}}</td>
                    <td class="center">
                      <a href="/admin/add-attribute/{{ $product->id }}" class="btn btn-primary btn-mini">Add Attributes</a>
                      <a  href="#myModal{{ $product->id }}"  onclick="showModal()" class="btn btn-success btn-mini">View</a> <a href="/admin/edit-product/{{ $product->id }}" target="_blank" class="btn btn-primary btn-mini">Edit</a> <a id="productdel" href="{{ url('/admin/delete-product/'.$product->id)}}" class="btn btn-danger btn-mini deleteProduct">Delete</a>

                  
                    </td>
                </tr>

                <script>
function showModal() {

  $('#myModal{{ $product->id }}').modal('show');
}
                </script>
                <div class="container">
                   <div class="row">
                   <div class="modal fade" id="myModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h3>{{$product->product_name}} Full Details</h3>
              </div>
              <div class="modal-body">
               
                  <div class="col-sm-12">
                    <div class="col-sm-6">
                      <p>Product ID:{{ $product->id }}</p>
                <p>Product Category Name:{{$product->category_name}}</p>
                <p>Product Name:{{$product->product_name}}</p>
                <p>Product Price:{{$product->price }}</p>
                 <p>Product Code:{{$product->product_code }}</p>
                <p>Product Description:{{$product->description}}</p>
                </div>
                     <div class="col-sm-6">
                      <p>Product Image:@if(!empty($product->product_image))
                    <img src="/images/backend_images/products/small/{{$product->product_image }}" ></td>
                    
                    @elseif(empty($product->product_image))
                    <img src="/images/backend_images/products/small/26073.png" ></td>
                    @endif </p>
                    </div>
                  </div>
                </div>
                </div>
                
               
              </div>
            </div>
                @endforeach
       
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "deferLoading": 57
    } );
} );
</script>
@endsection