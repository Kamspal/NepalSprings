
<!--sidebar-menu-->
<div id="sidebar"><a href="" class="visible-phone"><i class=icon icon-home"></i>Dashboard</a>
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

 </ul>
</div>
<!--sidebar-menu-->