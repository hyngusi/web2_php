<div class="danhsach-container">
    <div class="title">
        <H1>Danh sách</H1>
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

            <?php
            foreach ($danhsach as $item) {
                extract($item);
                $sua = "index.php?act=suaSanPham&id=" . $maSP;
                $xoa = "index.php?act=xoaSanPham&id=" . $maSP;

                $imgpath = './uploads/' . $img_src;
                if (is_file($imgpath)) {
                    $img = "<img src='" . $imgpath . "' height='80'>";
                } else {
                    $img = 'no img';
                }

                echo '<tr>
                <td><input type="checkbox"></td>
                <td>' . $maSP . '</td>
                <td>' . $tenSP . '</td>
                <td>' . $soluong . '</td>
                <td>' . $dongia . '</td>
                <td>' . $kieudang_ten . '</td>
                <td>' . $doituong_ten . '</td>
                <td>' . $chatlieu_ten . '</td>
                <td>' . $img . '</td>
                <td><a href="' . $sua . '"><input type="button" value="Sửa"></a>
                     <a href="' . $xoa . '"><input type="button" value="Xóa"></a></td>
            </tr>';
            }
            ?>
        </table>

        <div class="table-footer">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addChatLieuSp"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>