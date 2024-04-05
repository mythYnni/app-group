<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/oddo-2-html/HTML/main/login-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 03:02:20 GMT -->

<head>
    <title>Quản Trị - Dịch Vụ Thuê/Mua Group Facebook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ url('assets') }}/login/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="{{ url('assets') }}/login/fonts/font-awesome/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{ url('assets') }}/login/fonts/flaticon/font/flaticon.css">

    <!-- Favicon icon -->
    <link rel="icon" href="{{ url('assets') }}/images/logo.png" type="image/x-icon">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ url('assets') }}/login/css/style.css">

</head>

<body id="top">
    <div class="page_loader"></div>

    <!-- Login 8 start -->
    <div class="login-8">
        <div class="container">
            <div class="row login-box">
                <div class="col-lg-7 col-md-12 form-info">
                    <div class="form-section">
                        <div class="logo clearfix">
                            <a href="login-8.html">
                                <img src="{{ url('assets') }}/images/logo_white_background.png" alt="logo">
                            </a>
                        </div>
                        <h3>Đăng Nhập</h3>
                        <div class="login-inner-form">
                            <form method="post">
                                @csrf
                                <div class="form-group form-box">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                        aria-label="Email">
                                    <i class="flaticon-mail-2"></i>
                                    @error('email')
                                        <div style="text-align: left; padding: 5px 10px;">
                                            <small style="color: #f33923;">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group form-box">
                                    <input type="password" name="password" class="form-control" autocomplete="off"
                                        placeholder="Mật Khẩu" aria-label="Mật Khẩu">
                                    <i class="flaticon-password"></i>
                                    @error('password')
                                        <div style="text-align: left; padding: 5px 10px;">
                                            <small style="color: #f33923;">{{ $message }}</small>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn-md btn-theme w-100">Đăng Nhập Quản Trị</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 bg-img">
                    <div class="info">
                        <div class="info-text">
                            <div class="waviy">
                                <span style="--i:1">Chào</span>
                                <span style="--i:2">Mừng</span>
                                <span style="--i:3">Bạn</span>
                                <span style="--i:4">Đến</span>
                                <span style="--i:5">Với</span>
                                <span class="color-yellow" style="--i:6">Connect</span>
                                <span class="color-yellow" style="--i:7">v9.0</span>
                            </div>
                            <p>Trải nhiệm tốt hơn với giao diện mới của Connect v9.0. Mang đến trải nhiệm mới nhất và
                                tiện ích cho người quản trị.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login 8 end -->

    <!-- External JS libraries -->
    <script src="{{ url('assets') }}/login/js/jquery-3.6.0.min.js"></script>
    <script src="{{ url('assets') }}/login/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets') }}/login/js/jquery.validate.min.js"></script>
    <script src="{{ url('assets') }}/login/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Custom JS Script -->
    <!-- :: SUCCESS -->
    @include('Login.Sweetalert.success')
    <!-- :: END SUCCESS -->
    <!-- :: ERROR -->
    @include('Login.Sweetalert.error')
    <!-- :: END ERROR -->
</body>

<!-- Mirrored from storage.googleapis.com/theme-vessel-items/checking-sites/oddo-2-html/HTML/main/login-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Apr 2024 03:02:25 GMT -->

</html>
