<!doctype html>
<html lang="en">

<!-- Mirrored from shreethemes.in/jobnova/layouts/job-list-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 02:23:57 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DPC Marketing</title>
    <!-- [Feather Icons] https://feathericons.com -->
    <link rel="stylesheet" href="{{ url('assets') }}/fonts/fontawesome.css">
    <!-- favicon -->
    <link rel="icon" href="{{ url('assets') }}/images/logo.png" type="image/x-icon">
    @include('FEuser.Layout.Header.Css_Header')
</head>

<body>
    <!-- Navbar STart -->
    @include('FEuser.Layout.Body.Header')
    <!-- Navbar End -->

    <!-- Hero Start -->
    {{-- @include('FEuser.Layout.Body.Hero') --}}
    <!-- Hero End -->

    <!-- Start -->
    @yield('view')
    <!-- End -->

    <!-- Footer Start -->
    @include('FEuser.Layout.Fooder.Fooder')
    <!-- Footer End -->

    <a href="https://www.facebook.com/groups/khokhoahoconline" id="linkzalo" target="_blank" rel="noopener noreferrer">
        <div class="fcta-zalo-vi-tri-nut-facebook">
            <div id="fcta-zalo-tracking" class="fcta-zalo-nen-nut-facebook">
                <div id="fcta-zalo-tracking" class="fcta-zalo-ben-trong-nut">
                    <img style="width: 100%;" src="{{ url('assets') }}/images/layout/facebook.png">
                </div>
            </div>
        </div>
    </a>

    <a href="https://t.me/chiasekhoahoconline" id="linkzalo" target="_blank" rel="noopener noreferrer">
        <div class="fcta-zalo-vi-tri-nut-telegram">
            <div id="fcta-zalo-tracking" class="fcta-zalo-nen-nut-telegram">
                <div id="fcta-zalo-tracking" class="fcta-zalo-ben-trong-nut">
                    <img style="width: 100%;" src="{{ url('assets') }}/images/layout/telegram.png">
                </div>
            </div>
        </div>
    </a>

    <!-- :: END PAGES -->

    <a href="https://chat.zalo.me/?phone=0888999857" id="linkzalo" target="_blank" rel="noopener noreferrer">
        <div class="fcta-zalo-vi-tri-nut">
            <div id="fcta-zalo-tracking" class="fcta-zalo-nen-nut">
                <div id="fcta-zalo-tracking" class="fcta-zalo-ben-trong-nut">
                    <img style="width: 100%;" src="{{ url('assets') }}/images/layout/zalo.png">
                </div>
            </div>
        </div>
    </a>

    @include('FEuser.Layout.Fooder.JS_Fooder')
    <!-- :: SUCCESS -->
    @include('FEuser.Sweetalert.success')
    <!-- :: END SUCCESS -->
    <!-- :: ERROR -->
    @include('FEuser.Sweetalert.error')
    <!-- :: END ERROR -->
    @yield('view_js')
</body>

<!-- Mirrored from shreethemes.in/jobnova/layouts/job-list-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Apr 2024 02:24:13 GMT -->

</html>
