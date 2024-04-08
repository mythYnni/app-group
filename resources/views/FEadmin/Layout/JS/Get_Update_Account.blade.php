<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var selectedProvince = "{{ $obj->province }}";
    var selectedDistrict = "{{ $obj->district }}";
    var selectedWard = "{{ $obj->wards }}";

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
                    district.options[district.options.length] = new Option(k.Name, k.Name); // Use Name as value
                }
            }
        };

        district.onchange = function() {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Name === citis.value); // Filter based on Name
            if (this.value != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Name === this.value)[0].Wards;

                for (const w of dataWards) {
                    wards.options[wards.options.length] = new Option(w.Name, w.Name); // Use Name as value
                }
            }
        };
    }
</script>