<style>
  .pad {
    padding-top: 50px;
    }

  #siderbar img {
    position: relative;
    background-position: relative;
    background-repeat: no-repeat;
  }
</style>
<!--sidebar-menu-->

<div id="sidebar">
<div class="text-center">
  <a href="/"><img class="pad" src="/images/logo.png" alt=""></a>
</div>
<a href="" class="visible-phone"><i class="icon icon-home"></i>Dashboard</a>
  <ul>
    <li class="active"><a href="{{url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-category') }}">Add Category</a></li>
        <li><a href="{{ url('/admin/view-category') }}">View Categories</a></li>
       
      </ul>
    </li>

      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Product</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-product') }}">Add Product</a></li>
        <li><a href="{{ url('/admin/view-product') }}">View Product</a></li>
       
      </ul>
    </li>

       <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Menu</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-menu') }}">Add Menu</a></li>
        <li><a href="{{ url('/admin/view-menu') }}">View Menu</a></li>
       
      </ul>
    </li>

    <!-- SubMenu Sidebar -->
   <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Sub Menu</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-submenu') }}">Add Sub Menu</a></li>
        <li><a href="{{ url('/admin/view-submenu') }}">View Sub Menu</a></li>
       
      </ul>
    </li>

       <!-- Slider -->
   <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Slider</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/slider/create') }}">Add Slider</a></li>
        <li><a href="{{ url('/slider') }}">View Slider</a></li>
       
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Second Slider</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/secondslider/create') }}">Add Second Slider</a></li>
        <li><a href="{{ url('/secondslider') }}">View Second Slider</a></li>
       
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="{{ url('/orders') }}">Order Details</a></li>
        <li><a href="{{ url('/admin/orders') }}">Manage Orders</a></li>
       
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Min Order</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="/admin/add-order-value">Add Min Order Value</a></li>
        <li><a href="/admin/view-order-value">View Order Values</a></li>
       
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Popup</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="/admin/add-popup">Add Popup</a></li>
        <li><a href="/admin/view-popup">View Popup</a></li>
       
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Sale Product List</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="/admin/view-sale-product">View Sale Product</a></li>
       
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Out of Stock Product List</span> <span class="label label-important">2</span></a>
      <ul>
        <li><a href="/admin/view-outofstock-product">View Out Of Stock Product</a></li>
      </ul>
    </li>
 </ul>
</div>
<!--sidebar-menu-->