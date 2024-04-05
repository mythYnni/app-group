@if (Session::get('error'))
    <script>
        swal(
            "{{ Session::get('error') }}", "Thông Báo Từ Hệ Thống!", 'error', {
                button: true,
                button: "OK",
                timer: 50000,
                dangerMode: true,
            })
    </script>
@endif
