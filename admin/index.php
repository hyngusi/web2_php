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