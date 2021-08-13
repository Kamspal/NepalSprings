<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nepal Springs') }}</title>
    <link rel="icon" href="/images/nepalsprings-logo.png" style="width:100%" />

    <!-- Styles -->
    <!-- <link href="/css/app.css" rel="stylesheet"> -->
    <!--Boostrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">



    <!-- Google Fonts -->
    <link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- CSS Implementing Plugins -->
    <!-- <link rel="stylesheet" href="https://htmlstream.com/preview/front-v2.1/assets/vendor/font-awesome/css/fontawesome-all.min.css"> -->
    <link rel="stylesheet" href="https://htmlstream.com/preview/front-v2.1/assets/vendor/animate.css/animate.min.css">

    <!-- CSS Front Template -->
    <link rel="stylesheet" href="https://htmlstream.com/preview/front-v2.1/assets/css/theme.css">




    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />




    <!-- welcome Page -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">


</head>

<body>
    <style>
        .water {
            width: 75px;
            height: 75px;
            background-color: #1D9EE5;
            position: absolute !important;
            top: 30%;
            left: 50%;
            right: 50%;
            z-index: 2;
            border-radius: 50%;
            position: relative;
            overflow: hidden;
        }

        .water:before,
        .water:after {
            content: '';
            position: absolute;
            width: 75px;
            height: 75px;
            top: -32px;
            background-color: #fff;
        }

        .water:before {
            border-radius: 45%;
            background: rgba(255, 255, 255, .7);
            animation: wave 5s linear infinite;
        }

        .water:after {
            border-radius: 35%;
            background: rgba(255, 255, 255, .3);
            animation: wave 5s linear infinite;
        }

        @keyframes wave {
            0% {
                transform: rotate(0);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #loadingDiv {
            position: absolute;
            ;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
        }

        .section-bg {
            background: linear-gradient(to right, rgba(0, 44, 143, 1) 0%, rgba(33, 182, 255, 1) 100%) !important;
        }

        .nav-item {
            padding-right: 20px;
        }

        .nav-item:hover a {
            color: #1FB6FF;
        }

        .nav-item a {
            font-size: 30px;
            color: #fff;
            font-family: 'Merriweather, sans-serif';
            font-weight: 900;
        }

        .navbar-toggler {
            border-color: none;
        }

        .navbar-toggler:focus {
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: url('images/download.svg');
        }

        .nav-link {
            opacity: 1;
        }

        .search {
            position: relative;
            margin: 0 auto;

        }

        .search input {
            height: 26px;
            width: 100%;
            padding: 0 12px 0 25px;
            background: white url("https://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 8px 6px no-repeat;
            border-width: 1px;
            border-style: solid;
            border-color: #a8acbc #babdcc #c0c3d2;
            border-radius: 13px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -ms-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            -moz-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            -ms-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            -o-box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
            box-shadow: inset 0 1px #e5e7ed, 0 1px 0 #fcfcfc;
        }

        .search input:focus {
            outline: none;
            border-color: #66b1ee;
            -webkit-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            -moz-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            -ms-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            -o-box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
            box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
        }

        .search input:focus+.results {
            display: block
        }

        ul.results li {
            font-size: 14px;
        }

        .search_product_name {
            display: inline;
        }

        img.search-image {
            width: 9%;
            float: left;
        }

        .search_image_box {
            display: inline;
        }

        .search .results {
            display: block;
            position: absolute;
            top: 5px;
            left: 0;
            right: 0;
            z-index: 99999 !important;
            padding: 0;
            margin: 0;
            border-width: 1px;
            border-style: solid;
            border-color: #cbcfe2 #c8cee7 #c4c7d7;
            border-radius: 3px;
            background-color: #fdfdfd;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #fdfdfd), color-stop(100%, #eceef4));
            background-image: -webkit-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -moz-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -ms-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: -o-linear-gradient(top, #fdfdfd, #eceef4);
            background-image: linear-gradient(top, #fdfdfd, #eceef4);
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -ms-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .search .results li {
            display: block
        }

        .search .results li:first-child {
            margin-top: -1px
        }

        .search .results li:first-child:before,
        .search .results li:first-child:after {
            display: block;
            content: '';
            width: 0;
            height: 0;
            position: absolute;
            left: 50%;
            margin-left: -5px;
            border: 5px outset transparent;
        }

        .search .results li:first-child:before {
            border-bottom: 5px solid #c4c7d7;
            top: -11px;
        }

        .search .results li:first-child:after {
            border-bottom: 5px solid #fdfdfd;
            top: -10px;
        }

        .search .results li:first-child:hover:before,
        .search .results li:first-child:hover:after {
            display: none
        }

        .search .results li:last-child {
            margin-bottom: -1px
        }

        .search .results a {
            display: block;
            position: relative;
            margin: 0 2px;
            padding: 7px 40px 12px 10px;
            color: #5b65a0;
            font-weight: 500;
            text-shadow: 0 1px #fff;
            border: 1px solid #d0d0d0;
            border-radius: 0px;
        }

        .search_product_name h6 {
            margin-left: 14%;
            font-weight: 800;
            text-align: left;
        }

        span.search_sale_price {
            text-align: right;
            display: block;
            color: #e81414;
            font-weight: 800;
        }

        .search .results a span {
            font-weight: 200
        }

        .search .results a:before {
            content: '';
            width: 18px;
            height: 18px;
            position: absolute;
            top: 50%;
            right: 10px;
            margin-top: -9px;
            background: url("https://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
        }

        .search .results a:hover {
            text-decoration: none;
            color: #fff;
            text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
            border-color: #2380dd #2179d5 #1a60aa;
            background-color: #338cdf;
            background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #59aaf4), color-stop(100%, #338cdf));
            background-image: -webkit-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -moz-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -ms-linear-gradient(top, #59aaf4, #338cdf);
            background-image: -o-linear-gradient(top, #59aaf4, #338cdf);
            background-image: linear-gradient(top, #59aaf4, #338cdf);
            -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -moz-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -ms-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            -o-box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
            box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
        }

        :-moz-placeholder {
            color: #a7aabc;
            font-weight: 200;
        }

        ::-webkit-input-placeholder {
            color: #a7aabc;
            font-weight: 200;
        }

        .lt-ie9 .search input {
            line-height: 26px
        }





        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #AC030F;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            /* Safari */
            animation: spin 2s linear infinite;
        }

        .sidebar-loading p {
            text-align: center;
            padding: 31px 0px 0px 0px;
        }

        .sidebar-loading h4 {
            color: red;
            text-align: center;
            padding: 66px 0px 47px 0px;
        }

        .loader-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 0px 8.00rem;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #mask {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 9000;
            background-color: #26262c;
            display: none;
        }

        #boxes .window {
            position: absolute;
            left: 0;
            top: 0;
            width: 440px;
            height: 850px;
            display: none;
            z-index: 9999;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }

        #boxes #dialog {
            width: auto;
            height: auto;
            padding: 10px 10px 10px 10px;
            background-color: #ffffff;
            font-size: 15pt;
        }

        .agree:hover {
            background-color: #D1D1D1;
        }

        .popupoption:hover {
            background-color: #D1D1D1;
            color: green;
        }

        .popupoption2:hover {
            color: red;
        }

        .h6 {
            font-size: 20px;
        }

        .media {
            box-shadow: 0 2px 10px 0 #eee !important;
            padding: 10px;
        }

        .bg-cart {
            background-color: #AC030F !important;
            color: #fff !important;
        }

        .close {
            opacity: 1;
        }

        .top-bar {
            background-color: auto !important;
            text-align: center;
        }

        .sidebar__subtotal-savings {
            display: -ms-flexbox;
            display: flex;
            margin-top: 2rem;
            padding: 0px 45px;
            font-size: 18px;
        }

        .sidebar__subtotal {
            display: inline-flex;
        }

        .subtotal-title {
            color: #7d7d7d;
        }

        .subtotal-amount {
            font-weight: 700;
        }

        .savings-title {
            color: #c1282f;
        }

        span.fas.fa-shopping-cart.btn-icon__inner {
            color: #fff;
        }

        .savings-amount {
            font-weight: 700;
            color: #c1282f;
        }

        .place-order {
            display: inline-block;
            padding-left: 48px;
            font-size: 0.8rem;
        }

        .place-order a {
            margin-right: 10px;
        }

        .sidebar__btn-place-order {
            margin-top: 1rem;
        }

        .saleprice {
            color: #AB020E;
        }

        .checkout1 {
            font-size: 16px;
        }

        .tr1 {
            color: #AB020E;
        }

        @media screen and (max-width:1024px) {
            .top-bar {
                font-size: 14px;
            }

            .pp a {
                padding-right: 0px !important;
            }

            .anchor a {
                font-size: 14px;
                padding-left: 0 !important;
                margin-right: 0 !important;
            }

            a i {
                padding-left: 5px;
            }

            .dropdown-link>a {
                font-size: 12.5px;
            }

            .window {
                left: 212px !important;
            }

        }

        @media screen and (max-width: 768px) {
            section.bg.sticky-top {
                position: fixed;
                right: 0;
            }

            .window {
                left: 75px !important;
            }

            .nav-btn {
                top: 36px;
            }
        }

        @media screen and (max-width: 425px) {
            .water {
                top: 50%;
                left: 40%;
            }

            section.bg.sticky-top {
                position: fixed;
            }

            .window {
                left: 0px !important;
            }

            .agree img {
                margin-right: 2px !important;
            }

            .imgpopup img {
                width: 80%;
            }

            section.bg.sticky-top {
                right: 0;
                top: 0px;
                height: 45px;
            }

            section.bg.sticky-top .container {
                margin-top: 4px !important;
            }

            .nav-btn {
                top: 2.6rem;
            }
        }

        @media screen and (max-width:375px) {

            section.bg.sticky-top {
                height: 52px;
            }


            section.bg.sticky-top .container {
                margin-top: 8px !important;
            }

            .rowreverse {
                flex-flow: row-reverse;
            }

            .nav-btn {
                top: 3rem;
            }
        }
    </style>
    <div id="app">
        <div class="water"></div>
        <!-- <section class="pad navbar nav p-0">
            <div class="container-fluid">
                <div class="col-md-4 col-sm-4">
                    <h1 class="top-bar text-white mb-0">Quality, On time Guarantee, Free delivery <i class="fa fa-shopping-cart"></i></h1>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="d-flex justify-space-between rowreverse">
                        <p class="anchor text-white mb-0 pr-4 pp">
                            <a class="" href=""><i class="fas fa-map-marker-alt mr-2"></i>Teku-12, Kathmandu, Nepal</a>
                        </p>
                        <p class="anchor text-white mb-0">
                            <a class="border-left pl-4 mr-4 border-l" href="/normaluser"><i class="fa fa-truck mr-2"></i>Account</a>
                        </p>
                        <p class="anchor text-white mb-0">
                            <a class="border-left pl-4 mr-4" href=""><i class="fa fa-phone mr-2"></i>01-5355000</a>
                        </p>
                        <?php

                        use Illuminate\Support\Facades\DB;

                        if (Auth::check()) { ?>
                            <p class="anchor text-white mb-0">
                                <a class="border-left pl-4 mr-4" href="/logout"><i class="fas fa-sign-in-alt mr-2"></i></i>Logout</a>
                            </p>
                        <?php } else {
                        ?>

                            <p class="anchor text-white mb-0">
                                <a class="border-left pl-4 mr-4" href="/admin"><i class="fa fa-sign-in-alt mr-2"></i>Log in</a>
                            </p>

                            <p class="anchor text-white mb-0">
                                <a class="border-left pl-4 mr-4" href="/signup"><i class="fa fa-user-plus mr-2"></i>Register</a>
                            </p>
                        <?php       } ?>

                    </div>
                </div>
            </div>
        </section> -->
        <section class="section-bg">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="/"><img src="/images/nepalsprings-logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about-us">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Gallery</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/contact-us">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </section>


        <section style="display:none">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 pt-3">
                        <a href="/"><img class="img-responsive mt-1 mb-1 ml-5 margin-lef1" src="/images/logo.png" alt=""></a>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-10">



                                <!-- <div class="">
                                <form class="form-inline" action="/search" method="get">
                        <input type="text" name="search-text" id="search-text" placeholder="Enter the Product Name" class="form-control mt-4 mr-4 form-input">
                        <button type="submit" class="btn btn-md btn-danger btn-size mt-4">Search</button>
                                </form>
                    </div>
                    <div class="search">
                    <div id="search-list">
                    <div class="list" id="list">
                    <ul class="results" id="results">
                    </ul>
                         </div>
                    </div>   
                    </div> -->

                            </div>

                            <div class="col-2 cart-bar">
                                <!-- <button type="submit" class="btn btn-md btn-dark margin-t1" id="sidebarNavToggler" class="btn btn-xs btn-icon btn-text-secondary ml-1" href="javascript:;" role="button" aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent" data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">

                                <a id="sidebarNavToggler" class="btn btn-xs btn-icon btn-text-secondary ml-1" href="javascript:;" role="button" aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent" data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                                    <span class="fas fa-shopping-cart btn-icon__inner"></span> -->
                                <!-- <span class="badge badge-sm badge-primary badge-pos rounded-circle">1</span> -->
                                <!-- </a> -->

                                </button>



                                <!-- Button trigger modal-->
                                <div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
                                    <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
                                        <!--Content-->
                                        <div class="modal-content">
                                            <!--Header-->
                                            <div class="modal-header">
                                                <p class="heading">Product in the cart
                                                </p>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true" class="white-text">&times;</span>
                                                </button>
                                            </div>

                                            <!--Body-->
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-3">
                                                        <p></p>
                                                        <p class="text-center"><i class="fas fa-shopping-cart fa-4x"></i></p>
                                                    </div>


                                                    <div class="widget-box">
                                                        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
                                                            <h5>View Products</h5>
                                                        </div>
                                                        <div class="widget-content nopadding">

                                                        </div>
                                                    </div>

                                                    <div class="col-9">
                                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Product Name</th>
                                                                    <th>Total Quality</th>
                                                                    <th>Total Price</th>
                                                                    <th>action</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody id="bodyData">

                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Product Name</th>
                                                                    <th>Total Quality</th>
                                                                    <th>Total Price</th>
                                                                    <th>action</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>



                                                        <div class="result">

                                                        </div>
                                                        <p id="title"></p>
                                                        <p>No pressure, your product will be waiting for you in the cart.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control" id="order_value" name="order_value" value="<?php $order_value = DB::table("order_values")->where("id", 1)->first();
                                                                                                                                // echo $order_value->value; 
                                                                                                                                ?>">

                                            <!--Footer-->
                                            <div class="modal-footer justify-content-center">
                                                <a type="button" class="btn btn-info">Go to cart</a>
                                                <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
                                            </div>
                                        </div>
                                        <!--/.Content-->
                                    </div>
                                </div>
                                <!-- Modal: modalAbandonedCart-->
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAbandonedCart">Launch
                            modal</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- <section class="bg sticky-top">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <input type="checkbox" name="" id="check">
                        <div class="nav-btn">
                            <div class="nav-links">
                                <ul class="mb-0">
                                    <?php $sub_menu = DB::table('sub_menus')->get();

                                    foreach ($sub_menu as $cat) {
                                        $categories = DB::table('categories')->where('selectsubmenu', $cat->id)->get();
                                    ?>


                                        <ul class="main">



                                            <li class="dropdown-link">
                                                <a href="/product-main-category/{{$cat->id}}">{{$cat->subMenuName}}@if($categories->count()!=0) <i class="fas fa-caret-down"></i>@endif</a>
                                                @if($categories->count()!=0)
                                                <div class="dropdown second">

                                                    <ul>
                                                    <?php $k = 1; ?>
                                                        @foreach($categories as $category)
                                                       
                                                        
                                                        <?php if ($k <= 6) {

                                                        ?> 
<div class="menu-left">
                                                        <li class="dropdown-link">
                                                            <a href="/product-category/{{$category->id}}">hi {{$category->name}}</a>
                                                        </li></div>
                                                        <?php }

                                                        if ($k > 6) {

                                                        ?>
                                                        <div class="menu-right">
                                                        <li class="dropdown-link">
                                                            <a href="/product-category/{{$category->id}}">hello {{$category->name}}</a>
                                                        </li></div>
                                                        
                                                        
                                                        <?php } ?>
                                                        <?php $k++; ?> 
                                                        @endforeach
                                                    </ul>

                                                </div>
                                                @endif
                                            </li>




                                        </ul>

                                        </li>
                                    <?php  } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="hamburger-menu-container">
                            <div class="hamburger-menu">
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- ========== SECONDARY CONTENTS ========== -->
    <!-- Account Sidebar Navigation -->

    <aside id="sidebarContent" data-backdrop="static" data-keyboard="false" class="u-sidebar" aria-labelledby="sidebarNavToggler" style="z-index:99999;background:#fff" style="display:none">
        <div class="u-sidebar__scroller">
            <div class="u-sidebar__container">
                <div class="u-sidebar__cart-footer-offset">
                    <!-- Header -->
                    <header class="card-header btn-danger py-3 px-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="h6 mb-0 text-white float-left"><i class="fa fa-shopping-cart"></i> Shopping Cart</h3>

                            <button type="button" class="close" aria-controls="sidebarContent" aria-haspopup="true" aria-expanded="false" data-unfold-event="click" data-unfold-hide-on-scroll="false" data-unfold-target="#sidebarContent" data-unfold-type="css-animation" data-unfold-animation-in="fadeInRight" data-unfold-animation-out="fadeOutRight" data-unfold-duration="500">
                                <span aria-hidden="true" class="text-white">×</span>
                            </button>
                        </div>
                    </header>
                    <!-- End Header -->

                    <div class="js-scrollbar u-sidebar__body">
                        <div class="u-sidebar__content">
                            <p class="mb-0 text-left" style="padding-left: 54px;padding-top: 10px;font-size: 17px;">Your Shopping Lists</p>
                            <!-- Body -->
                            <div class="p-2" id="card-body">
                                <div class="sidebar-inside">

                                    <div class="sidebar-loading">
                                        <h4 style="color:red;text-align:center;padding: 66px 0px 47px 0px">Slow Internet Detected</h4>
                                        <div class="loader-body ">

                                            <div class="loader"></div>

                                        </div>
                                        <p>Please ! <span style="color:red">Try Again<span></p>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <!-- End Content -->
    </aside>
</body>

<!-- End Footer -->
</aside>
<!-- End Account Sidebar Navigation -->
<!-- ========== END SECONDARY CONTENTS ========== -->

<!-- JS Implementing Plugins -->
<!-- JS Global Compulsory -->
<!-- <script src="https://htmlstream.com/preview/front-v2.1/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="https://htmlstream.com/preview/front-v2.1/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script> -->
<script src="{{ asset('js/backend_js/sidebar/jquery.min.js') }}"></script>
<script src="{{ asset('js/backend_js/sidebar/jquery-migrate.min.js') }}"></script>



<!-- JS Front -->
<script src="{{ asset('js/backend_js/sidebar/hs.core.js') }}"></script>
<!-- <script src="https://htmlstream.com/preview/front-v2.1/assets/js/hs.core.js"></script> -->

<!-- JS Implementing Plugins -->
<script src="{{ asset('js/backend_js/sidebar/hs.megamenu.js') }}"></script>
<!-- <script src="https://htmlstream.com/preview/front-v2.1/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script> -->

<!-- JS Front -->
<script src="{{ asset('js/backend_js/sidebar/hs.header.js') }}"></script>
<script src="{{ asset('js/backend_js/sidebar/hs.unfold.js') }}"></script>

<!-- <script src="https://htmlstream.com/preview/front-v2.1/assets/js/components/hs.header.js"></script>
<script src="https://htmlstream.com/preview/front-v2.1/assets/js/components/hs.unfold.js"></script> -->

<script src="{{ asset('js/backend_js/sidebar/bootstrap.min.js') }}"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<script>
    $('.navbar-toggler').on('click', function() {
        $('.navbar-collapse').slideToggle('slow').collapse('hide');
    });
</script>

<!-- JS Plugins Init. -->
<script>
    $(window).on('load', function() {

        $.ajax({

            type: "GET",
            data: {
                _token: '{{ csrf_token() }}'
            },
            url: "/fetch-cart",

            success: function(cart) {

                $('#card-body').html(cart);
            }
        })
    });
    $(document).ready(function() {

        $("#sidebarNavToggler").click(function() {

            $.ajax({

                type: "GET",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "/fetch-cart",

                success: function(cart) {

                    $('#card-body').html(cart);
                }
            })
        })
    });

    $(window).on('load', function() {
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

    $(document).on('ready', function() {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#header'));

        // initialization of unfold component
        $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

        // initialization of malihu scrollbar
        $.HSCore.components.HSMalihuScrollBar.init($('.js-scrollbar'));
    });

    function checkAmount() {
        var value = parseInt(document.getElementById('total_amount_checkout').value, 10);

        if (value <= 999) {

            alert('Checkout should be more than 999');
            return false;
        } else {

            return true;
        }

    }

    function deleteTab(id) {
        var id = id;

        var url = "/delete-cart";

        var dltUrl = url + "/" + id;

        $.ajax({
            url: dltUrl,
            type: "GET",
            cache: false,
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                console.log(data);
                if (data == 0) {
                    $('.amount-sum-box').remove();
                    // $('.card_body').remove(); 
                    var mySecondDiv = $('<div class="sidebar-inside"><div class="u-sidebar__content"> <div class="card-body "><div class="Empty cart"><div class="col-sm-12 empty-cart-cls text-center"> <img src="/images/frontend_images/cart/cart-logo.png" width="130" height="130" class="img-fluid mb-4 mr-3"/><h3><strong>Your Cart is Empty</strong></h3><h4>Add something to make me happy :)</h4> <a href="\" class="btn cart-btn-transform m-3 bg-cart waves-effect waves-light" data-abc="true">Continue Shopping</a> </div></div></div>');
                    $('.p-2').html(mySecondDiv);
                }
                console.log('#sidebar-box' + id);
                $('#sidebar-box' + id).remove();


                document.getElementById('sidebar_total_amount_checkout').value = data.total;
                document.getElementById('sidebar_total_discount').value = data.discount;
                document.getElementById('sidebar_total_cost_calc').value = data.regular_price;




                // assumes that the wrapper for each line item is cart-data-details__total
            }
        });




    };
</script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="http://t4t5.github.io/sweetalert/dist/sweetalert.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
<script type="text/javascript">
    // jQuery wait till the page is fullt loaded
    $(document).ready(function() {
        // keyup function looks at the keys typed on the search box
        $('#search-text').on('keyup', function() {
            // the text typed in the input field is assigned to a variable 
            var query = $(this).val();

            url = "/autocomplete"
            var Url = url + "/" + query;

            // call to an ajax function
            $.ajax({
                // assign a controller function to perform search action - route name is search
                url: Url,
                // since we are getting data methos is assigned as GET
                type: "GET",
                // data are sent the server
                data: {
                    'search-text': query
                },
                // if search is succcessfully done, this callback function is called
                error: function(data) {
                    $('#results .list-li').remove();
                },
                success: function(data) {
                    // print the search results in the div called country_list(id)
                    $('#results .list-li').remove();
                    for (var i = 0; i < data.length; i++) {
                        $('#results').append('<li class="list-li"><a href="/product-details/' + data[i].id + '"><div class="col-sm-12"><div class="search_image_box "><img class="search-image" src="/images/backend_images/products/small/' + data[i].product_image + '"></div><div class="search_product_name"><h6>' + data[i].product_name + '</h6><span class="search_sale_price">NPR. ' + data[i].sale_price + '</span></div></div></li>');

                    }


                }

            })
            // end of ajax call
        });

        // initiate a click function on each search result
        $(document).on('click', 'li', function() {
            // declare the value in the input field to a variable
            var value = $(this).text();
            // assign the value to the search box
            $('#country').val(value);
            // after click is done, search results segment is made empty
            $('#country_list').html("");
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {

        $("#search-text").autocomplete({

            minLength: 0
        }).on("focus", function() {
            alert(document.getElementById('search-text').value);
            $.ajax({
                type: "GET",

                url: "/autocomplete",

                success: function(data) {

                    console.log(data);
                }
            })
        })
    });
</script>

@stack('post_scripts')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
    $('body').append('<div style="" id="loadingDiv"><div class="water"></div></div>');
    $(window).on('load', function() {
        setTimeout(removeLoader, 800); //wait for page load PLUS two seconds.
    });

    function removeLoader() {
        $(".water").fadeOut(200, function() {
            // fadeOut complete. Remove the loading div
            $("#loadingDiv").remove(); //makes page more lightweight 
            $(".water").remove(); //makes page more lightweight 
        });
    }
</script>


</body>
<input type="number" name="counter" id="counter" value="0" style="visibility: hidden;">

</html>