<div class="danhsach-container">
    <div class="title">
        <H1>Danh sách</H1>
    </div>
    <div id="pagination">

    </div>
    <div class="table-container">
        <table class="data-table">
            <tr>
                <td></td>
                <td>Mã</td>
                <td>Tên</td>
                <td>Số lượng</td>
                <td>Đơn giá</td>
                <td>Kiểu dáng</td>
                <td>Đối tượng</td>
                <td>Chất liệu</td>
                <td>img</td>
                <td style="width: 140px"></td>
            </tr>

            <tbody id="product-list">
                <!-- Danh sách sản phẩm sẽ được hiển thị ở đây -->
            </tbody>

            <script>
                $(document).ready(function () {
                    var productsPerPage = 10; // Số sản phẩm trên mỗi trang
                    var currentPage = 1; // Trang hiện tại

                    // Tính toán số lượng trang và tạo các nút phân trang
                    var totalPages = Math.ceil(<?= $totalProducts ?> / productsPerPage);

                    for (var i = 1; i <= totalPages; i++) {
                        $('#pagination').append('<a href="#" class="page-link page-number" data-page="' + i + '">' + i + '</a>');
                    }

                    // Tự động tải trang 1
                    loadPage(1);

                    // Xử lý khi một nút phân trang được nhấp
                    $('#pagination').on('click', '.page-link', function (e) {
                        e.preventDefault();

                        currentPage = $(this).data('page');

                        loadPage(currentPage);
                    });

                    $('input[value="Xóa"]').click(function (e) {
                        e.preventDefault();
                        var confirmDelete = confirm('Bạn có chắc chắn muốn xóa sản phẩm đã chọn không?');
                        if (confirmDelete) {
                            // Xóa sản phẩm
                        } else {
                            // Người dùng đã hủy xóa
                        }
                    });

                    // Hàm để tải một trang
                    function loadPage(page) {
                        $.ajax({
                            url: 'SanPham/get_products.php',
                            type: 'GET',
                            data: { page: page },
                            success: function (response) {
                                $('#product-list').html(response);

                                // Đánh dấu trang hiện tại
                                $('.page-link').removeClass('current-page');
                                $('.page-link[data-page="' + page + '"]').addClass('current-page');
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                console.log(textStatus, errorThrown);
                            }
                        });
                    }
                });
            </script>

        </table>

        <div class="table-footer">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addChatLieuSp"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>