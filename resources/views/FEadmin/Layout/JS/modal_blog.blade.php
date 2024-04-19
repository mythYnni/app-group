<script>
    document.addEventListener('DOMContentLoaded', function() {
        var links = document.querySelectorAll('.blog_detail');

        links.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                var id = this.dataset.id;
                var html = '';
                var htmls = '';
                $.ajax({
                    url: 'chi-tiet-bai-viet/' + id,
                    type: 'GET',  // <-- Add a comma here
                    success: function(response) {
                        // console.log(response);
                        html += '<div class="col-md-12 blog_details">';
                        html += '<h5 style="text-align: center;">' + response.name + '</h5>';
                        html += '<br/>';
                        html += response.detail;
                        html += '</div>';
                        // gán nội dung của biến html vào thẻ có id="list"
                        $('#modal-body').html(html);
                        $('#myModal_blog').modal('show');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    });
</script>