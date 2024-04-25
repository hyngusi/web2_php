<?php
include "./model/pdo.php";
include "header.php";

$act = isset($_GET['act']) ? $_GET['act'] : '';

switch ($act) {
    // ------------------------------------------------------ add
    case 'addChatLieuSp':
        if (isset($_POST['themmoi']) && $_POST['ten']) {
            $ten = $_POST['ten'];
            $sql = "insert into chatlieusp (ten) values ('$ten')";
            pdo_execute($sql);
            $thongbao = "Thêm thành công";
        }
        include 'ChatLieuSp/addChatLieu.php';
        break;

    case 'addDoiTuongSd':
        if (isset($_POST['themmoi']) && $_POST['ten']) {
            $ten = $_POST['ten'];
            $sql = "insert into doituongsd (ten) values ('$ten')";
            pdo_execute($sql);
            $thongbao = "Thêm thành công";
        }
        include 'DoiTuongSd/addDoiTuong.php';
        break;

    case 'addKieuDang':
        if (isset($_POST['themmoi']) && $_POST['ten']) {
            $ten = $_POST['ten'];
            $sql = "insert into kieudang (ten) values ('$ten')";
            pdo_execute($sql);
            $thongbao = "Thêm thành công";
        }
        include 'KieuDang/addKieuDang.php';
        break;

    case 'addSanPham':
        if (isset($_POST['themmoi'])) {
            $tenSP = $_POST['tenSP'];
            $soluong = $_POST['soluong'];
            $dongia = $_POST['dongia'];
            $kieudang = $_POST['kieudang'];
            $doituongsd = $_POST['doituongsd'];
            $chatlieu = $_POST['chatlieu'];
            $img = $_FILES['img']['name'];

            $target_dir = "uploads/"; // Thư mục lưu trữ tệp
            $target_file = $target_dir . basename($_FILES["img"]["name"]); // Đường dẫn đầy đủ đến tệp được tải lên
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);
            // var_dump($kieudang, $doituongsd, $chatlieu);

            $sql = "insert into sanpham (tenSP, soluong, dongia, makieudang, madoituongsd, machatlieu, img_src)
                        values ('$tenSP','$soluong', '$dongia', '$kieudang', '$doituongsd', '$chatlieu', '$img')";
            pdo_execute($sql);
            $thongbao = "Thêm thành công";
        }
        $sql = "select * from kieudang";
        $listkieudang = pdo_query($sql);

        $sql = "select * from doituongsd";
        $listdoituongsd = pdo_query($sql);

        $sql = "select * from chatlieusp";
        $listchatlieu = pdo_query($sql);

        include 'SanPham/addSanpham.php';
        break;

    case 'addUser':
        include 'User/addUser.php';
        break;

    // -------------------------------------------------------------------------- get danhSach

    case 'danhSachChatLieu':
        $sql = "select * from chatlieusp";
        $danhsach = pdo_query($sql);
        include 'ChatLieuSp/danhSachChatLieu.php';
        break;

    case 'danhsachDoiTuong':
        $sql = "select * from doituongsd";
        $danhsach = pdo_query($sql);
        include 'DoiTuongSd/danhSachDoiTuong.php';
        break;

    case 'danhSachKieuDang':
        $sql = "select * from kieudang";
        $danhsach = pdo_query($sql);
        include 'KieuDang/danhSachKieuDang.php';
        break;

    case 'danhSachSanPham':
        $sql = "SELECT COUNT(*) FROM sanpham";
        $totalProducts = pdo_query_value($sql);
        include 'SanPham/danhSachSp.php';
        break;

    case 'danhSachHoaDon':
        $sql = "SELECT hoadon.*, users.username as tenKH, trangthai.trangthai as TT
                FROM hoadon
                INNER JOIN users ON hoadon.maKH = users.userID
                INNER JOIN trangthai ON hoadon.trangthai = trangthai.ma";
        $danhsach = pdo_query($sql);
        include 'HoaDon/danhSachHoaDon.php';
        break;

    // ----------------------------------------------------------------- delete

    case 'xoaChatLieuSp':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $sql = "delete from chatlieusp where ma=" . $_GET['id'];
            pdo_execute($sql);
        }
        $sql = "select * from chatlieusp";
        $danhsach = pdo_query($sql);
        include 'ChatLieuSp/danhSachChatLieu.php';
        break;

    case 'xoaDoiTuongSd':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $sql = "delete from doituongsd where ma=" . $_GET['id'];
            pdo_execute($sql);
        }
        $sql = "select * from doituongsd";
        $danhsach = pdo_query($sql);
        include 'DoiTuongSd/danhSachDoiTuong.php';
        break;

    case 'xoaKieuDang':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $sql = "delete from kieudang where ma=" . $_GET['id'];
            pdo_execute($sql);
        }
        $sql = "select * from kieudang";
        $danhsach = pdo_query($sql);
        include 'KieuDang/danhSachKieuDang.php';
        break;

    case 'xoaSanPham':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $sql = "delete from sanpham where maSP=" . $_GET['id'];
            pdo_execute($sql);
        }
        $sql = "SELECT COUNT(*) FROM sanpham";
        $totalProducts = pdo_query_value($sql);
        include 'SanPham/danhsachsp.php';
        break;

    // ----------------------------------------------------------- loadUpdate

    case 'loadUpdateChatLieuSp':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $sql = "select * from chatlieusp where ma=" . $_GET['id'];
            $chatlieu = pdo_query_one($sql);
        }
        include 'ChatLieuSp/updateChatLieu.php';
        break;

    case 'loadUpdateDoiTuongSd':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $sql = "select * from doituongsd where ma=" . $_GET['id'];
            $doituong = pdo_query_one($sql);
        }
        include 'DoiTuongSd/updateDoiTuong.php';
        break;

    case 'loadUpdateKieuDang':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $sql = "select * from kieudang where ma=" . $_GET['id'];
            $kieudang = pdo_query_one($sql);
        }
        include 'KieuDang/updateKieuDang.php';
        break;

    case 'loadUpdateSanPham':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $sql = "select sp.*, cl.ten as chatlieu_ten, dt.ten as doituong_ten, kd.ten as kieudang_ten
                    from sanpham as sp  
                    inner join chatlieusp as cl on sp.machatlieu = cl.ma
                    inner join doituongsd as dt on sp.madoituongsd = dt.ma
                    inner join kieudang as kd on sp.makieudang = kd.ma where sp.maSP=" . $_GET['id'];
            $sanpham = pdo_query_one($sql);

            $sql = "select * from kieudang";
            $listkieudang = pdo_query($sql);

            $sql = "select * from doituongsd";
            $listdoituongsd = pdo_query($sql);

            $sql = "select * from chatlieusp";
            $listchatlieu = pdo_query($sql);
        }
        include 'SanPham/updateSp.php';
        break;

    // -------------------------------------------------------------------- update

    case 'updateChatLieuSp':
        if (isset($_POST['capnhat']) && $_POST['ten']) {
            $ma = $_POST['ma'];
            $ten = $_POST['ten'];
            $sql = "update chatlieusp set ten='$ten' where ma='$ma'";
            pdo_execute($sql);
            $thongbao = "Cập nhật thành công";
        }
        $sql = "select * from chatlieusp";
        $danhsach = pdo_query($sql);
        include 'ChatLieuSp/danhSachChatLieu.php';
        break;

    case 'updateDoiTuongSd':
        if (isset($_POST['capnhat']) && $_POST['ten']) {
            $ma = $_POST['ma'];
            $ten = $_POST['ten'];
            $sql = "update doituongsd set ten='$ten' where ma='$ma'";
            pdo_execute($sql);
            $thongbao = "Cập nhật thành công";
        }
        $sql = "select * from doituongsd";
        $danhsach = pdo_query($sql);
        include 'DoiTuongSd/danhSachDoiTuong.php';
        break;

    case 'updateKieuDang':
        if (isset($_POST['capnhat']) && $_POST['ten']) {
            $ma = $_POST['ma'];
            $ten = $_POST['ten'];
            $sql = "update kieudang set ten='$ten' where ma='$ma'";
            pdo_execute($sql);
            $thongbao = "Cập nhật thành công";
        }
        $sql = "select * from kieudang";
        $danhsach = pdo_query($sql);
        include 'KieuDang/danhSachKieuDang.php';
        break;

    case 'updateSanPham':
        if (isset($_POST['capnhat'])) {
            $maSP = $_POST['maSP'];
            $tenSP = $_POST['tenSP'];
            $soluong = $_POST['soluong'];
            $dongia = $_POST['dongia'];
            $kieudang = $_POST['makieudang'];
            $doituongsd = $_POST['madoituongsd'];
            $chatlieu = $_POST['machatlieu'];
            $img = $_FILES['img']['name'];

            $target_dir = "uploads/"; // Thư mục lưu trữ tệp
            $target_file = $target_dir . basename($_FILES["img"]["name"]); // Đường dẫn đầy đủ đến tệp được tải lên
            move_uploaded_file($_FILES['img']['tmp_name'], $target_file);

            if ($img == '') {
                $sql = "update sanpham set tenSP='$tenSP', soluong='$soluong',dongia='$dongia', 
                makieudang='$kieudang',madoituongsd='$doituongsd', machatlieu='$chatlieu' 
                where maSP='$maSP'";
            } else
                $sql = "update sanpham set tenSP='$tenSP', soluong='$soluong',dongia='$dongia', 
            makieudang='$kieudang',madoituongsd='$doituongsd', machatlieu='$chatlieu', img_src='$img' 
            where maSP='$maSP'";

            pdo_execute($sql);
        }
        $sql = "SELECT COUNT(*) FROM sanpham";
        $totalProducts = pdo_query_value($sql);
        include 'SanPham/danhsachsp.php';
        break;



    default:
        include "home.php";
        break;
}

include "footer.php";

?>