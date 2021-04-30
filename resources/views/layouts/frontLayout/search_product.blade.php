@extends('layouts.adminLayout.admin_front_header')
<!--Boostrap-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- Fontawesome -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
<!--Owl Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />

<!-- Scripts -->

<!-- <script src="http://127.0.0.1:8000/js/app.js" defer></script> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>

@section('content')

<style>
.owl-carousel {
    display:block;
}

.owl-item {
    width: 25%;
    padding: 5px;
}
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
.owl-prev i, .owl-next i {transform : scale(2,2); color: #ccc;
}

.owl-prev:focus, .owl-next:focus {
    outline: none;
}
.owl-item {
    width: 25%;
}
.product-grid4 .product-image4 img {
    width: 92%;
    height: auto;
}
.product-grid4:hover .pic-1 {
    transform: scale(1.2);
    transition: all 0.5s;
    -webkit-transition: all 0.5s;
}
div#myCarousel {
    width: 100%;
}

.add-to-cart {
    margin-left: auto !important;
    margin-right: auto !important;
}

ul.pagination {
    margin-top: 10px;
    justify-content: center;
   
}

ul.pagination .page-item .page-link {
    color: #AC030F;
}

.page-item.active .page-link {
    color: #fff !important;
    background-color: #AC030F;
    border: #AC030F;
}

@media screen and (max-width: 1024px){
    .total-amount span {
        margin-left: 58px !important;
    }
} 
@media only screen and (max-width:768px) {
    .owl-item {
        width: 33.33%;
    }
}

@media only screen and (max-width:425px) {
    .span {
        margin-right: 0 !important;
    }

    .owl-item {
        width: 50%;
    }

    .add-to-cart {
    margin-bottom: 10px;
}

.cart-product-quantity .input-group {
    left: 0%;
}
    .total-amount span {
        margin-left: 0px !important;
    }
    nav {
    overflow: scroll;
    width: 100%;
}
ul.pagination {
    overflow: scroll;
    width: 90%;
    justify-content: left;
}

.total-amount input {
    width: 26% !important;
}

div#myDiv {
    margin-left: 30px;
}

.item {
    width: 100%;
}

.modal-content .total-amount span {
    margin-left: 55px !important;
}

.modal-content .quantity {
    left: 33% !important;
}
}
 
@media only screen and (max-width:375px) {
    div#myDiv {
        margin-left: auto;
    }

    .cart-product-quantity .input-group {
    left: 34%;
}

.total-amount span {
    margin-left: 79px !important;
}

    .owl-item {
        width: 100%;
    }
}
</style>
<div class="container">
    @if(isset($details))
        <p> The Search Product for your query <b> {{ $query }} </b> are :</p>
    <h2>Product list related to your search</h2>
    <label for="rasanmart">Sort the product as per your need:</label>
  <select name="rasanmart" id="rasanmart" onchange="location = this.value;" >
       <option >Default Sorting</option>
       <option >Sort by Latest</option>
       <option value=" ?search-text={{$q}}&sort=sale_price&direction=asc">Sort by Oldest</option>
       <option value="&earch-text={{$q}}&sort=sale_price&direction=asc">Sort by price: Low to high</option>
    <option value="?search-text={{$q}}&sort=sale_price&direction=desc">Sort by price: High to low</option>
    <option value="?search-text={{$q}}&sort=product_name&direction=asc">Sort by Product Name: a-z</option>
    <option value="?search-text={{$q}}&sort=product_name&direction=desc">Sort by Product Name: z-a</option>

 
  </select>

    <div class="row">
<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
            <!-- Carousel indicators -->
            <!-- Wrapper for carousel items -->
      
            <div class="carousel-inner">
            
                <div class=" carousel-item active">
                <div class="row">
    @foreach($details as $prod)
      <div class="owl-item">
      <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="Featureadd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
                                 <div class="product-grid4 mr-3 mb-3">
                                <div class="product-image4">
                                    <a href="/product-details/{{$prod->id}}">
                                        <img class="pic-1 img-responsive" src="/images/backend_images/products/medium/{{$prod->product_image}}">
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
                            <span class="span" style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseFeatureValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantityFeature{{$prod->id}}" name="quantity" value="1" style="text-align: right;border: 1px solid #ccc;" readonly/>
                               <div class="input-group-text" id="increase" onclick="increaseFeatureValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="priceFeature{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="priceFeature{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="" class="total-amount">
                              <span style="float: left;margin-left: 41px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-priceFeature{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:right;width:21%;margin-right:51px;margin-top:12px">
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
  value < 1 ? value = 1 : '';
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
          <a class="add-to-cart ml-4" href="#product_viewLatest{{$prod->id}}" data-toggle="modal"><i class="fa fa-eye"></i> QUICK VIEW</a>
          </div>
         
      </div>
      </div>
      <script>
   
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

  
 <!--  Product Modal -->
  @foreach($details as $prod)
  <div class="modal fade product_view" id="product_viewLatest{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
         
  <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="modaladd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
           
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
                                <img src="/images/backend_images/products/medium/{{$prod->product_image}}" width="300" class="img-responsive">
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
                  
                            <div class="input-group float-right quantity" style="left:30%">
                            <span style="margin-right: 10px;">Qty</span> 
                            <div class="input-group-text" id="decrease" onclick="decreaseLatestModalValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div> 
                            <input type="number" id="quantityLatestModal{{$prod->id}}" name="quantity" value="1" style="text-align: right;border: 1px solid #ccc;"/>
                               <div class="input-group-text" id="increase" onclick="increaseLatestModalValue{{$prod->id}}()" value="Increase Value" style="border-radius: 0 24px 24px 0;">+</div>
                          </div>
                          <input type="hidden" id="priceLatestModal{{$prod->sale_price}}" name="price" value="{{$prod->sale_price}}" />
                          <input type="hidden" id="priceLatestModal{{$prod->id}}" name="id" value="{{$prod->id}}" />
                             
                          <div id="" class="total-amount">
                              <span style="margin-left: 65px;margin-top:10px">Price (NRs.)</span>
        <input type="text" id="product-priceLatestModal{{$prod->id}}" name="totalprice" value="{{$prod->sale_price}}" style="border:none;text-align:right;width:21%;margin-right:51px;margin-top:12px">
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
          <button id="modal-add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
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
   
   $('#modal-add-cart{{$prod->id}}').click(function(e){
       var url = "/add-cart";
   
       id={{$prod->id}};
           var addUrl = url+"/"+id;
          
           $.ajax({
               url: addUrl,
               method: "POST",
               cache: false,
               data:$('#modaladd_product{{$prod->id}}').serialize(),
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
        <!-- Modal-end -->
</div>
    </div>
</div>
    

        {!! $details->appends(\Request::except('page'))->render() !!}
    @elseif(isset($message))
			<p>{{ $message }}</p>
			@endif
            
@include('layouts.frontLayout.footer')

@push('post_scripts')
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

        390: {
            items:1
        },

        411: {
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


    @endpush

@endsection