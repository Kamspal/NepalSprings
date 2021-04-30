
@extends('layouts.adminLayout.admin_front_header')
<link href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" /> -->
<!-- <link rel="stylesheet" href="css/demo.css" /> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<!-- xzoom plugin here -->
<script type="text/javascript" src="/js/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/xzoom.css" media="all" />
<!-- hammer plugin here -->
<!-- <script type="text/javascript" src="hammer.js/1.0.5/jquery.hammer.min.js"></script> -->
<!-- [if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif] -->
<link type="text/css" rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.css" />
<link type="text/css" rel="stylesheet" media="all" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
 
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script> -->
<script src="https://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/js/setup.js"></script>
 
 
<!-- Scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
 
 
<!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

<style>
    .quantity {
        height: 19px;
    }

    .add-to-cart {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .product-grid4 {
        text-align: left !important;
        margin-top: 10px;
    }

    .product-grid4:hover {
        box-shadow: none !important;
    }
    .border-none {
        border: none !important;
    }

    .cart12 {
        margin-left: 50px;
    }

    .nomargin {
        margin-left: 3rem;
    }
    @media screen and (max-width:1024px) { 
       

        .modal-content .quantity {
            margin-left: 70px !important;
        }
    }

    @media only screen and (max-width:425px) {
.modal-content .total-amount span {
    margin-left: 64px !important;
}

        .text-alignment h5, .text-alignment p {
            text-align:center;
            text-align: center;
        }

        .input-group {
            justify-content: center;
        }

        .total-amount {
            text-align: center;
        }
        .padding-top-10 {
            padding-top: 20px;
        }

        .product-grid4 button {
            margin-left: 104px !important;
        }

        .image-width {
            margin-left: 35px;
        }

        .nomargin {
            margin-left: auto !important;
            text-align: center;
        }

        .ml128 {
            margin-left: 128px !important;
        }

        .cart-product-quantity .input-group {
            left: 2% !important;
        }

        .modal-content #quantity1 {
        left: 11% !important;
        }

        .total-amount .span1 {
            margin-left: 15px !important;
        }

        .product-grid4 .carts {
            font-size: 12px !important;
            margin-left: 12px !important;
        }

        .add-to-cart {
            margin-top: 10px;
        }

        .product-grid4 .cartss {
            font-size: 12px !important;
            margin-left: 45px !important;
        }
    }

    @media screen and (max-width: 375px) {
    .modal-content #quantity1 {
    left: 11% !important;
}
.modal-content #kams span {
    margin-left: 65px !important;
}
.total-amount .span1 {
    margin-left: 46px !important;
}
.ml128 {
    margin-left: 116px !important;
}

.cart-product-quantity .input-group {
            left: 10% !important;
        }
    }
</style>

@section('content')

<!--Section: Block Content-->
<section class="mb-5">
    <div class="container">
        <h1 class="nomargin">Product Details</h1>
        <div class="row">
        <div class="col-md-12">
        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="add_product{{$product->id}}" novalidate="novalidate"> {{ csrf_field() }}
      
           <!-- <input type="text" name="price" value="{{$product->sale_price}}"> -->
            <div class="col-md-6" style="float: left !important;">
            <div class="col-12 mb-0">
                        
                        <img class="xzoom img-responsive w-100" id="xzoom-default" src='/images/backend_images/products/medium/{{$product->product_image}}' xoriginal="/images/backend_images/products/large/{{$product->product_image}}">
                  
                </div>

                <div class="xzoom-thumbs">
                    <div class="col-12 mt-5">
                        <div class="row">
                        @foreach(json_decode($product->featured_image1) as $feat_image)
                            <div class="col-3">
                                
                                    <a href="/images/backend_images/products/Feature_Images/small/{{$feat_image }}">
                                    <img src="/images/backend_images/products/Feature_Images/small/{{$feat_image }}" class="xzoom-gallery xactive" width="80" xpreview="/images/backend_images/products/Feature_Images/small/{{$feat_image}}">
                                    </a>
                          
                            </div>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-alignment" style="float: right !important;">
       
                <h5 class="padding-top-10">{{$product->product_name}}</h5>
                <p><span class="mr-1 line"><strong>NRs. {{$product->sale_price}}</strong></span><span class="ml-1 line1"><strong>NRs. {{$product->regular_price}}</strong></span></p>
                <p class="pt-1">{{$product->description}}</p>
                <input type="hidden" id="price{{$product->sale_price}}" name="price" value="{{$product->sale_price}}" />
                          
                <hr>
                           
                            
                            <div id="myDiv">
                            <input type="hidden"  name="product_id" value="{{$product->id}}" />
  <div class="input-group float-right quantity mb-3">
  <span style="margin-right: 10px;">Qty</span> 
  <div class="input-group-text quantity" id="decrease" onclick="decreaseValue()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
  <input class="quantity" type="number" id="quantity" name="quantity" value="1" style="text-align: right;border: 1px solid #ccc;" readonly/>
  <div class="input-group-text quantity" id="increase" onclick="increaseValue()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
