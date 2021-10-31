@extends('layouts.adminLayout.admin_navbar')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<style>
    .margin-default {
        padding-top: 110px;
        padding-bottom: 110px;
    }

    .widget-area {
        margin-top: 0;
        margin-bottom: 35px;
        padding-top: 0;
        padding-bottom: 35px;
    }

    .widget-area aside {
        padding: 0 30px 35px;
        margin-bottom: 30px;
        background: #f1f6fb;
        -webkit-border-radius: 20px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 20px;
        -moz-background-clip: padding;
        border-radius: 20px;
        background-clip: padding-box;
    }

    .header-widget {
        padding: 30px 35px 25px;
        margin: 0 -30px 25px;
        font-size: 24px;
        line-height: 1.2em;
        background-color: #112c91;
        color: #fff;
        -webkit-border-top-left-radius: 20px;
        -moz-border-radius-topleft: 20px;
        border-top-left-radius: 20px;
        -webkit-border-top-right-radius: 20px;
        -webkit-background-clip: padding-box;
        -moz-border-radius-topright: 20px;
        -moz-background-clip: padding;
        border-top-right-radius: 20px;
        background-clip: padding-box;
    }

    .widget_shopping_cart_content {
        padding-top: 20px;
    }

    p {
        margin: 0 0 10px;
        font-family: sans-serif;
        color: #002c8f;
    }

    .col-lg-4 {
        width: 33.33333333%;
    }

    .col-lg-8 {
        width: 66.66666667%;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    main,
    menu,
    nav,
    section,
    summary {
        display: block;
    }

    .woocommerce-result-count {
        margin: 0 0 28px;
        float: left;
        font-size: 16px;
        padding: 1em 0;
    }

    .woocommerce-ordering {
        background: 0 0;
        padding: 0;
        margin: 0 5px;
        float: right;
        text-align: center;
    }

    .select-wrap,
    .select-wrap:after,
    .select-wrap select {
        transition: all .3s ease;
        color: rgba(0, 0, 0, .8);
        background-color: #ffffff;
    }

    .select-wrap {
        width: 100%;
        position: relative;
        border: 1px solid #f1f6fb;
        background: #fff;
        margin-bottom: 30px;
        border-radius: 20px;
        background-clip: padding-box;
    }

    .select-wrap select:not(*:root) {
        padding: 15px 18px;
    }

    .woocommerce .woocommerce-ordering select {
        vertical-align: top;
    }

    .select-wrap select {
        max-width: 100%;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }

    .select-wrap select {
        background: 0 0 !important;
        border: none;
        width: 99%;
        font-size: 16px;
        font-family: sans-serif;
        padding: 6px 18px;
        padding-right: 3em !important;
    }

    .select-wrap:after {
        content: "\f078";
        zoom: 1;
        filter: alpha(opacity=50);
        -webkit-opacity: .5;
        -moz-opacity: .5;
        opacity: .5;
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        display: block;
        line-height: 1em;
        width: 1em;
        height: 1em;
        text-align: center;
        position: absolute;
        right: 1em;
        top: 50%;
        margin-top: -.5em;
        z-index: 2;
        pointer-events: none;
        cursor: pointer;
    }

    .select-wrap,
    .select-wrap:after,
    .select-wrap select {
        transition: all .3s ease;
        color: rgba(0, 0, 0, .8);
    }

    ul.products {
        margin: 0 -15px;
        padding: 0;
        list-style: none;
    }

    ul.products li.first {
        clear: none;
    }

    .ul.products li.product {
        float: left;
        margin: 0 3.8% 2.992em 0;
        padding: 0;
        position: relative;
        width: 22.05%;
        margin-left: 0;
    }

    ul.products li.product {
        margin: auto;
        width: 33.3%;
        float: left;
        padding: 0 15px 30px;
    }

    ul.products li.product {
        width: 50%;
    }

    ul.products li.product .item {
        padding: 30px 30px 40px;
        -webkit-box-shadow: 0 0px 35px rgb(17 44 145 / 10%);
        -moz-box-shadow: 0 0px 35px rgba(17, 44, 145, .1);
        box-shadow: 0 0px 35px rgb(17 44 145 / 10%);
        text-align: center;
        -webkit-border-radius: 20px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 20px;
        -moz-background-clip: padding;
        border-radius: 20px;
        background-clip: padding-box;
        transition: all .3s ease;
    }

    .woocommerce .products ul li {
        list-style: none;
    }

    .woocommerce ul.products[class*=columns-] li.product>.item,
    .woocommerce-page[class*=columns-] ul.products li.product>.item,
    .woocommerce ul.products li.product>.item,
    .woocommerce-page ul.products li.product>.item {
        padding: 30px 30px 40px;
        -webkit-box-shadow: 0 0px 35px rgb(17 44 145 / 10%);
        -moz-box-shadow: 0 0px 35px rgba(17, 44, 145, .1);
        box-shadow: 0 0px 35px rgb(17 44 145 / 10%);
        text-align: center;
        -webkit-border-radius: 20px;
        -webkit-background-clip: padding-box;
        -moz-border-radius: 20px;
        -moz-background-clip: padding;
        border-radius: 20px;
        background-clip: padding-box;
        transition: all .3s ease;
    }

    .woocommerce ul.products li.product a {
        text-decoration: none;
    }

    .woocommerce ul.products[class*=columns-] li.product .image,
    .woocommerce-page[class*=columns-] ul.products li.product .image,
    .woocommerce ul.products li.product .image,
    .woocommerce-page ul.products li.product .image {
        position: relative;
    }

    ul.products li.product a img {
        max-width: 100% !important;
        width: auto;
        margin: 0 auto 1em;
    }

    .woocommerce ul.products li.product a img {
        width: 100%;
        height: auto;
        display: block;
        margin: 0 0 1em;
        box-shadow: none;
    }

    a img {
        border: 0;
        outline: 0 none;
    }

    h2 {
        font-size: 24px;
        color: #122C90;
    }

    h2.woocommerce-loop-product__title:hover {
        color: #23B6FF
    }

    ul.products li.product:hover .item {
        box-shadow: 0 0px 10px rgb(17 44 145 / 40%);
    }

    .matchHeight:hover a {
        text-decoration: none;
    }

    ul.products li.product h3 {
        text-transform: none;
        text-align: center;
        font-size: 24px;
    }

    ul.products li.product h3 {
        padding: .5em 0;
        margin: 0;
        font-size: 1em;
    }

    ul.products li.product .post_content {
        font-size: 14px;
        line-height: 1.4em;
        margin: 5px 0 15px;
        font-family: sans-serif;
    }

    ul.products li.product .price {
        color: #21b6ff;
        font-size: 24px;
        font-weight: 700;
        display: block;
        margin-bottom: .5rem;
    }

    ul.products li.product .button {
        padding-left: 55px;
        margin-bottom: 0;
        font-size: 14px;
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

    ul.products li.product .button {
        margin-top: 1em;
    }

    .woocommerce ul.products li.product a {
        text-decoration: none;
    }

    .woocommerce ul.products li.product .button:hover {
        color: #fff;
        background-color: #122C90;
    }

    .woocommerce ul.products li.product .button:before {
        display: inline-block;
        font: normal normal normal 14px/1 FontAwesome;
        font-size: inherit;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        font-size: 14px;
        vertical-align: middle;
        content: "\f07a";
        position: absolute;
        top: 50%;
        transform: translate(0, -50%);
        margin-left: -25px;
    }

    .col-md-offset-3 {
        padding-top: 80px;
    }

    .matchHeight {
        background-color: #fff;
    }

    a.button.product_type_simple.add_to_cart_button.ajax_add_to_cart.btn:hover {
        color: #fff;
        background: #122C90;
    }

    @media screen and (max-width: 768px) {

        .woocommerce-ordering {
            display: block;
            float: none;
            clear: both;
        }

        .col-lg-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .col-xl-9 {
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-lg-8 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .woocommerce ul.products li.product {
            width: 48%;
            float: left;
            clear: both;
            margin: 0 0 2.992em;
        }

        ul.products[class*=columns-] li.product:nth-child(2n) {
            float: right;
            clear: none !important;
        }

        .woocommerce-page ul.products li.first {
            clear: none;
        }
    }

    @media screen and (max-width: 425px) {
        ul.products li.product {
            width: 100%;
        }

        .col-md-offset-3 {
            margin-left: 0% !important;
        }

        .widget-area {
            margin-bottom: 0px;
            padding-bottom: 0px;
        }

        .woocommerce-result-count {
            margin-left: 10px;
        }
    }
</style>
<div class="container">
    <div class="inner-page margin-default">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-4 col-xl-pull-9 col-lg-pull-8 col-md-pull-8">
                <div id="content-sidebar" class="content-sidebar woocommerce-sidebar widget-area" role="complementary">
                    <aside id="woocommerce_widget_cart-4" class="widget woocommerce widget_shopping_cart">
                        <h3 class="header-widget">Cart</h3>
                        <div class="widget_shopping_cart_content">
                            <p class="woocommerce-mini-cart__empty-message">No products in the cart.</p>
                        </div>
                    </aside>
                </div>
            </div>
            <div class="col-xl-9 col-xl-push-3 col-lg-8 col-lg-push-4 col-md-8 col-md-push-4 text-page">
                <header class="woocommerce-products-header"></header>
                <div class="woocommerce-notices-wrapper"></div>
                <p class="woocommerce-result-count"> Showing all 8 results</p>
                <form class="woocommerce-ordering" method="get">
                    <div class="select-wrap"><select name="orderby" class="orderby">
                            <option value="menu_order" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price">Sort by price: low to high</option>
                            <option value="price-desc">Sort by price: high to low</option>
                        </select></div> <input type="hidden" name="paged" value="1">
                </form>
                <ul class="products columns-4">
                    <li class="post-2161 product type-product status-publish has-post-thumbnail product_cat-water product_tag-lemon product_tag-water first instock shipping-taxable purchasable product-type-simple">
                        <div class="matchHeight item" style="height: 581px;"> <a href="">
                                <div class="image"> <img width="300" height="300" src="/images/jar1.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" sizes="(max-width: 300px) 100vw, 300px"></div>
                                <h2 class="woocommerce-loop-product__title">Nepal Natural Spring Premium</h2>
                            </a>
                            <div class="post_content entry-content">There are options to view available water test results, communicate with members, view photos, leave reviews, and so much more!</div> <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">NPR</span>2500</span></span> <a href="/shop/?add-to-cart=2161" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart btn" data-product_id="2161" data-product_sku="" aria-label="Add “Bottled lemon water” to your cart" rel="nofollow"> <i class="fa fa-shopping-cart pr-2"></i> Add to cart</a>
                        </div>
                    </li>
                    <li class="post-2163 product type-product status-publish has-post-thumbnail product_cat-water product_tag-soda product_tag-water instock shipping-taxable purchasable product-type-simple">
                        <div class="matchHeight item" style="height: 581px;"> <a href="">
                                <div class="image"> <img width="300" height="300" src="/images/jar.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" sizes="(max-width: 300px) 100vw, 300px"></div>
                                <h2 class="woocommerce-loop-product__title">Nepal Natural Spring</h2>
                            </a>
                            <div class="post_content entry-content">There are options to view available water test results, communicate with members, view photos, leave reviews, and so much more!</div> <span class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">NPR</span>500</span></span> <a href="/shop/?add-to-cart=2163" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart btn" data-product_id="2163" data-product_sku="" aria-label="Add “Bottled sparkling water” to your cart" rel="nofollow"> <i class="fa fa-shopping-cart pr-2"></i> Add to cart</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@include('layouts.frontLayout.footer')

@endsection