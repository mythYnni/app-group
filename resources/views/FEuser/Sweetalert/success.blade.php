@if (Session::get('success'))
    <script>
        swal("{{ Session::get('success') }}", "Thông Báo Từ Hệ Thống!", 'success', {
            button: true,
            button: "OK",
            timer: 50000,
            dangerMode: true,
        })
    </script>
@endif
