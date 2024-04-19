@extends ('FEadmin.master')
@php
    use Carbon\Carbon;
@endphp
@section('css_view')
    @include('FEadmin.Layout.Head.css_dataTable')
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
                            <li class="breadcrumb-item" aria-current="page">Danh Sách</li>
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
                    <div class="card-header">
                        <h5>Danh Sách Quản Trị</h5>
                    </div>
                    <div class="card-body">
                        <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap"
                            style="width: 100%">
                            <thead>
                                <tr>
                                    <th>stt</th>
                                    <th>Họ và Tên</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Chức năng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><a href="{{ $value->linkFacebook }}" target="_blank">{{ $value->fullName }}</a></td>
                                        <td>{{ $value->email ? $value->email : "Không Có" }}</td>
                                        <td>{{ $value->phone ? $value->phone : "Không Có" }}</td>
                                        <td class="action">
                                          <div class="btn-group-dropdown">
                                            <button class="btn btn-outline-secondary dropdown-toggle btn-sm mg-button-left" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lựa chọn</button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="{{route('delete_quan_tri_nhom', $value->slugUser) }}" title="Delete" onclick="return confirm('Bạn Có Chắc Muốn Xóa Quản Trị {{ $value->fullName }} Không?')">
                                                <span style="display: flex; justify-content: flex-start; color: #dc2626;"><i class="ti ti-trash me-1"></i> Xóa</span>
                                              </a>
                                              <a class="dropdown-item" href="{{route('view_update_quan_tri_nhom', $value->slugUser) }}"><span style="display: flex; justify-content: flex-start; color: #2ca87f;"><i class="ti ti-pencil me-1"></i> Cập Nhật</span></a>
                                            </div>
                                          </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('view_js')
    @include('FEadmin.Layout.Fooder.js_dataTable')
@stop
