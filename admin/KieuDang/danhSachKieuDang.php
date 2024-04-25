<div class="danhsach-container">
    <div class="title">
        <H1>Danh sách kiểu dáng</H1>
    </div>
    <div class="table-container">
        <table class="data-table">
            <tr>
                <td></td>
                <td>Mã</td>
                <td>Tên</td>
                <td></td>
            </tr>

            <?php
            foreach ($danhsach as $item) {
                extract($item);
                $sua = "index.php?act=loadUpdateKieuDang&id=" . $ma;
                $xoa = "index.php?act=xoaKieuDang&id=" . $ma;

                echo '<tr>
                <td><input type="checkbox"></td>
                <td>' . $ma . '</td>
                <td>' . $ten . '</td>
                <td><a href="' . $sua . '"><input type="button" value="Sửa"></a>
                     <a href="' . $xoa . '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa kiểu dáng này?\')">
                     <input type="button" value="Xóa"></a></td>
            </tr>';
            }
            ?>
        </table>

        <div class="table-footer">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addKieuDang"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>