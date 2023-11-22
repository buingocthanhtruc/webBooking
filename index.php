<?php
session_start();
ob_start();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
} else {
    $act = "";
}
include "model/pdo.php";
include "model/user.php";
include "view/header.php";
include "model/category.php";
include "model/food.php";

$allDanhMuc = loadall_danhmuc();
$allFood = all_food();
if (!empty($act)) {
    switch ($act) {
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
            if ((isset($_POST['btnlogin'])) && ($_POST['btnlogin'])) {
                $phone_number = $_POST['phone_number'];
                $password = $_POST['password'];
                $role = checkUser($phone_number, $password);
                $_SESSION['role'] = $role;
                if ($role == 1) {
                    header('location: admin/index.php');
                } else {
                    header('location: index.php');
                }
            }
            include "view/login.php";
            break;
        case 'logout':
            if (isset($_SESSION['role'])) unset($_SESSION['role']);
            header('location: index.php');
        case 'signup':
            if ((isset($_POST['btnsignup'])) && ($_POST['btnsignup'])) {
                $phone_number = $_POST['phone_number'];
                $password = $_POST['password'];
                $fullname = $_POST['fullname'];
                $email = $_POST['email'];

                if (empty($phone_number) && empty($password) && empty($email) && empty($fullname)) {
                    echo "Bạn cần nhập đầy đủ thông tin!";
                } else {
                    user_insert($phone_number, $password, $fullname, $email);
                }
            }
            include "view/signup.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
