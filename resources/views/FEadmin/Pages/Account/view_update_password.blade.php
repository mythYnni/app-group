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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Hệ Thống</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Nhân sự</a></li>
                            <li class="breadcrumb-item" aria-current="page">Cập Nhật Mật Khẩu</li>
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
            <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                <!-- Basic Inputs -->
                <form class="card" method="POST" id="formReset">
                    @csrf
                    <div class="card-header">
                        <h5>Cập Nhật Mật Khẩu Nhân Sự</h5>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-6">
                            <label class="form-label">Tên nhân sự</label>
                            <input type="text" class="form-control form-control" placeholder="Tên nhân sự" disabled
                                onkeyup="ChangeToSlug();" fdprocessedid="w3ptog" name="fullName" id="slug"
                                value="{{ $obj->fullName }}">
                            @error('fullName')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Phone nhân sự</label>
                            <input type="text" class="form-control form-control" placeholder="Phone nhân sự" disabled
                                fdprocessedid="w3ptog" name="phone" value="{{ $obj->phone }}">
                            @error('phone')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email nhân sự</label>
                            <input type="email" class="form-control form-control" placeholder="Email nhân sự"
                                fdprocessedid="w3ptog" name="email" disabled value="{{ $obj->email }}">
                            @error('email')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Ngày sinh</label>
                            <input class="form-control" type="date" name="birthday" value="{{ $obj->birthday }}" disabled
                                id="demo-date-only">
                            @error('birthday')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="exampleSelect1">Phân quyền</label>
                            <select class="form-select" id="exampleSelect1" name="decentralization" disabled>
                                <option value="0" {{ $obj->decentralization == '0' ? 'selected' : '' }}>Quản Trị
                                </option>
                                <option value="1" {{ $obj->decentralization == '1' ? 'selected' : '' }}>Nhân Sự
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="exampleInputPassword1">Mật khẩu Mới</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                placeholder="Password">
                            @error('password')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="exampleInputPassword1">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="check_password"
                                placeholder="Password">
                            @error('check_password')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary me-2" type="submit">Cập Nhật</button>
                        <a href="{{ url()->previous() }}" class="btn btn-light">Quay Lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('view_js')
    @include('FEadmin.Layout.Fooder.js_fooder')
    @include('FEadmin.Layout.JS.Change_to_slug')
    @include('FEadmin.Layout.JS.Reset_button')
@stop
