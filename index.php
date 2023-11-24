<?php
// session_unset();
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
                    $id_user = $_SESSION['id'];
                    if($id_user == 0) {
                        // echo "";
                        echo '<h4 class="mt-3 pb-5 text-warning text-center">Admin sẽ liên lạc lại với bạn sau ít phút sau khi xem lịch book 😉😉😉</h4>';
                        return;
                    }
                    // echo $id_user;
                    // echo $id;
                    if (isset($_POST['table']) && is_array($_POST['table'])) {
                        $selectedOptions = $_POST['table'];
                        $id_table = 0;
                        foreach ($selectedOptions as $option) {
                            // echo "Checkbox đã chọn: " . $option . "<br>";
                            $id_table = $option;
                        }
                        insert_id_table($id, $id_user, $id_table);
                        echo '<h4 class="mt-3 pb-5 text-success text-center">Cảm ơn quý khách đã book 😉😉😉</h4>';
                        return;
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
            // if ((isset($_POST['btnlogin'])) && ($_POST['btnlogin'])) {
            //     $phone_number = $_POST['phone_number'];
            //     $password = $_POST['password'];
            //     $role = checkUser($phone_number, $password);
            //     $_SESSION['role'] = $role;
            //     if ($role == 1) {
            //         header('location: admin/index.php');
            //     } else {
            //         header('location: index.php');
            //     }
            // }
            // include "view/login.php";
            // break;

            // CODE OF LUONG
            if (isset($_POST['btnlogin'])){
                $phone_number = $_POST['phone_number'];
                $password = $_POST['password'];
                $thongbao = dangnhap($phone_number, $password);

                if(isset($_SESSION['role']) && $_SESSION['role'] == 1){
                    echo "<script>location.href = 'admin/index.php'</script>";
                }
                
                if(isset($_SESSION['role']) && $_SESSION['role'] == 0){
                    echo "<script>location.href = '?act=booking'</script>";
                }
            }
            include "view/login.php";
             break;
                
        case 'logout':
                dangxuat();
                include "view/home.php";
                echo "<script>location.href = '?act=login'</script>";
            break;
        case 'signup':
            // if ((isset($_POST['btnsignup'])) && ($_POST['btnsignup'])) {
            //     $phone_number = $_POST['phone_number'];
            //     $password = $_POST['password'];
            //     $fullname = $_POST['fullname'];
            //     $email = $_POST['email'];

            //     if (empty($phone_number) && empty($password) && empty($email) && empty($fullname)) {
            //         echo "Bạn cần nhập đầy đủ thông tin!";
            //     } else {
            //         user_insert($phone_number, $password, $fullname, $email);
            //     }
            // }
            // include "view/signup.php";
            
            // CODE OF LUONG
                if (isset($_POST['btnsignup'])) {
                    $phone_number = $_POST['phone_number'];
                    $email = $_POST['email'];
                    $fullname = $_POST['fullname'];
                    $password = $_POST['password'];
                    $re_password = $_POST['cpassword'];

                    $thongbao = dangky($phone_number, $password, $re_password, $fullname, $email);
                }

            include "view/signup.php";
            break;

        case 'profile':
            include "view/profile.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
?>