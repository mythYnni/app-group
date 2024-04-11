<header id="topnav" class="defaultscroll sticky">
    <div class="container">
        <a class="logo" href="{{route('view_home_user')}}">
            <span class="logo-light-mode">
                <img src="{{ url('assets') }}/images/logo_white_background.png" style="width: 35%;" class="l-dark" alt="">
                <img src="{{ url('assets') }}/images/logo_white_background.png" style="width: 35%;" class="l-light" alt="">
            </span>
            <img src="images/logo-light.png" class="logo-dark-mode" alt="">
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

        <div id="navigation">
            <!-- Navigation Menu-->   
            <ul class="navigation-menu nav-right nav-light">
                <li><a href="{{route('view_home_user')}}" class="sub-menu-item"> Trang Chủ</a></li>
                <li><a href="{{route('view_home_user')}}" class="sub-menu-item"> Liên hệ</a></li>
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div>
</header>