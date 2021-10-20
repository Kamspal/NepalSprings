@extends('layouts.adminLayout.admin_navbar')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
    .margin-top {
        padding-top: 110px;
    }

    .vc_section[data-vc-full-width]>.vc_row {
        margin-left: 0;
        margin-right: 0;
    }

    .vc_row.vc_row-flex {
        box-sizing: border-box;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
    }

    .vc_col-lg-4 {
        width: 33.33333333%;
    }

    .vc_column_container {
        padding-left: 0;
        padding-right: 0;
    }

    .vc_column_container>.vc_column-inner {
        box-sizing: border-box;
        padding-left: 15px;
        padding-right: 15px;
        width: 100%;
    }

    h4 {
        font-size: 30px !important;
        color: #002C8E;
        font-family: 'Merriweather';
    }

    h5 {
        font-size: 24px;
        color: #002C8E;
        font-family: 'Merriweather';
        margin-bottom: 32px !important;
    }

    p {
        margin: 0 0 10px;
    }

    .wpb_wrapper p {
        color: #002c8f;
        font-size: 18px;
        font-family: sans-serif;
    }

    .vc_custom_1505581880747 {
        margin-bottom: 32px !important;
    }

    .vc_custom_1515710003627 {
        margin-top: 50px !important;
    }

    .social-icons-list {
        list-style: none;
        margin: 14px 0 60px;
        padding: 0;
    }

    .social-icons-list.icon-weight-bold li {
        font-weight: 900;
        text-transform: uppercase;
    }

    .social-icons-list li span.fa {
        color: #21b6ff;
        font-size: 24px;
        width: 48px;
        margin-left: -16px;
        vertical-align: middle;
        text-align: center;
        position: absolute;
    }

    .social-icons-list li .head {
        padding-left: 35px;
        display: inline-block;
    }

    .social-icons-list li {
        font-size: 16px;
        margin: 26px 0 0 !important;
        color: #002c8f;
    }

    .vc_custom_1502236442786 {
        margin-top: 24px !important;
        margin-bottom: 12px !important;
    }

    .heading {
        position: relative;
        margin: 0 0 16px;
    }

    .header {
        color: #112c91;
        font-family: 'Merriweather';
        font-size: 18px;
    }

    .social-big li .fa-facebook {
        background: #4e71a8;
    }

    .social-big li .fa-twitter {
        background: #1cb7eb;
    }

    .social-big li .fa-youtube-play,
    .social-big li .fa-youtube {
        background: #ca3737;
    }

    p {
        margin: 0 0 10px;
    }

    .social-big li .fa-instagram {
        background: #444;
    }

    .ltx-contact-form-7.form-bg-default {
        background: #f1f6fb;
    }

    .vc_custom_1505582392596 {
        margin-bottom: 0px !important;
        padding-top: 45px !important;
        padding-right: 60px !important;
        padding-bottom: 0px !important;
        padding-left: 60px !important;
    }

    .ltx-contact-form-7 {
        border-radius: 20px;
    }

    form label {
        text-align: left;
        display: block;
    }

    label {
        display: inline-block;
        max-width: 100%;
        margin-bottom: 5px;
        font-weight: 700;
        font-size: 16px;
    }

    .wpcf7-form-control-wrap:not(.margin-none) {
        margin-bottom: 24px;
    }

    .wpcf7-form-control-wrap {
        font-weight: 100;
        display: inline-block;
        width: 100%;
    }

    .wpcf7-form-control-wrap {
        position: relative;
    }

    .wpcf7-form-control-wrap input,
    .wpcf7-form-control-wrap textarea {
        width: 100%;
        font-size: 14px;
        display: block;
        margin: 0 auto;
        background: #fff;
        color: #112c91;
        padding: 22px 30px;
        border: 1px solid rgba(17, 44, 145, .15);
        -webkit-border-radius: 32px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 32px;
        -moz-background-clip: padding;
        border-radius: 32px;
        background-clip: padding-box;
        transition: all .3s ease;
    }

    input[type=submit] {
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

    .wpcf7-textarea {
        height: 140px;
    }

    .col-md-offset-3 {
        padding-top: 80px;
    }

    .heading.heading-large h3 {
        margin: 60px 0 20px;
        font-size: 60px;
        margin: 0 0 -4px !important;
    }

    .vc_column_container>.vc_column-inner {
        box-sizing: border-box;
        padding-left: 15px;
        padding-right: 15px;
        width: 100%;
    }

    .vc_col-sm-6 {
        width: 50%;
    }

    .wpb_button,
    .wpb_content_element,
    ul.wpb_thumbnails-fluid>li {
        margin-bottom: 35px;
    }

    .heading.color-main .header {
        color: #21b6ff;
    }

    .ul-arrow li {
        list-style-type: none;
        margin: 0 0 11px;
    }

    .ul-arrow li:before {
        content: "\f105";
        display: block;
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-weight: 100;
        position: absolute;
        margin: 4px 0 0 -16px;
    }

    ul.disc,
    ul.check {
        list-style: none;
        margin-bottom: 30px;
        padding-left: 30px;
    }

    ul.ul-arrow li:before,
    ul.arrow li:before,
    ul.disc li:before,
    ul.check li:before {
        color: #aec556;
    }

    .black {
        color: #112c91;
        font-size: 18px;
    }

    .black:hover {
        text-decoration: none;
    }

    .vc_col-sm-4 {
        width: 33.33333333%;
        float: left;
    }

    .btn-wrap a {
        font-size: 14px;
        color: #fff;
        background-color: #21b6ff;
        margin: 0 0 25px;
        padding: 12px 36px;
        border-radius: 32px;
        transition: all .3s ease;
        line-height: 1.9em;
        font-weight: 600;
        min-width: 180px;
        position: relative;
        overflow: hidden;
        display: inline-block;
        box-shadow: 0 10px 30px rgb(33 182 255 / 30%);
    }

    .btn-wrap a:hover {
        color: #002c8f;
        text-decoration: none;
        background: 0 0;
    }

    .social-big li a:hover {
        color: #fff;
        background: #AEC556;
    }

    @media screen and (max-width: 1024px) {
        iframe {
            width: 1024px;
        }

        .vc_col-lg-4 {
            width: 50%;
        }

        .vc_col-sm-6 {
            width: 100%;
        }

        .vc_col-md-12 {
            width: 100%;
        }

        .heading.heading-large h3 {
            font-size: 55px;
        }
    }

    @media screen and (max-width: 768px) {
        iframe {
            width: 768px;
        }

        .vc_col-lg-4 {
            width: 100%;
        }
    }

    @media screen and (max-width: 425px) {
        iframe {
            width: 425px;
        }

        .social-icons-list li {
            font-size: 15px;
        }

        .mobile-response {
            text-align: center;
        }

        .mobile-response input {
            min-width: 150px;
        }

        .col-md-offset-3 {
            margin-left: 0 !important;
        }

        .heading.heading-large h3 {
            font-size: 30px;
        }

        .wpb_wrapper p {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 375px) {
        iframe {
            width: 375px;
        }

        .social-icons-list li {
            font-size: 13px;
        }
    }

    @media screen and (max-width: 320px) {
        iframe {
            width: 320px;
        }

        .header {
            font-size: 24px !important;
        }

        .social-icons-list li {
            font-size: 11px;
        }

        .vc_col-sm-4 {
            width: 100%;
        }

        .wpcf7-form-control-wrap input,
        .wpcf7-form-control-wrap textarea {
            padding: 0px;
        }

        .wpcf7-textarea {
            height: 80px;
        }

        .mobile-response input {
            min-width: 130px;
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
                            <section data-vc-full-width="true" data-vc-full-width-init="true" class="vc_section" style="position: relative; box-sizing: border-box;`z">
                                <div class="vc_row wpb_row vc_row-fluid vc_row-o-content-top vc_row-flex">
                                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-6">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="heading  transform-header-up   vc_custom_1505581880747" id="like_sc_header_526854276">
                                                    <h4 class="header">Company Address</h4>
                                                </div>
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper central">
                                                        <p>Corporate Address:
                                                            <br>
                                                            2nd Floor, House No. 47, Ranjana Galli, New Road,
                                                            <br>
                                                            Kathmandu, Bagmati, NEPAL
                                                            <br>
                                                            Ward No.: 24
                                                            <br>
                                                            Pin: 44600
                                                            <br>
                                                            Landline: +977-01-4240940
                                                            <br>
                                                            Mobile: +977-9851171230 (What’s App, Viber, We Chat)
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="align-default ">
                                                    <ul class="social-icons-list   vc_custom_1515710003627 icon-weight-bold" id="like_sc_header_31554914">
                                                        <li class=""><span class="fa fa-mobile"></span><span class="head">+977-9851171230</span></li>
                                                        <li class=""><span class="fa fa-phone"></span><span class="head">+977-01-4240940 (Corp.Office)</span></li>
                                                        <li class=""><span class="fa fa-envelope"></span><span class="head">info@nepalnaturalspring.com, whiteline.nepal@gmail.com,
                                                                sachidanand_saraswati@yahoo.com</span></li>
                                                    </ul>
                                                </div>
                                                <div class="heading  color-black transform-header-up   vc_custom_1502236442786" id="like_sc_header_561926435">
                                                    <h6 class="header">Social:</h6>
                                                </div>
                                                <div class="align-default ">
                                                    <ul class="social-big icon-weight-bold" id="like_sc_header_1943836605">
                                                        <li><a href="#" class="fa fa-facebook"></a></li>
                                                        <li><a href="#" class="fa fa-twitter"></a></li>
                                                        <li><a href="#" class="fa fa-youtube"></a></li>
                                                        <li><a href="#" class="fa fa-instagram"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-6 vc_col-has-fill">
                                        <div class="vc_column-inner vc_custom_1518819610829">
                                            <div class="wpb_wrapper">
                                                <div class="heading  head-subheader color-black subcolor-main transform-header-up   vc_custom_1518819577358" id="like_sc_header_1250176998">
                                                    <h5 class="header">Opening Hours</h5>
                                                </div>
                                                <div class="wpb_text_column wpb_content_element ">
                                                    <div class="wpb_wrapper">
                                                        <p><strong>Monday:</strong> 9:00 – 19:00<br> <strong>Tuesday:</strong> 9:00 – 19:00<br> <strong>Wednesday:</strong> 9:00 – 19:00<br> <strong>Thursday:</strong> 9:00 – 19:00<br> <strong>Friday:</strong> 9:00 – 19:00<br> <strong>Saturday:</strong> 11:00 – 16:00<br> <strong>Sunday:</strong> CLOSED</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wpb_column vc_column_container vc_col-sm-12 vc_col-lg-4 vc_col-md-12">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="ltx-contact-form-7 transform-default form-default form-bg-default form-style-default form-btn-default form-btn-default form-padding-none    vc_custom_1505582392596" id="like_sc_contact_form_7_125674038">
                                                    <div role="form" class="wpcf7" id="wpcf7-f1551-p25-o1" lang="en-US" dir="ltr">
                                                        <div class="screen-reader-response"></div>
                                                        <form action="{{}}" method="post" class="wpcf7-form" novalidate="novalidate">
                                                            @csrf
                                                            <p><label> Your Name<br> <span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" required></span> </label></p>
                                                            <p><label> Your Email<br> <span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" required></span> </label></p>
                                                            <p><label> Your Message<br> <span class="wpcf7-form-control-wrap your-message"><textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false"></textarea></span> </label></p>
                                                            <p class="mobile-response"><input type="submit" value="Submit" class="wpcf7-form-control wpcf7-submit"><span class="ajax-loader"></span></p>
                                                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row wpb_row vc_row-fluid">
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner">
                                            <div class="wpb_wrapper">
                                                <div class="vc_empty_space" style="height: 100px"><span class="vc_empty_space_inner"></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="heading  heading-large align-left color-black transform-default" id="like_sc_header_2020351711">
                                                <h3 class="header">Sale and delivery points</h3>
                                            </div>
                                            <div class="wpb_text_column wpb_content_element ">
                                                <div class="wpb_wrapper">
                                                    <p style="text-align: left;">Sed sagittis sodales lobortis. Curabitur in eleifend turpis, id vehicula odio. Donec pulvinartellus eget magna aliquet ultricies. Praesent gravida hendreritex, nec eleifend semconvallis vitae.</p>
                                                </div>
                                            </div>
                                            <div class="heading  align-left color-main transform-default   vc_custom_1515710276993" id="like_sc_header_565333355">
                                                <h4 class="header">Where can I find</h4>
                                            </div>
                                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="wpb_text_column wpb_content_element  vc_custom_1507474369281">
                                                                <div class="wpb_wrapper">
                                                                    <ul class="ul-arrow">
                                                                        <li style="text-align: left;"><strong><a class="black" href="#">Canada</a></strong> (23)</li>
                                                                        <li style="text-align: left;"><strong><a class="black" href="#">USA</a></strong> (67)</li>
                                                                        <li style="text-align: left;"><strong><a class="black" href="#">Mexico</a></strong> (10)</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="wpb_text_column wpb_content_element ">
                                                                <div class="wpb_wrapper">
                                                                    <ul class="ul-arrow">
                                                                        <li style="text-align: left;"><strong><a class="black" href="#">Brazil</a></strong> (96)</li>
                                                                        <li style="text-align: left;"><strong><a class="black" href="#">Argentina</a></strong> (43)</li>
                                                                        <li style="text-align: left;"><strong><a class="black" href="#">Europe</a></strong> (379)</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="wpb_column vc_column_container vc_col-sm-4">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="wpb_text_column wpb_content_element ">
                                                                <div class="wpb_wrapper">
                                                                    <ul class="ul-arrow">
                                                                        <li style="text-align: left;"><strong><a class="black" href="#">Russia</a></strong> (2)</li>
                                                                        <li style="text-align: left;"><strong><a class="black" href="#">Asia</a></strong> (26)</li>
                                                                        <li style="text-align: left;"><strong><a class="black" href="#">Australia</a></strong> (71)</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                                    <div class="vc_column-inner">
                                                        <div class="wpb_wrapper">
                                                            <div class="btn-wrap"><a href="#" class="btn  btn-default transform-default color-text-default color-hover-default" id="like_sc_button_712946339">View all points</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-6">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_single_image wpb_content_element vc_align_left">
                                                <figure class="wpb_wrapper vc_figure">
                                                    <div class="vc_single_image-wrapper   vc_box_border_grey"></div>
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="pb-5">
    <div class="container-fluid p-0">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1766.2138032520563!2d85.3092873581164!3d27.704080795698303!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb185597bd7519%3A0x3f479baf6276272c!2sRanjana%20Galli%2047%2C%20Kathmandu%2044600!5e0!3m2!1sen!2snp!4v1626953080066!5m2!1sen!2snp" width="1440" height="450" style="border:0;top:50px;margin-bottom:150px" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>

@include('layouts.frontLayout.footer')

@endsection