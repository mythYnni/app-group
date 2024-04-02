@extends ('FEadmin.master')
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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Danh Mục</a></li>
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
            <div class="card">
              <div class="card-header">
                <h5>Thêm Mới Danh Mục</h5>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <label class="form-label">Tên danh mục</label>
                  <input type="text" class="form-control form-control" placeholder="Tên danh mục" fdprocessedid="w3ptog">
                  <small>Your password must be between 8 and 30 characters.</small>
                </div>
                <div class="form-group">
                  <label class="form-label" for="exampleInputPassword1">Đường dẫn sạch</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Đường dẫn sạch" disabled fdprocessedid="qaalh">
                  <small>Your password must be between 8 and 30 characters.</small>
                </div>
                <div class="form-group row mb-0">
                    <label class="form-label" for="exampleInputstatus">Trạng thái</label>
                    <div class="col-sm-12">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="group6" value="" id="customCheckinlhstate1" checked="" data-gtm-form-interact-field-id="2">
                        <label class="form-check-label" for="customCheckinlhstate1"> Hiện </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="group6" value="" id="customCheckinlhstate2"  data-gtm-form-interact-field-id="1">
                        <label class="form-check-label" for="customCheckinlhstate2"> Ẩn </label>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary me-2" fdprocessedid="q5wuvg">Thêm Mới</button>
                <button type="reset" class="btn btn-light" fdprocessedid="z20z4d">Đặt Lại</button>
              </div>
            </div>
        </div>
    </div>
</div>
@stop