@extends ('FEuser.master')
@section('view')
    @php
        use Carbon\Carbon;
        $typeHTML = [
            0 => ['name' => 'Riêng Tư', 'color' => 'bg-danger bg-gradient'],
            1 => ['name' => 'Công Khai', 'color' => 'bg-success bg-gradient'],
        ];

        $statusHTML = [
            0 => ['name' => 'Hiển Thị', 'color' => 'bg-cyan-900'],
            1 => ['name' => 'Lưu trữ', 'color' => 'bg-gray-800'],
        ];

        $statusColor_HTML = [
            0 => ['color' => '#00874e87', 'background' => '#00874e87'],
            1 => ['color' => '#f1f708', 'background' => '#dbf70854'],
            2 => ['color' => '#ff0000', 'background' => '#e7000069'],
        ];
    @endphp
    <section class="section" style="min-height: 1000px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        {{-- <h5 class="heading fw-semibold mb-0 sub-heading">Job Vacancies</h5> --}}
                    </div>
                </div><!--end col-->
                <div class="col-12">
                    <div class="features-absolute">
                        <div class="d-md-flex justify-content-between align-items-center bg-white shadow rounded p-4">
                            <form class="card-body text-start" method="GET" action="{{ route('view_group_index') }}">
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-1" id="menuSearch">

                                    </div><!--end row-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end form-->
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end container-->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="title-heading text-center">
                        <div id="demo" class="carousel slide" data-bs-ride="carousel">
                            <!-- Indicators/dots -->
                            <!-- Indicators/dots -->
                            <div class="carousel-indicators" style="z-index: 1;">
                                @foreach ($list_banner as $key => $bannerhome)
                                    <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $key }}"
                                        class="{{ $key == 0 ? 'active' : '' }}"></button>
                                @endforeach
                            </div>
                            <!-- The slideshow/carousel -->
                            <div class="carousel-inner">
                                @foreach ($list_banner as $key => $bannerhomein)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <a href="{{ $bannerhomein->link }}" target="_blank">
                                            <img src="{{ $bannerhomein->image }}" alt="Banner {{ $key }}"
                                                class="d-block" style="width:100%">
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <!-- Left and right controls/icons -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#demo"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#demo"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-xl-12 none-mobie" style="margin: 20px;">
                    <div class="row">
                        <div class="col-xl-3">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item image-item-span" style="width: 100%;">
                                    <div class="d-flex align-items-center p-4">
                                        <img src="{{ url('assets') }}/images/layout/promotion.png"
                                            class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                        <div class="ms-3 text-danh-gia">
                                            <a href="employer-profile.html" class="company text-dark">1548K Thành Viên</a>
                                            <span class="d-flex align-items-center mt-1">
                                                </svg>Đã Sử Dụng</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-3">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item image-item-span" style="width: 100%;">
                                    <div class="d-flex align-items-center p-4">
                                        <img src="{{ url('assets') }}/images/layout/group.png"
                                            class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                        <div class="ms-3 text-danh-gia">
                                            <a href="employer-profile.html" class="company text-dark">+2000 Hội Nhóm</a>
                                            <span class="d-flex align-items-center mt-1">
                                                </svg>Tối Ưu & Hiệu Quả</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-3">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item image-item-span" style="width: 100%;">
                                    <div class="d-flex align-items-center p-4">
                                        <img src="{{ url('assets') }}/images/layout/best-employee.png"
                                            class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                        <div class="ms-3 text-danh-gia">
                                            <a href="employer-profile.html" class="company text-dark">100% Khách Hàng</a>
                                            <span class="d-flex align-items-center mt-1">
                                                </svg>Đánh Giá Tốt</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-3">
                            <ul class="list-group list-group-horizontal">
                                <li class="list-group-item image-item-span" style="width: 100%;">
                                    <div class="d-flex align-items-center p-4">
                                        <img src="{{ url('assets') }}/images/layout/24-hours-support.png"
                                            class="avatar avatar-small rounded shadow p-3 bg-white" alt="">
                                        <div class="ms-3 text-danh-gia">
                                            <a href="employer-profile.html" class="company text-dark">Hỗ Trợ Online (24/7)</a>
                                            <span class="d-flex align-items-center mt-1">
                                                </svg>Zalo: 0888 999 857</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!--end col-->
            </div>
            <!--end col-->
        </div>

        <div class="container">
            <div class="alert alert-success" style="padding: 0px; background: #ff0018; border-color: #ff0018;">
                <a href="{{ route('view_group_rent') }}">
                    <img loading="lazy" class="responsite-image-text"
                        src="{{ url('assets') }}/images/Minimalist_Blue_Green_Real_Estate_Company_Group_Logo__2_-removebg-preview.png"
                        style="margin-left: 15px;" alt="grid">
                </a>
            </div>
            <div class="row g-4">
                @foreach ($list_rent as $key => $value)
                    @php
                        $type = $typeHTML[$value->type] ?? [
                            'name' => 'Không Xác Định',
                            'color' => '#000000',
                        ];
                        $typeName = $type['name'];
                        $typeColor = $type['color'];
                        $address = '';

                        // Kiểm tra và thêm thông tin thành phố
                        if (isset($value->province)) {
                            $address .= $value->province;
                        }

                        // Kiểm tra và thêm thông tin phường xã
                        if (isset($value->wards)) {
                            if ($address !== '') {
                                $address .= ' - ';
                            }
                            $address .= $value->wards;
                        }
                    @endphp
                    <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div
                            class="job-post job-post-list rounded shadow d-xl-flex align-items-center justify-content-between position-relative" style="padding: 8px 10px !important;">
                            <div class="d-flex align-items-center w-350px">
                                <div>
                                    <div class="truncate-mobile">
                                        <a href="{{ $value->linkGroup }}" target="_blank" style="font-size: 15px !important;"
                                            class="h5 title text-dark">{{ $value->nameGroup }}</a>

                                    </div>
                                    <span class="d-flex fw-medium mt-md-2" style="font-size: 12px;">{{ $value->account_group }} Thành Viên</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-120px">
                                <span class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-lg-2"><i
                                        class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                            </div>

                            <div class="d-blog align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-280px">
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                    Giá Thuê: {{ number_format($value->rent_cost, 0, ',', '.') }} vnđ / tháng</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2 mb-10px">
                                    Giá Bán: {{ number_format($value->price, 0, ',', '.') }} vnđ</span>
                            </div>

                            <div
                                class="d-blog align-items-center justify-content-between d-xl-block mt-2 mt-md-0 w-350px truncate">
                                <span class="text-muted d-flex align-items-center mt-md-2"><i data-feather="map-pin"
                                        class="fea icon-sm me-1 align-middle"></i>{{ $value->objCategory->name }}</span>
                                <span class="d-flex fw-medium mt-md-2 mb-10px mb-md-2"
                                    style="font-size: 11.5px;">{{ $address }}</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('view_detail_group', $value->slugGroup) }}"
                                    class="btn btn-sm btn-primary w-full">Đăng Ký</a>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
            <div class="row">
                <div class="col-12 mt-4 pt-2" style="text-align: center; margin: 0px 0px 50px 0px;">
                    <a href="{{ route('view_group_rent') }}" class="btn btn-sm btn-primary w-full">Xem Thêm</a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container">
            <div class="alert alert-success" style="padding: 0px; background: #ff0018; border-color: #ff0018;">
                <a href="{{ route('view_group_interact') }}">
                    <img loading="lazy" class="responsite-image-text" style="margin-left: 15px;"
                        src="{{ url('assets') }}/images/Minimalist_Blue_Green_Real_Estate_Company_Group_Logo-removebg-preview.png"
                        alt="grid">
                </a>
            </div>
            <div class="row g-4">
                @foreach ($list_interact as $key => $value)
                    @php
                        $type = $typeHTML[$value->type] ?? [
                            'name' => 'Không Xác Định',
                            'color' => '#000000',
                        ];
                        $typeName = $type['name'];
                        $typeColor = $type['color'];
                        $address = '';

                        // Kiểm tra và thêm thông tin thành phố
                        if (isset($value->province)) {
                            $address .= $value->province;
                        }

                        // Kiểm tra và thêm thông tin quận huyện
                        if (isset($value->district)) {
                            if ($address !== '') {
                                $address .= ' - ';
                            }
                            $address .= $value->district;
                        }

                        // Kiểm tra và thêm thông tin phường xã
                        if (isset($value->wards)) {
                            if ($address !== '') {
                                $address .= ' - ';
                            }
                            $address .= $value->wards;
                        }
                    @endphp
                    <div class="col-xl-12 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div
                            class="job-post job-post-list rounded shadow d-xl-flex align-items-center justify-content-between position-relative" style="padding: 8px 10px !important;">
                            <div class="d-flex align-items-center w-350px">
                                <div>
                                    <div class="truncate-mobile">
                                        <a href="{{ $value->linkGroup }}" target="_blank" style="font-size: 15px !important;"
                                            class="h5 title text-dark">{{ $value->nameGroup }}</a>

                                    </div>
                                    <span class="d-flex fw-medium mt-md-2" style="font-size: 12px;">{{ $value->account_group }} Thành
                                        Viên</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-120px">
                                <span class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-lg-2"><i
                                        class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                            </div>

                            <div class="d-blog align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-280px">
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                    Giá Thuê: {{ number_format($value->rent_cost, 0, ',', '.') }} vnđ /
                                    tháng</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2 mb-10px">
                                    Giá Bán: {{ number_format($value->price, 0, ',', '.') }} vnđ</span>
                            </div>

                            <div
                                class="d-blog align-items-center justify-content-between d-xl-block mt-2 mt-md-0 w-350px truncate">
                                <span class="text-muted d-flex align-items-center mt-md-2"><i data-feather="map-pin"
                                        class="fea icon-sm me-1 align-middle"></i>{{ $value->objCategory->name }}</span>
                                <span class="d-flex fw-medium mt-md-2 mb-10px mb-md-2"
                                    style="font-size: 11.5px;">{{ $address }}</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('view_detail_group', $value->slugGroup) }}"
                                    class="btn btn-sm btn-primary w-full">Đăng Ký</a>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
            <div class="row">
                <div class="col-12 mt-4 pt-2" style="text-align: center;">
                    <a href="{{ route('view_group_interact') }}" class="btn btn-sm btn-primary w-full">Xem Thêm</a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container mt-50 mt-60">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="section-title text-center">
                        <h4 class="title mb-3">Tin Tức Mới Nhất</h4>
                        {{-- <p class="text-muted para-desc mb-0 mx-auto">Search all the open positions on the web. Get your own
                            personalized salary estimate. Read reviews on over 30000+ companies worldwide.</p> --}}
                    </div>
                </div><!--end col-->
            </div><!--end row-->

            <div class="row g-4 mt-0">
                @foreach ($listBlog as $key => $value)
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="card blog blog-primary shadow rounded overflow-hidden border-0">
                            <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                                <div class="position-relative overflow-hidden">
                                    <div class="image-container div-image-blog">
                                        <img src="{{ $value->image }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="card-overlay"></div>
                                </div>
                            </div>

                            <div class="card-body blog-content position-relative p-0">
                                <div class="blog-tag px-4 none-mobie none-mobie-blog">
                                    <a href="{{ route('view_list_detail_blog_user', $value->slug) }}"
                                        class="badge bg-primary rounded-pill">Bài Viết</a>
                                </div>
                                <div class="p-4">
                                    <ul class="list-unstyled text-muted small mb-2 ul-mobile-blog">
                                        <li class="d-inline-flex align-items-center me-2"><i data-feather="calendar"
                                                class="fea icon-ex-sm me-1 text-dark"></i>{{ Carbon::parse($value->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                        </li>
                                    </ul>

                                    <a href="{{ route('view_list_detail_blog_user', $value->slug) }}"
                                        class="title fw-semibold text-dark text-a-blog">{{ $value->name }}</a>

                                    <ul
                                        class="list-unstyled d-flex justify-content-between align-items-center text-muted mb-0 ">
                                        <li class="list-inline-item me-2"><a
                                                href="{{ route('view_list_detail_blog_user', $value->slug) }}"
                                                class="btn btn-link primary text-dark">Xem Ngay <i
                                                    class="mdi mdi-arrow-right"></i></a></li>
                                        <li class="list-inline-item none-mobie none-mobie-blog"><span
                                                class="text-dark">By</span> <span class="text-muted link-title">DPC
                                                Marketing</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    @if (!$list_popup->isEmpty())
        <div class="nenmodal" id="nenmodal-1">
            <div class="nenmodal2"></div>
            <div class="ndmodal">
                <div class="closemodal"><button onclick="momodal()">×</button></div>
                <div class="titlemodal">
                    <!-- Carousel -->
                    <div id="demo" class="carousel slide" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            @foreach ($list_popup as $key => $banner)
                                <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $key }}"
                                    class="{{ $key == 0 ? 'active' : '' }}"></button>
                            @endforeach
                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                            @foreach ($list_popup as $key => $banner)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <a href="{{ $banner->link }}" target="_blank">
                                        <img src="{{ $banner->image }}" alt="Banner {{ $key }}"
                                            class="d-block w-100">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#demo"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#demo"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
@stop
@section('view_js')
    @include('FEuser.Layout.Fooder.JS_Menu_Defout')
    {{-- @include('FEadmin.Layout.JS.Get_Account') --}}
    <script>
        // Sử dụng setTimeout để chờ 5 giây trước khi hiển thị modal
        setTimeout(function() {
            // Hiển thị modal sau khi đã chờ 5 giây
            document.getElementById("nenmodal-1").classList.add("active");
        }, 4000); // 5000 milliseconds = 5 giây

        function momodal() {
            // Ẩn modal khi người dùng nhấp vào nút tắt
            document.getElementById("nenmodal-1").classList.remove("active");
        }
    </script>
@stop
