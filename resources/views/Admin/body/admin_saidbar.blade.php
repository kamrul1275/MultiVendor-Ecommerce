<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset("AdminBackend/assets/images/logo-icon.png") }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('admin.dashboard') }}" >
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class="bx bx-category"></i>
                </div>
                <div class="menu-title">Brand</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.create_brand') }}"><i class="bx bx-right-arrow-alt"></i>Create Brand</a>
                </li>
                <li> <a href="{{ route('admin.all_brand') }}"><i class="bx bx-right-arrow-alt"></i>All Brand</a>
                </li>

            </ul>
        </li>
        <li class="menu-label">UI Elements</li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Vendor Manage</div>
            </a>
            <ul>
                <li> <a href="{{ route('vendor.inactive') }}"><i class="bx bx-right-arrow-alt"></i>InActive</a>
                </li>
                <li> <a href="{{ route('vendor.active') }}"><i class="bx bx-right-arrow-alt"></i>Active..</a>
                </li>

            </ul>
        </li>


        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-bookmark-heart'></i>
                </div>
                <div class="menu-title">Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('Category.create_category') }}"><i class="bx bx-right-arrow-alt"></i>Create Category</a>
                </li>
                <li> <a href="{{  route('Category.all_category') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                </li>


            </ul>
        </li>





  <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">SubCategory</div>
            </a>
            <ul>
                <li> <a href="{{ route('SubCategory.create_subcategory') }}"><i class="bx bx-right-arrow-alt"></i>Create SubCategory</a>
                </li>
                <li> <a href="{{  route('SubCategory.all_subcategory') }}"><i class="bx bx-right-arrow-alt"></i>All SubCategory</a>
                </li>


            </ul>
        </li>



        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Product</div>
            </a>
            <ul>
                <li> <a href="{{ route('create.product') }}"><i class="bx bx-right-arrow-alt"></i>Create Product</a>
                </li>
                <li> <a href="{{ route('all.product') }}"><i class="bx bx-right-arrow-alt"></i>All Product</a>
                </li>

            </ul>
        </li>

        <!-- coupon start -->
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-repeat"></i>
                </div>
                <div class="menu-title">Coupon</div>
            </a>
            <ul>
                <li> <a href="{{ route('create.coupon') }}"><i class="bx bx-right-arrow-alt"></i>Create Coupon</a>
                </li>
                <li> <a href="{{ route('all.coupon') }}"><i class="bx bx-right-arrow-alt"></i>All Coupon</a>
                </li>

            </ul>
        </li>
        <!-- end  coupon -->
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-donate-blood"></i>
                </div>
                <div class="menu-title">Shipping Area</div>
            </a>
            <ul>
                <li> <a href="{{route('all.Division') }}"><i class="bx bx-right-arrow-alt"></i>All Division</a>
                </li>
                <li> <a href="{{route('all.district')}}"><i class="bx bx-right-arrow-alt"></i>All District</a>
                </li>
                <li> <a href="{{ route('all.state')}}"><i class="bx bx-right-arrow-alt"></i>All Sate</a>
                </li>
            </ul>
        </li>

        <li>
            <a href="faq.html">
                <div class="parent-icon"><i class="bx bx-help-circle"></i>
                </div>
                <div class="menu-title">FAQ</div>
            </a>
        </li>
        <li>
            <a href="pricing-table.html">
                <div class="parent-icon"><i class="bx bx-diamond"></i>
                </div>
                <div class="menu-title">Pricing</div>
            </a>
        </li>
        <li class="menu-label">Charts & Maps</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart"></i>
                </div>
                <div class="menu-title">Charts</div>
            </a>
            <ul>
                <li> <a href="charts-apex-chart.html"><i class="bx bx-right-arrow-alt"></i>Apex</a>
                </li>
                <li> <a href="charts-chartjs.html"><i class="bx bx-right-arrow-alt"></i>Chartjs</a>
                </li>
                <li> <a href="charts-highcharts.html"><i class="bx bx-right-arrow-alt"></i>Highcharts</a>
                </li>
            </ul>
        </li>



    </ul>
    <!--end navigation-->
</div>
