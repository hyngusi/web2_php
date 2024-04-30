<div class="content">
    <h1>Thêm người dùng</h1>
    <div class="row">
        <form action="index.php?act=addUser" method="post" enctype="multipart/form-data">
            <div class="row">
                Tên người dùng: <input type="text" name="username" required="true">
            </div>
            <div class="row">
                Mật khẩu: <input type="password" id="password" name="password" required="true"
                    oninput="checkPassword()">
            </div>
            <div class="row">
                Xác nhận mật khẩu: <input type="password" id="confirm_password" name="confirm_password" required="true"
                    oninput="checkPassword()">
            </div>
            <script>
                function checkPassword() {
                    var password = document.getElementById('password');
                    var confirm_password = document.getElementById('confirm_password');

                    if (password.value != confirm_password.value) {
                        confirm_password.setCustomValidity("Mật khẩu không khớp");
                    } else {
                        confirm_password.setCustomValidity("");
                    }
                }
            </script>
            <div class="row">
                Quyền:
                <select name="quyen" id="">
                    <?php
                    foreach ($listroles as $item) {
                        extract($item);
                        echo '<option value="' . $ma . '">' . $role . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div>
                <input type="submit" name="themmoi" value="Thêm mới">
                <a href="index.php?act=danhsachUser"><input type="button" value="Danh sách"></a>
            </div>
            <?php if (isset($thongbao) && ($thongbao != ''))
                echo $thongbao; ?>
        </form>
    </div>
</div>
</div>