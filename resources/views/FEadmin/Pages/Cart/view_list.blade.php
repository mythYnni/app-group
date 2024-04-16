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
        0 => ['name' => 'Thuê', 'color' => 'bg-pink-900'],
        1 => ['name' => 'Mua', 'color' => 'bg-purple-900'],
    ];

    $statusHTML = [
        0 => ['name' => 'Chưa Hỗ Trợ', 'color' => 'bg-cyan-900'],
        1 => ['name' => 'Đã Hỗ Trợ', 'color' => 'bg-gray-800'],
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Kinh Doanh</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Hỗ Trợ</a></li>
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
                        <h5>Danh Sách Hỗ Trợ</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>stt</th>
                                        <th>Tên Khách</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Tên Nhóm</th>
                                        <th>Giá Thuê</th>
                                        <th>Giá Bán</th>
                                        <th>Nhu Cầu</th>
                                        <th>Ngày Gửi</th>
                                        <th>Trạng thái</th>
                                        <th>Note</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $key => $value)
                                        @php
                                            $type = $typeHTML[$value->status_type] ?? [
                                                'name' => 'Không Xác Định',
                                                'color' => '#000000',
                                            ];
                                            $typeName = $type['name'];
                                            $typeColor = $type['color'];
                                        @endphp
                                        @php
                                            $status_color = $statusHTML[$value->status] ?? [
                                                'name' => 'Không Xác Định',
                                                'color' => '#000000',
                                            ];
                                            $status_name = $status_color['name'];
                                            $status_back = $status_color['color'];
                                        @endphp
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><span class="h6">{{ $value->name_account }}</span></td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->nameGroup }}</td>
                                            <td>{{ number_format($value->rent_cost, 0, ',', '.') }}</td>
                                            <td>{{ number_format($value->price, 0, ',', '.') }}</td>
                                            <td><span
                                                    class="badge rounded-pill {{ $typeColor }}">{{ $typeName }}</span>
                                            </td>
                                            <td>
                                                {{ Carbon::parse($value->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY, H:mm:ss A') }}
                                            </td>
                                            <td><span
                                                    class="badge rounded-pill {{ $status_back }}">{{ $status_name }}</span>
                                            </td>
                                            <td style="white-space: normal;">
                                                <div style="max-width: 300px; word-wrap: break-word;">
                                                    <span>{{ $value->note }} </span>
                                                </div>
                                            </td>
                                            <td class="action">
                                                <div class="btn-group-dropdown">
                                                  <button class="btn btn-outline-secondary dropdown-toggle btn-sm mg-button-left" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lựa chọn</button>
                                                  <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{route('delete_cart' , $value->id)}}" title="Delete" onclick="return confirm('Bạn Có Chắc Muốn Xóa Khách {{ $value->name_account }} Không?')">
                                                      <span style="display: flex; justify-content: flex-start; color: #dc2626;"><i class="ti ti-trash me-1"></i> Xóa</span>
                                                    </a>
                                                    <a class="dropdown-item" href="{{route('view_update_cart' , $value->id)}}"><span style="display: flex; justify-content: flex-start; color: #2ca87f;"><i class="ti ti-pencil me-1"></i> Note & Trạng Thái</span></a>
                                                  </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>stt</td>
                                        <td>Tên Khách</td>
                                        <td>Phone</td>
                                        <td>Email</td>
                                        <td>Tên Nhóm</td>
                                        <td>Giá Thuê</td>
                                        <td>Giá Bán</td>
                                        <td>Nhu Cầu</td>
                                        <td>Ngày tạo</td>
                                        <td>Trạng thái</td>
                                        <td>Note</td>
                                        <td>Chức năng</td>
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
