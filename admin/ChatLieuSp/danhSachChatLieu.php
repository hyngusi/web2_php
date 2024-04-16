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

            <?php foreach ($danhsach as $item): ?>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><?= $item['ma'] ?></td>
                    <td><?= $item['ten'] ?></td>
                    <td><input type="button" value="Sửa"><input type="button" value="Xóa"></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="table-footer">
            <input type="button" value="Chọn tất cả">
            <input type="button" value="Bỏ chọn tất cả">
            <input type="button" value="Xóa các mục đã chọn">
            <a href="index.php?act=addChatLieuSp"><input type="button" value="Nhập thêm"></a>
        </div>
    </div>
</div>