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

<style>
    body {
        font-family: 'Merriweather';
    }

    #nav-wrapper nav.navbar.navbar-transparent-light,
    #nav-wrapper nav.navbar.navbar-transparent {
        position: absolute;
        background: 0 0 !important;
        z-index: 100;
        left: 50%;
        transform: translate(-50%, 0);
        width: 100%;
        border-bottom: 0;
    }

    nav.navbar .container {
        position: relative;
        height: 110px;
        overflow: visible;
    }

    nav.navbar .nav-right+#navbar {
        padding-right: 170px;
    }

    nav.navbar #navbar {
        position: relative;
        padding-left: 300px;
        transition: all .3s ease;
    }

    nav.navbar #navbar ul.navbar-nav {
        float: right;
        margin-top: 20px;
        z-index: 10000;
    }

    .navbar-collapse.collapse {
        display: block !important;
        height: auto !important;
        padding-bottom: 0;
        overflow: visible !important;
    }

    .navbar-nav li,
    .navbar-nav a {
        font-size: 20px;
        transition: none;
        padding: 6px 14px 6px;
        color: #fff;
    }

    nav.navbar .nav-right+#navbar {
        padding-right: 170px;
    }

    #menu-main-menu li a {
        color: #fff !important;
    }

    #menu-main-menu li span {
        display: inline-block;
    }

    header.page-header.header-h1 {
        min-height: 390px;
    }

    header.page-header {
        background: #112c91;
        color: #21b6ff;
        background-attachment: fixed;
        padding: 134px 0 94px;
        margin: 0;
        text-align: left;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .page-header {
        background-image: url('/images/aqua-banner.jpeg') !important;
        border-bottom: 1px solid #eee;
    }

    header.page-header:before {
        background: url('/images/banner.png') 50% 100% repeat-x;
        content: "";
        position: absolute;
        height: 16px;
        left: 0;
        right: 0;
        bottom: -1px;
        z-index: 3;
    }

    header.page-header:after {
        background: #112c91;
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 1;
        width: 100%;
        height: 100%;
        opacity: .55;
    }

    header.page-header .container {
        position: relative;
        z-index: 2;
    }

    h1 {
        font-size: 60px;
        font-family: 'Merriweather';
    }

    header.page-header .breadcrumbs {
        list-style: none;
        margin: 10px 0 5px;
        padding: 0;
    }

    header.page-header .breadcrumbs li {
        display: inline-block;
        margin: 0;
        font-size: 16px;
        font-weight: 900;
        color: #21b6ff;
    }

    ul li a:hover {
        color: #21b6ff;
    }

    header.page-header .breadcrumbs li:not(:last-child):after {
        margin: 4px 7px 0 12px;
        vertical-align: middle;
        padding-bottom: 4px;
        content: "»";
        font-family: 'Merriweather', sans-serif;
        font-weight: 900;
        font-size: 14px;
        color: #fff;
    }

    .navbar-nav li {
        padding-right: 6px;
    }

    .home {
        color: #fff;
    }
</style>

<div id="nav-wrapper">
    <nav class="navbar navbar-transparent navbar-expand-lg">
        <div class="container">
            <div class="col-md-3">
                <a class="navbar-brand" href="/"><img src="/images/nepalsprings-logo.png" alt=""></a>
            </div>
            <!-- <div class="pull-right nav-right">
                <div id="top-search" class="top-search"> <a href="#" id="top-search-ico" class="fa fa-search" aria-hidden="true"></a> <input placeholder="Search" value="" type="text"></div> <a href="http://aquaterias.like-themes.com/cart/" class="shop_table cart" title="View your shopping cart"> <span class="name">Cart</span> <i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="cart-contents header-cart-count count">0</span> </a>
            </div> -->
            <div class="col-md-9">
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
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
            </div>
        </div>
    </nav>
</div>

<header class="page-header  header-h1 ">
    <div class="container">
    @if (Request::path() == ('products'))
        <h1>All Products</h1>
    @endif 
    @if (Request::path() == ('contact-us'))
        <h1>Contact Us</h1>
    @endif
    @if (Request::path() == ('about-us'))
        <h1>About Us</h1>
    @endif
        <ul class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <li class="home"><span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to Home." href="/" class="home"><span property="name">Home</span></a>
                    <meta property="position" content="1">
                </span></li>
                @if (Request::path() == ('products'))
            <li class="archive post-product-archive current-item"><span property="itemListElement" typeof="ListItem"><span property="name">Products</span>
                    <meta property="position" content="2">
                </span></li>
               @endif 
               @if (Request::path() == ('contact-us'))
               <li class="archive post-product-archive current-item"><span property="itemListElement" typeof="ListItem"><span property="name">Contact Us</span>
                    <meta property="position" content="3">
                </span></li>
                @endif
                @if (Request::path() == ('about-us'))
               <li class="archive post-product-archive current-item"><span property="itemListElement" typeof="ListItem"><span property="name">About Us</span>
                    <meta property="position" content="4">
                </span></li>
                @endif
        </ul>
    </div>
</header>


@yield('content')