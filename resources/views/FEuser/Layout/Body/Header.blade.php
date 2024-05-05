<?php
// Kiểm tra xem biến $search tồn tại không
$search = isset($search) ? $search : '';
?>
<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <a class="logo" href="{{ route('view_home_user') }}">
            <span class="logo-light-mode">
                <img class="image-responsize" src="{{ url('assets') }}/images/layout/logo_black-background.png"
                    class="l-dark" alt="">
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
                    <form role="search" method="GET" action="{{ route('view_group_index') }}" class="searchform">
                        <input type="text" class="form-control rounded border" name="search"
                            value="{{ $search }}" id="searchItem" placeholder="Tìm Kiếm Nhóm Theo Từ Khóa..." >
                    </form>
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
                        <li><a href="{{ route('view_group_interact') }}" class="sub-menu-item">Nhóm Tương Tác Tốt</a>
                        </li>
                        <li><a href="{{ route('view_group_rent') }}" class="sub-menu-item">Nhóm Thuê Nhiều</a></li>
                    </ul>
                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Dịch Vụ</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ route('list_tu_van_ca_nhan') }}" class="sub-menu-item">Tư Vấn Cá Nhân</a></li>
                        <li><a href="{{ route('list_tu_van_doanh_nghiep') }}" class="sub-menu-item">Tư Vấn Doanh Nghiệp</a></li>
                        <li><a href="{{ route('list_khoa_hoc_online') }}" class="sub-menu-item">Khóa Học Online</a></li>
                        <li><a href="{{ route('list_dich_vu_xay_nhom') }}" class="sub-menu-item">Dịch Vụ Xây Nhóm</a></li>
                        <li><a href="{{ route('list_phat_trien_nhom') }}" class="sub-menu-item">Phát Triển Nhóm</a></li>
                        <li><a href="{{ route('list_tang_thanh_vien_nhom') }}" class="sub-menu-item">Tăng Thành Viên Nhóm</a></li>
                        <li><a href="{{ route('list_Like_Follow') }}" class="sub-menu-item">Tăng Like/Follow Fanpage</a></li>
                        <li><a href="{{ route('list_dich_vu_facebook') }}" class="sub-menu-item">Dịch Vụ Facebook</a></li>
                        <li><a href="{{ route('list_thiet_ke_website') }}" class="sub-menu-item">Thiết Kế Website</a></li>
                    </ul>
                </li>
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">Bài Viết</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{ route('view_list_blog_user') }}" class="sub-menu-item">Tin Tức Mới Nhất</a></li>
                        <li><a href="" class="sub-menu-item">Facebook Group</a></li>
                        <li><a href="" class="sub-menu-item">Zalo Group</a></li>
                        <li><a href="" class="sub-menu-item">Telegram</a></li>
                    </ul>
                </li>
                <li><a href="#" class="sub-menu-item"> Liên hệ</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div>
</header>
