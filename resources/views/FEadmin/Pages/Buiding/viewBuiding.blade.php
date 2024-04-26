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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Thống Kê</a></li>
                            <li class="breadcrumb-item" aria-current="page">Hợp Đồng</li>
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
                        <h5>Chi Tiết Phiếu Dịch Vụ: {{$buiding->code}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-sm-6 col-xl-3">
                                <div class="form-group mb-0">
                                    <label class="form-label">Mã Phiếu</label>
                                    <input type="text" class="form-control" placeholder="#xxxx" fdprocessedid="51rs98" value="{{$buiding->code}}"
                                        name="code" disabled>
                                    @error('code')
                                        <small style="color: #f33923;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="form-group mb-0">
                                    <label class="form-label">Dịch Vụ</label>
                                    <select id="service-select" class="form-select" onchange="toggleDateInputs()" disabled
                                        name="status_type">
                                        <option value="0" {{$buiding->status_type == 0 ? 'selected' : ''}}>Thuê Nhóm</option>
                                        <option value="1" {{$buiding->status_type == 1 ? 'selected' : ''}}>Mua Nhóm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="form-group mb-0">
                                    <label class="form-label">Ngày Bắt Đầu</label>
                                    <input id="start-date-input" type="datetime-local" class="form-control" name="time" value="{{$buiding->time}}" readonly>
                                    @error('time')
                                        <small style="color: #f33923;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-3">
                                <div class="form-group mb-0">
                                    <label class="form-label">Ngày Kết Thúc</label>
                                    <input id="end-date-input" type="datetime-local" class="form-control" value="{{$buiding->time_out}}" name="time_out" readonly>
                                    @error('time_out')
                                        <small style="color: #f33923;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="border rounded p-3 h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="mb-0">Khách Hàng:</h6>
                                    </div>
                                    <h5>{{ $buiding->name_account }}</h5>
                                    <p class="mb-0">Địa Chỉ: Chưa Cập Nhật</p>
                                    <p class="mb-0">Email: {{ $buiding->email ? $objs->email : 'Chưa Cập Nhật' }}</p>
                                    <p class="mb-0">Phone: {{ $buiding->phone ? $objs->phone : 'Chưa Cập Nhật' }}</p>
                                    <p class="mb-0">Facebook: <a href="{{ $buiding->linkFacebook }}"
                                            target="_blank">{{ $buiding->linkFacebook ? $buiding->linkFacebook : 'Chưa Cập Nhật' }}</a>
                                    </p>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="border rounded p-3 h-100">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <h6 class="mb-0">Bên Cung Cấp Dịch Vụ:</h6>
                                    </div>
                                    <h5>DPC Marketing</h5>
                                    <p class="mb-0">Địa Chỉ: Không Cập Nhật</p>
                                    <p class="mb-0">(970) 982-3353</p>
                                    <p class="mb-0">brandon07@pierce.com</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <h5>Chi Tiết</h5>
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th><span class="text-danger">*</span>Mã</th>
                                                <th><span class="text-danger">*</span>Tên Nhóm</th>
                                                <th><span class="text-danger">*</span>Giá Mua</th>
                                                <th><span class="text-danger">*</span>Giá Thuê</th>
                                                <th><span class="text-danger">*</span>Tháng Thuê</th>
                                                <th>Tổng Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control" placeholder="Tên Nhóm"
                                                        fdprocessedid="nlmgf" value="{{ $buiding->code_group }}"
                                                        name="code_group" disabled>
                                                    @error('code_group')
                                                        <small style="color: #f33923;">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                                <td><input type="text" class="form-control" placeholder="Tên Nhóm"
                                                        fdprocessedid="nlmgf" value="{{ $buiding->nameGroup }}"
                                                        name="nameGroup" disabled>
                                                    @error('nameGroup')
                                                        <small style="color: #f33923;">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                                <td><input type="number" id="price" class="form-control"
                                                        placeholder="Giá" fdprocessedid="01nex"
                                                        value="{{ $buiding->price }}" name="price" disabled>
                                                    @error('price')
                                                        <small style="color: #f33923;">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                                <td><input type="number" id="rent_cost" class="form-control"
                                                        placeholder="Giá" fdprocessedid="01nex"
                                                        value="{{ $buiding->rent_cost }}" name="rent_cost" readonly>
                                                    @error('rent_cost')
                                                        <small style="color: #f33923;">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                                <td><input type="number" id="months" class="form-control"
                                                        placeholder="Tháng" fdprocessedid="01nex" min="1"
                                                        name="date" value="{{ $buiding->date }}" readonly>
                                                    @error('date')
                                                        <small style="color: #f33923;">{{ $message }}</small>
                                                    @enderror
                                                </td>
                                                <td id="total_table">{{ $buiding->totail_price }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="invoice-total ms-auto">
                                    <div class="row">
                                        <div class="col-6">
                                            <p class="mb-1 text-start">Tổng Phụ:</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="f-w-600 mb-1 text-end" id="total_cost">{{ $buiding->totail_price }}</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="text-muted mb-1 text-start">Thuế :</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="f-w-600 mb-1 text-end">0 đ</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="f-w-600 mb-1 text-start">Tổng Tiền:</p>
                                        </div>
                                        <div class="col-6">
                                            <p class="f-w-600 mb-1 text-end" id="invoice_total">{{ $buiding->totail_price }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">Ghi Chú</label>
                                    <textarea class="form-control" rows="3" placeholder="Note" style="height: 102px;" name="note" readonly>{{ $buiding->note }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('view_js')
    <script>
        function toggleDateInputs() {
            var serviceSelect = document.getElementById('service-select');
            var startDateInput = document.getElementById('start-date-input');
            var endDateInput = document.getElementById('end-date-input');
            var rent_cost = document.getElementById('rent_cost');
            var months = document.getElementById('months');
            var price = document.getElementById('price');

            if (serviceSelect.value === '0') { // Nếu chọn "Thuê Nhóm"
                startDateInput.disabled = false; // Cho phép chọn Ngày Bắt Đầu
                endDateInput.disabled = false; // Cho phép chọn Ngày Kết Thúc
                months.disabled = false;
                rent_cost.disabled = false;
                price.disabled = true;
            } else { // Nếu chọn "Mua Nhóm"
                startDateInput.disabled = true; // Vô hiệu hóa chọn Ngày Bắt Đầu
                endDateInput.disabled = true; // Vô hiệu hóa chọn Ngày Kết Thúc
                months.disabled = true;
                rent_cost.disabled = true;
                price.disabled = false;
            }
        }

        // Gọi hàm toggleDateInputs() để vô hiệu hóa/chọn trường Ngày Bắt Đầu và Ngày Kết Thúc một lần nữa khi trang được tải
        toggleDateInputs();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to calculate and update the total cost
            function updateTotal() {
                // Get values from input fields
                var price = parseFloat(document.getElementById('price').value);
                var rentCost = parseFloat(document.getElementById('rent_cost').value);
                var months = parseInt(document.getElementById('months').value);

                // Check if months is empty or not a number
                if (isNaN(months) || months < 1) {
                    months = 1;
                }

                // Calculate total cost based on the selected service
                var total = 0;
                var serviceSelect = document.getElementById('service-select');
                var selectedService = serviceSelect.value;

                if (selectedService === '0') { // Thuê Nhóm
                    total = rentCost * months;
                } else { // Mua Nhóm
                    total = price;
                }

                // Format total to Vietnamese currency
                var formatter = new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                });
                var formattedTotal = formatter.format(total);

                // Update total fields
                document.getElementById('total_cost').innerText = formattedTotal;
                document.getElementById('invoice_total').innerText = formattedTotal;
                document.getElementById('total_table').innerText = formattedTotal;
                document.getElementById('totail_price').value = total;
            }

            // Listen for changes in the inputs and call the updateTotal function
            document.getElementById('price').addEventListener('input', updateTotal);
            document.getElementById('rent_cost').addEventListener('input', updateTotal);
            document.getElementById('months').addEventListener('input', updateTotal);
            document.getElementById('service-select').addEventListener('change', updateTotal);

            // Call the updateTotal function initially to set the default value
            updateTotal();
        });
    </script>
    @include('FEadmin.Layout.Fooder.js_fooder')
    @include('FEadmin.Layout.Fooder.js_tableButton_data')
@stop
