<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    // Call displayMenu when the window is loaded or resized
    window.onload = function() {
        displayMenu();
        fetchDataAndRenderCityOptions();
    };

    window.onresize = function() {
        displayMenu();
    };

    var selectedCategory = "<?php echo $category; ?>";
    var selectedVitri = "<?php echo $vitri; ?>";
    var search = "<?php echo $search; ?>";

    function displayMenu() {
        // Lấy chiều rộng của màn hình
        var screenWidth = window.innerWidth;

        // Lấy thẻ div menuSearch
        var menuSearchDiv = document.getElementById("menuSearch");

        // Kiểm tra nếu chiều rộng màn hình là nhỏ hơn 992px (kích thước màn hình mobile)
        if (screenWidth < 502) {
            // Chèn khối mã HTML vào menuSearch
            menuSearchDiv.innerHTML = `
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 mb-md-1">
                    <div class="input-group search-form">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                        <input type="text" class="form-control" placeholder="Tìm kiếm....." name="search"
                            style="border-bottom-right-radius: 7px; border-top-right-radius: 7px; border: 1px solid #e7e7e7; padding: 0.3rem 2.25rem .375rem .75rem;"
                            value="<?php echo $search; ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 none-laptop">
                    <div class="section-title mb-1 ms-lg-3">
                        <div class="accordion" id="buyingquestion">
                            <div class="accordion-item rounded mt-2">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button border-0 bg-light collapsed"
                                        type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour" style="padding: 10px 20px;">
                                        Mở Rộng
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse border-0 collapse"
                                    aria-labelledby="headingFour" data-bs-parent="#buyingquestion">
                                    <div class="text-muted" style="padding: 10px 5px;">
                                        <div class="col-xl-2 col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <select class="form-select" fdprocessedid="o6qc3" name="category">
                                                    <option value="">Danh Mục</option>
                                                    @foreach ($list_category as $value)
                                                        @if ($value == $category)
                                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                                        @else
                                                            <option value="{{ $value }}">{{ $value }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-6 col-md-6 col-12 mt-1">
                                            <div class="form-group">
                                                <select class="form-select" fdprocessedid="o6qc3" name="vitri">
                                                    <option value="">Vị Trí</option>
                                                    @foreach ($list_vi_tri as $value)
                                                        @if ($value->name == $vitri)
                                                            <option value="{{ $value->name }}" selected>{{ $value->name }}</option>
                                                        @else
                                                            <option value="{{ $value->name }}">{{ $value->name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-4 col-md-4 col-12 mt-1">
                                            <div class="form-group">
                                                <select class="form-select" id="city"
                                                    name="province">
                                                        <option value="" selected>Chọn Tỉnh Thành/
                                                            Thành Phố</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-12 mt-1">
                                            <div class="form-group">
                                                <select class="form-select" id="district"
                                                    name="district">
                                                        <option value="" selected>Chọn Quận/Huyện
                                                        </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-lg-3 col-md-3 col-12 mt-1">
                                            <div class="form-group">
                                                <select class="form-select" id="ward"
                                                    name="wards">
                                                    <option value="" selected>Chọn Phường/Xã
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-12" style="display: flex;align-items: center;">
                    <div class="form-group" style="text-align: end;">
                        <button type="submit" class="btn btn-primary d-inline-flex"
                            style="padding: 7px 22px;"><i
                            class="ti ti-circle-check me-1"></i>Lọc</button>
                    </div>
                </div>
            `;
        } else {
            // Nếu không phải là màn hình mobile, chèn khối mã HTML khác vào menuSearch
            menuSearchDiv.innerHTML = `
                <input type="hidden"  name="search" value="<?php echo $search; ?>">
                <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                        <select class="form-select" fdprocessedid="o6qc3" name="category">
                            <option value="">Danh Mục</option>
                            @foreach ($list_category as $value)
                                @if ($value == $category)
                                    <option value="{{ $value }}" selected>{{ $value }}</option>
                                @else
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-12">
                    <div class="form-group">
                        <select class="form-select" fdprocessedid="o6qc3" name="vitri">
                            <option value="">Vị Trí</option>
                            @foreach ($list_vi_tri as $value)
                                @if ($value->name == $vitri)
                                    <option value="{{ $value->name }}" selected>{{ $value->name }}</option>
                                @else
                                    <option value="{{ $value->name }}">{{ $value->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-4 col-md-4 col-12 mt-1">
                    <div class="form-group">
                        <select class="form-select" id="city" name="province">
                            <option value="" selected>Chọn Tỉnh Thành/
                                Thành Phố</option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-12 mt-1">
                    <div class="form-group">
                        <select class="form-select" id="district" name="district">
                            <option value="" selected>Chọn Quận/Huyện
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-12 mt-1">
                    <div class="form-group">
                        <select class="form-select" id="ward" name="wards">
                            <option value="" selected>Chọn Phường/Xã
                            </option>
                        </select>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-1 col-12" style="display: flex;align-items: center;">
                    <div class="form-group" style="text-align: end;">
                        <button type="submit" class="btn btn-primary d-inline-flex"
                            style="padding: 7px 22px;"><i
                            class="ti ti-circle-check me-1"></i>Lọc</button>
                    </div>
                </div>
            `;
        }
    }
    
    // Function to fetch data and render city options
    function fetchDataAndRenderCityOptions() {

        var selectedProvince = "<?php echo $province; ?>";
        var selectedDistrict = "<?php echo $district; ?>";
        var selectedWard = "<?php echo $wards; ?>";

        var citis = document.getElementById("city");
        var districts = document.getElementById("district");
        var wards = document.getElementById("ward");
        var Parameter = {
            url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
            method: "GET",
            responseType: "application/json",
        };
        var promise = axios(Parameter);
        promise.then(function(result) {
            renderCity(result.data);
            setSelectedProvince(selectedProvince, selectedDistrict, selectedWard);
        });

        function renderCity(data) {
            for (const x of data) {
                citis.options[citis.options.length] = new Option(x.Name, x.Name); // Use Name as value
            }
            citis.onchange = function() {
                district.length = 1;
                ward.length = 1;
                if (this.value != "") {
                    const result = data.filter(n => n.Name === this.value); // Filter based on Name

                    for (const k of result[0].Districts) {
                        district.options[district.options.length] = new Option(k.Name, k
                            .Name); // Use Name as value
                    }
                }
            };
            district.onchange = function() {
                ward.length = 1;
                const dataCity = data.filter((n) => n.Name === citis.value); // Filter based on Name
                if (this.value != "") {
                    const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                    for (const w of dataWards) {
                        wards.options[wards.options.length] = new Option(w.Name, w
                            .Name); // Use Name as value
                    }
                }
            };
        }

        function setSelectedProvince(selectedProvince) {
            for (let i = 0; i < citis.options.length; i++) {
                if (citis.options[i].value === selectedProvince) {
                    citis.selectedIndex = i;
                    citis.dispatchEvent(new Event('change')); // Kích hoạt sự kiện thay đổi để tải dữ liệu quận/huyện
                    setSelectedDistrict(selectedDistrict); // Gọi hàm để thiết lập quận/huyện đã chọn
                    break;
                }
            }
        }

        function setSelectedDistrict(selectedDistrict) {
            for (let i = 0; i < districts.options.length; i++) {
                if (districts.options[i].value === selectedDistrict) {
                    districts.selectedIndex = i;
                    district.dispatchEvent(new Event('change'));
                    setSelectedWard(selectedWard);
                    break;
                }
            }
        }

        function setSelectedWard(selectedWard) {
            for (let i = 0; i < wards.options.length; i++) {
                if (wards.options[i].value === selectedWard) {
                    wards.selectedIndex = i;
                    break;
                }
            }
        }
    }
</script>
