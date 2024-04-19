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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Quản Trị</a></li>
                            <li class="breadcrumb-item" aria-current="page">Thêm Mới</li>
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
            <div class="col-sm-12 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2 col-xxl-8 offset-xxl-2">
                <!-- Basic Inputs -->
                <form class="card" action="{{ route('creater_quan_tri_nhom') }}" method="POST" id="formReset">
                    @csrf
                    <div class="card-header">
                        <h5>Thêm Mới Quản Trị</h5>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Tên Quản Trị</label>
                            <input type="text" class="form-control form-control" placeholder="Tên Quản Trị"
                                onkeyup="ChangeToSlug();" fdprocessedid="w3ptog" name="fullName" id="slug"
                                value="{{ old('fullName') }}">
                            @error('fullName')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Phone Quản Trị</label>
                            <input type="text" class="form-control form-control" placeholder="Phone Quản Trị"
                                fdprocessedid="w3ptog" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Email Quản Trị</label>
                            <input type="email" class="form-control form-control" placeholder="Email Quản Trị"
                                fdprocessedid="w3ptog" name="email" value="{{ old('email') }}">
                            @error('email')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="exampleInputPassword1">Link Facebook</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" name="linkFacebook" value="{{ old('linkFacebook') }}" placeholder="Link Facebook">
                            @error('linkFacebook')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary me-2" type="submit">Thêm Mới</button>
                        <button type="reset" class="btn btn-light" id="resetBtn">Đặt Lại</button>
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
