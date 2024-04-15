<div class="row">
    <div>
        <H1>Thêm mới loại hàng hóa</H1>
    </div>
    <div>
        <form action="index.php?act=adddm" method="post">
            <div>
                Mã loại </br>
                <input type="text" name="maloai">
            </div>
            <div>
                Tên loại </br>
                <input type="text" name="tenloai">
            </div>
            <div>
                <input type="submit" name="themmoi" value="Thêm mới">
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != ''))
                echo $thongbao
                    ?>
            </form>
        </div>
    </div>