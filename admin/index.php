<?php 
if(isset($_GET['act'])){
    $act = $_GET['act'];
}else{
    $act ="";
}
// include "model/pdo.php";
include "View/header.php";
include "View/sideBar.php";

if(!empty($act)){
    switch($act){
        case 'formCreate':
            include "View/formCreate.php";
            break;
        case 'listBooking':
            include "View/listBooking.php";
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
    include "View/home.php";
}
include "View/footer.php";

?>