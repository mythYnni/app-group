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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Banner & Popup</a></li>
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
            <div class="col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3">
                <!-- Basic Inputs -->
                <form class="card" action="{{ route('creater_banner') }}" method="POST" id="formReset"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h5>Thêm Mới Banner & Popup</h5>
                    </div>
                    <div class="card-body">
                        @error('status')
                            <div class="alert alert-primary">
                                <div class="media align-items-center">
                                    <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
                                    <div class="media-body ms-3">{{ $message }}.</div>
                                </div>
                            </div>
                        @enderror
                        @error('status_type')
                            <div class="alert alert-primary">
                                <div class="media align-items-center">
                                    <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
                                    <div class="media-body ms-3">{{ $message }}.</div>
                                </div>
                            </div>
                        @enderror
                        <div class="form-group">
                            <label class="form-label">Tên Banner & Popup</label>
                            <input type="text" class="form-control form-control" placeholder="Tên Banner & Popup"
                                onkeyup="ChangeToSlug();" fdprocessedid="w3ptog" name="name" id="slug"
                                value="{{ old('name') }}">
                            @error('name')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                            @error('slug')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Đường dẫn sạch</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}"
                                id="convert_slug" placeholder="Đường dẫn sạch" readonly fdprocessedid="qaalh">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Link Liên Kết</label>
                            <input type="text" class="form-control" name="link" value="{{ old('link') }}"
                                placeholder="Đường dẫn" fdprocessedid="qaalh">
                            @error('link')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" name="file">
                            <label class="input-group-text" for="inputGroupFile02">Ảnh</label>
                        </div>
                        @error('file')
                            <small class="mb-3" style="color: #f33923;">{{ $message }}</small>
                        @enderror
                        <div class="form-group row mb-0">
                            <div class="col-12 col-md-6">
                                <label class="form-label">Định Dạng</label>
                                <div class="col-sm-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_type" value="0"
                                            id="customCheckinlhstate1" {{ old('status_type') == '0' ? 'checked' : '' }}
                                            data-gtm-form-interact-field-id="2">
                                        <label class="form-check-label" for="customCheckinlhstate1"> Banner </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status_type" value="1"
                                            id="customCheckinlhstate2" {{ old('status_type') == '1' ? 'checked' : '' }}
                                            data-gtm-form-interact-field-id="1">
                                        <label class="form-check-label" for="customCheckinlhstate2"> Popup </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label">Trạng thái</label>
                                <div class="col-sm-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="0"
                                            id="customCheckinlhstate1" {{ old('status') == '0' ? 'checked' : '' }}
                                            data-gtm-form-interact-field-id="2">
                                        <label class="form-check-label" for="customCheckinlhstate1"> Hiện </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="status" value="1"
                                            id="customCheckinlhstate2" {{ old('status') == '1' ? 'checked' : '' }}
                                            data-gtm-form-interact-field-id="1">
                                        <label class="form-check-label" for="customCheckinlhstate2"> Ẩn </label>
                                    </div>
                                </div>
                            </div>
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
