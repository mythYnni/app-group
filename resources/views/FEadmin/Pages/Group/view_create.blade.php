@extends ('FEadmin.master')
@section('css_view')
@include('FEadmin.Layout.Head.css_create_group')
@include('FEadmin.Layout.Head.js_create_group')
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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Group</a></li>
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
        <div class="col-sm-12">
            <!-- Basic Inputs -->
            <form class="card" action="{{ route('creater_account') }}" method="POST" id="formReset">
                @csrf
                <div class="card-header">
                    <h5>Thêm Mới Hội Nhóm</h5>
                </div>
                <div class="card-body row">
                    <div class="form-group col-12 col-md-7">
                        <label class="form-label">Tên Hội Nhóm</label>
                        <input type="text" class="form-control form-control" placeholder="Tên Nhóm"
                            onkeyup="ChangeToSlug();" fdprocessedid="w3ptog" name="nameGroup" id="slug"
                            value="{{ old('nameGroup') }}">
                        @error('nameGroup')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                        @error('slugGroup')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <label class="form-label">Đường dẫn sạch</label>
                        <input type="text" class="form-control" name="slugGroup" value="{{ old('slugGroup') }}"
                            id="convert_slug" placeholder="Đường dẫn sạch" readonly fdprocessedid="qaalh">
                    </div>
                    <div class="form-group col-12 col-md-7">
                        <label class="form-label" for="exampleSelect1">Quản Trị</label>
                        <select class="form-control" name="choices-multiple-groups" id="choices-multiple-groups"
                            multiple name="name_user_group">
                            <optgroup label="Quản Trị">
                                @foreach ($listAccount->sortBy('fullName') as $value)
                                @if($value->decentralization == 0)
                                <option value="{{ $value->id }}">{{ $value->fullName }}</option>
                                @endif
                                @endforeach
                            </optgroup>
                            <optgroup label="Nhân Sự">
                                @foreach ($listAccount->sortBy('fullName') as $value)
                                @if($value->decentralization == 1)
                                <option value="{{ $value->id }}">{{ $value->fullName }}</option>
                                @endif
                                @endforeach
                            </optgroup>
                        </select>
                        @error('name_user_group')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-5">
                        <label class="form-label">Danh Mục Loại Nhóm</label>
                        <input type="text" class="form-control form-control" placeholder="Danh Mục"
                            fdprocessedid="w3ptog" name="category" id="category" value="{{ old('category') }}">
                        @error('category')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label class="form-label" for="exampleSelect1">Vị Trí</label>
                        <select class="form-select" id="exampleSelect1" name="idCategory">
                            @foreach ($listCategory->sortBy('name') as $value)
                            @if($value->status == 0)
                            <option value="{{ $value->id }}" @if ($value->id == old('idCategory')) selected @endif>
                                {{ $value->name }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                        @error('idCategory')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label class="form-label">Tỉnh Thành</label>
                        <select class="form-select" id="exampleSelect1" name="province">
                            <option value="">Hà Nội</option>
                        </select>
                        @error('province')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label class="form-label">Quận/Huyện</label>
                        <select class="form-select" id="exampleSelect1" name="district">
                            <option value="">Mỹ Đình</option>
                        </select>
                        @error('district')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-3">
                        <label class="form-label">Phường/Xã</label>
                        <select class="form-select" id="exampleSelect1" name="wards">
                            <option value="">Mễ Trì</option>
                        </select>
                        @error('wards')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label class="form-label">Số Lượng Thành Viên</label>
                        <input type="text" class="form-control" name="account_group" value="{{ old('account_group') }}"
                            placeholder="Số Lượng Thành Viên" fdprocessedid="qaalh">
                        @error('wards')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label class="form-label" for="example-quantity">Lượng Thành Viên/Tuần</label>
                        <input type="number" class="form-control" id="example-quantity" min="1"
                            name="account_group_week" data-gtm-form-interact-field-id="1">
                        @error('account_group_week')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-4">
                        <label class="form-label" for="example-quantity">Lượng Bài Viết/Tuần</label>
                        <input type="number" class="form-control" id="example-quantity" min="1"
                            name="account_group_blog" data-gtm-form-interact-field-id="1">
                        @error('account_group_blog')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label class="form-label">Giá Thuê</label>
                        <input type="text" class="form-control" name="rent_cost" value="{{ old('rent_cost') }}"
                            placeholder="Giá Thuê" fdprocessedid="qaalh">
                        @error('rent_cost')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label class="form-label">Giá Bán</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price') }}"
                            placeholder="Giá Bán" fdprocessedid="qaalh">
                        @error('price')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label class="form-label" for="exampleSelect1">Phân Loại</label>
                        <select class="form-select" id="exampleSelect1" name="type_sale">
                            <option value="0" {{ old('type_sale')==0 ? 'selected' : '' }}>Mặc Định</option>
                            <option value="1" {{ old('type_sale')==1 ? 'selected' : '' }}>Nhóm Thuê Nhiều</option>
                            <option value="2" {{ old('type_sale')==2 ? 'selected' : '' }}>Nhóm Tương Tác Tốt</option>
                        </select>
                        @error('type_sale')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <label class="form-label" for="exampleSelect1">Ảnh Nhóm</label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile01" name="file">
                        </div>
                    </div>
                    <div class="form-group row mb-0 col-12 col-md-4">
                        <label class="form-label">Loại Nhóm</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" value="0"
                                    id="customCheckinlhstate1" {{ old('type')=='0' ? 'checked' : '' }}
                                    data-gtm-form-interact-field-id="2">
                                <label class="form-check-label" for="customCheckinlhstate1"> Riêng Tư </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="type" value="1"
                                    id="customCheckinlhstate2" {{ old('type')=='1' ? 'checked' : '' }}
                                    data-gtm-form-interact-field-id="1">
                                <label class="form-check-label" for="customCheckinlhstate2"> Công Khai </label>
                            </div>
                        </div>
                        @error('type')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group row mb-0 col-12 col-md-4">
                        <label class="form-label">Trạng Thái Nhóm</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_color" value="0"
                                    id="customCheckinlhstate3" {{ old('status_color')=='0' ? 'checked' : '' }}
                                    data-gtm-form-interact-field-id="2">
                                <label class="form-check-label" for="customCheckinlhstate3"> Xanh </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_color" value="1"
                                    id="customCheckinlhstate4" {{ old('status_color')=='1' ? 'checked' : '' }}
                                    data-gtm-form-interact-field-id="1">
                                <label class="form-check-label" for="customCheckinlhstate4"> Vàng </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status_color" value="2"
                                    id="customCheckinlhstate5" {{ old('status_color')=='2' ? 'checked' : '' }}
                                    data-gtm-form-interact-field-id="1">
                                <label class="form-check-label" for="customCheckinlhstate5"> Đỏ </label>
                            </div>
                        </div>
                        @error('status_color')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group row mb-0 col-12 col-md-4">
                        <label class="form-label">Trạng Thái</label>
                        <div class="col-sm-12">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="0"
                                    id="customCheckinlhstate6" {{ old('status')=='0' ? 'checked' : '' }}
                                    data-gtm-form-interact-field-id="2">
                                <label class="form-check-label" for="customCheckinlhstate6"> Hiển Thị </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="1"
                                    id="customCheckinlhstate7" {{ old('status')=='1' ? 'checked' : '' }}
                                    data-gtm-form-interact-field-id="1">
                                <label class="form-check-label" for="customCheckinlhstate7"> Lưu Trữ </label>
                            </div>
                        </div>
                        @error('status')
                        <small style="color: #f33923;">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group col-12 col-md-12"></div>
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
@include('FEadmin.Layout.JS.Change_to_slug')
@include('FEadmin.Layout.Fooder.js_create_group')
@include('FEadmin.Layout.JS.Reset_button')
@stop