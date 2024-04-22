<script>
    const codeGroupInput = document.querySelector('input[name="codeGroup"]');
    let isCodeGroupFilled = false; // Biến cờ để kiểm tra xem mã nhóm đã được nhập đầy đủ hay chưa

    // Lắng nghe sự kiện khi giá trị của trường mã nhóm thay đổi
    codeGroupInput.addEventListener('input', function() {
        // Lấy giá trị mới của trường mã nhóm
        const codeGroupValue = this.value;

        // Cập nhật trạng thái của biến cờ
        isCodeGroupFilled = codeGroupValue.trim() !== '';

        // Nếu mã nhóm không rỗng
        if (isCodeGroupFilled) {
            // Thực hiện truy vấn AJAX
            $.ajax({
                url: 'lay-thong-tin-nhom/' + codeGroupValue,
                type: 'GET',
                success: function(response) {
                    // Gán các giá trị từ response vào các trường dữ liệu tương ứng
                    document.querySelector('input[name="idGroup"]').value = response.id;
                    document.querySelector('input[name="rent_cost"]').value = response.rent_cost;
                    document.querySelector('input[name="nameGroup"]').value = response.nameGroup;
                    document.querySelector('input[name="price"]').value = response.price;
                    document.querySelector('input[name="linkGroup"]').value = response.linkGroup;
                },
                error: function(xhr) {
                    // Xử lý lỗi khi truy vấn không thành công
                    document.querySelector('input[name="idGroup"]').value = '';
                    document.querySelector('input[name="rent_cost"]').value = '';
                    document.querySelector('input[name="nameGroup"]').value = '';
                    document.querySelector('input[name="price"]').value = '';
                    document.querySelector('input[name="linkGroup"]').value = '';
                }
            });

        } else {
            // Nếu mã nhóm rỗng, đặt các trường dữ liệu khác về giá trị mặc định
            document.querySelector('input[name="idGroup"]').value = '';
            document.querySelector('input[name="rent_cost"]').value = '';
            document.querySelector('input[name="nameGroup"]').value = '';
            document.querySelector('input[name="price"]').value = '';
            document.querySelector('input[name="linkGroup"]').value = '';
        }
    });
</script>