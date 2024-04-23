@extends ('FEuser.master')
@php
    use Carbon\Carbon;
@endphp
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
                            <form class="card-body text-start" method="GET" action="{{ route('view_group_index') }}">
                                <div class="registration-form text-dark text-start">
                                    <div class="row g-lg-1" id="menuSearch">

                                    </div><!--end row-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end form-->
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end container-->

        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8 col-md-7">
                    <div class="card border-0 shadow rounded overflow-hidden">
                        {{-- <img src="{{ $Blog->image }}" class="img-fluid" alt=""> --}}

                        <div class="card-body">
                            <blockquote class="text-center mx-auto blockquote"><i
                                    class="mdi mdi-format-quote-open mdi-48px text-muted opacity-2 d-block"></i>{{ $Blog->name }} <small class="d-block text-muted mt-2">{{ Carbon::parse($Blog->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}</small></blockquote>
                            <p class="text-muted">{!! $Blog->detail !!}</p>
                        </div>
                    </div>
                </div><!--end col-->

                <!-- START SIDEBAR -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card bg-white p-4 rounded shadow sticky-bar">
                        <!-- RECENT POST -->
                        <div class="mt-4 pt-2">
                            <h6 class="pt-2 pb-2 bg-light rounded text-center">Bài Viết Mới</h6>
                            @foreach ($listBlog as $value)
                                <div class="mt-4">
                                    <div class="blog blog-primary d-flex align-items-center">
                                        <div
                                            style="width: 100%; height: 100px; overflow: hidden; display: flex; justify-content: center; align-items: center; padding: 5px 5px 5px 5px; background: #dc354591;;
                                        border-radius: 10px;">
                                            <img src="{{ $value->image }}" class="avatar avatar-small rounded"
                                                style="width: auto; height: 100%; object-fit: cover;" alt="">
                                        </div>
                                        <div class="flex-1 ms-3">
                                            <a href="{{ route('view_list_detail_blog_user', $value->slug) }}"
                                                style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis; display: inline-block; max-width: 100%;"
                                                class="d-block title text-dark fw-medium">{{ $value->name }}</a>
                                            <span
                                                class="text-muted small">{{ Carbon::parse($value->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- RECENT POST -->
                    </div>
                </div><!--end col-->
                <!-- END SIDEBAR -->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
@stop
@section('view_js')
    @include('FEuser.Layout.Fooder.JS_Menu_Defout')
    {{-- @include('FEadmin.Layout.JS.Get_Account') --}}
@stop
