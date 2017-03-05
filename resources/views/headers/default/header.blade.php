        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="/">
                        <img src="{{asset('layouts/admin2/img/logo-default.png')}}" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->

                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <div class="page-actions">
                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle font-blue-oleo">
                                    <i class="fa fa-dashboard"></i>
                                    <span class="title">
                                        Dashboard
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle font-blue-oleo">
                                    <i class="fa fa-line-chart"></i>
                                    <span class="title">
                                        Forecast
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link nav-toggle font-blue-oleo">
                                    <i class="fa fa-cubes"></i>
                                    <span class="title">
                                        Inventory
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/shopping-cart" class="nav-link nav-toggle font-blue-oleo">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class="title">
                                        Shopping cart
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/available-menu" class="nav-link nav-toggle font-blue-oleo">
                                    <i class="fa fa-cutlery"></i>
                                    <span class="title">
                                        Menu (available items)
                                    </span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="/layouts/admin2/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile"> {{(Auth::user()->email)}} </span>
                                    <!-- <i class="fa fa-angle-down"></i> -->
                                </a>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended quick-sidebar-toggler" 
                            onclick="javascript:window.location='/logout'">
                                <span class="sr-only">Log out</span>
                                <i class="icon-logout"></i>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->