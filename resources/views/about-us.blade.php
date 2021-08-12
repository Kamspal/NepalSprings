@extends('layouts.adminLayout.admin_navbar')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
    .subheader {
        color: #21b6ff;
    }

    .vc_section[data-vc-full-width] {
        -webkit-transition: opacity .5s ease;
        -o-transition: opacity .5s ease;
        transition: opacity .5s ease;
        overflow: hidden;
    }

    .bg-color-theme_color.vc_row-fluid,
    .bg-color-theme_color.vc_section {
        background-color: #21b6ff;
    }

    .vc_section[data-vc-full-width]>.vc_row {
        margin-left: 0;
        margin-right: 0;
    }

    .vc_column_container {
        padding-left: 0;
        padding-right: 0;
    }

    .vc_col-sm-6 {
        width: 50%;
        float: left;
    }

    .vc_column_container>.vc_column-inner {
        box-sizing: border-box;
        padding-left: 15px;
        padding-right: 15px;
        width: 100%;
    }

    .heading.head-subheader {
        margin: 64px 0 16px;
        background-position: 50% 100%;
        background-repeat: no-repeat;
    }

    .vc_custom_1515771135702 {
        margin-top: 0px !important;
    }

    .heading {
        position: relative;
        margin: 0 0 16px;
    }

    .heading.head-subheader .subheader {
        margin-bottom: 4px;
    }

    .heading h3,
    .heading h6 {
        z-index: 3;
        position: relative;
        margin: 0;
    }

    .font-main {
        font-family: 'Open Sans';
    }

    h3,
    .h3 {
        margin: 60px 0 20px;
        font-size: 48px;
    }

    h6,
    .h6 {
        margin: 60px 0 20px;
        font-weight: 600;
        font-size: 18px;
        line-height: 26px;
    }

    .heading.color-black .header {
        color: #112c91;
    }

    .wpb_button,
    .wpb_content_element,
    ul.wpb_thumbnails-fluid>li {
        margin-bottom: 35px;
    }

    .comment-text .text-large,
    .text-page .text-large {
        font-size: 24px;
        font-weight: 400;
        line-height: 36px;
        font-family: 'Merriweather';
        color: #21b6ff;
    }

    .comment-text .text-small,
    .text-page .text-small {
        font-size: 18px;
        line-height: 26px;
        font-family: 'Open Sans';
        color: #333;
        font-weight: 400;
    }

    p {
        margin: 0 0 10px;
    }

    .wpb_single_image.vc_align_left {
        text-align: left;
    }

    .wpb_single_image .vc_figure {
        display: inline-block;
        vertical-align: top;
        margin: 0;
        max-width: 100%;
    }

    .wpb_single_image .vc_single_image-wrapper.vc_box_shadow {
        box-shadow: 0 0 0 0 !important;
    }

    .wpb_single_image .vc_single_image-wrapper {
        display: inline-block;
        vertical-align: top;
        max-width: 100%;
    }

    .wpb_single_image .vc_single_image-wrapper.vc_box_shadow img {
        box-shadow: 20px 20px 0 #21b6ff !important;
        border-radius: 20px !important;
    }

    .wpb_single_image img {
        height: auto;
        max-width: 100%;
        vertical-align: top;
    }

    .btn-default {
        -webkit-border-radius: 32px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 32px;
        -moz-background-clip: padding;
        border-radius: 32px;
        background-clip: padding-box;
        transition: all .3s ease;
        font-size: 14px;
        line-height: 1.9em;
        padding: 12px 40px;
        font-weight: 600;
        margin-bottom: 25px;
        min-width: 180px;
        border: 0;
        color: #fff;
        background: #21b6ff;
        -webkit-box-shadow: 0 10px 30px rgb(33 182 255 / 30%);
        -moz-box-shadow: 0 10px 30px rgba(33, 182, 255, .3);
        box-shadow: 0 10px 30px rgb(33 182 255 / 30%);
        position: relative;
        overflow: hidden;
        display: inline-block;
    }

    .btn-default:hover {
        background: #122C90;
        color: #fff;
    }

    .col-md-offset-3 {
        padding-top: 80px;
    }

    .blue-bg {
        background-color: #21b6ff;
        padding-left: 120px;
        padding-right: 120px;
        padding-top: 100px;
        padding-bottom: 130px;
    }

    .border-inner {
        border-right: 1px solid rgba(255, 255, 255, .25);
    }

    .dark-blue {
        color: #002C8E;
    }

    .mineral-bg {
        background-color: #fff;
        padding-bottom: 100px !important;
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

    .mineral-glass {
        vertical-align: top;
        margin: 0;
        height: auto;
        max-width: 100%;
    }

    .color-blue {
        color: #1FB6FF;
        font-size: 18px;
    }

    .mineral {
        color: #002C8E;
        font-size: 48px;
        font-family: 'Merriweather';
    }

    .pt50 {
        padding-top: 70px;
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

    .front-img {
        position: relative;
        z-index: 99999;
    }

    .back-img {
        position: absolute;
        top: 10%;
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

    .pb100 {
        padding-bottom: 150px;
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

    .pt10 {
        padding-top: 12px;
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

    .input-group input {
        width: 42px;
    }

    .input-group-btn {
        position: relative;
        display: table-cell;
        width: 1%;
        vertical-align: middle;
    }

    .input-group-btn:last-child>.btn {
        z-index: 2;
        margin-bottom: 0;
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

    @media screen and (max-width: 425px) {
        .vc_col-sm-6 {
            width: 100%;
        }

        .blue {
            padding-top: 20px;
        }

        .blue-bg {
            padding: 0;
        }

        .col-md-offset-3 {
            margin-left: 0% !important;
        }

        h3,
        .h3 {
            font-size: 36px;
        }

        .comment-text .text-large,
        .text-page .text-large {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 320px) {

        h3,
        .h3 {
            font-size: 25px;
        }

        h4,
        .h4 {
            font-size: 22px;
        }

        .blue {
            font-size: 16px !important;
        }

        h6,
        .h6 {
            font-size: 14px;
        }

        .mineral {
            font-size: 26px !important;
        }
    }
</style>

<div class="container">
    <div class="margin-top">
        <div class="inner-page text-page">
            <div class="row">
                <div class="col-md-12 text-page">
                    <article class="post-25 page type-page status-publish hentry">
                        <div class="entry-content clear-fix">
                            <section style="position: relative; box-sizing: border-box;">
                                <div class="vc_row wpb_row vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="es-resp">
                                                    <div class="visible-xl" style="height: 5px;"></div>
                                                    <div class="hidden-xl hidden-sm hidden-md hidden-ms hidden-xs" style="height: 64px;"></div>
                                                    <div class="visible-xs" style="height: 64px;"></div>
                                                </div>
                                                <div class="heading  head-subheader align-left color-black subcolor-main transform-default   vc_custom_1515771135702" id="like_sc_header_1074572928">
                                                    <h6 class="subheader font-main">About us</h6>
                                                    <h3 class="header">About our company</h3>
                                                </div>
                                                <div class="ltx-content-width col-align-left" style="max-width: 680px">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <h4><span class="color-main text-large">“National Food And Beverage Pvt. Ltd.” is a newly established company in Year 2021 at the
                                                                    pick time of SARS-COVID-19 Pandemic period. The registration number is ………………………….. and
                                                                    licence number…………………………………. are of the company.</span></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ltx-content-width col-align-left" style="max-width: 680px">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p><span class="text-small">The founder and Chairman of this company is Mr. Sachidanand Kumhal, a Business
                                                                    Entrepreneur, Computer Engineer and Managing Director of AMVI ENTERPRISES Company.</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ltx-content-width col-align-left" style="max-width: 680px">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p><span class="text-small">The mission of our company is “We want to serve the people of NEPAL with our Highly
                                                                    Hygienic Drinking Water”. By which we can cure the health of our country people. “Healthy People,
                                                                    Healthy Country”. We want healthy people in our country to build a healthy Nation.</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ltx-content-width col-align-left" style="max-width: 680px">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p><span class="text-small">Our vision is to become fastest growing Number 1 Company of RO Water in Nepal. We want
                                                                    to reach 90% population of Nepal with our product. The targeted time will be within Year 2025.</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ltx-content-width col-align-left" style="max-width: 680px">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <p><span class="text-small">Currently, we have two types of product services of 20 Litter Jar Water.
                                                                    <p>1. Nepal Spring Premium </p>
                                                                    <p>2. Nepal Spring</p>
                                                                    <p>1. Nepal Spring Premium: Is the high quality product of RO Water. This contains added minerals in
                                                                        water and with high quality of packing.</p>
                                                                    <p>2. Nepal Spring: Is the moderated quality product of RO Water. This contains moderated minerals
                                                                        in water and good quality of packing.</p>
                                                                </span></p>
                                                            <p>Note: We provide free delivers service to your destination point.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="es-resp">
                                                    <div class="visible-xl" style="height: 40px;"></div>
                                                    <div class="visible-xs" style="height: 64px;"></div>
                                                </div>
                                                <div class="btn-wrap align-left"><a href="" class="btn  btn-default transform-default color-text-white color-hover-black align-left" id="like_sc_button_1283429037">view products</a></div>
                                                <div class="es-resp">
                                                    <div class="visible-xs" style="height: 64px;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-6">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="es-resp">
                                                    <div class="visible-xl" style="height: 25px;"></div>
                                                    <div class="hidden-xl hidden-sm hidden-md hidden-ms hidden-xs" style="height: 64px;"></div>
                                                    <div class="visible-xs" style="height: 64px;"></div>
                                                </div>
                                                <div class="wpb_single_image wpb_content_element vc_align_left">
                                                    <figure class="wpb_wrapper vc_figure">
                                                        <div class="vc_single_image-wrapper vc_box_shadow  vc_box_border_grey"><img width="1400" height="933" src="http://aquaterias.like-themes.com/wp-content/uploads/2017/09/blog16.jpg" class="vc_single_image-img attachment-full" alt="" srcset="http://aquaterias.like-themes.com/wp-content/uploads/2017/09/blog16.jpg 1400w, http://aquaterias.like-themes.com/wp-content/uploads/2017/09/blog16-300x200.jpg 300w, http://aquaterias.like-themes.com/wp-content/uploads/2017/09/blog16-768x512.jpg 768w, http://aquaterias.like-themes.com/wp-content/uploads/2017/09/blog16-1024x682.jpg 1024w, http://aquaterias.like-themes.com/wp-content/uploads/2017/09/blog16-600x400.jpg 600w, http://aquaterias.like-themes.com/wp-content/uploads/2017/09/blog16-272x182.jpg 272w" sizes="(max-width: 1400px) 100vw, 1400px"></div>
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blue-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 border-inner bordernone">
                <div class="inner">
                    <h5 class="blue">Our company was founded in 2021</h5>
                    <h6 class="dark-blue">This Company deals in the field of “Food and Beverage”. We are the fastest growing
                        company of food and beverage in Nepal. In this episode, we have established a new RO Water
                        Treatment Plant in Gawaldha, Chalnakhel, Kathmandu to serve the people of NEPAL.</h6>
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

@include('layouts.frontLayout.footer')

@endsection