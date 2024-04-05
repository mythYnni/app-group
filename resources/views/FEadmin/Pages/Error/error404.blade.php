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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Lỗi</a></li>
                            <li class="breadcrumb-item" aria-current="page">Lỗi Hệ Thống</li>
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
                <div class="card error-card">
                    <div class="card-body">
                        <div class="error-image-block">
                            <div class="row justify-content-center">
                                <div class="col-10">
                                    <img class="img-fluid" src="{{ url('assets') }}/images/pages/img-error-500.svg" alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mt-4"><b>Lỗi máy chủ nội bộ</b></h1>
                            <p class="mt-2 mb-4 text-sm text-muted">Lỗi máy chủ 404. Chúng tôi đang khắc phục sự cố. vui lòng
                                thử lại ở giai đoạn sau.</p>
                            <a href="{{route('view_home_admin')}}" class="btn btn-primary mb-3">Trang Chủ</a>
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
