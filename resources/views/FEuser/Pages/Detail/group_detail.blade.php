@extends ('FEuser.master')
@section('view')
    @php
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

        $type = $typeHTML[$obj->type] ?? [
            'name' => 'Không Xác Định',
            'color' => '#000000',
        ];
        $typeName = $type['name'];
        $typeColor = $type['color'];
        $address = '';

        // Kiểm tra và thêm thông tin thành phố
        if (isset($obj->province)) {
            $address .= $obj->province;
        }

        // Kiểm tra và thêm thông tin quận huyện
        if (isset($obj->district)) {
            if ($address !== '') {
                $address .= ' - ';
            }
            $address .= $obj->district;
        }

        // Kiểm tra và thêm thông tin phường xã
        if (isset($obj->wards)) {
            if ($address !== '') {
                $address .= ' - ';
            }
            $address .= $obj->wards;
        }
    @endphp
    <!-- Start -->
    <section class="bg-half d-table w-100" style="min-height: 1000px;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow rounded p-4 sticky-bar">
                        <img src="{{ $obj->image }}" class="avatar shadow bg-white" alt="" style="width: 100%;">

                        <div class="mt-4">
                            <h4 class="title mb-3"><a href="{{ $obj->linkGroup }}" target="_blank"
                                    style="color: rgb(253 13 13); font-weight: 700;"
                                    class="hover-h4">{{ $obj->nameGroup }}</a></h4>

                            <ul class="list-unstyled mb-3">
                                <li class="d-inline-flex align-items-center text-muted me-2"
                                    style="color: #000000 !important; font-weight: 600;">Mã Nhóm:
                                    {{ $obj->code }}</li>
                            </ul>

                            <ul class="list-unstyled mb-3">
                                <li class="d-inline-flex align-items-center text-muted me-2"
                                    style="color: #000000 !important; font-weight: 600;">Giá Thuê:
                                    {{ number_format($obj->rent_cost, 0, ',', '.') }} vnđ / tháng</li>
                                <li class="d-inline-flex align-items-center text-muted"
                                    style="color: #000000 !important; font-weight: 600;">Giá Bán:
                                    {{ number_format($obj->price, 0, ',', '.') }} vnđ </li>
                            </ul>

                            <ul class="list-unstyled mb-0">
                                <li class="d-inline-flex align-items-center text-muted me-2"><i data-feather="user-check"
                                        class="fea icon-sm text-primary me-1"></i> {{ $obj->account_group }} thành viên</li>
                                <li class="d-inline-flex align-items-center text-muted"><i data-feather="map-pin"
                                        class="fea icon-sm text-primary me-1"></i> {{ $obj->objCategory->name }} </li>
                            </ul>
                            <div class="mt-4">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModalCenter">Đăng Ký <i class="mdi mdi-send"></i></button>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-8 col-md-6">
                    <div class="sidebar border-0">
                        <h5 class="mb-0">Thông Tin Chi Tiết</h5>

                        <ul class="list-unstyled mb-0 mt-4">
                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i data-feather="monitor" class="fea icon-ex-md me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Loại Nhóm</h6>
                                        <small class="text-primary mb-0">{{ $typeName }}</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i data-feather="user-check" class="fea icon-ex-md me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Thành Viên</h6>
                                        <small class="text-primary mb-0">{{ $obj->account_group }} thành viên</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i data-feather="map-pin" class="fea icon-ex-md me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">{{ $obj->objCategory->name }}</h6>
                                        <small class="text-primary mb-0">{{ $address }}</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i data-feather="briefcase" class="fea icon-ex-md me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Lượng Thành Viên / Tuần</h6>
                                        <small class="text-primary mb-0">+{{ $obj->account_group_week }} thành viên /
                                            tuần</small>
                                    </div>
                                </div>
                            </li>

                            <li class="list-inline-item px-3 py-2 shadow rounded text-start m-1 bg-white">
                                <div class="d-flex widget align-items-center">
                                    <i data-feather="book" class="fea icon-ex-md me-3"></i>
                                    <div class="flex-1">
                                        <h6 class="widget-title mb-0">Lượng Bài Viết / Tuần</h6>
                                        <small class="text-primary mb-0">+{{ $obj->account_group_blog }} bài / tuần</small>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-4">
                        <h5>Mô Tả: </h5>
                        @if (empty($obj->detail_group))
                            <p class="text-muted">Chưa có thông tin miêu tả.</p>
                        @else
                            <div>
                                {!! $obj->detail_group !!}
                            </div>
                        @endif

                        {{-- <div class="mt-4">
                            <a href="job-apply.html" class="btn btn-outline-primary">Đăng Ký <i
                                    class="mdi mdi-send"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--end container-->

        <div class="container mt-50 mt-60">
            <div class="row justify-content-center mb-0 pb-2">
                <div class="col-12">
                    <div class="section-title text-center">
                        <h4 class="title mb-4">Nhóm Liên Quan</h4>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div class="row">
                @foreach ($listDetail as $key => $value)
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
                            class="job-post job-post-list rounded shadow p-3 d-xl-flex align-items-center justify-content-between position-relative" style="padding: 8px 10px !important;">
                            <div class="d-flex align-items-center w-350px">
                                <div>
                                    <div class="truncate-mobile">
                                        <a href="{{ $value->linkGroup }}" target="_blank"  style="font-size: 15px !important;"
                                            class="h5 title text-dark">{{ $value->nameGroup }}</a>

                                    </div>
                                    <span class="d-flex fw-medium mt-md-2" font-size: 12px;>{{ $value->account_group }} Thành
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
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>

    <section id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Thông Tin Liên Hệ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <div id="accordion">

                        <div class="card">
                            <div class="card-header">
                                <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                                    Thông Tin Liên Hệ
                                </a>
                            </div>
                            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <p style="font-size: 15px;"><span style="color: #f2277e;;">Mọi Khó Khăn Hãy
                                            Liên Hệ Qua Zalo Qua Số <span
                                                style="font-weight: 600; text-decoration: underline;">0888.999.857</span>
                                            Để Được Hỗ
                                            Trợ!</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                                    Thông Tin Thanh Toán
                                </a>
                            </div>
                            <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <img style="width: 100%;"
                                                src="https://chiasekhoahoc.com.vn/asset/img/herobanner/qr.png"
                                                class="rounded" alt="Cinque Terre">
                                        </div>
                                        <div class="col-12 col-lg-6" style="padding: 30px 10px 0px 10px;">
                                            <h4>Thông Tin Người Nhận &amp; Nội Dung Chuyền Khoản</h4>
                                            <p style="font-size: 15px;">Chủ Tài Khoản: <span
                                                    style="font-size: 18px; color: black; font-weight: 600;">Lo Thi
                                                    Dung</span></p>
                                            <p style="font-size: 15px;">Số Tài Khoản: <span
                                                    style="font-size: 18px; color: black; font-weight: 600;">1903 9284 8630
                                                    16</span></p>
                                            <p style="font-size: 15px;">Nội Dung: <span
                                                    style="font-size: 14px; color: #f2277e; font-weight: 600;"> Thue "Mã
                                                    Nhóm"</span> hoặc <span
                                                    style="font-size: 14px; color: #f2277e; font-weight: 600;"> Mua "Mã
                                                    Nhóm"</span>
                                            </p>

                                            <p style="font-size: 15px;">Ghi Chú: <span style="color: #f2277e;;">Mọi Khó
                                                    Khăn Hãy Liên Hệ Qua Zalo Qua Số <span
                                                        style="font-weight: 600; text-decoration: underline;">0888.999.857</span>
                                                    Để Được Hỗ
                                                    Trợ!</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                </div>
            </div>
    </section>
@stop
@section('view_js')
    <script>
        // Xác định modal
        var myModal = new bootstrap.Modal(document.getElementById('exampleModalCenter'));

        // Kiểm tra nếu có lỗi và modal chưa được hiển thị, thì hiển thị modal
        window.onload = function() {
            @if ($errors->any() && !session('modalShown'))
                myModal.show();
            @endif
        };
    </script>
    <!-- End -->
@stop
