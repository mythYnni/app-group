@extends ('FEuser.master')
@section('view')
    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="title-heading text-center">
                        {{-- <h5 class="heading fw-semibold mb-0 sub-heading">Job Vacancies</h5> --}}
                    </div>
                </div><!--end col-->
                <div class="col-12 mt-4">
                    <div class="features-absolute">
                        <div class="d-md-flex justify-content-between align-items-center bg-white shadow rounded p-4">
                            <form class="card-body text-start">
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-1">
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                            <div class="input-group search-form">
                                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                                <input type="text" class="form-control" placeholder="Tìm kiếm....."
                                                    style="border-bottom-right-radius: 7px; border-top-right-radius: 7px; border: 1px solid #e7e7e7;">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <select class="form-select" fdprocessedid="o6qc3">
                                                    <option>Danh Mục</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                    <option>Option 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-4 col-12">
                                            <div class="form-group">
                                                <select class="form-select" id="city" name="province">
                                                    <option value="" selected>Chọn Tỉnh Thành/ Thành Phố</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select class="form-select" id="district" name="district">
                                                    <option value="" selected>Chọn Quận/Huyện</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-12">
                                            <div class="form-group">
                                                <select class="form-select" id="ward" name="wards">
                                                    <option value="" selected>Chọn Phường/Xã</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-1 col-lg-1 col-md-1 col-12">
                                            <div class="form-group" style="text-align: end;">
                                                <button type="button" class="btn btn-primary d-inline-flex"><i class="ti ti-circle-check me-1"></i>Lọc</button>
                                            </div>
                                        </div>
                                    </div><!--end row-->
                                </div>
                            </form><!--end form-->
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container">
            <div class="alert alert-success" style="padding: 0px; background: #341eb9; border-color: #341eb9;">
                <img loading="lazy" class="responsite-image-text" src="{{ url('assets') }}/images/Minimalist_Blue_Green_Real_Estate_Company_Group_Logo-removebg-preview.png" alt="grid">
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div
                        class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex align-items-center w-310px">
                            <img src="images/company/facebook-logo.png"
                                class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                            <div class="ms-3">
                                <a href="job-detail-one.html" class="h5 title text-dark">Web Designer / Developer</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                            <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                            <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock"
                                    class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                            <span class="text-muted d-flex align-items-center"><i data-feather="map-pin"
                                    class="fea icon-sm me-1 align-middle"></i>Australia</span>
                            <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                        </div>

                        <div class="mt-3 mt-md-0">
                            <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i
                                    data-feather="bookmark" class="icons"></i></a>
                            <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row" style="margin: 0px 0px 50px 0px;">
                <div class="col-12 mt-4 pt-2" style="text-align: center;">
                    <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Xem Thêm</a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->

        <div class="container">
            <div class="alert alert-success" style="padding: 0px; background: #341eb9; border-color: #341eb9;">
                <img loading="lazy" class="responsite-image-text" src="{{ url('assets') }}/images/Minimalist_Blue_Green_Real_Estate_Company_Group_Logo__2_-removebg-preview.png" alt="grid">
            </div>
            <div class="row g-4">
                <div class="col-12">
                    <div
                        class="job-post job-post-list rounded shadow p-4 d-md-flex align-items-center justify-content-between position-relative">
                        <div class="d-flex align-items-center w-310px">
                            <img src="images/company/facebook-logo.png"
                                class="avatar avatar-small rounded shadow p-3 bg-white" alt="">

                            <div class="ms-3">
                                <a href="job-detail-one.html" class="h5 title text-dark">Web Designer / Developer</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between d-md-block mt-3 mt-md-0 w-100px">
                            <span class="badge bg-soft-primary rounded-pill">Full Time</span>
                            <span class="text-muted d-flex align-items-center fw-medium mt-md-2"><i data-feather="clock"
                                    class="fea icon-sm me-1 align-middle"></i>2 days ago</span>
                        </div>

                        <div class="d-flex align-items-center justify-content-between d-md-block mt-2 mt-md-0 w-130px">
                            <span class="text-muted d-flex align-items-center"><i data-feather="map-pin"
                                    class="fea icon-sm me-1 align-middle"></i>Australia</span>
                            <span class="d-flex fw-medium mt-md-2">$950 - $1100/mo</span>
                        </div>

                        <div class="mt-3 mt-md-0">
                            <a href="#" class="btn btn-sm btn-icon btn-pills btn-soft-primary bookmark"><i
                                    data-feather="bookmark" class="icons"></i></a>
                            <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Apply Now</a>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
            <div class="row">
                <div class="col-12 mt-4 pt-2" style="text-align: center;">
                    <a href="job-detail-one.html" class="btn btn-sm btn-primary w-full ms-md-1">Xem Thêm</a>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
    @include('FEadmin.Layout.JS.Get_Account')
@stop
