<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<!-- Mirrored from ableproadmin.com/dashboard/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Apr 2024 07:24:56 GMT -->
<head>
    <title>Quản Trị - Dịch Vụ Thuê/Mua Group Facebook</title>
    <!-- [Meta] -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @include('FEadmin.Layout.Head.meta_header')
    <!-- [Favicon] icon -->
    <link rel="icon" href="{{ url('assets') }}/images/logo.png" type="image/x-icon">
    @yield('css_view')
</head>
<!-- [Head] end -->
<!-- [Body] Start -->
<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast data-pc-theme="light">
    <!-- [ Pre-loader ] start -->
    @include('FEadmin.Layout.Body.pre_loader')
    <!-- [ Pre-loader ] End -->
    <!-- [ Sidebar Menu ] start -->
    @include('FEadmin.Layout.Body.sidebar_menu')
    <!-- [ Sidebar Menu ] end --> 
    <!-- [ Header Topbar ] start -->
    @include('FEadmin.Layout.Body.header')
    <!-- [ Header ] end -->
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        @yield('view')
    </div>
    @include('FEadmin.Layout.Body.setting')
    
    @yield('view_js')
    <!-- :: SUCCESS -->
    @include('FEadmin.Sweetalert.success')
    <!-- :: END SUCCESS -->
    <!-- :: ERROR -->
    @include('FEadmin.Sweetalert.error')
    <!-- :: END ERROR -->
</body>
<!-- [Body] end -->
</html>
