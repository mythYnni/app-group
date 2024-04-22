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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Hỗ Trợ Khách Hàng</a></li>
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
                <form class="card" action="{{ route('post_detail_groups') }}" method="POST" id="formReset">
                    @csrf
                    <div class="card-header">
                        <h5>Thêm Mới Khách Hàng</h5>
                    </div>
                    <div class="card-body row">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Tên Khách Hàng</label>
                            <input type="text" class="form-control form-control" placeholder="Tên Khách Hàng"
                                fdprocessedid="w3ptog" name="name_account" value="{{ old('name_account') }}">
                            @error('name_account')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Link Facebook</label>
                            <input type="text" class="form-control form-control" placeholder="Link Facebook"
                                fdprocessedid="w3ptog" name="linkFacebook" value="{{ old('linkFacebook') }}">
                            @error('linkFacebook')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Phone Khách Hàng</label>
                            <input type="text" class="form-control form-control" placeholder="Phone Khách Hàng"
                                fdprocessedid="w3ptog" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Email Khách Hàng</label>
                            <input type="email" class="form-control form-control" placeholder="Email Khách Hàng"
                                fdprocessedid="w3ptog" name="email" value="{{ old('email') }}">
                            @error('email')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-12" style="border: 1px solid;"></div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label" for="exampleSelect1">Nhu Cầu</label>
                            <select class="form-select" id="exampleSelect1" name="status_type">
                                <option value="0" {{ old('status_type') == 0 ? 'selected' : '' }}>Thuê Nhóm</option>
                                <option value="1" {{ old('status_type') == 1 ? 'selected' : '' }}>Mua Nhóm</option>
                            </select>
                        </div>
                        <div class="form-group col-12 col-md-12"></div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Mã Nhóm</label>
                            <input type="text" class="form-control form-control" placeholder="Mã Nhóm"
                                fdprocessedid="w3ptog" name="codeGroup" value="{{ old('codeGroup') }}">
                            @error('codeGroup')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        {{-- Id Nhóm --}}
                        <input type="hidden" class="form-control form-control" name="idGroup"
                            value="{{ old('idGroup') }}">
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Tên Nhóm</label>
                            <input type="text" class="form-control form-control" placeholder="Mã Nhóm" readonly
                                fdprocessedid="w3ptog" name="nameGroup" value="{{ old('nameGroup') }}">
                            @error('nameGroup')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Giá Thuê</label>
                            <input type="text" class="form-control" name="rent_cost" id="rent_cost" readonly
                                value="{{ old('rent_cost') }}" placeholder="Giá Thuê" fdprocessedid="qaalh">
                            @error('rent_cost')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                            <small id="rent_cost_vnd" style="display: none;"></small>
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label class="form-label">Giá Bán</label>
                            <input type="text" class="form-control" name="price" id="price" readonly
                                value="{{ old('price') }}" placeholder="Giá Bán" fdprocessedid="qaalh">
                            @error('price')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                            <small id="price_vnd" style="display: none;"></small>
                        </div>
                        {{-- Link Nhóm --}}
                        <input type="hidden" class="form-control form-control" name="linkGroup"
                            value="{{ old('linkGroup') }}">
                        <div class="form-group form-group col-12 col-md-12">
                            <label class="form-label" for="exampleFormControlTextarea1">Note</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="note">{{ old('note') }}</textarea>
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
    @include('FEadmin.Layout.JS.js_change_code')
    @include('FEadmin.Layout.JS.Change_to_slug')
    @include('FEadmin.Layout.JS.Reset_button')
    @include('FEadmin.Layout.JS.Price')
@stop
