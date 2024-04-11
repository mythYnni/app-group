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
@endphp
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="title-heading text-center">
                    {{-- <h5 class="heading fw-semibold mb-0 sub-heading">Job Vacancies</h5> --}}
                </div>
            </div>
            <!--end col-->
            <div class="col-12 mt-4">
                <div class="features-absolute">
                    <div class="d-md-flex justify-content-between align-items-center bg-white shadow rounded p-4">
                        <form class="card-body text-start">
                            <div class="registration-form text-dark text-start">
                                <div class="row g-lg-1">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                        <div class="input-group search-form">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                            <input type="text" class="form-control" placeholder="Tìm kiếm....."
                                                style="border-bottom-right-radius: 7px; border-top-right-radius: 7px; border: 1px solid #e7e7e7;">
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <select class="form-select" fdprocessedid="o6qc3">
                                                <option>Danh Mục</option>
                                                @foreach ($list_category as $value)
                                                <option value="{{ $value }}">
                                                    {{ $value }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-4 col-md-4 col-12">
                                        <div class="form-group">
                                            <select class="form-select" id="city" name="province">
                                                <option value="" selected>Chọn Tỉnh Thành/ Thành Phố</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-3 col-12">
                                        <div class="form-group">
                                            <select class="form-select" id="district" name="district">
                                                <option value="" selected>Chọn Quận/Huyện</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-2 col-lg-3 col-md-3 col-12">
                                        <div class="form-group">
                                            <select class="form-select" id="ward" name="wards">
                                                <option value="" selected>Chọn Phường/Xã</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-1 col-lg-1 col-md-1 col-12">
                                        <div class="form-group" style="text-align: end;">
                                            <button type="button" class="btn btn-primary d-inline-flex"><i
                                                    class="ti ti-circle-check me-1"></i>Lọc</button>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </form>
                        <!--end form-->
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->

    <div class="container">
        <div class="alert alert-success" style="padding: 0px; background: #341eb9; border-color: #341eb9;">
            <img loading="lazy" class="responsite-image-text" style="margin-left: 15px;"
                src="{{ url('assets') }}/images/Minimalist_Blue_Green_Real_Estate_Company_Group_Logo-removebg-preview.png"
                alt="grid">
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
            <div class="col-12">
                <div
                    class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                    <div class="d-flex align-items-center w-400px">
                        <div>
                            <a href="{{ $value->linkGroup }}" target="_blank" class="h5 title text-dark">{{
                                $value->nameGroup }}</a>
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

                    @if(!empty($address))
                    <div class="d-blog align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-350px">
                        <span class="text-muted d-flex align-items-center"><i data-feather="map-pin"
                                class="fea icon-sm me-1 align-middle"></i>{{ $value->objCategory->name }}</span>
                        <span class="d-flex fw-medium mt-md-2 mb-10px" style="font-size: 11.5px;">{{ $address }}</span>
                    </div>
                    @else
                    <div class="d-blog align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-350px">
                        <span class="text-muted d-flex align-items-center"><i data-feather="map-pin"
                                class="fea icon-sm me-1 align-middle"></i>Vị Trí</span>
                        <span class="d-flex fw-medium mt-md-2 mb-10px" style="font-size: 11.5px;">{{
                            $value->objCategory->name }}</span>
                    </div>
                    @endif

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
        <div class="row" style="margin: 0px 0px 50px 0px;">
            <div class="col-12 mt-4 pt-2" style="text-align: center;">
                <a href="#" class="btn btn-sm btn-primary w-full ms-md-1">Xem Thêm</a>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->

    <div class="container">
        <div class="alert alert-success" style="padding: 0px; background: #341eb9; border-color: #341eb9;">
            <img loading="lazy" class="responsite-image-text"
                src="{{ url('assets') }}/images/Minimalist_Blue_Green_Real_Estate_Company_Group_Logo__2_-removebg-preview.png"
                style="margin-left: 15px;" alt="grid">
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
                            <a href="{{ $value->linkGroup }}" target="_blank" class="h5 title text-dark">{{
                                $value->nameGroup }}</a>
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

                    @if(!empty($address))
                    <div class="d-blog align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-350px">
                        <span class="text-muted d-flex align-items-center"><i data-feather="map-pin"
                                class="fea icon-sm me-1 align-middle"></i>{{ $value->objCategory->name }}</span>
                        <span class="d-flex fw-medium mt-md-2 mb-10px" style="font-size: 11.5px;">{{ $address }}</span>
                    </div>
                    @else
                    <div class="d-blog align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-350px">
                        <span class="text-muted d-flex align-items-center"><i data-feather="map-pin"
                                class="fea icon-sm me-1 align-middle"></i>Vị Trí</span>
                        <span class="d-flex fw-medium mt-md-2 mb-10px">{{
                            $value->objCategory->name }}</span>
                    </div>
                    @endif

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
        <div class="row">
            <div class="col-12 mt-4 pt-2" style="text-align: center;">
                <a href="#" class="btn btn-sm btn-primary w-full ms-md-1">Xem Thêm</a>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end section-->
@include('FEadmin.Layout.JS.Get_Account')
@stop