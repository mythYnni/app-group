<div class="pct-c-btn">
    <a href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvas_pc_layout">
        <i class="ph-duotone ph-gear-six"></i>
    </a>
</div>
<div class="offcanvas border-0 pct-offcanvas offcanvas-end" tabindex="-1" id="offcanvas_pc_layout">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title">Cài Đặt</h5>
        <button type="button" class="btn btn-icon btn-link-danger" data-bs-dismiss="offcanvas"
            aria-label="Close"><i class="ti ti-x"></i></button>
    </div>
    <div class="pct-body customizer-body">
        <div class="offcanvas-body py-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="pc-dark">
                        <h6 class="mb-1">Chế độ chủ đề</h6>
                        <p class="text-muted text-sm">Chọn chế độ sáng hoặc tối</p>
                        <div class="row theme-color theme-layout">
                            <div class="col-4">
                                <div class="d-grid">
                                    <button class="preset-btn btn active" data-value="true"
                                        onclick="layout_change('light');" data-bs-toggle="tooltip"
                                        title="Light">
                                        <svg class="pc-icon text-warning">
                                            <use xlink:href="#custom-sun-1"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-grid">
                                    <button class="preset-btn btn" data-value="false"
                                        onclick="layout_change('dark');" data-bs-toggle="tooltip" title="Dark">
                                        <svg class="pc-icon">
                                            <use xlink:href="#custom-moon"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Tương phản chủ đề</h6>
                    <p class="text-muted text-sm">Chọn độ tương phản chủ đề</p>
                    <div class="row theme-contrast">
                        <div class="col-6">
                            <div class="d-grid">
                                <button class="preset-btn btn" data-value="true"
                                    onclick="layout_theme_contrast_change('true');" data-bs-toggle="tooltip"
                                    title="True">
                                    <svg class="pc-icon">
                                        <use xlink:href="#custom-mask"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid">
                                <button class="preset-btn btn active" data-value="false"
                                    onclick="layout_theme_contrast_change('false');" data-bs-toggle="tooltip"
                                    title="False">
                                    <svg class="pc-icon">
                                        <use xlink:href="#custom-mask-1-outline"></use>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Chủ đề tùy chỉnh</h6>
                    <p class="text-muted text-sm">Chọn màu chủ đề chính của bạn</p>
                    <div class="theme-color preset-color">
                        <a href="#!" data-bs-toggle="tooltip" title="Blue" class="active"
                            data-value="preset-1"><i class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Indigo" data-value="preset-2"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Purple" data-value="preset-3"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Pink" data-value="preset-4"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Red" data-value="preset-5"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Orange" data-value="preset-6"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Yellow" data-value="preset-7"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Green" data-value="preset-8"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Teal" data-value="preset-9"><i
                                class="ti ti-checks"></i></a>
                        <a href="#!" data-bs-toggle="tooltip" title="Cyan" data-value="preset-10"><i
                                class="ti ti-checks"></i></a>
                    </div>
                </li>
                <li class="list-group-item">
                    <h6 class="mb-1">Chú thích thành bên</h6>
                    <p class="text-muted text-sm">Chú thích thanh bên Ẩn/Hiện thị</p>
                    <div class="row theme-color theme-nav-caption">
                        <div class="col-6">
                            <div class="d-grid">
                                <button class="preset-btn btn-img btn active" data-value="true"
                                    onclick="layout_caption_change('true');" data-bs-toggle="tooltip"
                                    title="Caption Show">
                                    <img src="https://ableproadmin.com/assets/images/customizer/caption-on.svg"
                                        alt="img" class="img-fluid">
                                </button>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-grid">
                                <button class="preset-btn btn-img btn" data-value="false"
                                    onclick="layout_caption_change('false');" data-bs-toggle="tooltip"
                                    title="Caption Hide">
                                    <img src="https://ableproadmin.com/assets/images/customizer/caption-off.svg"
                                        alt="img" class="img-fluid">
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="pc-rtl">
                        <h6 class="mb-1">Bố cục chủ đề</h6>
                        <p class="text-muted text-sm">LTR/RTL</p>
                        <div class="row theme-color theme-direction">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn active" data-value="false"
                                        onclick="layout_rtl_change('false');" data-bs-toggle="tooltip"
                                        title="LTR">
                                        <img src="https://ableproadmin.com/assets/images/customizer/ltr.svg"
                                            alt="img" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn" data-value="true"
                                        onclick="layout_rtl_change('true');" data-bs-toggle="tooltip"
                                        title="RTL">
                                        <img src="https://ableproadmin.com/assets/images/customizer/rtl.svg"
                                            alt="img" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item pc-box-width">
                    <div class="pc-container-width">
                        <h6 class="mb-1">Chiều rộng bố cục</h6>
                        <p class="text-muted text-sm">Chọn bố cục đẩy đủ hoặc vùng chứa</p>
                        <div class="row theme-color theme-container">
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn active" data-value="false"
                                        onclick="change_box_container('false')" data-bs-toggle="tooltip"
                                        title="Full Width">
                                        <img src="https://ableproadmin.com/assets/images/customizer/full.svg"
                                            alt="img" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-grid">
                                    <button class="preset-btn btn-img btn" data-value="true"
                                        onclick="change_box_container('true')" data-bs-toggle="tooltip"
                                        title="Fixed Width">
                                        <img src="https://ableproadmin.com/assets/images/customizer/fixed.svg"
                                            alt="img" class="img-fluid">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="d-grid">
                        <button class="btn btn-light-danger" id="layoutreset">Đặt lại bố cục</button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>