<style>
     .fb_dialog iframe {
    right: 69px !important;
}
    @media screen and (max-width:1024px) {
        .promo .text-wrapper .wrapper h5 {
            font-size: 16px;
        }
   

        .upbtn {
            z-index: 99999;
        }

        .upbtn i {
            margin-top: 14px;
            margin-right: 5px;
}
    }

    @media screen and (max-width:768px) {
        .promo .text-icon i {
            font-size: 24px;
        }
    }

    @media screen and (max-width:425px) {
  .text-r15 {
    text-align: center !important;
  }

  .marginb425 {
    margin-bottom: 10px;
  }
  

  }
</style>



<section class="promo">
    <div class="container border-bot pb-5">
        <div class="row text-right p-0 display-inline-block">
            <div class="col-md-4 marginb425">
                <div class="border-footer">
                <div class="text-icon text-center">
                    <i class="fa fa-truck"></i>
                </div>
                <div class="text-wrapper">
                    <div class="wrapper">
                        <h5>FREE HOME DELIVERY</h5>
                        <div class="text-content">
                            Kathmandu ( inside Ring Road & 2 km outside Ring Road )
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4 marginb425">
                <div class="border-footer">
                <div class="text-icon text-center">
                    <i class="fa fa-phone"></i>
                </div>
                <div class="text-wrapper">
                    <div class="wrapper">
                        <h5>CUSTOMER SUPPORT</h5>
                        <div class="text-content">
                            Sunday - Friday (10:00 am - 6:00 pm) Hotline 01-5355000
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-4">
               <div class="border-footer">
               <div class="text-icon text-center">
                    <i class="fa fa-mobile"></i>
                </div>
                <div class="text-wrapper">
                    <div class="wrapper">
                        <h5>WHATS APP & VIBER</h5>
                        <div class="text-content">
                            9866550000 / 9866551111
                        </div>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </div>
</section>

<section class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="footer-block">
                    <div class="title-bg">
                        <h3 class="title11">ABOUT RASANMART</h3>
                    </div>
                    <div class="text-widget">
                        <p>Since last 25 years we are involved in grocery product So we insure to deliver the best quality product on time at reasonable price to your doorstep.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-block">
                    <div class="title-bg">
                        <h3 class="title11">INFORMATION</h3>
                    </div>
                    <div class="text-widget">
                        <ul class="menu">
                            <li>
                                <a href="">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="">Payment Policy</a>
                            </li>
                            <li>
                                <a href="">Return/Refund Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-block">
                    <div class="title-bg">
                        <h3 class="title11">MY ACCOUNT</h3>
                    </div>
                    <div class="text-widget">
                        <ul class="menu">
                            <li>
                                <a href="/shop">Shop</a>
                            </li>
                            <li>
                                <a href="/normaluser">My Account</a>
                            </li>
                            <li>
                                <a href="/guest-checkout">Checkout</a>
                            </li>
                            <li>
                                <a href="/cart">Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-block">
                    <div class="title-bg">
                        <h3 class="title111">CONTACT INFORMATION</h3>
                    </div>
                    <div class="text-widget">
                        <p>Teku-12, Kathmandu, Nepal</p>
                        <p><i class="fa fa-mobile"></i>&nbsp; 01-5355000 | 9866551111</p>
                        <p class="text"><i class="fa fa-envelope"></i>&nbsp; info@rasanmart.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer-page">
    <div class="container">
        <div class="row">
            <style>
                .footer-page p a {
                    color: #757677;
                }
            </style>
            <p class="text-left text-r15">© 2021 Rasan Mart Pvt. Ltd. All rights reserved. Designed by <a href="http://nepgeeks.com/" target="_blank">Nepgeeks Technology</a></p>
        </div>
    </div>
</section>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
FB.init({
xfbml : true,
version : 'v10.0'
});
};

(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
attribution="setup_tool"
page_id="1891215827806639">
</div>
    <div id="scrollTop">
        <style>
            .upbtn i {
                margin-top: 12px;
            }
        </style>
        <a class="upbtn" href=""><i class="fa fa-arrow-up"></i></a>
    </div>
</footer>

<script>
        $(document).ready(function() {

            //Check to see if the window is top if not then display button
            $(window).on('scroll', function() {
                var scroll = $(window).scrollTop();
                if (scroll < 400) {
                    $('#scrollTop').fadeOut(500);
                } else {
                    $('#scrollTop').fadeIn(500);
                }
            });

            //Click event to scroll to top
            $('#scrollTop a').click(function() {
                $('html, body').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });

        });
    </script>

    