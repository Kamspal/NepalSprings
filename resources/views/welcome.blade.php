@extends('layouts.adminLayout.admin_front_header')

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">


<!--Owl Carousel -->
<link rel="stylesheet" href="css/backend_css/owl.carousel.min.css" crossorigin="anonymous" />


<!-- Scripts -->

<!-- <script src="http://127.0.0.1:8000/js/app.js" defer></script> -->
<script src="{{ asset('js/backend_js/jquery-3.5.1.slim.min.js') }}"  crossorigin="anonymous"></script>
<script src="{{ asset('js/backend_js/bootstrap.bundle.min.js') }}"  crossorigin="anonymous"></script>
<script src="{{ asset('js/backend_js/owl.carousel.min.js') }}"  crossorigin="anonymous"></script>



@section('content')
<style>
    .add-to-cart {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .discountPercent {
        width: 69px !important;
        border-radius: 20px !important;
        background-color: none !important;
        color: #fff !important;
    }

    @media screen and (max-width: 1024px){
    .total-amount span {
        margin-left: 31px;
    }

    .product-grid4 .add-to-cart {
    font-size: 11px;
}
    }

    @media screen and (max-width:425px) {
    .cart-product-quantity .input-group {
        left: 6% !important;
    }

    .total-amount span {
    margin-left: 22px !important;
}
    
    .product-grid4 .add-to-cart {
    margin-bottom: 10px;
}

.product-grid4 .product-discount-label {
    right: 18px;
}

.product-grid4 .product-new-label {
    left:14px;
}
}
@media screen and (max-width: 375px) {
.cart-product-quantity .input-group {
    left: 30%;
}

.modal-content .total-amount span {
    margin-left: 63px !important;
}

.modal-content .cart-product-quantity .input-group {
    left: 36% !important;
}

.total-amount span {
    margin-left: 51px !important;
}
}

@media screen and (max-width: 320px) {
.cart-product-quantity .input-group {
    left: 24%;
}

.total-amount span {
    margin-left: 20px !important;
}

.modal-content .total-amount span {
    margin-left: 30px !important;
}

.modal-content .cart-product-quantity .input-group {
    left: 27% !important;
}
}
</style>

<!-- <?php $popup_image=DB::table('popups')->get();
?>
    <div id="boxes">
<div style="top:50%; left: 50%; display: none;" id="dialog" class="window"> 
@foreach($popup_image as $images)

<div id="san">
<a href="#" class="close agree"><img src="images/close-icon.png" width="25" style="float:right; margin-right: -25px; margin-top: -20px;"></a>
<a href="/images/backend_images/popup/large/{{$images->image}}" class="imgpopup" target="_blank" ><img src="/images/backend_images/popup/small/{{$images->image}}" width="100%">
</a>
</div>
@endforeach

</div>

<script>
$(document).ready(function() { 
  var id = '#dialog';

        var winH = 800;
  var winW = $(window).width();
        $(id).css('top',  winH/2-$(id).height()/2);
  $(id).css('left', winW/2-$(id).width()/2);
     $(id).fadeIn(2000);  
     $('.window .close').click(function (e) {
  e.preventDefault();
  $('#mask').hide();
  $('.window').hide();
     });  
     $('#mask').click(function () {
  $(this).hide();
  $('.window').hide();
 });  
 
});
</script> -->



<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($SliderImage as $slider)
        <?php if ($slider->int == '1') { ?>
            <div class="carousel-item active">
            <?php } else { ?>
                <div class="carousel-item">
                <?php } ?>

               <a href="/{{ $slider-> url }}" target="_blank"> <img class="d-block w-100 img-responsive" src="/images/backend_images/slider/large/{{ $slider-> image }}" alt="First slide"></a>
                </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
    </div>
    <div class="container mt-5 mb-3">
        <h3 class="h3">Latest Products
        <a href="/latest-product" class="view-all ml-2"><span>View All</span></a>
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
    <div class="owl-carousel latest">
      
    @foreach($product as $prod)
      <div class="item">
      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="add_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
                            <div class="product-grid4">
                                <div class="product-image4">
                                    <a href="/product-details/{{$prod->id}}">
                                        <img class="pic-1 img-responsive" src="images/backend_images/products/small/{{$prod->product_image}}">
                                    </a>
                                    <?php if($prod->regular_price>$prod->sale_price){ ?>
                                    <span class="product-new-label">
                                       <?php echo 'Sale'; ?>
                                   </span>
                         
                                    <span class="product-discount-label discountPercent">
                                    <?php  
                            $percent=round(((($prod->sale_price-$prod->regular_price)/$prod->regular_price) * 100), 1);
                            echo $percent.'% off';
                        } ?>
                        </span>
                                   <div class="new-product">
                         <?php echo 'New'; ?>    
                         </div>
                                    
                                </div>
                                <div class="product-content">
                                    <h3 class="title"><a href="#">{{$prod->product_name}}</a></h3>
                                    <div class="price">
                                    NRs. {{$prod->sale_price}}
                                    
                                    <span><?php if($prod->regular_price>$prod->sale_price){ ?>NRs. {{$prod->regular_price}} <?php }?></span>
                               
                                    </div>
                                    <div class="row">
                                        <div class="cart-product-quantity">
                                        <div id="myDiv">
                     <input type="hidden"  name="product_id" value="{{$prod->id}}" />
                  
                            <div class="input-group float-right quantity">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantity{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly/>
                               <div class="input-group-text" id="increaseTop" onclick="increaseValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="price{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="price{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="" class="total-amount">
                              <span style="float: left;margin-left: 41px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-price{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:center;width:21%;margin-right:51px;margin-top:12px">
                          </div>
                                    </div>
                                    <script type="text/javascript">
 var p = parseInt(document.getElementById('price{{$prod->sale_price}}').value, 10);
function increaseValue{{$prod->id}}() {
    
  var value = parseInt(document.getElementById('quantity{{$prod->id}}').value, 10);
  
  value = isNaN(value) ? 1 : value;
  value++;
  document.getElementById('quantity{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('price{{$prod->sale_price}}').value, 10);
  
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  
  document.getElementById('product-price{{$prod->id}}').value=u_price;
}

function decreaseValue{{$prod->id}}() {
  var value = parseInt(document.getElementById('quantity{{$prod->id}}').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  document.getElementById('quantity{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('price{{$prod->sale_price}}').value, 10);
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  document.getElementById('product-price{{$prod->id}}').value=u_price;
}


var price = '$'+`<span>${p}</span>`;
document.getElementById('product-price{{$prod->id}}').innerHTML=price;
</script>
                                        </div>
                                    </div>

          <div class="row mt-2">
          @if($prod->in_out_stock==0)
          <button  type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>
          
@else
              <button id="add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
             @endif 
              <a class="add-to-cart ml-3" href="#product_viewLatest{{$prod->id}}" data-toggle="modal"><i class="fa fa-eye"></i> QUICK VIEW</a>
          </div>
         
      </div>
      </div>
      <script>
//-----------------
$(document).ready(function(){
$('#add-cart{{$prod->id}}').click(function(e){
    var url = "/add-cart";
    id={{$prod->id}};
        var addUrl = url+"/"+id;
       
		$.ajax({
			url: addUrl,
			method: "POST",
			cache: false,
			data:$('#add_product{{$prod->id}}').serialize(),
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
      @endforeach
    </div>
  </div>
  </div>


  <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        @foreach($SliderSecond as $slider)
        <?php if ($slider->int == '1') { ?>
            <div class="carousel-item active">
            <?php } else { ?>
                <div class="carousel-item">
                <?php } ?>

               <a href="/shop" target="_blank"> <img class="d-block w-100 img-responsive" src="/images/backend_images/secondslider/large/{{ $slider-> image }}" alt="First slide"></a>
                </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
    </div>
        </div>

    <div class="container mt-5 mb-3">
<h3 class="h3">Top Products
<a href="/top-product" class="view-all ml-2"><span>View All</span></a>
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
    <div class="owl-carousel latest">
      
    @foreach($top_product as $prod)
      <div class="item">
      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="Topadd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}

                            <div class="product-grid4">
                                <div class="product-image4">
                                    <a href="/product-details/{{$prod->id}}">
                                        <img class="pic-1 img-responsive" src="images/backend_images/products/small/{{$prod->product_image}}">
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
                                    <h3 class="title"><a href="#">{{$prod->product_name}}</a></h3>
                                    <div class="price">
                                    NRs. {{$prod->sale_price}}
                                    
                                    <span><?php if($prod->regular_price>$prod->sale_price){ ?>NRs. {{$prod->regular_price}} <?php }?></span>
                               
                                    </div>
                                    <div class="row">
                                        <div class="cart-product-quantity">
                                        <div id="myDiv">
                     <input type="hidden"  name="product_id" value="{{$prod->id}}" />
                  
                            <div class="input-group float-right quantity">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseTopValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantityTop{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly/>
                               <div class="input-group-text" id="increase" onclick="increaseTopValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="priceTop{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="priceTop{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="" class="total-amount">
                              <span style="float: left;margin-left: 41px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-priceTop{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:center;width:21%;margin-right:51px;margin-top:12px">
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
                                 
          <div class="row mt-2">
          @if($prod->in_out_stock==0)
          <button  type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>
          
@else
          <button id="top-add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
         @endif
                <a class="add-to-cart ml-3" href="#product_viewTop{{$prod->id}}" data-toggle="modal"><i class="fa fa-eye"></i> QUICK VIEW</a>
          </div>
     
      </div>
      </div>
       
      <script>
//-----------------
$(document).ready(function(){

$('#top-add-cart{{$prod->id}}').click(function(e){
   
    var url = "/add-cart";

    id={{$prod->id}};
        var addUrl = url+"/"+id;
       
		$.ajax({
			url: addUrl,
			method: "POST",
			cache: false,
			data:$('#Topadd_product{{$prod->id}}').serialize(),
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
      @endforeach
    </div>
  </div>
  </div>



  <div class="container mt-5 mb-3">
<h3 class="h3">Featured Products
<a href="/feature-product" class="view-all ml-2"><span>View All</span></a>
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
    <div class="owl-carousel latest">
      
    @foreach($featured_product  as $prod)
      <div class="item">
      
      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="Featureadd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
                          <div class="product-grid4">
                                <div class="product-image4">
                                    <a href="/product-details/{{$prod->id}}">
                                        <img class="pic-1 img-responsive" src="images/backend_images/products/small/{{$prod->product_image}}">
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
                                    <h3 class="title"><a href="#">{{$prod->product_name}}</a></h3>
                                    <div class="price">
                                    NRs. {{$prod->sale_price}}
                                    
                                    <span><?php if($prod->regular_price>$prod->sale_price){ ?>NRs. {{$prod->regular_price}} <?php }?></span>
                               
                                    </div>
                                    <div class="row">
                                        <div class="cart-product-quantity">
                                        <div id="myDiv">
                     <input type="hidden"  name="product_id" value="{{$prod->id}}" />
                  
                            <div class="input-group float-right quantity">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseFeatureValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantityFeature{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly/>
                               <div class="input-group-text" id="increase" onclick="increaseFeatureValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="priceFeature{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="priceFeature{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="" class="total-amount">
                              <span style="float: left;margin-left: 41px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-priceFeature{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:center;width:21%;margin-right:51px;margin-top:12px">
                          </div>
                                    </div>
                                    <script type="text/javascript">
 var p = parseInt(document.getElementById('priceFeature{{$prod->sale_price}}').value, 10);
function increaseFeatureValue{{$prod->id}}() {
    
  var value = parseInt(document.getElementById('quantityFeature{{$prod->id}}').value, 10);
  
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('quantityFeature{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceFeature{{$prod->sale_price}}').value, 10);
  
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  
  document.getElementById('product-priceFeature{{$prod->id}}').value=u_price;
}

function decreaseFeatureValue{{$prod->id}}() {
  var value = parseInt(document.getElementById('quantityFeature{{$prod->id}}').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  document.getElementById('quantityFeature{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceFeature{{$prod->sale_price}}').value, 10);
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  document.getElementById('product-priceFeature{{$prod->id}}').value=u_price;
}


var price = '$'+`<span>${p}</span>`;
document.getElementById('product-priceFeature{{$prod->id}}').innerHTML=price;
</script>
                                        </div>
                                    </div>
                             
          <div class="row mt-2">
          @if($prod->in_out_stock==0)
          <button  type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>
          
@else
          <button id="feature-add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
        @endif
                 <a class="add-to-cart ml-3" href="#product_viewFeatured{{$prod->id}}" data-toggle="modal"><i class="fa fa-eye"></i> QUICK VIEW</a>
          </div>
          
      </div>
      </div>
       
         <script>
   //-----------------
   $(document).ready(function(){
   
   $('#feature-add-cart{{$prod->id}}').click(function(e){
      
       var url = "/add-cart";
   
       id={{$prod->id}};
           var addUrl = url+"/"+id;
          
           $.ajax({
               url: addUrl,
               method: "POST",
               cache: false,
               data:$('#Featureadd_product{{$prod->id}}').serialize(),
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
      @endforeach
    </div>
  </div>
  </div>



    


  <!-- Latest Product Modal -->
  @foreach($product as $prod)
  <div class="modal fade product_view" id="product_viewLatest{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         
  <!-- <form enctype="multipart/form-data" class="form-horizontal" method="post" action="add-cart/{{$prod->id}}" name="add_product" id="Featuredadd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }} -->
  <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="QuickviewLatestadd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
    
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
                                <img src="images/backend_images/products/small/{{$prod->product_image}}" width="300" class="img-responsive">
                            </div>
                            <div class="col-md-6 product-content">
                                    <h3 class="title"><a href="#">{{$prod->product_name}}</a></h3>
                                       <h4>Product Name: <span>{{$prod->product_name}}</span></h4>
                                
                               
                                <p>{{$prod->description}}</p>
                             
                                    <div class="price">
                                    NRs. {{$prod->sale_price}}
                                    
                                    <span><?php if($prod->regular_price>$prod->sale_price){ ?>NRs. {{$prod->regular_price}} <?php }?></span>
                               
                                    </div>
                                    <div class="row">
                                        <div class="cart-product-quantity">
                                        <div id="myDiv">
                     <input type="hidden"  name="product_id" value="{{$prod->id}}" />
                  
                            <div class="input-group float-right quantity" style="left:38% !important">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseLatestModalValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantityLatestModal{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly/>
                               <div class="input-group-text" id="increase" onclick="increaseLatestModalValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="priceLatestModal{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="priceLatestModal{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="" class="total-amount">
                              <span style="margin-left: 75px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-priceLatestModal{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:center;width:12%;margin-top:12px">
                          </div>
                                    </div>
                                    <script type="text/javascript">
 var p = parseInt(document.getElementById('priceLatestModal{{$prod->sale_price}}').value, 10);
function increaseLatestModalValue{{$prod->id}}() {
    
  var value = parseInt(document.getElementById('quantityLatestModal{{$prod->id}}').value, 10);
  
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('quantityLatestModal{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceLatestModal{{$prod->sale_price}}').value, 10);
  
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  
  document.getElementById('product-priceLatestModal{{$prod->id}}').value=u_price;
}

function decreaseLatestModalValue{{$prod->id}}() {
  var value = parseInt(document.getElementById('quantityLatestModal{{$prod->id}}').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  document.getElementById('quantityLatestModal{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceLatestModal{{$prod->sale_price}}').value, 10);
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  document.getElementById('product-priceLatestModal{{$prod->id}}').value=u_price;
}


var price = '$'+`<span>${p}</span>`;
document.getElementById('product-priceLatestModal{{$prod->id}}').innerHTML=price;
</script>
                                        </div>
                                    </div>

          <div class="row mt-2">
          @if($prod->in_out_stock==0)
          <button  type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>
          
@else
 <button id="quickview-latest-add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
    @endif 
          </div>
      </div>

                         
                        </div>
                    </div>
                </div>
            </div>
            <script>
   //-----------------
   $(document).ready(function(){
   
   $('#quickview-latest-add-cart{{$prod->id}}').click(function(e){
   
       var url = "/add-cart";
   
       id={{$prod->id}};
           var addUrl = url+"/"+id;
          
           $.ajax({
               url: addUrl,
               method: "POST",
               cache: false,
               data:$('#QuickviewLatestadd_product{{$prod->id}}').serialize(),
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
        <!-- Modal-end -->


<!-- Top Product Modal -->
@foreach($top_product as $prod)
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
                                <img src="images/backend_images/products/small/{{$prod->product_image}}" width="300" class="img-responsive">
                            </div>
                            <div class="col-md-6 product-content">
                                    <h3 class="title"><a href="#">{{$prod->product_name}}</a></h3>
                                       <h4>Product Name: <span>{{$prod->product_name}}</span></h4>
                                
                               
                                       <p>{{$prod->description}}</p>
                                    <div class="price">
                                    NRs. {{$prod->sale_price}}
                                    
                                    <span><?php if($prod->regular_price>$prod->sale_price){ ?>NRs. {{$prod->regular_price}} <?php }?></span>
                               
                                    </div>
                                    <div class="row">
                                        <div class="cart-product-quantity">
                                        <div id="myDiv">
                     <input type="hidden"  name="product_id" value="{{$prod->id}}" />
                  
                            <div class="input-group float-right quantity" style="left:38% !important">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseTopModalValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantityTopModal{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly/>
                               <div class="input-group-text" id="increase" onclick="increaseTopModalValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="priceTopModal{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="priceTopModal{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="" class="total-amount">
                              <span style="margin-left: 75px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-priceTopModal{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:center;width:12%;margin-top:12px">
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

          <div class="row mt-2">
          @if($prod->in_out_stock==0)
          <button  type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>
          
@else
          <button id="quickview-top-add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
     @endif
          </div>
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

        
<!-- Featured Product Modal -->
@foreach($featured_product as $prod)
  <div class="modal fade product_view" id="product_viewFeatured{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="QuickviewFeatureadd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
   
  
   <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Product Description</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body product-grid4 product-grid4">
                        <div class="row">
                            <div class="col-md-6 product_img">
                                <img src="images/backend_images/products/small/{{$prod->product_image}}" width="300" class="img-responsive">
                            </div>

                            <div class="col-md-6 product-content">
                                    <h3 class="title"><a href="#">{{$prod->product_name}}</a></h3>
                                       <h4>Product Name: <span>{{$prod->product_name}}</span></h4>
                                
                               
                                       <p>{{$prod->description}}</p>
                                    <div class="price">
                                    NRs. {{$prod->sale_price}}
                                    
                                    <span><?php if($prod->regular_price>$prod->sale_price){ ?>NRs. {{$prod->regular_price}} <?php }?></span>
                               
                                    </div>
                                    <div class="row">
                                        <div class="cart-product-quantity">
                                        <div id="myDiv">
                     <input type="hidden"  name="product_id" value="{{$prod->id}}" />
                  
                            <div class="input-group float-right quantity" style="left:38% !important">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseFeatureModalValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantityFeatureModal{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly/>
                               <div class="input-group-text" id="increase" onclick="increaseFeatureModalValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="priceFeatureModal{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="priceFeatureModal{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="" class="total-amount">
                              <span style="margin-left: 41px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-priceFeatureModal{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:center;width:12%;margin-top:12px">
                          </div>
                                    </div>
                                    <script type="text/javascript">
 var p = parseInt(document.getElementById('priceFeatureModal{{$prod->sale_price}}').value, 10);
function increaseFeatureModalValue{{$prod->id}}() {
    
  var value = parseInt(document.getElementById('quantityFeatureModal{{$prod->id}}').value, 10);
  
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('quantityFeatureModal{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceFeatureModal{{$prod->sale_price}}').value, 10);
  
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  
  document.getElementById('product-priceFeatureModal{{$prod->id}}').value=u_price;
}

function decreaseFeatureModalValue{{$prod->id}}() {
  var value = parseInt(document.getElementById('quantityFeatureModal{{$prod->id}}').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  document.getElementById('quantityFeatureModal{{$prod->id}}').value = value;
  var x = parseInt(document.getElementById('priceFeatureModal{{$prod->sale_price}}').value, 10);
  price = '$'+`<span>${x * value}</span>`;
  u_price=x * value;
  document.getElementById('product-priceFeatureModal{{$prod->id}}').value=u_price;
}


var price = '$'+`<span>${p}</span>`;
document.getElementById('product-priceFeatureModal{{$prod->id}}').innerHTML=price;
</script>
                                        </div>
                                    </div>

          <div class="row mt-2">
          @if($prod->in_out_stock==0)
          <button  type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>
          
@else
          <button id="quickview-feature-add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
      @endif
          </div>
      </div>



                        </div>
                    </div>
                </div>
            </div>
            <script>
//-----------------
$(document).ready(function(){

$('#quickview-feature-add-cart{{$prod->id}}').click(function(e){

var url = "/add-cart";

id={{$prod->id}};
  var addUrl = url+"/"+id;
 
  $.ajax({
      url: addUrl,
      method: "POST",
      cache: false,
      data:$('#QuickviewFeatureadd_product{{$prod->id}}').serialize(),
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
        <!-- Featured Modal-end -->

    <div class="container mb-4">
    <style>
    .border-all {
        border: 1px solid #eee;
    }

    .pad10 {
        padding: 0 20px 0 10px;
    }

    .no-style {
        list-style: none;
    }

    .category-images a {
            color: #A9000B;
            font-size: 16px;
            font-weight: 700;
    }

    .category-image {
        height: 114px;
    }
    
    </style>
    <div class="row">
    <div class="col-xl-12">
    <h2>All Categories</h2>
    <div class="col-md-12 col-sm-12 border-all text-center">
    @foreach($categories as $category)
    <div class="category-images mt-3 d-inline-block pad10 border-all pt-2">
    <div>
    <a href="/product-category/{{$category->id}}"><img class="category-image" src="/images/backend_images/category/small/{{$category->featured_image}}" alt=""></a>
    </div>
    <div class="text-center mt-2 pb-2">
    <a href="/product-category/{{$category->id}}">{{$category->name}}</a>
    </div>
    </div>
    @endforeach
    </div>
    </div>
    </div>
    </div>

    <div class="container-fluid">
       <div class="row">
          <div class="ml-auto mr-auto">
              <a href="/connect-vendors"><img class="w-100" src="/images/vendor_banner.jpeg" alt=""></a>
           </div>
       </div>
   </div>


    @include('layouts.frontLayout.footer')
  

    <script type="text/javascript">
        $(document).ready(function() {
            $("#cartform").click(function() {

                $.ajax({
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    url: "/show-cart/",
                    cache: false,
                    success: function(cart) {
                        var resultData = cart;
                        var bodyData = '';
                        var i = 1;

                        $.each(resultData, function(index, row) {
                            var editUrl = 'slider' + '/' + row.id + "/edit";
                            bodyData += "<tr>"
                            bodyData += "<td>" + i++ + "</td><td>" + row.id + "</td><td>" + row.product_id + "</td><td>" + row.total_quantity + "</td>" +
                                "<td>" + row.total_price + "</td><td><a class='btn btn-primary' href='" + editUrl + "'>Edit</a>" +
                                "<button class='btn btn-danger delete' value='" + row.id + "' style='margin-left:20px;'>Delete</button></td>";
                            bodyData += "</tr>";


                        })
                        

                        $("#bodyData").append(bodyData);
                    }
                });

                $(document).on("click", ".delete", function() {

                    var id = $(this).val();
                    var url = "/delete-add-cart";
                    var dltUrl = url + "/" + id;

                    $.ajax({
                        url: dltUrl,
                        type: "GET",
                        cache: false,
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(cart) {

                            var dataResult = JSON.parse(cart);
                            if (dataResult.statusCode == 200) {
                                $ele.fadeOut().remove();
                            }
                        }
                    });
                });

            });
        });
    </script>

<script>
    $(".latest").owlCarousel({
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

        425:{
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

    $(".top").owlCarousel({
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
          items: 2
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

    @endsection

 