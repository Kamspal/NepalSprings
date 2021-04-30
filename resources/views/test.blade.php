

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Title -->
  <title>Sidebar Shopping Cart with Items | Front - Responsive Website Template</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 
  <!-- Google Fonts -->
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="https://htmlstream.com/preview/front-v2.1/assets/vendor/font-awesome/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="https://htmlstream.com/preview/front-v2.1/assets/vendor/animate.css/animate.min.css">
  
  <!-- CSS Front Template -->
  <link rel="stylesheet" href="https://htmlstream.com/preview/front-v2.1/assets/css/theme.css">

 
<!-- JS Implementing Plugins -->
 <!-- JS Global Compulsory -->
  <script src="https://htmlstream.com/preview/front-v2.1/assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="https://htmlstream.com/preview/front-v2.1/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>

  
  <!-- JS Front -->
  <script src="https://htmlstream.com/preview/front-v2.1/assets/js/hs.core.js"></script>
  <!-- JS Implementing Plugins -->
<script src="https://htmlstream.com/preview/front-v2.1/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>

<!-- JS Front -->
<script src="https://htmlstream.com/preview/front-v2.1/assets/js/components/hs.header.js"></script>
<script src="https://htmlstream.com/preview/front-v2.1/assets/js/components/hs.unfold.js"></script>

<body>
<header id="header" class="u-header">
  <div class="u-header__section">
    <!-- Topbar -->
    <div class="container u-header__hide-content pt-2">
      <div class="d-flex align-items-center">
        <!-- Language -->
       
      

        <ul class="list-inline ml-2 mb-0">
         

          <!-- Shopping Cart -->
        
            
              <a id="sidebarNavToggler" class="btn btn-xs btn-icon btn-text-secondary ml-1" href="javascript:;" role="button"
                 aria-controls="sidebarContent"
                 aria-haspopup="true"
                 aria-expanded="false"
                 data-unfold-event="click"
                 data-unfold-hide-on-scroll="false"
                 data-unfold-target="#sidebarContent"
                 data-unfold-type="css-animation"
                 data-unfold-animation-in="fadeInRight"
                 data-unfold-animation-out="fadeOutRight"
                 data-unfold-duration="500">
                <span class="fas fa-shopping-cart btn-icon__inner"></span>
                <span class="badge badge-sm badge-primary badge-pos rounded-circle">1</span>
              </a>
      
            <!-- End Shopping Cart -->
          <!-- End Shopping Cart -->

         
        </ul>
      </div>
    </div>
    <!-- End Topbar -->

  </div>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== SECONDARY CONTENTS ========== -->
<!-- Account Sidebar Navigation -->
<aside id="sidebarContent" class="u-sidebar" aria-labelledby="sidebarNavToggler">
  <div class="u-sidebar__scroller">
    <div class="u-sidebar__container">
      <div class="u-sidebar__cart-footer-offset">
        <!-- Header -->
        <header class="card-header bg-light py-3 px-5">
          <div class="d-flex justify-content-between align-items-center">
            <h3 class="h6 mb-0">Your Shopping Cart</h3>

            <button type="button" class="close"
                    aria-controls="sidebarContent"
                    aria-haspopup="true"
                    aria-expanded="false"
                    data-unfold-event="click"
                    data-unfold-hide-on-scroll="false"
                    data-unfold-target="#sidebarContent"
                    data-unfold-type="css-animation"
                    data-unfold-animation-in="fadeInRight"
                    data-unfold-animation-out="fadeOutRight"
                    data-unfold-duration="500">
              <span aria-hidden="true">×</span>
            </button>
          </div>
        </header>
        <!-- End Header -->

        <div class="js-scrollbar u-sidebar__body">
          <div class="u-sidebar__content">
            <!-- Body -->
            <div class="card-body p-5" id="card-body">
           
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Content -->
</body>

  <!-- End Footer -->
</aside>
<!-- End Account Sidebar Navigation -->
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Plugins Init. -->
<script>
   $(document).ready(function() {
   
            $("#sidebarNavToggler").click(function() {
             
                $.ajax({
                 
                    type: "GET",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    url: "/fetch-cart",
                    
                    success: function(cart) {
                        console.log(cart);
                        $('#card-body').html(cart);
                    }
                })
            })
            });
  $(window).on('load', function () {
    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
      event: 'hover',
      pageContainer: $('.container'),
      breakpoint: 767.98,
      hideTimeOut: 0
    });

    // initialization of svg injector module
    $.HSCore.components.HSSVGIngector.init('.js-svg-injector');
  });

  $(document).on('ready', function () {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#header'));

    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

    // initialization of malihu scrollbar
    $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));
  });
</script>