</div>
<input type="hidden" id="product-price{{$product->sale_price}}" name="price" value="{{$product->sale_price}}" />
                          <input type="hidden" id="priceFeature{{$product->id}}" name="id" value="{{$product->id}}" />
                             
<div id="" class="total-amount">
                              <span style="float: left;margin-left:0px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-price{{$product->id}}" name="totalprice" value="{{$product->sale_price}}" style="border:none;text-align:center;width:21%;margin-right:51px;margin-top:12px">
                          </div>
<script type="text/javascript">

function increaseValue() {

  var value = parseInt(document.getElementById('quantity').value, 10);
  
  var p = parseInt(document.getElementById('price{{$product->sale_price}}').value, 10);
  
  value = isNaN(value) ? 1 : value;
  value++;
  
  document.getElementById('quantity').value = value;
  u_price=p * value;
  

 
  document.getElementById('product-price{{$product->id}}').value=u_price;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('quantity').value, 10);
  var p = parseInt(document.getElementById('price{{$product->sale_price}}').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  document.getElementById('quantity').value = value;
  u_price=p * value;
 
  document.getElementById('product-price{{$product->id}}').value=u_price;
}
var p={{$product->sale_price}};
var price = 'Price (NRs.)'+`<span class="pl-5">${p}</span>`;
document.getElementById('product-price').innerHTML=price;
</script>
</div>
    
@if($product->in_out_stock==0)
<div class="form-actions product-grid4 border-none ml128">
              
<button  type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>
</div>
@else   
                <div class="form-actions product-grid4 border-none ml128">
                <button id="add-cart{{$product->id}}" type="submit" class="add-to-cart product-detail-cart carts"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                <?php    if ($user){
   if ($user->admin == 1){ ?>
	
    <a href="/admin/edit-product/{{$product->id}}" target="_blank" class="btn btn-primary btn-mini">Edit this Product</a>
    <?php } 
		
	}
    ?>
              </div>
              @endif
               </div>
               <script>
//-----------------
$(document).ready(function(){
$('#add-cart{{$product->id}}').click(function(e){
    var url = "/add-cart";
    id={{$product->id}};
   
        var addUrl = url+"/"+id;
       
		$.ajax({
			url: addUrl,
			method: "POST",
			cache: false,
			data:$('#add_product{{$product->id}}').serialize(),
			success: function(data){
             
           
             if(document. getElementById('sidebarNavToggler'). clicked == true)
{
alert("button was clicked");
$('#sidebarNavToggler').click();
    $('#sidebarNavToggler').click();
    $('#sidebarNavToggler').click();
    $('#sidebarNavToggler').click();
}else{
   
    $('#sidebarNavToggler').click();
   
}
              
            }
     
});
});
});
  </script>
    
            </form>
        </div>
        </div>
    </div>
</section>
<!--Section: Block Content-->

<script type="text/javascript">

$(document).ready(function(){
    $( "#addtocartform" ).on( "submit", function(e) { 
        e.preventDefault();

        $.ajax({
        type: "POST",
        url: "/add-to-cart/1",
        data: $("#addtocartform").serialize(),
        success: function (response) {
            console.log('anil')
            console.log(response)
            $('#addmodal').modal('hide')
            alert('Data Saved');
   },
   error:function(error){
       console.log(error)
       alert("Data not saved");
   }
 });

});
});
</script>

<section>
<div class="container mt-5 mb-3">
<h3 class="h3">Similar Products
<a href="/product-category/{{$product_category}}" class="view-all ml-2"><span>View All</span></a>
</h3>

