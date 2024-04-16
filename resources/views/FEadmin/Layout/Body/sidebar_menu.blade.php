<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('view_home_admin') }}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img style="max-width: 70%;" src="{{ url('assets') }}/images/logo_white_background.png"
                    class="img-fluid logo-lg" alt="logo">
                <span class="badge bg-light-success rounded-pill ms-2 theme-version">v9.0</span>
            </a>
        </div>
        <div class="navbar-content">
            <div class="card pc-user-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="{{ url('assets') }}/images/user/avatar-1.jpg" alt="user-image"
                                class="user-avtar wid-45 rounded-circle" />
                        </div>
                        <div class="flex-grow-1 ms-3 me-2">
                            <h6 class="mb-0">{{ Auth::guard('admin')->user()->fullName }}</h6>
                            <small>{{ Auth::guard('admin')->user()->email }}</small>
                        </div>
                        <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse"
                            href="#pc_sidebar_userlink">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-sort-outline"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="collapse pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3">
                            <a href="{{ route('view_profile') }}">
                                <i class="ti ti-user"></i>
                                <span>Tài khoản của tôi</span>
                            </a>
                            <a href="{{ route('index_password') }}">
                                <i class="ti ti-lock"></i>
                                <span>Mật Khẩu</span>
                            </a>
                            <a href="{{ route('logout_admin') }}">
                                <i class="ti ti-power"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Kinh Doanh</label>
                </li>
                <li class="pc-item">
                  <a href="{{route('view_list_cart')}}" class="pc-link">
                    <span class="pc-micon">
                      <svg class="pc-icon">
                        <use xlink:href="#custom-dollar-square"></use>
                      </svg>
                    </span>
                    <span class="pc-mtext">Hỗ Trợ</span>
                    <span class="pc-badge">2</span></a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-status-up"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Thống Kê</span>
                        <span class="pc-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg></span>
                    </a>
                    <ul class="pc-submenu" style="display: none;">
                        <li class="pc-item"><a class="pc-link" href="">Nhóm Thuê</a></li>
                        <li class="pc-item"><a class="pc-link" href="">Nhóm Đã Bán</a></li>
                    </ul>
                </li>
                <li class="pc-item pc-caption">
                    <label>Hệ Thống</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-user-square"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Nhân sự</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('view_list_account') }}">Danh sách</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('view_creater_account') }}">Thêm mới</a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-row-vertical"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Danh Mục Vị Trí</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('view_list_category') }}">Danh sách</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('view_creater_category') }}">Thêm mới</a>
                        </li>
                    </ul>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-fatrows"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Hội Nhóm</span><span class="pc-arrow"><i
                                data-feather="chevron-right"></i></span></a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('view_list_rent') }}">Nhóm thuê
                                nhiều</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('view_list_interact') }}">Nhóm tương
                                tác tốt</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('view_list_group') }}">Danh sách</a>
                        </li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('view_creater_group') }}">Thêm mới</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
