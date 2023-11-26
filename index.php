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
include "model/bill_detail.php";
include "model/table.php";

$allDanhMuc = loadall_danhmuc();
$allFood = all_food();
$allBill = loadall_bill_home();
$allTable = loadall_table();

if (isset($_SESSION['id'])) {
    $dataHistory = get_info_history($_SESSION['id']);
}


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

            function addInFoBook($start, $end)
            {
                $people = $_POST['people'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];

                // Sesion này để lấy lấy năm, tháng ngày để so sánh năm, tháng ngày 
                // trong DB trùng nhau -> In ra bàn đang hoạt động 

                $_SESSION['date'] = $_POST['date_picker'];
                $timeBook = $_POST['timeBook'];

                // Format cho đúng định dạng để insert vào đc Databasse 
                $time_start = $_POST['date_picker'] . ' ' . $start;
                $time_end = $_POST['date_picker'] . ' ' . $end;

                $create_at = date('Y-m-d H:i');
                $list_food = "" . $_POST['list_food'] . "";


                // Session này đc tạo khi user đăng nhập -> Trường hợp user ko đ/nhập thì cho id_user = 0
                if (!isset($_SESSION['id'])) {
                    // Khi ko có $_SESSION['id'], ta sẽ tạo $_SESSION['id'] biết user nào
                    $id_user = 0;
                    $_SESSION['id'] = $id_user;
                } else {
                    $id_user = $_SESSION['id'];
                }

                // Insert thông tin vào bảng bill
                insert_bill($id_user, $time_start, $time_end, $create_at, $people);

                // Insert thông tin vào bảng bill_detail
                $result_id_bill = get_id_bill($id_user);
                $id_bill = implode(', ', $result_id_bill);
                insert_bill_detail($name, $email, $phone, $list_food, $id_bill);
            }

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (!isset($_POST['date_picker']) || $_POST['date_picker'] === "") {
                    return;
                } else {
                    $start = 0;
                    $end = 0;
                    if ($_POST['timeBook'] == 1) {
                        $start = 11;
                        $end = 13;
                        $_SESSION['start'] = 11;
                        $_SESSION['end'] = 13;
                    }

                    if ($_POST['timeBook'] == 2) {
                        $start = 13;
                        $end = 15;
                        $_SESSION['start'] = 13;
                        $_SESSION['end'] = 15;
                    }

                    if ($_POST['timeBook'] == 3) {
                        $start = 15;
                        $end = 17;
                        $_SESSION['start'] = 15;
                        $_SESSION['end'] = 17;
                    }

                    if ($_POST['timeBook'] == 4) {
                        $start = 17;
                        $end = 19;
                        $_SESSION['start'] = 17;
                        $_SESSION['end'] = 19;
                    }
                    addInFoBook($start, $end);
                }
            }
            break;

        case 'chooseTable':
            // SAU KHI CHỌN BÀN THÌ SẼ UPDATE BÀN CHO USER
            if (isset($_POST['send_id_table'])) {
                $id = $_POST['id_of_book'];
                $id_user = $_SESSION['id'];
                if ($id_user == 0) {
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
                    update_id_table($id, $id_user, $id_table);
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
            if (isset($_POST['btnlogin'])) {
                $phone_number = $_POST['phone_number'];
                $password = $_POST['password'];
                $thongbao = dangnhap($phone_number, $password);

                if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
                    echo "<script>location.href = 'admin/index.php'</script>";
                }

                if (isset($_SESSION['role']) && $_SESSION['role'] == 0) {
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
            $id = $_SESSION['id'];
            if (isset($_SESSION['id'])) {
                if (isset($_POST['capnhat'])) {
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $phone_number = $_POST['phone_number'];
                    update_account($id, $fullname, $email, $phone_number);
                    // echo "<script>location.href = '?act=profile'</script>";
                    $thongbao = "Cập nhật thành công";
                }
            }
            include "view/profile.php";
            break;

            // In ra bảng đặt bàn
        case 'history_booking':
            include 'view/history_booking.php';
            break;

            // Xem chi tiết bill
        case 'bill_detail':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $result = bill_detail($id);
            }
            include 'view/bill_detail.php';
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
