@extends ('FEadmin.master')
@section('css_view')
    @include('FEadmin.Layout.Head.css_header')
    @include('FEadmin.Layout.Head.js_header')
@stop
@php
    $typeHTML = [
        0 => ['name' => 'Riêng Tư', 'color' => 'bg-pink-900'],
        1 => ['name' => 'Công Khai', 'color' => 'bg-purple-900'],
    ];

    $statusHTML = [
        0 => ['name' => 'Hiển Thị', 'color' => 'bg-cyan-900'],
        1 => ['name' => 'Lưu trữ', 'color' => 'bg-gray-800'],
    ];

@endphp
@section('view')
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Kinh Doanh</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Hỗ Trợ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Cập Nhật</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        {{-- <div class="page-header-title">
                        <h2 class="mb-0">Thống Kê</h2>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body py-0">
                        <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                    role="tab" aria-selected="true">
                                    <i class="ti ti-user me-2"></i>Thông Tin Hỗ Trợ
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                        <div class="row">
                            <div class="col-lg-4 col-xxl-3">
                                <div class="card">
                                    <div class="card-body position-relative">
                                        <div class="position-absolute end-0 top-0 p-3">
                                            <span
                                                class="badge bg-primary">{{ $objs->status_type == '0' ? 'Thuê' : 'Mua' }}</span>
                                        </div>
                                        <div class="text-center mt-3">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-70"
                                                    src="{{ url('assets') }}/images/user/avatar-1.jpg" alt="User image">
                                            </div>
                                            <h5 class="mb-0">{{ $objs->name_account }}</h5>
                                            <p class="text-muted text-sm">Thông Tin Khách Hàng</p>
                                            <hr class="my-3 border border-secondary-subtle">
                                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-mail me-2"></i>
                                                <p class="mb-0">{{ $objs->email }}</p>
                                            </div>
                                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-phone me-2"></i>
                                                <p class="mb-0">{{ $objs->phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xxl-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Thông Tin Dịch Vụ</h5>
                                    </div>
                                    <form class="card-body" method="POST">
                                        @php
                                            $type = $typeHTML[$obj_group->type] ?? [
                                                'name' => 'Không Xác Định',
                                                'color' => '#000000',
                                            ];
                                            $typeName = $type['name'];
                                            $typeColor = $type['color'];
                                        @endphp
                                        @php
                                            $status_color = $statusColor_HTML[$obj_group->status_color] ?? [
                                                'background' => '#000000',
                                            ];
                                            $color_backgroup = $status_color['background'];
                                        @endphp
                                        @csrf
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label"><a href="{{ $obj_group->linkGroup }}"> Tên
                                                                Nhóm: {{ $obj_group->nameGroup }}</a></label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Thành Viên:
                                                            {{ $obj_group->account_group }} Thành viên</label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Loại Nhóm: {{ $typeName }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label">Quản Trị:
                                                            <div style="white-space: normal; margin-top: 5px;">
                                                                @php
                                                                    $admin = json_decode($obj_group->name_user_group);
                                                                @endphp
                                                                @foreach ($admin as $value)
                                                                    <span
                                                                        class="badge bg-light-primary">{{ $value->name }}</span>
                                                                @endforeach
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Giá Thuê:
                                                            {{ number_format($obj_group->rent_cost, 0, ',', '.') }}</label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Giá Bán:
                                                            {{ number_format($obj_group->price, 0, ',', '.') }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Danh Mục:
                                                            {{ $obj_group->category }}</label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Thành Viên / Tuần:
                                                            {{ $obj_group->account_group_week }} Thành Viên</label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <label class="form-label">Bài Viết / Tuần:
                                                            {{ $obj_group->account_group_blog }} Bài viến</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-12 col-md-3">
                                                        <label class="form-label">Vị Trí:
                                                            {{ $obj_group->objCategory->name }}</label>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <label class="form-label">Thành Phố:
                                                            {{ $obj_group->province }}</label>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <label class="form-label">Quận / Huyện:
                                                            {{ $obj_group->district }}</label>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <label class="form-label">Phường / Xã:
                                                            {{ $obj_group->wards }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tình Trạng</label>
                                                        <div class="col-sm-12">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" value="0"
                                                                    id="customCheckinlhstate6"
                                                                    {{ $objs->status == 0 ? 'checked' : '' }}
                                                                    data-gtm-form-interact-field-id="2">
                                                                <label class="form-check-label"
                                                                    for="customCheckinlhstate6"> Chờ Hỗ Trợ  </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="status" value="1"
                                                                    id="customCheckinlhstate7"
                                                                    {{ $objs->status == 1 ? 'checked' : '' }}
                                                                    data-gtm-form-interact-field-id="1">
                                                                <label class="form-check-label"
                                                                    for="customCheckinlhstate7"> Đang Hỗ Trợ </label>
                                                            </div>
                                                        </div>
                                                        @error('status')
                                                            <small style="color: #f33923;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label class="form-label">Note</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="note">{{ $objs->note}}</textarea>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pb-0">
                                                <div class="col-12">
                                                    <button style="vertical-align: baseline;" class="btn btn-primary">
                                                        <font style="vertical-align: inherit;">
                                                            <font style="vertical-align: inherit;">Cập nhật</font>
                                                        </font>
                                                    </button>
                                                </div>
                                            </li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
@stop
@section('view_js')
    @include('FEadmin.Layout.Fooder.js_fooder')
@stop
