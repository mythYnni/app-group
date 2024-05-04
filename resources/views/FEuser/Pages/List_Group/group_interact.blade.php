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

        $province = isset($filters['province']) ? $filters['province'] : "";
        $district = isset($filters['district']) ? $filters['district'] : "";
        $wards = isset($filters['wards']) ? $filters['wards'] : "";
        $category = isset($filters['category']) ? $filters['category'] : "";
        $search = isset($filters['search']) ? $filters['search'] : "";

    @endphp
    <section class="section" style="min-height: 1000px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        {{-- <h5 class="heading fw-semibold mb-0 sub-heading">Job Vacancies</h5> --}}
                    </div>
                </div><!--end col-->
                <div class="col-12 mt-4">
                    <div class="features-absolute">
                        <div class="d-md-flex justify-content-between align-items-center bg-white shadow rounded p-4">
                            <form class="card-body text-start" method="get">
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-1" id="menuSearch">

                                    </div><!--end row-->
                                </div>
                            </form><!--end form-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container">
            <div class="alert alert-success" style="padding: 0px; background: #ff0018; border-color: #ff0018;">
                <img loading="lazy" class="responsite-image-text" style="margin-left: 15px;"
                    src="{{ url('assets') }}/images/Minimalist_Blue_Green_Real_Estate_Company_Group_Logo-removebg-preview.png"
                    alt="grid">
            </div>
            @if (isset($filters['province']) && isset($filters['district']) && isset($filters['wards']))
                <div class="col-lg-12 col-md-12">
                    <div class="mb-4">
                        <div class="accordion mt-4 pt-2" id="buyingquestion">
                            <div class="accordion-item rounded">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-0 bg-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        {{ $filters['province'] }}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse border-0 collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#buyingquestion">
                                    <div class="accordion-body text-muted">
                                        <div class="row g-2">
                                            @foreach ($allByProvince as $key => $value)
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
                                                                <span
                                                                    class="d-flex fw-medium mt-md-2" font-size: 12px;>{{ $value->account_group }}
                                                                    Thành Viên</span>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-120px">
                                                            <span
                                                                class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-lg-2"><i
                                                                    class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-280px">
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                                                Giá Thuê:
                                                                {{ number_format($value->rent_cost, 0, ',', '.') }}
                                                                vnđ / tháng</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2 mb-10px">
                                                                Giá Bán: {{ number_format($value->price, 0, ',', '.') }}
                                                                vnđ</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-2 mt-md-0 w-350px truncate">
                                                            <span class="text-muted d-flex align-items-center mt-md-2"><i
                                                                    data-feather="map-pin"
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
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item rounded mt-2">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button border-0 bg-light collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        {{ $filters['district'] }}
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse border-0 collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#buyingquestion">
                                    <div class="accordion-body text-muted">
                                        <div class="row g-2">
                                            @foreach ($allByProvinceAndDistrict as $key => $value)
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
                                                                <span
                                                                    class="d-flex fw-medium mt-md-2"  style="font-size: 12px;">{{ $value->account_group }}
                                                                    Thành Viên</span>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-120px">
                                                            <span
                                                                class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-lg-2"><i
                                                                    class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-280px">
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                                                Giá Thuê:
                                                                {{ number_format($value->rent_cost, 0, ',', '.') }}
                                                                vnđ / tháng</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2 mb-10px">
                                                                Giá Bán: {{ number_format($value->price, 0, ',', '.') }}
                                                                vnđ</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-2 mt-md-0 w-350px truncate">
                                                            <span class="text-muted d-flex align-items-center mt-md-2"><i
                                                                    data-feather="map-pin"
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
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item rounded mt-2">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button border-0 bg-light collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        {{ $filters['wards'] }}
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse border-0 collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#buyingquestion">
                                    <div class="accordion-body text-muted">
                                        <div class="row g-2">
                                            @foreach ($searchResult as $key => $value)
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
                                                                <span
                                                                    class="d-flex fw-medium mt-md-2"  style="font-size: 12px;">{{ $value->account_group }}
                                                                    Thành Viên</span>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-120px">
                                                            <span
                                                                class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-lg-2"><i
                                                                    class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-280px">
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                                                Giá Thuê:
                                                                {{ number_format($value->rent_cost, 0, ',', '.') }}
                                                                vnđ / tháng</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2 mb-10px">
                                                                Giá Bán: {{ number_format($value->price, 0, ',', '.') }}
                                                                vnđ</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-2 mt-md-0 w-350px truncate">
                                                            <span class="text-muted d-flex align-items-center mt-md-2"><i
                                                                    data-feather="map-pin"
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(isset($filters['province']) && isset($filters['district']) && !isset($filters['wards']))
                <div class="col-lg-12 col-md-12">
                    <div class="mb-4">
                        <div class="accordion mt-4 pt-2" id="buyingquestion">
                            <div class="accordion-item rounded">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button border-0 bg-light" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        {{ $filters['province'] }}
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse border-0 collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#buyingquestion">
                                    <div class="accordion-body text-muted">
                                        <div class="row g-2">
                                            @foreach ($allByProvince as $key => $value)
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
                                                                        class="h5 title text-dark"  style="font-size: 12px;">{{ $value->nameGroup }}</a>

                                                                </div>
                                                                <span
                                                                    class="d-flex fw-medium mt-md-2">{{ $value->account_group }}
                                                                    Thành Viên</span>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-120px">
                                                            <span
                                                                class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-lg-2"><i
                                                                    class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-280px">
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                                                Giá Thuê:
                                                                {{ number_format($value->rent_cost, 0, ',', '.') }}
                                                                vnđ / tháng</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2 mb-10px">
                                                                Giá Bán: {{ number_format($value->price, 0, ',', '.') }}
                                                                vnđ</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-2 mt-md-0 w-350px truncate">
                                                            <span class="text-muted d-flex align-items-center mt-md-2"><i
                                                                    data-feather="map-pin"
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
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item rounded mt-2">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button border-0 bg-light collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                        {{ $filters['district'] }}
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse border-0 collapse"
                                    aria-labelledby="headingTwo" data-bs-parent="#buyingquestion">
                                    <div class="accordion-body text-muted">
                                        <div class="row g-2">
                                            @foreach ($searchResult as $key => $value)
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
                                                                <span
                                                                    class="d-flex fw-medium mt-md-2"  style="font-size: 12px;">{{ $value->account_group }}
                                                                    Thành Viên</span>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="d-flex align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-120px">
                                                            <span
                                                                class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-lg-2"><i
                                                                    class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-280px">
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2">
                                                                Giá Thuê:
                                                                {{ number_format($value->rent_cost, 0, ',', '.') }}
                                                                vnđ / tháng</span>
                                                            <span
                                                                class="text-muted d-flex align-items-center fw-medium mt-md-2 mb-10px">
                                                                Giá Bán: {{ number_format($value->price, 0, ',', '.') }}
                                                                vnđ</span>
                                                        </div>

                                                        <div
                                                            class="d-blog align-items-center justify-content-between d-xl-block mt-2 mt-md-0 w-350px truncate">
                                                            <span class="text-muted d-flex align-items-center mt-md-2"><i
                                                                    data-feather="map-pin"
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif(isset($filters['province']) && !isset($filters['district']) && !isset($filters['wards']))
                <div class="row g-2">
                    @foreach ($searchResult as $key => $value)
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
                                        <span class="d-flex fw-medium mt-md-2"  style="font-size: 12px;">{{ $value->account_group }} Thành
                                            Viên</span>
                                    </div>
                                </div>

                                <div
                                    class="d-flex align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-120px">
                                    <span class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                    <span class="text-muted d-flex align-items-center fw-medium mt-lg-2"><i
                                            class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                                </div>

                                <div
                                    class="d-blog align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-280px">
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
                <div class="row" style="margin: 0px 0px 50px 0px;">
                    <div class="col-12 mt-4 pt-2" style="text-align: center;">
                        @if (ceil($searchResult->total() / 12) > 1)
                            <?php
                            $current_page = isset($_GET['page']) ? $_GET['page'] : '1';
                            $page = $current_page - 1;
                            $pages = $current_page + 1;
                            $maxPage = ceil($searchResult->total() / 12);
                            $check = $current_page;
                            ?>
                            @if ($current_page > 1)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $current_page - 1 }}" aria-label="Previous">
                                        <span aria-hidden="true"><i class="mdi mdi-chevron-left fs-6"></i></span>
                                    </a>
                                </li>
                            @endif

                            @for ($i = max(1, $current_page - 1); $i <= min($maxPage, $current_page + 2); $i++)
                                <li class="page-item {{ $i == $searchResult->currentPage() ? 'active' : '' }}"><a
                                        class="page-link" href="?page={{ $i }}">{{ $i }}</a></li>
                            @endfor

                            @if ($current_page < $maxPage)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $current_page + 1 }}" aria-label="Next">
                                        <span aria-hidden="true"><i class="mdi mdi-chevron-right fs-6"></i></span>
                                    </a>
                                </li>
                            @endif
                        @else
                        @endif
                    </div><!--end col-->
                </div><!--end row-->
            @else
                <div class="row g-2">
                    @foreach ($searchResult as $key => $value)
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
                                        <span class="d-flex fw-medium mt-md-2"  style="font-size: 12px;">{{ $value->account_group }} Thành
                                            Viên</span>
                                    </div>
                                </div>

                                <div
                                    class="d-flex align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-120px">
                                    <span class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                    <span class="text-muted d-flex align-items-center fw-medium mt-lg-2"><i
                                            class="fea icon-sm me-1 align-middle fas fa-map-signs"></i>{{ $value->category }}</span>
                                </div>

                                <div
                                    class="d-blog align-items-center justify-content-between d-xl-block mt-3 mt-md-0 w-280px">
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
                <div class="row" style="margin: 0px 0px 50px 0px;">
                    <div class="col-12 mt-4 pt-2" style="text-align: center;">
                        @if (ceil($searchResult->total() / 12) > 1)
                            <?php
                            $current_page = isset($_GET['page']) ? $_GET['page'] : '1';
                            $page = $current_page - 1;
                            $pages = $current_page + 1;
                            $maxPage = ceil($searchResult->total() / 12);
                            $check = $current_page;
                            ?>
                            @if ($current_page > 1)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $current_page - 1 }}" aria-label="Previous">
                                        <span aria-hidden="true"><i class="mdi mdi-chevron-left fs-6"></i></span>
                                    </a>
                                </li>
                            @endif

                            @for ($i = max(1, $current_page - 1); $i <= min($maxPage, $current_page + 2); $i++)
                                <li class="page-item {{ $i == $searchResult->currentPage() ? 'active' : '' }}"><a
                                        class="page-link" href="?page={{ $i }}">{{ $i }}</a></li>
                            @endfor

                            @if ($current_page < $maxPage)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $current_page + 1 }}" aria-label="Next">
                                        <span aria-hidden="true"><i class="mdi mdi-chevron-right fs-6"></i></span>
                                    </a>
                                </li>
                            @endif
                        @else
                        @endif
                    </div><!--end col-->
                </div><!--end row-->
            @endif
        </div><!--end container-->
    </section><!--end section-->
@stop
@section('view_js')
    @include('FEuser.Layout.Fooder.JS_Menu')
    {{-- @include('FEadmin.Layout.JS.Get_Account') --}}
@stop
