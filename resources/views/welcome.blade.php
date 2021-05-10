@extends('layouts.adminLayout.admin_front_header')

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@900&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/fontawesome.min.css" integrity="sha512-OdEXQYCOldjqUEsuMKsZRj93Ht23QRlhIb8E/X0sbwZhme8eUw6g8q7AdxGJKakcBbv7+/PX0Gc2btf7Ru8cZA==" crossorigin="anonymous" />


<!-- Scripts -->

<!-- <script src="http://127.0.0.1:8000/js/app.js" defer></script> -->
<script src="{{ asset('js/backend_js/jquery-3.5.1.slim.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset('js/backend_js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



@section('content')
<style>
    p {
        font-family: 'Open Sans';
    }

    .header-text {
        font-size: 60px;
        font-family: 'Merriweather';
    }

    .color {
        color: #1FB6FF;
    }

    .color-blue {
        color: #1FB6FF;
        font-size: 18px;
    }

    .py-4 {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    .pt150 {
        padding-top: 150px;
    }

    .pt100 {
        padding-top: 100px;
    }

    .pb100 {
        padding-bottom: 100px;
    }

    .btn-read {
        background-color: #1fb6ff;
        text-decoration: none;
        padding: 12px 36px;
        transition: all 0.3s ease 0s;
        min-width: 180px;
        font-size: 14px;
        border-radius: 32px;
        font-weight: 600;
    }

    .btn-read a {
        color: #fff;
    }

    .btn-make {
        background-color: #B5C963;
        text-decoration: none;
        padding: 12px 36px;
        transition: all 0.3s ease 0s;
        min-width: 180px;
        font-size: 14px;
        border-radius: 32px;
        font-weight: 600;
    }

    .btn-make a {
        color: #fff;
    }

    .btn-read:hover {
        background-color: #fff;
        text-decoration: none;
    }

    .btn-read:hover a {
        color: #002c8f !important;
        text-decoration: none;
    }

    .btn-make:hover {
        color: #002c8f !important;
        background-color: #fff;
        text-decoration: none;
    }

    .btn-make:hover a {
        color: #002c8f !important;
        text-decoration: none;
    }

    .front-img {
        position: relative;
        z-index: 99999;
    }

    .top-img {
        height: auto;
        max-width: 120%;
        padding-bottom: 80px;
    }

    .back-img {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 0;
        transform: translate(-50%, -50%);
        height: auto;
        max-width: 100%;
        vertical-align: top;
        visibility: visible;
        transform: translateY(0px) scale(1) rotateZ(0deg);
        opacity: 1;
        transition: all 0.3s ease 0s;
    }

    .mineral-bg {
        background-color: #fff;
    }

    .spiral-bg {
        background-image: url('/images/spiral.png');
        background-repeat: no-repeat;
        padding: 0 0 16px;
        background-position: 50% 100%;
    }

    .mineral {
        color: #002C8E;
        font-size: 48px;
        font-family: 'Merriweather';
    }

    .font-small {
        font-size: 18px;
        font-weight: 400;
        line-height: 1.5;
    }

    h4 {
        color: #002C8E;
        font-family: 'Merriweather';
        font-weight: 900;
        font-size: 30px;
    }

    h5 {
        margin: 0px 0 20px;
        font-weight: 600;
        font-size: 24px;
        line-height: 38px;
        color: #002C8E;
        font-family: 'Merriweather', sans-serif;
    }

    .blue {
        color: #fff !important;
        font-size: 23px !important;
    }


    h6 {
        color: #1FB6FF;
        font-size: 18px;
        font-family: 'Merriweather', sans-serif;
        padding-bottom: 20px;
    }

    .text-small {
        color: #4965AE;
        font-weight: 400;
        line-height: 18px;
        padding-bottom: 25px;
    }

    .mineral-glass {
        vertical-align: top;
        margin: 0;
        height: auto;
        max-width: 100%;
    }

    .pt50 {
        padding-top: 70px;
    }

    .choose-bg {
        background-color: #F1F6FA;
    }

    .water-set {
        height: 530px;
        text-align: center;
        background: #fff;
        margin-top: 30px;
        margin-bottom: 0;
        padding: 25px 25px 45px;
        position: relative;
        transition: all .3s ease;
        border-radius: 20px;
    }

    .water-set:hover {
        box-shadow: 0 0px 10px rgb(17 44 145 / 40%);
    }

    .water-set h5 {
        transition: all 0.3s ease 0s;
    }

    .water-set h5:hover {
        color: #1FB6FF;
        transition: all 0.3s ease 0s;
    }

    .water-set a {
        text-decoration: none;
        transition: all 0.3s ease 0s;
    }

    .water-set p {
        padding: 0 25px;
        font-size: 14px;
        line-height: 1.2em;
        color: #002C8E;
    }

    .water-set h6 {
        color: #aec556;
        font-size: 18px;
        margin: 15px 0 0px;
    }

    .water-set h6 span {
        text-decoration: line-through;
    }

    .water-set a .sale {
        position: absolute;
        left: auto;
        top: 10px;
        right: 10px;
        font-size: 14px;
        font-weight: 700;
        display: block;
        margin: 0;
        padding: 0;
        width: 50px;
        height: 50px;
        line-height: 50px;
        text-align: center;
        min-height: initial;
        text-transform: uppercase;
        background: #21b6ff;
        color: #fff;
        font-weight: 600;
        border-radius: 50%;
    }

    .water1 {
        max-width: 100% !important;
        width: auto;
        margin: 0 auto 1em;
    }

    .cart-btn {
        border-radius: 32px;
        background-clip: padding-box;
        transition: all .3s ease;
        font-size: 15px;
        line-height: 1.9em;
        padding: 12px 40px;
        font-weight: 600;
        margin-bottom: 25px;
        min-width: 180px;
        border: 0;
        color: #fff;
        background: #21b6ff;
    }

    .cart-btn:hover {
        color: #fff;
        background-color: #002C8E;
    }

    .all-product {
        margin: 0 auto;
        text-align: center;
        margin-top: 32px;
    }

    .all-product a {
        border-color: #002c8f;
        background-color: #002c8f;
        color: #fff;
        font-size: 13px;
        padding: 5px 26px;
        line-height: 1.6em;
        min-width: 100px;
        border-radius: 32px;
        font-weight: 600;
        transition: all .3s ease;

    }

    .all-product a:hover {
        color: #fff;
        background-color: #AEC556;
        border-color: #AEC556;
    }

    .free-bg {
        background-color: #002C8E;
    }

    .free-bg img {
        height: auto;
    }

    .free-tag img {
        display: block;
        position: absolute;
        top: 65px;
        right: 60px;
    }

    h2 {
        font-size: 60px;
        margin: 0 0 16px;
        color: #1FB6FF;
        font-family: 'Merriweather';
    }

    .service {
        color: #fff;
    }

    .header p {
        font-size: 18px;
        margin: 0 0 35px;
        line-height: 28px;
        color: #fff;

    }

    .hour {
        color: #1FB6FF;
    }

    .check {
        margin-bottom: 35px;
    }

    .check ul {
        list-style: none;
        padding-left: 30px;
    }

    .check ul li {
        margin-bottom: 15px;
    }

    .check ul li span {
        color: #21b6ff;
        font-size: 20px;
        font-weight: 700;
        line-height: 28px;

    }

    .check ul li i {
        color: #aec556;
        display: inline-block;
        font-size: 18px;
        text-rendering: auto;
        font-weight: 600;
        position: absolute;
        margin: 6px 0 0 -30px;
    }

    .blue-bg {
        background-color: #21b6ff;
        padding-left: 120px;
        padding-right: 120px;
        padding-top: 100px;
        padding-bottom: 30px;
    }

    .border-inner {
        border-right: 1px solid rgba(255, 255, 255, .25);
    }

    .dark-blue {
        color: #002C8E;
    }

    .testimonial-bg {
        background-image: url('/images/testimonials.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        z-index: 1;
        background-position: 50% 0;
        margin-top: 100px;
        position: relative;
    }

    .testimonial-bg:after {
        position: absolute;
        background: #112c91;
        opacity: .85;
        content: "";
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: -1;
        width: 100%;
        height: 100%;
    }

    .swiper-container {
        height: 440px;
    }

    .swiper-slide {
        height: 100%;
    }

    .swiper-button-prev {
        left: 0;
    }

    .swiper-button-next {
        right: 0;
    }

    .swiper-button-prev,
    .swiper-button-next {
        top: 55%;
        width: 100px;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 20px;
        font-weight: bolder;
        background: #1FB6FF;
        color: #fff;
        transition: background .8s ease;
        margin: 0;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        line-height: 80px !important;
        text-align: center;
        top: 50%;
        transform: translateY(-50%);
        z-index: 3;
    }

    .testimonials .inner-content {
        margin-left: 10%;
        margin-right: 10%;
    }

    .inner-content {
        text-align: center;
        position: relative;
        border: 0;
        background: #fff;
        color: #112c91;
        padding: 70px 50px 30px;
        margin: 15px;
        -webkit-border-radius: 20px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 20px;
        -moz-background-clip: padding;
        border-radius: 20px;
        background-clip: padding-box;
        margin-bottom: 20px;
        z-index: 2;
    }

    .inner-data:hover .photo img {
        transition: all 0.3s ease-in;
        transform: scale(1.1);
    }

    .inner-content::before {
        content: " ";
        position: absolute;
        width: 98%;
        left: 50%;
        border-radius: 20px;
        transform: translateX(-50%);
        bottom: 5px;
        height: 20px;
        z-index: -1;
        box-shadow: 0 10px 0px rgb(255 255 255 / 30%);
    }

    .inner-content::after {
        content: " ";
        position: absolute;
        bottom: 0;
        border-radius: 20px;
        width: 96%;
        height: 20px;
        box-shadow: 0 10px 0px rgb(255 255 255 / 30%);
        z-index: -3;
        transform: translateX(-50%);
    }

    .top {
        margin: 0 auto;
        left: -75px;
        display: inline-block;
    }

    .top img {
        float: left;
        margin-left: -50px;
        margin-right: 18px;
        max-width: 100px;
        height: auto;
    }

    .top .name {
        white-space: nowrap;
        font-weight: 600;
        font-size: 24px;
        margin: 20px auto 0px;
        color: #112c91;
        font-family: 'Merriweather';
    }

    .top .subheader {
        margin-top: 2px;
        font-size: 15px;
        font-weight: 400;
        text-align: left;
        color: #21b6ff;
    }

    .top .text {
        margin-top: 40px;
        min-height: 200px;
        z-index: 2;
        position: relative;
    }

    .text .quote {
        color: #112c91;
        zoom: 1;
        opacity: .1;
        font-size: 450px;
        z-index: -1;
        display: block;
        position: absolute;
        top: 16%;
        transform: translateY(-50%);
        left: 0;
        right: 0;
        text-align: center;
        height: 100px;
    }

    .text p {
        margin: 20px 0 0;
        font-size: 24px;
        font-style: italic;
        line-height: 1.5em;
        font-weight: bolder;
        display: block;
        z-index: 2;
        position: relative;
        color: #112c91;
    }

    .all-product .lg-blue {
        background-color: #1fb6ff;
        border-color: #1fb6ff;
        color: #fff;
        font-size: 13px;
        padding: 5px 26px;
        line-height: 1.6em;
        min-width: 100px;
        border-radius: 32px;
        font-weight: 600;
        transition: all .3s ease;
    }

    .all-product .lg-dark:hover {
        color: #fff;
        background-color: #002C8D !important;
        border-color: #002C8D !important;
    }

    .inner-data {
        height: 619px;
        box-shadow: 0 0px 35px rgb(17 44 145 / 10%);
        margin-top: 35px;
        transition: all .3s ease;
        border-radius: 20px;
        margin-bottom: 30px;
    }

    .photo {
        overflow: hidden;
        display: block;
        text-align: left;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .photo img {
        transition: all .3s ease-in;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        max-width: 1370;
    }

    .posts {
        padding: 35px 30px 30px;
        color: #112c91;
    }

    .posts a {
        text-decoration: none;
    }

    .posts a ul li {
        color: #002C8D;
    }

    .posts a h4 {
        color: #21b6ff;
        font-size: 28px;
        transition: all 0.3s ease-in;
    }

    .posts a h4:hover {
        color: #002c83;
        transition: all 0.3s ease-in;
    }

    .posts p {
        color: #122B90;
        font-size: 16px;
        font-weight: 900;
        line-height: 1.5rem;
        margin: 0 0 18px;
    }

    .posts ul {
        display: inline-block;
        list-style: none;
        text-align: right;
        padding-right: 0;
        padding-left: 0;
        margin-left: 10px;
    }

    .posts a .date {
        font-size: 14px;
        color: #112c91;
        display: inline;
        font-family: 'Merriweather';
        margin-bottom: 12px;
        margin: -14px 0 30px;
    }

    .posts ul li {
        display: inline;
        text-align: right;
        font-size: 14px;
        margin-left: 10px;
    }

    .icon-fav,
    .icon-comments {
        font-size: 14px;
        font-family: 'Merriweather';
    }

    .icon-fav .fa,
    .icon-comments .fa {
        padding-right: 6px;
        color: #21b6ff;
    }

    .mt8 {
        margin-top: 8px;
    }

    .mt8 a {
        background-color: #002C8D !important;
        border-color: #002C8D !important;
    }

    .mt8:hover a {
        background-color: #1FB6FF !important;
        border-color: #1FB6FF !important;

    }


    .bg-lightblue .container {
        background-color: #1FB6FF;
        border-radius: 20px;
        padding-top: 32px;
        padding-bottom: 32px;
        margin-bottom: -75px;
        z-index: 10;
        position: relative;
        margin-top: 0;
    }

    .form1 {
        position: relative;
        background: 0 0;
        padding: 0;
        max-width: 530px;
    }

    .form1 .input-group {
        position: relative;
        display: table;
        border-collapse: separate;
    }

    .form1 input[type=email] {
        padding: 12px 26px;
        line-height: 1.9em;
        font-size: 14px;
        display: table-cell;
        border: 0 none;
        width: 100%;
        margin: 0 auto;
        background: #fff;
        color: #112c91;
        transition: all .3s ease;
        border-radius: 32px;
    }

    .input-group-btn {
        position: relative;
        display: table-cell;
        width: 1%;
        vertical-align: middle;
    }

    .input-group .btn {
        margin: 0 0 0 -42px;
        margin-top: 0 !important;
        position: relative;
        font-size: 15px;
        padding: 12px 50px !important;
        min-width: 200px;
        line-height: 1.9em;
        border: 0 none;
        border-radius: 32px !important;
        color: #fff;
    }

    .btn-black-filled {
        border-color: #002c8f;
        background-color: #002c8f;
    }

    .btn-black-filled:hover {
        color: #fff;
        background-color: #AEC556;
        border-color: #AEC556;
        transition: all 0.3s ease;
    }

    .input-group-btn:last-child>.btn {
        z-index: 2;
        margin-bottom: 0;
    }

    .pt10 {
        padding-top: 12px;
    }

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

    @media screen and (max-width: 1024px) {
        .nav-item a {
            font-size: 25px;
        }

        .top-img {
            width: 110%;
        }

        .button-responsive {
            padding-top: 50px;
        }

        .col-xl-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .mineral-glass img {
            max-width: 100%;
            vertical-align: top;
            height: auto;
        }

        .water5 {
            width: 100%;
        }

        .dflex {
            padding-bottom: 50px;
        }

        .blue-bg {
            padding: 55px;
        }


        .border-inner {
            border-right: none;
        }

        .bordernone {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .swiper-container {
            height: auto;
        }

        .inner-data {
            height: 680px;
        }

        .col-lg-2 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .total-amount span {
            margin-left: 31px;
        }

        .product-grid4 .add-to-cart {
            font-size: 11px;
        }
    }

    @media screen and (max-width: 768px) {
        .header-text {
            padding-top: 50px;
            font-size: 30px;
        }

        .button-responsive {
            padding-top: 50px;
        }

        .button-responsive .btn {
            min-width: 150px;
        }

        .btn-read,
        .btn-make {
            margin-bottom: 25px;
        }

        .top-img,
        .back-img,
        .mineral-glass,
        .free-bg img {
            display: none;
        }

        .mineral {
            font-size: 36px;
        }

        .calcium,
        .calcium1 {
            text-align: center !important;
        }

        .header-text span {
            font-size: 36px;
        }

        .top-img {
            width: 100%;
        }

        .mineral-glass img {
            width: 100%;
        }

        .back-img {
            top: 296%;
            left: -1%;
            height: 450px;
        }

        .water5 {
            width: 100%;
        }

        .header {
            padding-top: 50px;
        }

        .header h2 {
            font-size: 36px;
        }

        .header p {
            font-size: 16px;
            padding-top: 20px;
        }

        .check ul li span {
            font-size: 16px;
        }

        .blue-bg {
            padding-left: 0;
            padding-right: 0;
        }

        .blue {
            font-size: 18px !important;
            line-height: 28px;
        }

        .border-inner {
            border-right: none;
        }

        .swiper-button-prev,
        .swiper-button-next {
            display: none;
        }

        .testimonials .inner-content {
            margin-left: 0;
            margin-right: 0;
        }

        .inner-content {
            padding: 70px 15px 30px;
            margin: 40px 0px 20px;
            height: auto !important;
        }

        .inner-content::after {
            bottom: 0;
            width: 96%;
            height: 20px;
            z-index: -3;
        }

        .swiper-container {
            height: auto !important;
        }

        .top img {
            float: none;
            margin: 0 auto
        }

        .top .name {
            font-size: 18px;
        }

        .top .subheader {
            text-align: center;
        }

        .text .quote {
            top: 26%;
        }

        .text p {
            font-size: 16px;
        }

        .inner-data {
            height: auto;
        }

        .posts a h4 {
            font-size: 26px;
        }

        .form1 {
            margin: 0 auto;
        }

        .lg-dark {
            margin-bottom: 0 !important;
        }

        .bg-lightblue .container {
            padding: 25px;
        }

        .wrapper {
            text-align: center !important;
        }

        .bg-lightblue h5 {
            font-size: 18px;
            line-height: 24px;
        }


        .col-md-offset-3 {
            margin-left: auto !important;
        }

        .footer-wrapper h2 {
            font-size: 30px;
        }

        .footer-text p {
            font-size: 14px;
            line-height: 1.6;
        }

        .col-md-4 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-md-3 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-md-offset-3 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .water55 {
            display: none;
        }

        .col-sm-12 {
            flex: 0 0 100%;
            max-width: 100%;
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
            left: 14px;
        }

        .input-group-btn {
            display: block;
            width: 100%;
            margin-top: 15px;
        }

        .btn-black-filled {
            margin: auto !important;
        }

        .col-xs-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-md-3 {
            flex: 100%;
            max-width: 100%;
        }

        .col-md-4 {
            flex: 100%;
            max-width: 100%;
        }

        .col-md-offset-3 {
            margin-left: auto !important;
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

<!-- <?php $popup_image = DB::table('popups')->get();
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


<section class="section-bg pb-0 pt-0">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h3 class="text-white header-text font-weight-bold pt150 pb-4">Mineral Water <br> <span class="color">For Everyday</span> </h3>
                <p class="text-white font-small"><i>Vestibulum non nisi tincidunt, pulvinar nibh sed, accumsan dui. In purus dolor, lobortis eget sapien quis.</i></p>
                <div class="pt100 button-responsive">
                    <button class="btn btn-customize btn-read mr-4"><a href="">Read more</a></button>
                    <button class="btn btn-customize btn-make"><a href="">Make order</a></button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <img class="pt-5 top-img" src="/images/water.png" alt="">
            </div>
        </div>
    </div>
</section>

<section class="pt-5 pb-5 mineral-bg">
    <div class="container">
        <div class="spiral-bg text-center">
            <p class="color-blue mb-0">What inside</p>
            <h3 class="mineral">Mineral composition</h3>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 float-left pt50 calcium">
                <h4>Calcium+</h4>
                <h6>5-12 mg/dm<span><sub>3</sub></span> </h6>
                <p class="text-small"><i>Vestibulum non nisi tincidunt, pulvinar nibh sed, accumsan dui. In purus dolor.</i></p>
                <h4>Magnesium</h4>
                <h6>2-5 mg/dm<span><sub>3</sub></span> </h6>
                <p class="text-small"><i>Vestibulum non nisi tincidunt, pulvinar nibh sed, accumsan dui. In purus dolor.</i></p>
                <h4>Sodium</h4>
                <h6>20-25 mg/dm<span><sub>3</sub></span> </h6>
                <p class="text-small"><i>Vestibulum non nisi tincidunt, pulvinar nibh sed, accumsan dui. In purus dolor.</i></p>
            </div>
            <div class="col-sm-6 mineral-glass pt50">
                <img class="front-img" width="540" height="421" src="/images/mineral-glass.png" alt="">
                <img class="back-img" src="/images/glass-water-bg.png" alt="">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 pt50 calcium1">
                <h4>Chlorine</h4>
                <h6>~46 mg/dm<span><sub>3</sub></span> </h6>
                <p class="text-small"><i>Vestibulum non nisi tincidunt, pulvinar nibh sed, accumsan dui. In purus dolor.</i></p>
                <h4>Sourness</h4>
                <h6>6,8-7,3</h6>
                <p class="text-small"><i>Vestibulum non nisi tincidunt, pulvinar nibh sed, accumsan dui. In purus dolor.</i></p>
                <h4>Mineralization</h4>
                <h6>90-140 mg/dm<span><sub>3</sub></span> </h6>
                <p class="text-small"><i>Vestibulum non nisi tincidunt, pulvinar nibh sed, accumsan dui. In purus dolor.</i></p>
            </div>
        </div>
    </div>
    </div>
</section>


<section class="pt100 pb100 choose-bg">
    <div class="container">
        <div class="spiral-bg text-center">
            <p class="color-blue mb-0">Our Products</p>
            <h3 class="mineral">Choose your water</h3>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="water-set">
                    <a href=""><img class="water1" width="220" height="220" src="/images/water1.jpg" alt=""></a>
                    <a href="">
                        <h5>Water set</h5>
                    </a>
                    <p>Duis et aliquam orci. Vivamus augue quam, ...</p>
                    <h6>$9.00 – $19.99</h6>
                    <a class="btn btn-md cart-btn" href=""><i class="fa fa-shopping-cart pr-2"></i>select options</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="water-set">
                    <a href=""><span class="sale">SALE !</span><img class="water1" width="220" height="220" src="/images/water2.jpg" alt=""></a>
                    <a href="">
                        <h5>Lemon+Mineral</h5>
                    </a>
                    <p>Duis et aliquam orci. Vivamus augue quam, ...</p>
                    <h6><span>$7.89</span> $6.99</h6>
                    <a class="btn btn-md cart-btn" href=""><i class="fa fa-shopping-cart pr-2"></i>add to cart</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="water-set">
                    <a href=""><img class="water1" width="220" height="220" src="/images/water3.jpg" alt=""></a>
                    <a href="">
                        <h5>Three bottles of mineral water</h5>
                    </a>
                    <p>Duis et aliquam orci. Vivamus augue quam, ...</p>
                    <h6>$14.00</h6>
                    <a class="btn btn-md cart-btn" href=""><i class="fa fa-shopping-cart pr-2"></i>add to cart</a>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="water-set">
                    <a href=""><img class="water1" width="220" height="220" src="/images/water4.jpg" alt=""></a>
                    <a href="">
                        <h5>Drop of water. Mineral</h5>
                    </a>
                    <p>Duis et aliquam orci. Vivamus augue quam, ...</p>
                    <h6>$6.75</h6>
                    <a class="btn btn-md cart-btn" href=""><i class="fa fa-shopping-cart pr-2"></i>add to cart</a>
                </div>
            </div>
            <div class="all-product">
                <a class="btn bnt-md" href="">all product</a>
            </div>
        </div>
    </div>
</section>

<section class="free-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 water55">
                <img class="pt50 water5" width="550" height="614" src="/images/water5.png" alt="">
                <div class="free-tag">
                    <img width="123" height="122" src="/images/free.png" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="header pt150">
                    <h2>Delivery <span class="service">Service</span></h2>
                    <p>Our delivery service employs more than 100 professional couriers. We will deliver water to your home for <span class="hour">1 hour</span> to anywhere in the city.</p>
                </div>
                <div class="check">
                    <ul>
                        <li><i class="fa fa-check"></i><strong><span>Free Delivery</span></strong></li>
                        <li><i class="fa fa-check"></i><strong><span>7 days a week</span></strong></li>
                        <li><i class="fa fa-check"></i><strong><span>8:00 - 22:00</span></strong></li>
                    </ul>
                </div>
                <div class="pt-3 dflex">
                    <button class="btn btn-customize btn-read mr-4"><a href="">Read more</a></button>
                    <button class="btn btn-customize btn-make"><a href="">Make order</a></button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 border-inner bordernone">
                <div class="inner">
                    <h5 class="blue">Our company was founded in 1965</h5>
                    <h6 class="dark-blue">Aquatiras is ideal for drinking, cooking, sports and even for children. The product is certified in 12 countries.</h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-inner">
                <div class="inner text-center">
                    <img class="pb-3" src="/images/microscope.png" alt="">
                    <h6 class="dark-blue">Full Control</h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-inner">
                <div class="inner text-center">
                    <img class="pb-3" src="/images/flasks.png" alt="">
                    <h6 class="dark-blue">Healthy Consumption</h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 border-inner">
                <div class="inner text-center">
                    <img class="pb-3" src="/images/air-filter.png" alt="">
                    <h6 class="dark-blue">6 Filtration Stages</h6>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6">
                <div class="inner text-center">
                    <img class="pb-3" src="/images/diploma.png" alt="">
                    <h6 class="dark-blue">Quality Certificates</h6>
                </div>
            </div>
        </div>
</section>


<section class="testimonial-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="inner text-center pt-5">
                    <p class="color-blue mb-0">Testimonials</p>
                    <h3 class="mineral text-white">What our clients say</h3>
                </div>
                <div class="swiper-container testimonials">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="inner-content">
                                <div class="top"><img width="100" height="100" src="/images/test1.jpeg" class="rounded-circle" alt="">
                                    <div class="name font-headers color-black">Anastasia Stone</div>
                                    <div class="subheader color-main font-main">Barista</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="text"><span class="quote font-headers">”</span>
                                    <p class="pb-5">Nullam orci dui, dictum et magna sollicitudin, tempor blandit erat. Maecenas suscipit tellus sit amet augue placerat fringilla a id lacus. Fusce tincidunt in leo lacinia condimentum. Maecenas suscipit tellus sit amet augue placerat fringilla a id lacus.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="inner-content">
                                <div class="top"><img width="100" height="100" src="/images/test2.jpeg" class="rounded-circle" alt="">
                                    <div class="name font-headers color-black">Patric James</div>
                                    <div class="subheader color-main font-main">Manager</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="text"><span class="quote font-headers">”</span>
                                    <p class="pb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis at turpis eu faucibus. In dignissim, enim eu ornare aliquet, metus ex tempor neque, sit amet efficitur turpis lorem et odio. Nam congue in orci at facilisis</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="inner-content">
                                <div class="top"><img width="100" height="100" src="/images/test3.jpeg" class="rounded-circle" alt="">
                                    <div class="name font-headers color-black">Steven Rashford</div>
                                    <div class="subheader color-main font-main">Developer</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="text"><span class="quote font-headers">”</span>
                                    <p class="pb-5">Duis et tellus imperdiet, lacinia risus id, tincidunt ipsum. Integer euismod elit vel nibh commodo, at consequat nisl rhoncus. Aliquam tempor lorem odio, non aliquam nunc egestas in. Proin rutrum justo ac lorem pellentesque pretium.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="inner-content">
                                <div class="top"><img width="100" height="100" src="/images/test4.jpeg" class="rounded-circle" alt="">
                                    <div class="name font-headers color-black">Anastasia Stone</div>
                                    <div class="subheader color-main font-main">Administrator</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="text"><span class="quote font-headers">”</span>
                                    <p>Nullam orci dui, dictum et magna sollicitudin, tempor blandit erat. Maecenas suscipit tellus sit amet augue placerat fringilla a id lacus. Fusce tincidunt in leo lacinia condimentum. Maecenas suscipit tellus sit amet augue placerat fringilla a id lacus. Fusce tincidunt in leo lacinia condimentum.</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="inner-content">
                                <div class="top"><img width="100" height="100" src="/images/test5.jpeg" class="rounded-circle" alt="">
                                    <div class="name font-headers color-black">Patrick James</div>
                                    <div class="subheader color-main font-main">Designer</div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="text"><span class="quote font-headers">”</span>
                                    <p class="pb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam facilisis at turpis eu faucibus. In dignissim, enim eu ornare aliquet, metus ex tempor neque, sit amet efficitur turpis lorem et odio. Nam congue in orci at facilisis</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
        <div class="all-product pb-5">
            <a class="btn bnt-md lg-blue mb-5" href="">View more</a>
        </div>
    </div>
</section>

<section class="pt-5 pb-5 mineral-bg">
    <div class="container">
        <div class="spiral-bg text-center">
            <p class="color-blue mb-0">Our Blog</p>
            <h3 class="mineral">Recent posts</h3>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="inner-data">
                    <a class="photo" href=""><img width="370" height="260" src="/images/blog1.jpeg" alt=""></a>
                    <div class="posts">
                        <a href="">
                            <h4>What's in your water?</h4>
                        </a>
                        <p>In efficitur, leo non commodo lacinia, odio metus sodales purus, sed consequat lectus mi in purus. Vivamus vitae metus et nisl egestas sollicitudin. Quisque ...</p>
                        <a class="" href=""><span class="date">September 25, 2017</span>
                            <ul>
                                <li class="icon-fav"><span class="fa fa-eye"></span>2,290</li>
                                <li class="icon-comments"><span class="fa fa-comment-dots"></span>0</li>
                            </ul>
                        </a>
                        <div class="all-product text-left mt-0">
                            <a class="btn bnt-md lg-blue mb-5 lg-dark" href="">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="inner-data">
                    <a class="photo" href=""><img width="370" height="260" src="/images/blog2.jpeg" alt=""></a>
                    <div class="posts">
                        <a href="">
                            <h4>Why do we need to drink water?</h4>
                        </a>
                        <p>Integer maximus accumsan nunc, sit amet tempor lectus facilisis eu. Cras vel elit felis. Vestibulum convallis ipsum id aliquam varius. Etiam nec laoreet ...</p>
                        <a class="" href=""><span class="date">September 25, 2017</span>
                            <ul>
                                <li class="icon-fav"><span class="fa fa-eye"></span>2,290</li>
                                <li class="icon-comments"><span class="fa fa-comment-dots"></span>0</li>
                            </ul>
                        </a>
                        <div class="all-product text-left mt-0">
                            <a class="btn bnt-md lg-blue mb-5 lg-dark" href="">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="inner-data">
                    <a class="photo" href=""><img width="370" height="260" src="/images/blog3.jpeg" alt=""></a>
                    <div class="posts">
                        <a href="">
                            <h4>Drinking Water May Prevent Headaches</h4>
                        </a>
                        <p>Cras mattis cursus tristique. Quisque maximus magna massa. Nulla id rutrum mauris. Donec finibus sit amet odio auctor faucibus. Nam ligula enim, feugiat a ...</p>
                        <a class="" href=""><span class="date">September 25, 2017</span>
                            <ul>
                                <li class="icon-fav"><span class="fa fa-eye"></span>2,290</li>
                                <li class="icon-comments"><span class="fa fa-comment-dots"></span>0</li>
                            </ul>
                        </a>
                        <div class="all-product text-left mt-0">
                            <a class="btn bnt-md lg-blue mb-5 lg-dark" href="">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-product mt8">
            <a class="btn bnt-md lg-blue" href="">View more</a>
        </div>
    </div>
</section>


<section class="pt100 pb100 bg-lightblue">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="wrapper text-right">
                    <div class="text-left d-inline-block">
                        <h5 class="m-0 text-white">SUBSCRIBE</h5>
                        <h5 class="m-0">Weekly Newsletter</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="wrapper pt10">
                    <form class="form1" action="">
                        <div class="input-group">
                            <input type="email" name="email" placeholder="Your email address" required>
                            <span class="input-group-btn">
                                <button class="btn btn-black-filled color-hover-second" type="submit">Subscribe</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



































<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="display: none;">
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
<div class="container mt-5 mb-3" style="display: none;">
    <h3 class="h3">Latest Products
        <a href="/latest-product" class="view-all ml-2"><span>View All</span></a>
    </h3>

    <style>
        .owl-prev,
        .owl-next {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            display: block !important;
            border: 0px solid black;
        }

        .owl-prev {
            left: -20px;
        }

        .owl-next {
            right: -20px;
        }

        .owl-prev i,
        .owl-next i {
            transform: scale(2, 2);
            color: #ccc;
        }

        .owl-prev:focus,
        .owl-next:focus {
            outline: none;
        }
    </style>
    <div class="owl-slider" style="display: none;">
        <div class="owl-carousel latest">

            @foreach($product as $prod)
            <div class="item">
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="add_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="/product-details/{{$prod->id}}">
                                <img class="pic-1 img-responsive" src="images/backend_images/products/small/{{$prod->product_image}}">
                            </a>
                            <?php if ($prod->regular_price > $prod->sale_price) { ?>
                                <span class="product-new-label">
                                    <?php echo 'Sale'; ?>
                                </span>

                                <span class="product-discount-label discountPercent">
                                <?php
                                $percent = round(((($prod->sale_price - $prod->regular_price) / $prod->regular_price) * 100), 1);
                                echo $percent . '% off';
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

                                <span><?php if ($prod->regular_price > $prod->sale_price) { ?>NRs. {{$prod->regular_price}} <?php } ?></span>

                            </div>
                            <div class="row">
                                <div class="cart-product-quantity">
                                    <div id="myDiv">
                                        <input type="hidden" name="product_id" value="{{$prod->id}}" />

                                        <div class="input-group float-right quantity">
                                            <span style="margin-right: 10px;">Qty</span>
                                            <div class="input-group-text" id="decrease" onclick="decreaseValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div>
                                            <input type="number" id="quantity{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly />
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

                                        function increaseValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {

                                            var value = parseInt(document.getElementById('quantity{{$prod->id}}').value, 10);

                                            value = isNaN(value) ? 1 : value;
                                            value++;
                                            document.getElementById('quantity{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('price{{$prod->sale_price}}').value, 10);

                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;

                                            document.getElementById('product-price{{$prod->id}}').value = u_price;
                                        }

                                        function decreaseValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {
                                            var value = parseInt(document.getElementById('quantity{{$prod->id}}').value, 10);
                                            value = isNaN(value) ? 0 : value;
                                            value < 2 ? value = 2 : '';
                                            value--;
                                            document.getElementById('quantity{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('price{{$prod->sale_price}}').value, 10);
                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;
                                            document.getElementById('product-price{{$prod->id}}').value = u_price;
                                        }


                                        var price = '$' + `<span>${p}</span>`;
                                        document.getElementById('product-price{{$prod->id}}').innerHTML = price;
                                    </script>
                                </div>
                            </div>

                            <div class="row mt-2">
                                @if($prod->in_out_stock==0)
                                <button type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>

                                @else
                                <button id="add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                @endif
                                <a class="add-to-cart ml-3" href="#product_viewLatest{{$prod->id}}" data-toggle="modal"><i class="fa fa-eye"></i> QUICK VIEW</a>
                            </div>

                        </div>
                    </div>
                    <script>
                        //-----------------
                        $(document).ready(function() {
                            $('#add-cart{{$prod->id}}').click(function(e) {
                                var url = "/add-cart";
                                id = {
                                    {
                                        $prod - > id
                                    }
                                };
                                var addUrl = url + "/" + id;

                                $.ajax({
                                    url: addUrl,
                                    method: "POST",
                                    cache: false,
                                    data: $('#add_product{{$prod->id}}').serialize(),
                                    success: function(data) {


                                        if (document.getElementById('sidebarNavToggler').clicked == true) {
                                            alert("button was clicked");
                                            $('#sidebarNavToggler').click();
                                            $('#sidebarNavToggler').click();
                                            $('#sidebarNavToggler').click();
                                            $('#sidebarNavToggler').click();
                                        } else {

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


<div id="carouselExampleControls1" class="carousel slide" data-ride="carousel" style="display: none;">
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

<div class="container mt-5 mb-3" style="display: none;">
    <h3 class="h3">Top Products
        <a href="/top-product" class="view-all ml-2"><span>View All</span></a>
    </h3>

    <style>
        .owl-prev,
        .owl-next {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            display: block !important;
            border: 0px solid black;
        }

        .owl-prev {
            left: -20px;
        }

        .owl-next {
            right: -20px;
        }

        .owl-prev i,
        .owl-next i {
            transform: scale(2, 2);
            color: #ccc;
        }

        .owl-prev:focus,
        .owl-next:focus {
            outline: none;
        }
    </style>
    <div class="owl-slider" style="display: none;">
        <div class="owl-carousel latest">

            @foreach($top_product as $prod)
            <div class="item">
                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="Topadd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}

                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="/product-details/{{$prod->id}}">
                                <img class="pic-1 img-responsive" src="images/backend_images/products/small/{{$prod->product_image}}">
                            </a>
                            <?php if ($prod->regular_price > $prod->sale_price) { ?>
                                <span class="product-new-label">
                                    <?php echo 'Sale'; ?>
                                </span>
                                <span class="product-discount-label">
                                <?php
                                $percent = round(((($prod->sale_price - $prod->regular_price) / $prod->regular_price) * 100), 1);
                                echo $percent . '%';
                            } ?>

                                </span>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">{{$prod->product_name}}</a></h3>
                            <div class="price">
                                NRs. {{$prod->sale_price}}

                                <span><?php if ($prod->regular_price > $prod->sale_price) { ?>NRs. {{$prod->regular_price}} <?php } ?></span>

                            </div>
                            <div class="row">
                                <div class="cart-product-quantity">
                                    <div id="myDiv">
                                        <input type="hidden" name="product_id" value="{{$prod->id}}" />

                                        <div class="input-group float-right quantity">
                                            <span style="margin-right: 10px;">Qty</span>
                                            <div class="input-group-text" id="decrease" onclick="decreaseTopValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div>
                                            <input type="number" id="quantityTop{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly />
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

                                        function increaseTopValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {

                                            var value = parseInt(document.getElementById('quantityTop{{$prod->id}}').value, 10);

                                            value = isNaN(value) ? 0 : value;
                                            value++;
                                            document.getElementById('quantityTop{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceTop{{$prod->sale_price}}').value, 10);

                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;

                                            document.getElementById('product-priceTop{{$prod->id}}').value = u_price;
                                        }

                                        function decreaseTopValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {
                                            var value = parseInt(document.getElementById('quantityTop{{$prod->id}}').value, 10);
                                            value = isNaN(value) ? 0 : value;
                                            value < 2 ? value = 2 : '';
                                            value--;
                                            document.getElementById('quantityTop{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceTop{{$prod->sale_price}}').value, 10);
                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;
                                            document.getElementById('product-priceTop{{$prod->id}}').value = u_price;
                                        }


                                        var price = '$' + `<span>${p}</span>`;
                                        document.getElementById('product-priceTop{{$prod->id}}').innerHTML = price;
                                    </script>
                                </div>
                            </div>

                            <div class="row mt-2">
                                @if($prod->in_out_stock==0)
                                <button type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>

                                @else
                                <button id="top-add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                @endif
                                <a class="add-to-cart ml-3" href="#product_viewTop{{$prod->id}}" data-toggle="modal"><i class="fa fa-eye"></i> QUICK VIEW</a>
                            </div>

                        </div>
                    </div>

                    <script>
                        //-----------------
                        $(document).ready(function() {

                            $('#top-add-cart{{$prod->id}}').click(function(e) {

                                var url = "/add-cart";

                                id = {
                                    {
                                        $prod - > id
                                    }
                                };
                                var addUrl = url + "/" + id;

                                $.ajax({
                                    url: addUrl,
                                    method: "POST",
                                    cache: false,
                                    data: $('#Topadd_product{{$prod->id}}').serialize(),
                                    success: function(data) {


                                        if (document.getElementById('sidebarNavToggler').clicked == true) {
                                            alert("button was clicked");
                                            $('#sidebarNavToggler').click();
                                            $('#sidebarNavToggler').click();
                                            $('#sidebarNavToggler').click();
                                            $('#sidebarNavToggler').click();
                                        } else {

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



<div class="container mt-5 mb-3" style="display: none;">
    <h3 class="h3">Featured Products
        <a href="/feature-product" class="view-all ml-2"><span>View All</span></a>
    </h3>

    <style>
        .owl-prev,
        .owl-next {
            width: 15px;
            height: 100px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            display: block !important;
            border: 0px solid black;
        }

        .owl-prev {
            left: -20px;
        }

        .owl-next {
            right: -20px;
        }

        .owl-prev i,
        .owl-next i {
            transform: scale(2, 2);
            color: #ccc;
        }

        .owl-prev:focus,
        .owl-next:focus {
            outline: none;
        }
    </style>
    <div class="owl-slider" style="display:none">
        <div class="owl-carousel latest">

            @foreach($featured_product as $prod)
            <div class="item">

                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="javascript:void(0)" name="add_product" id="Featureadd_product{{$prod->id}}" novalidate="novalidate"> {{ csrf_field() }}
                    <div class="product-grid4">
                        <div class="product-image4">
                            <a href="/product-details/{{$prod->id}}">
                                <img class="pic-1 img-responsive" src="images/backend_images/products/small/{{$prod->product_image}}">
                            </a>
                            <?php if ($prod->regular_price > $prod->sale_price) { ?>
                                <span class="product-new-label">
                                    <?php echo 'Sale'; ?>
                                </span>
                                <span class="product-discount-label">
                                <?php
                                $percent = round(((($prod->sale_price - $prod->regular_price) / $prod->regular_price) * 100), 1);
                                echo $percent . '%';
                            } ?>

                                </span>
                        </div>
                        <div class="product-content">
                            <h3 class="title"><a href="#">{{$prod->product_name}}</a></h3>
                            <div class="price">
                                NRs. {{$prod->sale_price}}

                                <span><?php if ($prod->regular_price > $prod->sale_price) { ?>NRs. {{$prod->regular_price}} <?php } ?></span>

                            </div>
                            <div class="row">
                                <div class="cart-product-quantity">
                                    <div id="myDiv">
                                        <input type="hidden" name="product_id" value="{{$prod->id}}" />

                                        <div class="input-group float-right quantity">
                                            <span style="margin-right: 10px;">Qty</span>
                                            <div class="input-group-text" id="decrease" onclick="decreaseFeatureValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div>
                                            <input type="number" id="quantityFeature{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly />
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

                                        function increaseFeatureValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {

                                            var value = parseInt(document.getElementById('quantityFeature{{$prod->id}}').value, 10);

                                            value = isNaN(value) ? 0 : value;
                                            value++;
                                            document.getElementById('quantityFeature{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceFeature{{$prod->sale_price}}').value, 10);

                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;

                                            document.getElementById('product-priceFeature{{$prod->id}}').value = u_price;
                                        }

                                        function decreaseFeatureValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {
                                            var value = parseInt(document.getElementById('quantityFeature{{$prod->id}}').value, 10);
                                            value = isNaN(value) ? 0 : value;
                                            value < 2 ? value = 2 : '';
                                            value--;
                                            document.getElementById('quantityFeature{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceFeature{{$prod->sale_price}}').value, 10);
                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;
                                            document.getElementById('product-priceFeature{{$prod->id}}').value = u_price;
                                        }


                                        var price = '$' + `<span>${p}</span>`;
                                        document.getElementById('product-priceFeature{{$prod->id}}').innerHTML = price;
                                    </script>
                                </div>
                            </div>

                            <div class="row mt-2">
                                @if($prod->in_out_stock==0)
                                <button type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>

                                @else
                                <button id="feature-add-cart{{$prod->id}}" type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                @endif
                                <a class="add-to-cart ml-3" href="#product_viewFeatured{{$prod->id}}" data-toggle="modal"><i class="fa fa-eye"></i> QUICK VIEW</a>
                            </div>

                        </div>
                    </div>

                    <script>
                        //-----------------
                        $(document).ready(function() {

                            $('#feature-add-cart{{$prod->id}}').click(function(e) {

                                var url = "/add-cart";

                                id = {
                                    {
                                        $prod - > id
                                    }
                                };
                                var addUrl = url + "/" + id;

                                $.ajax({
                                    url: addUrl,
                                    method: "POST",
                                    cache: false,
                                    data: $('#Featureadd_product{{$prod->id}}').serialize(),
                                    success: function(data) {

                                        if (document.getElementById('sidebarNavToggler').clicked == true) {
                                            alert("button was clicked");
                                            $('#sidebarNavToggler').click();
                                            $('#sidebarNavToggler').click();
                                            $('#sidebarNavToggler').click();
                                            $('#sidebarNavToggler').click();
                                        } else {

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

                                <span><?php if ($prod->regular_price > $prod->sale_price) { ?>NRs. {{$prod->regular_price}} <?php } ?></span>

                            </div>
                            <div class="row">
                                <div class="cart-product-quantity">
                                    <div id="myDiv">
                                        <input type="hidden" name="product_id" value="{{$prod->id}}" />

                                        <div class="input-group float-right quantity" style="left:38% !important">
                                            <span style="margin-right: 10px;">Qty</span>
                                            <div class="input-group-text" id="decrease" onclick="decreaseLatestModalValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div>
                                            <input type="number" id="quantityLatestModal{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly />
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

                                        function increaseLatestModalValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {

                                            var value = parseInt(document.getElementById('quantityLatestModal{{$prod->id}}').value, 10);

                                            value = isNaN(value) ? 0 : value;
                                            value++;
                                            document.getElementById('quantityLatestModal{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceLatestModal{{$prod->sale_price}}').value, 10);

                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;

                                            document.getElementById('product-priceLatestModal{{$prod->id}}').value = u_price;
                                        }

                                        function decreaseLatestModalValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {
                                            var value = parseInt(document.getElementById('quantityLatestModal{{$prod->id}}').value, 10);
                                            value = isNaN(value) ? 0 : value;
                                            value < 2 ? value = 2 : '';
                                            value--;
                                            document.getElementById('quantityLatestModal{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceLatestModal{{$prod->sale_price}}').value, 10);
                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;
                                            document.getElementById('product-priceLatestModal{{$prod->id}}').value = u_price;
                                        }


                                        var price = '$' + `<span>${p}</span>`;
                                        document.getElementById('product-priceLatestModal{{$prod->id}}').innerHTML = price;
                                    </script>
                                </div>
                            </div>

                            <div class="row mt-2">
                                @if($prod->in_out_stock==0)
                                <button type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>

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
            $(document).ready(function() {

                $('#quickview-latest-add-cart{{$prod->id}}').click(function(e) {

                    var url = "/add-cart";

                    id = {
                        {
                            $prod - > id
                        }
                    };
                    var addUrl = url + "/" + id;

                    $.ajax({
                        url: addUrl,
                        method: "POST",
                        cache: false,
                        data: $('#QuickviewLatestadd_product{{$prod->id}}').serialize(),
                        success: function(data) {


                            if (document.getElementById('sidebarNavToggler').clicked == true) {
                                alert("button was clicked");
                                $('#sidebarNavToggler').click();

                            } else {

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

                                <span><?php if ($prod->regular_price > $prod->sale_price) { ?>NRs. {{$prod->regular_price}} <?php } ?></span>

                            </div>
                            <div class="row">
                                <div class="cart-product-quantity">
                                    <div id="myDiv">
                                        <input type="hidden" name="product_id" value="{{$prod->id}}" />

                                        <div class="input-group float-right quantity" style="left:38% !important">
                                            <span style="margin-right: 10px;">Qty</span>
                                            <div class="input-group-text" id="decrease" onclick="decreaseTopModalValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div>
                                            <input type="number" id="quantityTopModal{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly />
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

                                        function increaseTopModalValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {

                                            var value = parseInt(document.getElementById('quantityTopModal{{$prod->id}}').value, 10);

                                            value = isNaN(value) ? 0 : value;
                                            value++;
                                            document.getElementById('quantityTopModal{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceTopModal{{$prod->sale_price}}').value, 10);

                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;

                                            document.getElementById('product-priceTopModal{{$prod->id}}').value = u_price;
                                        }

                                        function decreaseTopModalValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {
                                            var value = parseInt(document.getElementById('quantityTopModal{{$prod->id}}').value, 10);
                                            value = isNaN(value) ? 0 : value;
                                            value < 2 ? value = 2 : '';
                                            value--;
                                            document.getElementById('quantityTopModal{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceTopModal{{$prod->sale_price}}').value, 10);
                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;
                                            document.getElementById('product-priceTopModal{{$prod->id}}').value = u_price;
                                        }


                                        var price = '$' + `<span>${p}</span>`;
                                        document.getElementById('product-priceTopModal{{$prod->id}}').innerHTML = price;
                                    </script>
                                </div>
                            </div>

                            <div class="row mt-2">
                                @if($prod->in_out_stock==0)
                                <button type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>

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
            $(document).ready(function() {

                $('#quickview-top-add-cart{{$prod->id}}').click(function(e) {

                    var url = "/add-cart";

                    id = {
                        {
                            $prod - > id
                        }
                    };
                    var addUrl = url + "/" + id;

                    $.ajax({
                        url: addUrl,
                        method: "POST",
                        cache: false,
                        data: $('#QuickviewTopadd_product{{$prod->id}}').serialize(),
                        success: function(data) {


                            if (document.getElementById('sidebarNavToggler').clicked == true) {
                                alert("button was clicked");
                                $('#sidebarNavToggler').click();

                            } else {

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

                                <span><?php if ($prod->regular_price > $prod->sale_price) { ?>NRs. {{$prod->regular_price}} <?php } ?></span>

                            </div>
                            <div class="row">
                                <div class="cart-product-quantity">
                                    <div id="myDiv">
                                        <input type="hidden" name="product_id" value="{{$prod->id}}" />

                                        <div class="input-group float-right quantity" style="left:38% !important">
                                            <span style="margin-right: 10px;">Qty</span>
                                            <div class="input-group-text" id="decrease" onclick="decreaseFeatureModalValue{{$prod->id}}()" value="Decrease Value" style="border-radius: 24px 0 0 24px;">-</div>
                                            <input type="number" id="quantityFeatureModal{{$prod->id}}" name="quantity" value="1" style="text-align: center;border: 1px solid #ccc;" readonly />
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

                                        function increaseFeatureModalValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {

                                            var value = parseInt(document.getElementById('quantityFeatureModal{{$prod->id}}').value, 10);

                                            value = isNaN(value) ? 0 : value;
                                            value++;
                                            document.getElementById('quantityFeatureModal{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceFeatureModal{{$prod->sale_price}}').value, 10);

                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;

                                            document.getElementById('product-priceFeatureModal{{$prod->id}}').value = u_price;
                                        }

                                        function decreaseFeatureModalValue {
                                            {
                                                $prod - > id
                                            }
                                        }() {
                                            var value = parseInt(document.getElementById('quantityFeatureModal{{$prod->id}}').value, 10);
                                            value = isNaN(value) ? 0 : value;
                                            value < 2 ? value = 2 : '';
                                            value--;
                                            document.getElementById('quantityFeatureModal{{$prod->id}}').value = value;
                                            var x = parseInt(document.getElementById('priceFeatureModal{{$prod->sale_price}}').value, 10);
                                            price = '$' + `<span>${x * value}</span>`;
                                            u_price = x * value;
                                            document.getElementById('product-priceFeatureModal{{$prod->id}}').value = u_price;
                                        }


                                        var price = '$' + `<span>${p}</span>`;
                                        document.getElementById('product-priceFeatureModal{{$prod->id}}').innerHTML = price;
                                    </script>
                                </div>
                            </div>

                            <div class="row mt-2">
                                @if($prod->in_out_stock==0)
                                <button type="submit" class="add-to-cart"><i class="fa fa-shopping-cart"></i> Out of Stock</button>

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
            $(document).ready(function() {

                $('#quickview-feature-add-cart{{$prod->id}}').click(function(e) {

                    var url = "/add-cart";

                    id = {
                        {
                            $prod - > id
                        }
                    };
                    var addUrl = url + "/" + id;

                    $.ajax({
                        url: addUrl,
                        method: "POST",
                        cache: false,
                        data: $('#QuickviewFeatureadd_product{{$prod->id}}').serialize(),
                        success: function(data) {


                            if (document.getElementById('sidebarNavToggler').clicked == true) {
                                alert("button was clicked");
                                $('#sidebarNavToggler').click();

                            } else {

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
    <div class="row" style="display: none;">
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

<div class="container-fluid" style="display: none;">
    <div class="row">
        <div class="ml-auto mr-auto">
            <a href="/connect-vendors"><img class="w-100" src="/images/vendor_banner.jpeg" alt=""></a>
        </div>
    </div>
</div>


@include('layouts.frontLayout.footer')


<script>
    const swiper = new Swiper('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        speed: 1000,
        autoplay: {
            delay: 2000,
        },
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });
</script>

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
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
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
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
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