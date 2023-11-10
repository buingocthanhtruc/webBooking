<?php 
if(isset($_GET['act'])){
    $act = $_GET['act'];
}else{
    $act ="";
}
include "model/pdo.php";
include "view/header.php";
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
    }
}else{
    include "view/home.php";
}
include "view/footer.php";
?>