<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <a class="logo" href="{{ route('view_home_user') }}">
            <span class="logo-light-mode">
                <img class="image-responsize" src="{{ url('assets') }}/images/layout/logo_black-background.png" class="l-dark"
                    alt="">
            </span>
        </a>

        <div class="menu-extras">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

        <ul class="buy-button list-inline mb-0">
            <li class="list-inline-item ps-1 mb-0">
                <div class="dropdown">
                    <button type="button" class="dropdown-toggle btn btn-sm btn-icon btn-pills btn-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="search" class="icons"></i>
                    </button>
                    <div class="dropdown-menu dd-menu dropdown-menu-end bg-white rounded border-0 mt-3 p-0" style="width: 420px;">
                        <div class="search-bar" style="margin-top: 2px;">
                            <div id="itemSearch" class="menu-search mb-0">
                                <form role="search" method="get" id="searchItemform" class="searchform">
                                    <input type="text" class="form-control rounded border" name="s" id="searchItem" placeholder="Tìm Kiếm..." style="border-color: #838383 !important;">
                                    <input type="submit" id="searchItemsubmit" value="Search">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-right nav-light">
                <li><a href="{{ route('view_home_user') }}" class="sub-menu-item"> Trang Chủ</a></li>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Hội Nhóm</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{route('view_group_interact')}}" class="sub-menu-item">Nhóm Tương Tác Tốt</a></li>
                        <li><a href="{{route('view_group_rent')}}" class="sub-menu-item">Nhóm Thuê Nhiều</a></li>
                    </ul>
                </li>
                <li><a href="{{route('view_list_blog_user')}}" class="sub-menu-item">Bài Viết</a></li>
                <li><a href="#" class="sub-menu-item">Facebook Group</a></li>
                <li><a href="#" class="sub-menu-item">Telegram Group</a></li>
                <li><a href="#" class="sub-menu-item">Zalo Group</a></li>
                <li><a href="#" class="sub-menu-item"> Liên hệ</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div>
</header>
