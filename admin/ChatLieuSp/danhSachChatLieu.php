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
                <td></td>
            </tr>

            <?php
            foreach ($danhsach as $item) {
                extract($item);
                $sua = "index.php?act=suaChatLieu&id=" . $ma;
                $xoa = "index.php?act=xoaChatLieu&id=" . $ma;

                echo '<tr>
                <td><input type="checkbox"></td>
                <td>' . $ma . '</td>
                <td>' . $ten . '</td>
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