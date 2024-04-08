<script>
    document.addEventListener("DOMContentLoaded", function() {
        var selectLocation = document.getElementById("exampleSelect1");
        var selectProvince = document.querySelector("select[name='province']");
        var selectDistrict = document.querySelector("select[name='district']");
        var selectWards = document.querySelector("select[name='wards']");

        selectLocation.addEventListener("change", function() {
            var selectedValue = this.value;

            if (selectedValue === "3") {
                // Reset giá trị của các dropdown khi selectedValue === "3"
                selectProvince.selectedIndex = 0;
                selectDistrict.selectedIndex = 0;
                selectWards.selectedIndex = 0;

                // Vô hiệu hóa các dropdown khi selectedValue === "3"
                selectProvince.disabled = true;
                selectWards.disabled = true;
                selectDistrict.disabled = true;
            } else {
                // Bật lại các dropdown khi selectedValue khác "3"
                selectProvince.disabled = false;
                selectWards.disabled = false;
                selectDistrict.disabled = false;
            }
        });
    });
</script>
