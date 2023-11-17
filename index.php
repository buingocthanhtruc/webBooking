<?php 
if(isset($_GET['act'])){
    $act = $_GET['act'];
}else{
    $act ="";
}
include "model/pdo.php";
include "view/header.php";
include "model/category.php";
include "model/food.php";
$allDanhMuc = loadall_danhmuc();
$allFood = all_food();
if(!empty($act)){
    switch($act){
        case 'about':
            include "view/about.php";
            break;
        case 'service':
            include "view/service.php";
            break;
        case 'menu':
            include "view/menu.php";
            break;
        case 'booking':
            include "view/booking.php";
            break;
        case 'team':
            include "view/team.php";
            break;
        case 'testimonial':
            include "view/testimonial.php";
            break;
        case 'login':
            include "view/login.php";
            break;
        case 'signup':
            include "view/signup.php";
            break;
    }
}else{
    include "view/home.php";
}
include "view/footer.php";
?>