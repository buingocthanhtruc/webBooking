<?php
session_start();
// ob_start()
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
include "model/bill.php";
include "model/api_book.php";
include "model/table.php";

$allDanhMuc = loadall_danhmuc();
$allFood = all_food();
$allBill = loadall_bill_home();
$allTable = loadall_table();

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
        case 'chooseTable':
            // SAU KHI CHỌN BÀN THÌ SẼ UPDATE BÀN CHO USER
                if (isset($_POST['send_id_table'])) {
                    $id = $_POST['id_of_book'];
                    $id_user = $_SESSION['id_user'];
                    if (isset($_POST['table']) && is_array($_POST['table'])) {
                        $selectedOptions = $_POST['table'];
                        $id_table = 0;
                        foreach ($selectedOptions as $option) {
                            // echo "Checkbox đã chọn: " . $option . "<br>";
                            $id_table = $option;
                        }
                        insert_id_table($id, $id_user, $id_table);
                    } else {
                        echo "Không có checkbox nào được chọn.";
                    }
                }
                include "view/chooseTable.php";
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