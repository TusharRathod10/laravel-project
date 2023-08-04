<!-- Sidebar  -->
<nav id="sidebar">
    <div class="sidebar_blog_1">
        <div class="sidebar-header">
            <div class="logo_section">
                <a href="index.html"><img class="logo_icon img-responsive"
                        src="{{ asset('admin/images/logo/logo_icon.png') }}" alt="#" /></a>
            </div>
        </div>
        <div class="sidebar_user_info">
            <div class="icon_setting"></div>
            <div class="user_profle_side">
                <div class="user_img"><img class="img-responsive"
                        src="{{ asset('admin/images/layout_img/user_img.jpg') }}" alt="#" /></div>
                <div class="user_info">
                    <h6>{{ Auth::user()->name }}</h6>
                    <p><span class="online_animation"></span> Online</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar_blog_2">
        <h4>General</h4>
        <ul class="list-unstyled components">
            <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home" style="color:blueviolet"></i>
                <span>Dashboard</span></a></li>
            <li class="active">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa fa-dashboard" style="color:dodgerblue"></i> <span>Category</span></a>
                <ul class="collapse list-unstyled" id="dashboard">
                    <li>
                        <a href="{{ url('/admin/category/create') }}">> <span>Add Category</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/category') }}">> <span>View Category</span></a>
                    </li>
                </ul>
            </li>
            <li class="active">
                <a href="#dashboard1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa fa-product-hunt" style="color:cyan"></i> <span>Product</span></a>
                <ul class="collapse list-unstyled" id="dashboard1">
                    <li>
                        <a href="{{ url('/admin/product/create') }}">> <span>Add Product</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/product') }}">> <span>View Product</span></a>
                    </li>
                </ul>
            </li>
            <li><a href="{{ url('/admin/brands') }}"><i class="fa fa-registered" style="color:lawngreen"></i>
                    <span>Brand</span></a></li>
            <li><a href="{{ url('/admin/color') }}"><i class="fa fa-paint-brush" style="color:yellow"></i>
                    <span>Colors</span></a></li>
            <li><a href=""><i class="fa fa-table" style="color:orangered"></i> <span>Tables</span></a></li>
            <li class="active">
                <a href="#additional_page" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                        class="fa fa-clone" style="color:red"></i> <span>Additional Pages</span></a>
                <ul class="collapse list-unstyled" id="additional_page">
                    <li>
                        <a href="">> <span>Profile</span></a>
                    </li>
                    <li>
                        <a href="">> <span>Login</span></a>
                    </li>
                </ul>
            </li>
            <li><a href="settings.html"><i class="fa fa-cog blue1_color"></i> <span>Settings</span></a></li>
        </ul>
    </div>
</nav>
<!-- end sidebar -->
