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
                                    class="hover-h4">{{ $obj->nameGroup }}</a></h4>
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
                            <p class="text-muted">{!! $obj->detail_group !!}</p>
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
                    <div class="col-12">
                        <div
                            class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                            <div class="d-flex align-items-center w-400px">
                                <div>
                                    <a href="{{ $value->linkGroup }}" target="_blank"
                                        class="h5 title text-dark">{{ $value->nameGroup }}</a>
                                    <span class="d-flex fw-medium mt-md-2">{{ $value->account_group }} Thành Viên</span>
                                </div>
                            </div>

                            <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-200px">
                                <span class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i
                                        class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                            </div>

                            <div class="d-blog align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-250px">
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                    Giá Thuê: {{ number_format($value->rent_cost, 0, ',', '.') }} vnđ / tháng</span>
                                <span class="text-muted d-flex align-items-center fw-medium mt-md-2 mb-10px">
                                    Giá Bán: {{ number_format($value->price, 0, ',', '.') }} vnđ</span>
                            </div>

                            <div class="d-blog align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-350px">
                                <span class="text-muted d-flex align-items-center"><i data-feather="map-pin"
                                        class="fea icon-sm me-1 align-middle"></i>{{ $value->objCategory->name }}</span>
                                <span class="d-flex fw-medium mt-md-2 mb-10px"
                                    style="font-size: 11.5px;">{{ $address }}</span>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('view_detail_group', $value->slugGroup) }}"
                                    class="btn btn-sm btn-primary w-full ms-md-1">Đăng Ký</a>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                @endforeach
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>

    <section id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <form class="modal-content" action="{{ route('creater_cart') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Thông Tin Khách Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body row">
                    <input type="hidden" class="form-control" aria-describedby="emailHelp" name="slugGroup"
                        value="{{ $obj->slugGroup }}">
                    <div class="form-group col-md-7 col-12">
                        <label class="form-label" for="exampleInputEmail1">Họ Và Tên</label>
                        <input type="text" class="form-control" placeholder="Họ Và Tên" fdprocessedid="kmg3t"
                            style="border: 1px solid #b1b1b1;" name="name_account">
                        @error('name_account')
                            <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-7 col-12 mt-4">
                        <label class="form-label" for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            style="border: 1px solid #b1b1b1;" name="email" placeholder="Email Khách Hàng"
                            fdprocessedid="kmg3t">
                        @error('email')
                            <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-5 col-12 mt-4">
                        <label class="form-label" for="exampleInputPassword1">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            style="border: 1px solid #b1b1b1;" name="phone" placeholder="Phone Sử Dụng Zalo (nếu có)"
                            fdprocessedid="aua78l">
                        @error('phone')
                            <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-md-12 col-12 mt-4">
                        <label class="form-label" for="exampleInputPassword1">Nhu Cầu</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_type" value="0"
                                    id="customCheckinlh1" data-gtm-form-interact-field-id="1" checked>
                                <label class="form-check-label" for="customCheckinlh1"> Thuê </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_type" value="1"
                                    id="customCheckinlh2" data-gtm-form-interact-field-id="0">
                                <label class="form-check-label" for="customCheckinlh2"> Mua </label>
                            </div>
                        </div>
                    </div>
                    <small class="form-text d-block text-muted mt-4" style="color: black;">Lưu ý: Hãy Điền Đầy Đủ
                        <span style="color: red;"> Thông Tin Cá Nhân</span> Để Được Nhận <span style="color: red;">Hỗ
                            Trợ</span> Dịch Vụ Nhanh Nhất Nhé...</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
            </form>
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
