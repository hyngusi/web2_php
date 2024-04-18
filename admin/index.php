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
            if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {

            } else {

            }
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


    // ----------------------------------------------------------------------------- get
    case 'danhSachChatLieu':
        $sql = "select * from chatlieusp";
        $danhsach = pdo_query($sql);
        include 'ChatLieuSp/danhSachChatLieu.php';
        break;

    case 'danhsachDoiTuong':
        $sql = "select * from doituongsd";
        $danhsach = pdo_query($sql);
        // var_dump($danhsach);
        include 'DoiTuongSd/danhSachDoiTuong.php';
        break;

    case 'danhSachSanPham':
        // $sql = "select * from sanpham";  
        $sql = "select sp.*, cl.ten as chatlieu_ten, dt.ten as doituong_ten, kd.ten as kieudang_ten
                from sanpham as sp
                inner join chatlieusp as cl on sp.machatlieu = cl.ma
                inner join doituongsd as dt on sp.madoituongsd = dt.ma
                inner join kieudang as kd on sp.makieudang = kd.ma";
        $danhsach = pdo_query($sql);
        include 'SanPham/danhSachSp.php';
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

    // ----------------------------------------------------------- update
    case 'suaChatLieuSp':
        if (isset($_GET['id']) && ($_GET['id'] > 0)) {
            $sql = "select * from chatlieusp where ma=" . $_GET['id'];
            $chatlieu = pdo_query_one($sql);
        }
        include 'ChatLieuSp/updateChatLieu.php';
        break;

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


    default:
        include "home.php";
        break;
}

include "footer.php";

?>