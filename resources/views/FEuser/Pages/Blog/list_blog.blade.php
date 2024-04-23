@extends ('FEuser.master')
@php
    use Carbon\Carbon;
@endphp
@section('view')
    <section class="section" style="min-height: 1000px;">
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
                @foreach ($listBlog as $key => $value)
                    <div class="col-lg-3 col-md-6">
                        <div class="card blog blog-primary shadow rounded overflow-hidden border-0">
                            <div class="card-img blog-image position-relative overflow-hidden rounded-0">
                                <div class="position-relative overflow-hidden">
                                    <div class="image-container"
                                        style="height: 168px; overflow: hidden; display: flex; justify-content: center; align-items: center; padding: 5px 5px 0px 5px;">
                                        <img src="{{ $value->image }}" class="img-fluid" alt=""
                                            style="width: auto; height: 100%; object-fit: cover;">
                                    </div>
                                    <div class="card-overlay"></div>
                                </div>
                            </div>

                            <div class="card-body blog-content position-relative p-0">
                                <div class="blog-tag px-4">
                                    <a href="{{route('view_list_detail_blog_user', $value->slug)}}" class="badge bg-primary rounded-pill">Bài Viết</a>
                                </div>
                                <div class="p-4">
                                    <ul class="list-unstyled text-muted small mb-2">
                                        <li class="d-inline-flex align-items-center me-2"><i data-feather="calendar"
                                                class="fea icon-ex-sm me-1 text-dark"></i>{{ Carbon::parse($value->timeCreate)->locale('vi')->isoFormat('Do [tháng] M [năm] YYYY') }}
                                        </li>
                                    </ul>

                                    <a href="{{route('view_list_detail_blog_user', $value->slug)}}" class="title fw-semibold fs-5 text-dark"
                                        style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis; display: inline-block; max-width: 100%;">{{ $value->name }}</a>

                                    <ul
                                        class="list-unstyled d-flex justify-content-between align-items-center text-muted mb-0 mt-3">
                                        <li class="list-inline-item me-2"><a href="{{route('view_list_detail_blog_user', $value->slug)}}"
                                                class="btn btn-link primary text-dark">Xem Ngay <i
                                                    class="mdi mdi-arrow-right"></i></a></li>
                                        <li class="list-inline-item"><span class="text-dark">By</span> <span
                                                class="text-muted link-title">DPC Marketing</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                @endforeach
            </div><!--end row-->

            <div class="row">
                <div class="col-12 mt-4 pt-2">
                    <ul class="pagination justify-content-center mb-0">
                        @if (ceil($listBlog->total() / 12) > 1)
                            <?php
                            $current_page = isset($_GET['page']) ? $_GET['page'] : '1';
                            $page = $current_page - 1;
                            $pages = $current_page + 1;
                            $maxPage = ceil($list_courses->total() / 12);
                            $check = $current_page;
                            ?>
                            @if ($current_page > 1)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $current_page - 1 }}" aria-label="Previous">
                                        <span aria-hidden="true"><i class="mdi mdi-chevron-left fs-6"></i></span>
                                    </a>
                                </li>
                            @endif

                            @for ($i = max(1, $current_page - 1); $i <= min($maxPage, $current_page + 2); $i++)
                                <li><a class="page-item {{ $i == $list_courses->currentPage() ? 'active' : '' }}"
                                        href="?page={{ $i }}">{{ $i }}</a></li>
                            @endfor

                            @if ($current_page < $maxPage)
                                <li class="page-item">
                                    <a class="page-link" href="?page={{ $current_page + 1 }}" aria-label="Next">
                                        <span aria-hidden="true"><i class="mdi mdi-chevron-right fs-6"></i></span>
                                    </a>
                                </li>
                            @endif
                        @else
                        @endif
                    </ul>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end container-->
    </section><!--end section-->
@stop
@section('view_js')
    @include('FEuser.Layout.Fooder.JS_Menu_Defout')
    {{-- @include('FEadmin.Layout.JS.Get_Account') --}}
@stop