<style>
 .owl-prev, .owl-next {
        width: 15px;
        height: 100px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        display: block !important;
        border:0px solid black;
    }
    .owl-prev { left: -20px; }
    .owl-next { right: -20px; }
    .owl-prev i, .owl-next i {transform : scale(2,2); color: #ccc;}

.owl-prev:focus, .owl-next:focus {
    outline: none;
}
    
</style>
  <div class="owl-slider">
    <div class="owl-carousel similar_product
">
      
    @foreach($product_by_category as $prod)
    <div class="item">
    <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="Similaradd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
   
                        <div class="product-grid4">
                                <div class="product-image4">
                                    <a href="/product-details/{{$prod->id}}">
                                        <img class="pic-1 img-responsive" src="/images/backend_images/products/small/{{$prod->product_image}}">
                                    </a>
                                    <?php if($prod->regular_price>$prod->sale_price){ ?>
                                    <span class="product-new-label">
                                       <?php echo 'Sale'; ?>
                                   </span>
                                    <span class="product-discount-label">
                                    <?php  
                            $percent=round(((($prod->sale_price-$prod->regular_price)/$prod->regular_price) * 100), 1);
                            echo $percent.'%';
                        } ?>
                                   
                                    </span>
                                </div>
                                <div class="product-content">
                                    <h3 class="title" style="text-align: center;"><a href="#">{{$prod->product_name}}</a></h3>
                                    <div class="price" style="text-align: center;">
                                    NRs. {{$prod->sale_price}}
                                    
                                        <span>NRs. {{$prod->regular_price}}</span>
                                    </div>
                                    <div class="row">
                                        <div class="cart-product-quantity">
                                        <div id="myDiv">
                     <input type="hidden"  name="product_id" value="{{$prod->id}}" />
                  
                            <div class="input-group float-right quantity">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseTopValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantityTop{{$prod->id}}" name="quantity" value="1" style="text-align: right;border: 1px solid #ccc;" readonly/>
                               <div class="input-group-text" id="increase" onclick="increaseTopValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="priceTop{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="priceTop{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="" class="total-amount">
                              <span class="span1" style="float: left;margin-left:41px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-priceTop{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:right;width:21%;margin-right:51px;margin-top:12px">
                          </div>
                                    </div>
                                    <script type="text/javascript">
 var p = parseInt(document.getElementById('priceTop{{$prod->sale_price}}').value, 10);
function increaseTopValue{{$prod->id}}() {
    
  var value = parseInt(document.getElementById('quantityTop{{$prod->id}}').value, 10);
  
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('quantityTop{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceTop{{$prod->sale_price}}').value, 10);
  
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  
  document.getElementById('product-priceTop{{$prod->id}}').value=u_price;
}

function decreaseTopValue{{$prod->id}}() {
  var value = parseInt(document.getElementById('quantityTop{{$prod->id}}').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  document.getElementById('quantityTop{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceTop{{$prod->sale_price}}').value, 10);
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  document.getElementById('product-priceTop{{$prod->id}}').value=u_price;
}


var price = '$'+`<span>${p}</span>`;
document.getElementById('product-priceTop{{$prod->id}}').innerHTML=price;
</script>
                                        </div>
                                    </div>
                                    @if($prod->in_out_stock==0)
                                    <div class="row mt-2">

<button  type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>
</div>
@else
          <div class="row mt-2">
          <button id="similar-add-cart{{$prod->id}}" type="submit" class="add-to-cart cartss"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
      
    <a class="add-to-cart ml-3" href="#product_viewTop{{$prod->id}}" data-toggle="modal"><i class="fa fa-eye"></i> QUICK VIEW</a>
          </div>
          @endif
      </div>
      </div>
      
      <script>
  //-----------------
  $(document).ready(function(){
  
  $('#similar-add-cart{{$prod->id}}').click(function(e){
  
  var url = "/add-cart";
  
  id={{$prod->id}};
    var addUrl = url+"/"+id;
   
    $.ajax({
        url: addUrl,
        method: "POST",
        cache: false,
        data:$('#Similaradd_product{{$prod->id}}').serialize(),
        success: function(data){
     
       
         if(document. getElementById('sidebarNavToggler'). clicked == true)
  {
  alert("button was clicked");
  $('#sidebarNavToggler').click();
  
  }else{
  
  $('#sidebarNavToggler').click();
  
  }
  
        }
  
  });
  });
  });
  </script>
    </form>
      </div>
       @endforeach
    </div>
  </div>
  </div>


    </section>


<!-- Top Product Modal -->
@foreach($product_by_category as $prod)
  <div class="modal fade product_view" id="product_viewTop{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="QuickviewTopadd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
             <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Product Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body product-grid4">
                        <div class="row">
                            <div class="col-md-6 product_img">
                                <img src="/images/backend_images/products/small/{{$prod->product_image}}" width="300" class="img-responsive">
                            </div>
                            <div class="col-md-6 product-content" style="text-align: center;">
                                    <h3 class="title"><a href="#">{{$prod->product_name}}</a></h3>
                                       <h4>Product Name: <span>{{$prod->product_name}}</span></h4>
                                
                               
                                       <p>{{$prod->description}}</p>
                                    <div class="price">
                                    NRs. {{$prod->sale_price}}
                                    
                                        <span>NRs. {{$prod->regular_price}}</span>
                                    </div>
                                    <div class="row">
                                        <div class="cart-product-quantity">
                                        <div id="myDiv">
                     <input type="hidden"  name="product_id" value="{{$prod->id}}" />
                  
                            <div class="input-group float-right quantity" id="quantity1" style="left:36%">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseTopModalValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantityTopModal{{$prod->id}}" name="quantity" value="1" style="text-align: right;border: 1px solid #ccc;" readonly/>
                               <div class="input-group-text" id="increase" onclick="increaseTopModalValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="priceTopModal{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="priceTopModal{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="kams" class="total-amount">
                              <span style="margin-left: 75px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-priceTopModal{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:right;width:12%;margin-top:12px">
                          </div>
                                    </div>
                                    <script type="text/javascript">
 var p = parseInt(document.getElementById('priceTopModal{{$prod->sale_price}}').value, 10);
function increaseTopModalValue{{$prod->id}}() {
    
  var value = parseInt(document.getElementById('quantityTopModal{{$prod->id}}').value, 10);
  
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('quantityTopModal{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceTopModal{{$prod->sale_price}}').value, 10);
  
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  
  document.getElementById('product-priceTopModal{{$prod->id}}').value=u_price;
}

function decreaseTopModalValue{{$prod->id}}() {
  var value = parseInt(document.getElementById('quantityTopModal{{$prod->id}}').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  document.getElementById('quantityTopModal{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceTopModal{{$prod->sale_price}}').value, 10);
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  document.getElementById('product-priceTopModal{{$prod->id}}').value=u_price;
}


var price = '$'+`<span>${p}</span>`;
document.getElementById('product-priceTopModal{{$prod->id}}').innerHTML=price;
</script>
                                        </div>
                                    </div>
                                    @if($prod->in_out_stock==0)
                                    <div class="row mt-2">

<button  type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>
</div>
@else
          <div class="row mt-2">
    
          <button id="quickview-top-add-cart{{$prod->id}}"  type="submit" class="add-to-cart cart12 ml-auto mr-auto"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
    
      
          </div>
          @endif
      </div>


                        </div>
                    </div>
                </div>
            </div>
            <script>
   //-----------------
   $(document).ready(function(){
   
   $('#quickview-top-add-cart{{$prod->id}}').click(function(e){
   
       var url = "/add-cart";
   
       id={{$prod->id}};
           var addUrl = url+"/"+id;
          
           $.ajax({
               url: addUrl,
               method: "POST",
               cache: false,
               data:$('#QuickviewTopadd_product{{$prod->id}}').serialize(),
               success: function(data){
            
              
                if(document. getElementById('sidebarNavToggler'). clicked == true)
   {
   alert("button was clicked");
   $('#sidebarNavToggler').click();
       
   }else{
      
       $('#sidebarNavToggler').click();
      
   
       
       
   
   
   }

               }
        
   });
   });
   });
     </script>
     
            </form>
        </div>
    @endforeach
        <!--Top Modal-end -->



<script>
    $(".similar_product").owlCarousel({
      autoplay: false,
      lazyLoad: true,
     
      margin: 10,
      /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
      responsiveClass: true,
      autoHeight: true,
      autoplayTimeout: 7000,
      smartSpeed: 800,
      nav: true,
      navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1
        },

        425: {
            items:2
        },

        600: {
          items: 3
        },

        1024: {
          items: 4
        },

        1366: {
          items: 4
        }
      }
    });

    
</script>

@include('layouts.frontLayout.footer')
@endsection