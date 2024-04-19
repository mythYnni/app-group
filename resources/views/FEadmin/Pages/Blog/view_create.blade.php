@extends ('FEadmin.master')
@section('css_view')
    @include('FEadmin.Layout.Head.css_header')
    @include('FEadmin.Layout.Head.js_header')
    <style>
        #editor {
            width: 100%;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 400px;
        }

        .ck-content .image {
            /* Block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Bài Viết</a></li>
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
            <div class="col-sm-12 col-md-12 col-lg-12">
                <!-- Basic Inputs -->
                <form class="card" action="{{ route('creater_blog') }}" method="POST" id="formReset"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h5>Thêm Mới Bài Viết</h5>
                    </div>
                    <div class="card-body row">
                        @error('status')
                            <div class="alert alert-primary col-12">
                                <div class="media align-items-center col-6">
                                    <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
                                    <div class="media-body ms-3">{{ $message }}.</div>
                                </div>
                            </div>
                        @enderror
                        @error('status_type')
                            <div class="alert alert-primary col-6">
                                <div class="media align-items-center">
                                    <i class="ti ti-info-circle h2 f-w-400 mb-0"></i>
                                    <div class="media-body ms-3">{{ $message }}.</div>
                                </div>
                            </div>
                        @enderror
                        <div class="form-group col-6">
                            <label class="form-label">Tiêu Đề</label>
                            <input type="text" class="form-control form-control" placeholder="Tiêu Đề"
                                onkeyup="ChangeToSlug();" fdprocessedid="w3ptog" name="name" id="slug"
                                value="{{ old('name') }}">
                            @error('name')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                            @error('slug')
                                <small style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label">Đường dẫn sạch</label>
                            <input type="text" class="form-control" name="slug" value="{{ old('slug') }}"
                                id="convert_slug" placeholder="Đường dẫn sạch" readonly fdprocessedid="qaalh">
                        </div>
                        <div class="form-group col-6">
                            <div class="input-group">
                                <input type="file" class="form-control" id="inputGroupFile02" name="file">
                                <label class="input-group-text" for="inputGroupFile02">Ảnh</label>
                            </div>
                            @error('file')
                                <small class="mb-3" style="color: #f33923;">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">

                            @error('detail')
                                <div class="form-group">
                                    <div class="alert alert-danger">
                                        <strong>Cảnh Báo!</strong> Nội Dung Bài Viết Không Được Để Trống!
                                    </div>
                                </div>
                            @enderror
                            <div class="form-group">
                                <textarea name="detail" id="editor">
                                        {{ old('detail') ?? 'Nội Dung Bài Viết' }}
                                    </textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
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
    @include('FEadmin.Layout.JS.formTiny')
    @include('FEadmin.Layout.Fooder.js_fooder')
    @include('FEadmin.Layout.JS.Change_to_slug')
    @include('FEadmin.Layout.JS.Reset_button')
@stop
