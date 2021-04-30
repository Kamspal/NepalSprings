@extends('layouts.adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
  <!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    <div id="search">
      <div class=""><a title="" href="{{
          url('/logout')
        }}"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></div>
    </div>
  </div>
  <!--End-breadcrumbs-->

  <!--Action boxes-->
  <style>
    .nav>li>a {
      color: none !important;
      text-shadow: none !important;
    }

    .navbar-inverse {
      background-color: none !important;
      border-color: none !important;
    }

    .quick-actions li {
      min-width: 30%;
    }

    li button {
      margin-top: 13px;
    }

    .quick-actions li a {
      color: #fff !important;
      display: contents;
      font-size: 18px;
      font-weight: normal;
      align-items: center;
    }

    .quick-actions li:hover,
    .quick-actions-horizontal li:hover {
      background: none;
    }

    .quick-actions li .btn-danger a:hover {
      background: none !important;
    }

    .btn-danger {
      width: 65%;
      padding: 10px;
    }

    li i {
      margin-top: 10px !important;
    }

    .hover:hover {
      background-color: #000 !important;
      color: #fff;
    }

    .bg-black {
      background-color: #28b779;
    }

    @media screen and (max-width:1024px) {
      .quick-actions li a {
        font-size: 14px;
      }
    }

    @media (min-width: 768px) and (max-width: 970px) {
.quick-actions_homepage .quick-actions li {
    min-width: 31.5%;
}

.quick-actions li a {
    font-size: 13px;
}
    }

    @media screen and (max-width: 425px) {
      .quick-actions_homepage {
        margin-top: 25px;
      }

      .mr {
        margin-left: auto !important;
      }

    }
  </style>
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb hover mr" style="margin-left: 178px;"> <a href="/admin/dashboard"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
        <li class="bg-black hover"><a href="{{url('/logout')}}"><i class="icon icon-share-alt"></i><span class="text">Logout</span></a></li>
       
        <li class="bg_lg span3 hover"> <a href="/admin/view-category"> <i class="icon-signal"></i>Categories</a> </li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/add-submenu') }}">Add Sub-Category</a></button></li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/view-submenu') }}">View Sub-Category</a></button></li>
        <br>
        <br>
        <br>
        <br>
        <li class="bg_ly hover"> <a href=""> <i class="icon-inbox"></i>Products </a> </li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/add-product') }}">Add Products</a></button></li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/view-product') }}">View Products</a></button></li>
        <li class="bg_lo hover"> <a href=""> <i class="icon-th"></i> Menus</a> </li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/add-menu') }}">Add Menus</a></button></li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/view-menu') }}">View Menus</a></button></li>
        <li class="bg_ls hover"> <a href=""> <i class="icon-fullscreen"></i> Sub-Menus</a> </li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/add-category') }}">Add Category</a></button></li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/view-category') }}">View Category</a></button></li>
        <li class="bg_lo span3 hover"> <a href=""> <i class="icon-th-list"></i> Sliders</a> </li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/slider/create') }}">Add Sliders</a></button></li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/slider') }}">View Sliders</a></button></li>
        <li class="bg_lo span3 hover"> <a href=""> <i class="icon-th-list"></i> SecondSliders</a> </li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/secondslider/create') }}">Add SecondSliders</a></button></li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/secondslider') }}">View SecondSliders</a></button></li>
        <li class="bg_ls hover"> <a href=""> <i class="icon-tint"></i> Orders</a> </li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/add-order') }}">Add Orders</a></button></li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/view-order') }}">View Orders</a></button></li>
        <li class="bg_lb hover"> <a href=""> <i class="icon-pencil"></i>Order Value</a> </li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/add-order-value') }}">Add Order-Value</a></button></li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/view-order-value') }}">View Order-Value</a></button></li>
        <li class="bg_lg hover"> <a href=""> <i class="icon-calendar"></i> Popups</a> </li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/add-popup') }}">Add Popups</a></button></li>
        <li><button class="btn-md btn-danger"><a href="{{ url('/admin/view-popup') }}">View Popups</a></button></li>

      </ul>
    </div>
    <!--End-Action boxes-->

    <!--Chart-box-->
    <!-- <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Site Analytics</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span9">
              <div class="chart"></div>
            </div>
            <div class="span3">
              <ul class="site-stats">
                <li class="bg_lh"><i class="icon-user"></i> <strong>2540</strong> <small>Total Users</small></li>
                <li class="bg_lh"><i class="icon-plus"></i> <strong>120</strong> <small>New Users </small></li>
                <li class="bg_lh"><i class="icon-shopping-cart"></i> <strong>656</strong> <small>Total Shop</small></li>
                <li class="bg_lh"><i class="icon-tag"></i> <strong>9540</strong> <small>Total Orders</small></li>
                <li class="bg_lh"><i class="icon-repeat"></i> <strong>10</strong> <small>Pending Orders</small></li>
                <li class="bg_lh"><i class="icon-globe"></i> <strong>8540</strong> <small>Online Orders</small></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!--End-Chart-box-->
    <!-- <hr/>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Latest Posts</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('images/backend_images/demo/av1.jpg') }}"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('images/backend_images/demo/av2.jpg') }}"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs and is full of waffle to pad out the comment.</a> </p>
                </div>
              </li>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{ asset('images/backend_images/demo/av4.jpg') }}"> </div>
                <div class="article-post"> <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                  <p><a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad out the comment.</a> </p>
                </div>
              <li>
                <button class="btn btn-warning btn-mini">View All</button>
              </li>
            </ul>
          </div>
        </div>
       
        
      </div>
      
    </div>
  </div>
</div> -->

<footer>

    <!--end-main-container-part-->
    @endsection