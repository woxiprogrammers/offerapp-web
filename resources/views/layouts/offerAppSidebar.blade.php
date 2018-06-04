<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
            <li class="sidebar-toggler-wrapper hide">
                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                <div class="sidebar-toggler">
                    <span></span>
                </div>
                <!-- END SIDEBAR TOGGLER BUTTON -->
            </li>
            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
            <li class="sidebar-search-wrapper">
                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                <form class="sidebar-search  " action="#search" method="POST">
                    <a href="javascript:;" class="remove">
                        <i class="icon-close"></i>
                    </a>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <a href="javascript:;" class="btn submit">
                                <i class="icon-magnifier"></i>
                            </a>
                        </span>
                    </div>
                </form>
                <!-- END RESPONSIVE QUICK SEARCH FORM -->
            </li>
            <li class="nav-item ">
                <a href="{{route('home')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class=" open"></span>
                </a>
            </li>
            @if(Auth::user()->role_id == 1)
            <li class="heading">
                <h3 class="uppercase">Super Admin Features</h3>
            </li>
            <li class="nav-item  ">
                <a href="{{ route('sellerListing') }}" class="nav-link nav-toggle">
                    <i class="fa fa-users"></i>
                    <span class="title">Manage Seller</span>
                    <span class="arrow"></span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="{{ route('offerListing') }}" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Manage Offer</span>
                    <span class="arrow"></span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="{{ route('customerListing') }}" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">Manage Customer</span>
                    <span class="arrow"></span>
                </a>
            </li>

            @elseif(Auth::user()->role_id == 3)
            <li class="heading">
                <h3 class="uppercase">Seller Features</h3>
            </li>

            <li class="nav-item  ">
                <a href="{{route('get-seller-account')}}" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title"> Seller Account</span>
                    <span class=""></span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-diamond"></i>
                    <span class="title">Offer</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{route('offerView')}}" class="nav-link ">
                            <i class="fa fa-picture-o"></i>
                            <span class="title">Offer Gallery</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="#mapView" class="nav-link ">
                            <i class="fa fa-map-o"></i>
                            <span class="title">Offer Space</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{route('offerListing')}}" class="nav-link ">
                            <i class="fa fa-tasks"></i>
                            <span class="title">Offer Library</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="/group/promote/offer" class="nav-link nav-toggle">
                    <i class="icon-paper-plane"></i>
                    <span class="title">Promote Offer</span>
                    <span class=""></span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="/group/manage" class="nav-link nav-toggle">
                    <i class="icon-feed"></i>
                    <span class="title">Groups</span>
                </a>

            </li>
        </ul>
        @endif
        <!-- END SIDEBAR MENU -->
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->