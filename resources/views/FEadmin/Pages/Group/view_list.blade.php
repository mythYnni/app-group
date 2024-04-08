@extends ('FEadmin.master')
@php
    use Carbon\Carbon;
@endphp
@section('css_view')
    @include('FEadmin.Layout.Head.css_tableButton_data')
    @include('FEadmin.Layout.Head.js_tableButton_data')
@stop
@php
    $typeHTML = [
        0 => ['name' => 'Riêng Tư', 'color' => 'bg-pink-900'],
        1 => ['name' => 'Công Khai', 'color' => 'bg-purple-900'],
    ];

    $statusHTML = [
        0 => ['name' => 'Hiển Thị', 'color' => 'bg-cyan-900'],
        1 => ['name' => 'Lưu trữ', 'color' => 'bg-gray-800'],
    ];

    $statusColor_HTML = [
        0 => ['color' => '#00874e87', 'background' => '#00874e87'],
        1 => ['color' => '#f1f708', 'background' => '#dbf70854'],
        2 => ['color' => '#ff0000', 'background' => '#e7000069'],
    ];
@endphp
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Group</a></li>
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
                        <h5>Danh Sách Hội Nhóm</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>Mã Nhóm</th>
                                        <th>Tên Nhóm</th>
                                        <th>Danh Mục</th>
                                        <th>Giá Thuê</th>
                                        <th>Giá Bán</th>
                                        <th>Số Lượng Thành Viên</th>
                                        <th>Thành Viên/Tuần</th>
                                        <th>Bài Viết/Tuần</th>
                                        <th>Loại Nhóm</th>
                                        <th>Quản Trị</th>
                                        <th>Vị Trí</th>
                                        <th>Tỉnh Thành</th>
                                        <th>Quận/Huyện</th>
                                        <th>Phường/Xã</th>
                                        <th>Tình Trạng</th>
                                        <th>Người Tạo</th>
                                        <th>Tính Năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $value)
                                        @php
                                            $type = $typeHTML[$value->type] ?? [
                                                'name' => 'Không Xác Định',
                                                'color' => '#000000',
                                            ];
                                            $typeName = $type['name'];
                                            $typeColor = $type['color'];
                                        @endphp
                                        @php
                                            $status_color = $statusColor_HTML[$value->status_color] ?? [
                                                'background' => '#000000',
                                            ];
                                            $color_backgroup = $status_color['background'];
                                        @endphp
                                        @php
                                            $status_type = $statusHTML[$value->status] ?? [
                                                'name' => 'Không Xác Định',
                                                'color' => '#000000',
                                            ];
                                            $statusName = $status_type['name'];
                                            $statusColor = $status_type['color'];
                                        @endphp
                                        <tr style="background-color: {{ $color_backgroup }}">
                                            <td>{{ $value->code }}</td>
                                            <td><span class="h6">{{ $value->nameGroup }}</span></td>
                                            <td>{{ $value->category }}</td>
                                            <td>{{ number_format($value->rent_cost, 0, ',', '.') }}</td>
                                            <td>{{ number_format($value->price, 0, ',', '.') }}</td>
                                            <td>{{ $value->account_group }} thành viên</td>
                                            <td>{{ $value->account_group_week }} người / 1 tuần</td>
                                            <td>{{ $value->account_group_blog }} bài / 1 tuần</td>
                                            <td><span
                                                    class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                            </td>
                                            <td style="max-width: 200px;">
                                                <div style="white-space: normal;">
                                                    @php
                                                        $admin = json_decode($value->name_user_group);
                                                    @endphp
                                                    @foreach ($admin as $obj)
                                                        <span class="badge bg-light-primary">{{ $obj->name }}</span>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td>{{ $value->objCategory->name }}</td>
                                            <td>{{ $value->province }}</td>
                                            <td>{{ $value->district }}</td>
                                            <td>{{ $value->wards }}</td>
                                            <td><span
                                                    class="badge rounded-pill {{ $statusColor }}">{{ $statusName }}</span>
                                            </td>
                                            <td>{{ $value->user_create }} - {{ $value->user_email_create }} <br />
                                                {{ Carbon::parse($value->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY, H:mm:ss A') }}
                                            </td>
                                            <td class="action">
                                                <div class="btn-group-dropdown">
                                                  <button class="btn btn-outline-secondary dropdown-toggle btn-sm mg-button-left" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lựa chọn</button>
                                                  <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('delete_group', $value->slugGroup) }}" title="Delete" onclick="return confirm('Bạn Có Chắc Muốn Xóa Nhóm {{ $value->nameGroup }} Không?')">
                                                      <span style="display: flex; justify-content: flex-start; color: #dc2626;"><i class="ti ti-trash me-1"></i> Xóa</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('view_update_group', $value->slugGroup) }}"><span style="display: flex; justify-content: flex-start; color: #2ca87f;"><i class="ti ti-pencil me-1"></i> Cập Nhật</span></a>
                                                  </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Mã Nhóm</td>
                                        <td>Tên Nhóm</td>
                                        <td>Danh Mục</td>
                                        <td>Giá Thuê</td>
                                        <td>Giá Bán</td>
                                        <td>Số Lượng Thành Viên</td>
                                        <td>Thành Viên/Tuần</td>
                                        <td>Bài Viết/Tuần</td>
                                        <td>Loại Nhóm</td>
                                        <td>Quản Trị</td>
                                        <td>Vị Trí</td>
                                        <td>Tỉnh Thành</td>
                                        <td>Quận/Huyện</td>
                                        <td>Phường/Xã</td>
                                        <td>Tình Trạng</td>
                                        <td>Người Tạo</td>
                                        <td>Tính Năng</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('view_js')
    @include('FEadmin.Layout.Fooder.js_fooder')
    @include('FEadmin.Layout.Fooder.js_tableButton_data')
@stop
