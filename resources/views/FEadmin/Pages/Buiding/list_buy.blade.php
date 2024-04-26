@extends ('FEadmin.master')
@php
    use Carbon\Carbon;
@endphp
@section('css_view')
    @include('FEadmin.Layout.Head.css_tableButton_data')
    @include('FEadmin.Layout.Head.js_tableButton_data')
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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Hợp Đồng</a></li>
                            <li class="breadcrumb-item" aria-current="page">Danh Sách Hợp Đồng Mua</li>
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
                        <h5>Danh Sách Hội Nhóm Thuê Nhiều</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="cbtn-selectors" class="table table-striped table-bordered nowrap">
                                <thead>
                                    <tr>
                                        <th>stt</th>
                                        <th>Mã Phiếu</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Tên Nhóm Mua</th>
                                        <th>Giá Mua</th>
                                        <th>Tiền Dịch Vụ</th>
                                        <th>Ngày Tạo Hợp Đồng</th>
                                        <th>Ghi Chú</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_buiding as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->code }}</td>
                                            <td><a href="{{ $value->linkFacebook }}"
                                                    target="_blank"><span>{{ $value->name_account }}</span></a></td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->Phone }}</td>
                                            <td><a href="{{ $value->linkGroup }}"
                                                    target="_blank"><span>{{ $value->nameGroup }}</span></a></td>
                                            <td>{{ number_format($value->price, 0, ',', '.') }}</td>
                                            <td>{{ number_format($value->totail_price, 0, ',', '.') }}</td>
                                            <td>{{ Carbon::parse($value->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                            </td>
                                            <td style="white-space: normal;">
                                                <div style="max-width: 300px; word-wrap: break-word;">
                                                    <span>{{ $value->note }} </span>
                                                </div>
                                            </td>
                                            <td class="action">
                                                <div class="btn-group-dropdown">
                                                    <button
                                                        class="btn btn-outline-secondary dropdown-toggle btn-sm mg-button-left"
                                                        type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Lựa chọn</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ route('delete_buiding', $value->code) }}" title="Delete"
                                                            onclick="return confirm('Bạn Có Chắc Muốn Xóa Hợp Đồng {{ $value->code }} Không?')">
                                                            <span
                                                                style="display: flex; justify-content: flex-start; color: #dc2626;"><i
                                                                    class="ti ti-trash me-1"></i> Xóa</span>
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('view_detail_buiding', $value->idCart) }}"><span
                                                                style="display: flex; justify-content: flex-start; color: #2c40a8;"><i
                                                                    class="ti ti-eye me-1"></i>Xem</span></a>
                                                        <a class="dropdown-item" href=""><span
                                                                style="display: flex; justify-content: flex-start; color: #2ca87f;"><i
                                                                    class="ti ti-pencil me-1"></i> Cập Nhật</span></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>stt</td>
                                        <td>Mã Phiếu</td>
                                        <td>Tên Khách Hàng</td>
                                        <td>Email</td>
                                        <td>Phone</td>
                                        <td>Tên Nhóm Mua</td>
                                        <td>Giá Mua</td>
                                        <td>Tiền Dịch Vụ</td>
                                        <td>Ngày Tạo Hợp Đồng</td>
                                        <td>Ghi Chú</td>
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
