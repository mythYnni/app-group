@extends ('FEadmin.master')
@php
use Carbon\Carbon;

$typeHTML = [
0 => ['name' => 'Bài Viết', 'color' => 'bg-blue-300'],
1 => ['name' => 'Tư Vấn Cá Nhân', 'color' => 'bg-indigo-300'],
2 => ['name' => 'Tư Vấn Doanh Nghiệp', 'color' => 'bg-purple-200'],
3 => ['name' => 'Khóa Học Online', 'color' => 'bg-pink-200'],
4 => ['name' => 'Dịch Vụ Xây Nhóm', 'color' => 'bg-red-300'],
5 => ['name' => 'Phát Triển Nhóm', 'color' => 'bg-orange-300'],
6 => ['name' => 'Tăng Thành Viên Nhóm', 'color' => 'bg-yellow-300'],
7 => ['name' => 'Tăng Like/Follow Fanpage', 'color' => 'bg-green-400'],
8 => ['name' => 'Dịch Vụ Facebook', 'color' => 'bg-teal-300'],
9 => ['name' => 'Thiết Kế Website', 'color' => 'bg-cyan-400'],
];

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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Bài Viết</a></li>
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
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
            <div class="card">
                <div class="card-header">
                    <h5>Danh Sách Bài Viết</h5>
                </div>
                <div class="card-body">
                    <table id="res-config" class="display table table-striped table-hover dt-responsive nowrap"
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th>stt</th>
                                <th>Tiêu Đề</th>
                                <th>Phân Loại</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $key => $value)
                            @php
                            $type = $typeHTML[$value->typeBlog] ?? [
                            'name' => 'Không Xác Định',
                            'color' => '#000000',
                            ];
                            $typeName = $type['name'];
                            $typeColor = $type['color'];
                            @endphp
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->name }}</td>
                                <td><span class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                </td>
                                <td>{{ Carbon::parse($value->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm]
                                    YYYY, H:mm:ss A') }}
                                </td>
                                <td>
                                    @if (intval($value->status == 0))
                                    <span class="badge rounded-pill text-bg-success">Hiện</span>
                                    @else
                                    <span class="badge rounded-pill text-bg-warning text-dark">Ẩn</span>
                                    @endif
                                </td>
                                <td class="action">
                                    <div class="btn-group-dropdown">
                                        <button class="btn btn-outline-secondary dropdown-toggle btn-sm mg-button-left"
                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Lựa chọn</button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item text-inverse pr-10 blog_detail"
                                                data-id="{{ $value->slug }}" data-toggle="tooltip" title="Edit">
                                                <span
                                                    style="display: flex; justify-content: flex-start; color: #2686dc;"><i
                                                        class="ti ti-eye me-1"></i> Xem</span>
                                            </a>
                                            <a class="dropdown-item" href="{{ route('delete_blog', $value->slug) }}"
                                                title="Delete"
                                                onclick="return confirm('Bạn Có Chắc Muốn {{ $value->name }} Không?')">
                                                <span
                                                    style="display: flex; justify-content: flex-start; color: #dc2626;"><i
                                                        class="ti ti-trash me-1"></i> Xóa</span>
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ route('view_update_blog', $value->slug) }}"><span
                                                    style="display: flex; justify-content: flex-start; color: #2ca87f;"><i
                                                        class="ti ti-pencil me-1"></i> Cập Nhật</span></a>
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
@include('FEadmin.Layout.Body.modal_detail_blog')
@stop
@section('view_js')
@include('FEadmin.Layout.JS.modal_blog')
@include('FEadmin.Layout.Fooder.js_dataTable')
@stop