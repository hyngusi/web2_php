<div class="row">
    <div>
        <H1>Thêm mới đối tượng sử dụng</H1>
    </div>
    <div>
        <form action="index.php?act=addkieuDang" method="post">
            <div>
                Kiểu dáng </br>
                <input type="text" name="ten">
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