<?php 
if(isset($_GET['act'])){
    $act = $_GET['act'];
}else{
    $act ="";
}
include "../model/pdo.php";
include "View/header.php";
include "View/sideBar.php";
include "../model/category.php";
include "../model/food.php";
$allDanhMuc = loadall_danhmuc();
if(!empty($act)){
    switch($act){
        case 'formCreate':
            include "View/formCreate.php";
            break;
        case 'listBooking':
            include "View/listBooking.php";
            break;
        case 'qlsp':
            include "view/quanLySP.php";
            break;
        case 'quanLyUser':
            include "view/quanLyUser.php";
            break;
        case 'addDm':
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                addDanhMuc($_POST['category']);
                echo "<script>location.href = '?act=qlsp'</script>";
            }
            break;
        case 'editDm':
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                addDanhMuc($_POST['category']);
                echo "<script>location.href = '?act=qlsp'</script>";
            }
            break;
        
    }
}else{
    include "View/home.php";
}
include "View/footer.php";

?>