            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
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
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start
                        @if (Request::is('restaurant') or Request::is('restaurant/*'))
                        active open
                        @endif
                        ">
                            <a href="/restaurant" class="nav-link nav-toggle">
                                <i class="fa fa-info"></i>
                                <span class="title">Basic info</span>
                        @if (Request::is('restaurant') or Request::is('restaurant/*'))
                        <span class="selected"></span>
                        @endif
                            </a>
                        </li>
                        <li class="nav-item 
                            @if (Request::is('menu') || Request::is('menu/*'))
                            active open
                            @endif
                        ">
                            <a href="/menu" class="nav-link nav-toggle">
                                <i class="fa fa-cutlery"></i>
                                <span class="title">Menu </span>
                            @if (Request::is('menu') || Request::is('menu/*'))
                            <span class="selected"></span>
                            @endif
                            </a>
                        </li>
                        <li class="nav-item 
                            @if (Request::is('inventory') || Request::is('inventory/*'))
                            active open
                            @endif
                        ">
                            <a href="/inventory" class="nav-link nav-toggle">
                                <i class="fa fa-cubes"></i>
                                <span class="title">Inventory</span>
                                @if (Request::is('inventory') || Request::is('inventory/*'))
                                <span class="selected"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item 
                            @if (Request::is('suppliers') || Request::is('suppliers/*'))
                            active open
                            @endif
                        ">
                            <a href="/suppliers" class="nav-link nav-toggle">
                                <i class="fa fa-group"></i>
                                <span class="title">Suppliers</span>
                                @if (Request::is('suppliers') || Request::is('suppliers/*'))
                                <span class="selected"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item 
                            @if (Request::is('ingredients') || Request::is('ingredients/*'))
                            active open
                            @endif
                        ">
                            <a href="/ingredients" class="nav-link nav-toggle">
                                <i class="fa fa-flask"></i>
                                <span class="title">Ingredients</span>
                                @if (Request::is('ingredients') || Request::is('ingredients/*'))
                                <span class="selected"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item 
                            @if (Request::is('storages') || Request::is('storages/*'))
                            active open
                            @endif
                        ">
                            <a href="/storages" class="nav-link nav-toggle">
                                <i class="fa fa-archive"></i>
                                <span class="title">Storages</span>
                                 @if (Request::is('storages') || Request::is('storages/*'))
                                <span class="selected"></span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item 
                            @if (Request::is('purchase-restrictions') || Request::is('purchase-restrictions/*'))
                            active open
                            @endif
                        ">
                            <a href="/purchase-restrictions" class="nav-link nav-toggle">
                                <i class="fa fa-cart-plus"></i>
                                <span class="title">Purchasing restrictions</span>
                                 @if (Request::is('purchase-restrictions') || Request::is('purchase-restrictions/*'))
                                <span class="selected"></span>
                                @endif
                            </a>
                        </li>

                        <li class="nav-item 
                            @if (Request::is('stocktaking') || Request::is('stocktaking/*'))
                            active open
                            @endif
                        ">
                            <a href="/stocktaking" class="nav-link nav-toggle">
                                <i class="fa fa-battery-half"></i>
                                <span class="title">Stock Level</span>
                                 @if (Request::is('stocktaking') || Request::is('stocktaking/*'))
                                <span class="selected"></span>
                                @endif
                            </a>
                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->