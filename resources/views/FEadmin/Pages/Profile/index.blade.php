@extends ('FEadmin.master')
@section('css_view')
    @include('FEadmin.Layout.Head.css_header')
    @include('FEadmin.Layout.Head.js_header')
@stop
@section('view')
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Trang Chủ</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Hồ Sơ</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thông Tin Cá Nhân</li>
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
                                    <i class="ti ti-user me-2"></i>Hồ Sơ
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
                                            <span class="badge bg-primary">{{ Auth::guard('admin')->user()->decentralization == '0' ? 'Quản trị' : 'Nhân sự'}}</span>
                                        </div>
                                        <div class="text-center mt-3">
                                            <div class="chat-avtar d-inline-flex mx-auto">
                                                <img class="rounded-circle img-fluid wid-70"
                                                    src="../assets/images/user/avatar-5.jpg" alt="User image">
                                            </div>
                                            <h5 class="mb-0">{{ Auth::guard('admin')->user()->fullName }}</h5>
                                            <p class="text-muted text-sm">Tài Khoản Quyền Quản Trị</p>
                                            <hr class="my-3 border border-secondary-subtle">
                                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-mail me-2"></i>
                                                <p class="mb-0">{{ Auth::guard('admin')->user()->email }}</p>
                                            </div>
                                            <div class="d-inline-flex align-items-center justify-content-start w-100 mb-3">
                                                <i class="ti ti-phone me-2"></i>
                                                <p class="mb-0">{{ Auth::guard('admin')->user()->phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-xxl-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Thông Tin Cá Nhân</h5>
                                    </div>
                                    <form class="card-body" method="POST" action="{{ route('update_profile') }}">
                                        @csrf
                                        <input type="hidden" name="slugUser" value="{{ Auth::guard('admin')->user()->slugUser }}">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item px-0 pt-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Tên nhân sự</label>
                                                        <input type="text" class="form-control form-control"
                                                            placeholder="Tên nhân sự" fdprocessedid="w3ptog" name="fullName" id="slug"
                                                            value="{{ Auth::guard('admin')->user()->fullName }}">
                                                        @error('fullName')
                                                            <small style="color: #f33923;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Phone nhân sự</label>
                                                        <input type="text" class="form-control form-control" placeholder="Phone nhân sự"
                                                            fdprocessedid="w3ptog" name="phone" value="{{ Auth::guard('admin')->user()->phone }}">
                                                        @error('phone')
                                                            <small style="color: #f33923;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Ngày sinh</label>
                                                        <input class="form-control" type="date" name="birthday" value="{{ Auth::guard('admin')->user()->birthday }}"
                                                            id="demo-date-only">
                                                        @error('birthday')
                                                            <small style="color: #f33923;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Email nhân sự</label>
                                                        <input type="email" class="form-control form-control" placeholder="Email nhân sự"
                                                            fdprocessedid="w3ptog" name="email" disabled value="{{ Auth::guard('admin')->user()->email }}">
                                                        @error('email')
                                                            <small style="color: #f33923;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Giới tính</label>
                                                        <div class="col-sm-12">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sex" value="0"
                                                                    id="customCheckinlhstate1" {{ Auth::guard('admin')->user()->sex == '0' ? 'checked' : '' }}
                                                                    data-gtm-form-interact-field-id="2">
                                                                <label class="form-check-label" for="customCheckinlhstate1"> Nam </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sex" value="1"
                                                                    id="customCheckinlhstate2" {{ Auth::guard('admin')->user()->sex == '1' ? 'checked' : '' }}
                                                                    data-gtm-form-interact-field-id="1">
                                                                <label class="form-check-label" for="customCheckinlhstate2"> Nữ </label>
                                                            </div>
                                                        </div>
                                                        @error('sex')
                                                            <small style="color: #f33923;">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item px-0 pb-0">
                                                <div class="col-12">
                                                    <button style="vertical-align: baseline;" class="btn btn-primary"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cập nhật hồ sơ</font></font></button>
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
