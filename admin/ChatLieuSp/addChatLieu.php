<div class="content">
    <h1>Thêm mới chất liệu sản phẩm</h1>
    <form action="index.php?act=addChatLieuSp" method="post">
        <div>
            Tên chất liệu: <input type="text" name="ten">
        </div>
        <div>
            <input type="submit" name="themmoi" value="Thêm mới">
            <a href="index.php?act=danhSachChatLieu"><input type="button" value="Danh sách"></a>
        </div>
        <?php if (isset($thongbao) && ($thongbao != ''))
            echo $thongbao; ?>
    </form>
</div>
</div>