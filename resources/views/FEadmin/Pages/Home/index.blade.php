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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Kinh Doanh</a></li>
                        <li class="breadcrumb-item" aria-current="page">Thống Kê</li>
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

    </div>
    <!-- [ Main Content ] end -->
</div>
@stop
@section('view_js')
    @include('FEadmin.Layout.Fooder.js_fooder')
@stop