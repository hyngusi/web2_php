<?php

include "header.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            include 'danhmuc/addDanhmuc.php';
            break;
        case 'addsp':
            include 'sanpham/addSanpham.php';
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include 'home.php';
}

include "footer.php";

?>