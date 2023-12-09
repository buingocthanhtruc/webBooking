<?php
session_start();
if (isset($_GET['act'])) {
    $act = $_GET['act'];
} else {
    $act = "";
}

if (isset($_SESSION['role']) && $_SESSION['role'] == 1) :
    include "../model/bill.php";
    include "../model/bill_detail.php";
    include "../model/pdo.php";
    $bill_notify = load_bill_notifi(3);
    include "View/header.php";
    include "View/sideBar.php";
    include "../model/category.php";
    include "../model/food.php";
    include "../model/table.php";
    include "../model/user.php";
    include "../model/booking.php";
    $allDanhMuc = loadall_danhmuc();
    $allFood = all_food();
    $allTable = loadall_table();
    $allUser = get_info_user();

    $total_money_today = get_total_money_today();
    $total_money_cur_week = get_total_money_cur_week();
    $total_money_cur_month = get_total_money_cur_month();
    $total_money_cur_year = get_total_money_cur_year();
    $get_total_money_month = get_total_money_month();
    $get_total_money_year = get_total_money_year();

    if (!empty($act)) {
        switch ($act) {
            case 'formCreate':
                include "View/formCreate.php";
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
                include "View/chooseTable.php";
                if (isset($_POST['send_id_table'])) {
                    $id = $_POST['id_of_book'];
                    $id_user = $_SESSION['id'];
                    if (isset($_POST['id_table'])) {
                        // $selectedOptions = $_POST['table'];
                        // $id_table = 0;
                        // foreach ($selectedOptions as $option) {
                        //     // echo "Checkbox đã chọn: " . $option . "<br>";
                        //     $id_table = $option;
                        // }
                        $id_table = $_POST['id_table'];
                        update_id_table($id, $id_user, $id_table);
                        echo '<h4 class="mt-3 pb-5 text-success text-center">Thành Công !!!</h4>';
                        echo "<script>
                        function reloadPage() {
                            location.href = 'index.php?act=chooseTable'
                        }

                        setTimeout(reloadPage, 1000);
                    </script>";
                    } else {
                        echo '<h4 class="mt-3 pb-5 text-danger text-center">Không có bàn nào được chọn.</h4>';
                    }
                }
                break;
            case 'qlsp':
                include "view/quanLySP.php";
                break;
            case 'quanLyUser':
                include "view/quanLyUser.php";
                break;
            case 'quanLyBan':
                if (isset($_POST['searchTable'])) {
                    $khung_gio = (int)$_POST['time_order'];
                    $day = $_POST['day_book'];
                    $table_booked = searchStatusTable($khung_gio, $day);
                } else {
                    $khung_gio = 1;
                    $day = null;
                }
                $table_booked = searchStatusTable($khung_gio, $day);
                include "view/quanLyBan.php";
                break;
            case 'chart':
                include "view/thongKe.php";
                break;
            case 'updateStatusPay':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $status = 1;
                    $id = $_GET['id'];
                    $result = get_status_id_bill($id);
                    $status_bill = implode(', ', $result);

                    if ($status_bill == 0) {
                        $thongbao = update_id_table($id);
                        if ($thongbao == "SAI") {
                            echo "<script>location.href = 'index.php'</script>";
                            return;
                        }
                    }

                    update_status_pay($status, $id);
                    update_time_pay_ad($id);
                    update_status($status, $id);
                    echo "<script>location.href = 'index.php'</script>";
                }
                break;

            case 'updateStatus':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $status = 1;
                    $id = $_GET['id'];
                    $thongbao = update_id_table($id);
                    // echo $thongbao;

                    if ($thongbao == "SAI") {
                        echo "<script>location.href = 'index.php'</script>";
                        return;
                    }
                    update_status($status, $id);
                    echo "<script>location.href = 'index.php'</script>";
                }
                break;

            case 'deleteBill':
                if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                    $id = $_GET['id'];
                    deleteBill($id);
                    echo "<script>location.href = 'index.php'</script>";
                }
                break;
            case 'addDm':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    addDanhMuc($_POST['category'], $_POST['id_group']);
                    echo "<script>location.href = '?act=qlsp'</script>";
                }
                break;
            case 'editDm':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    updateDanhMuc($_POST['id'], $_POST['category'], $_POST['id_group']);
                    echo "<script>location.href = '?act=qlsp'</script>";
                }
                if (!empty($_GET['id'])) {
                    include "view/editDm.php";
                } else {
                    echo "<script>location.href = 'index.php'</script>";
                }
                break;
            case 'deleteDm':
                if (!empty($_GET['id'])) {
                    deleteDanhMuc($_GET['id']);
                    echo "<script>location.href = '?act=qlsp'</script>";
                } else {
                    echo "<script>location.href = 'index.php'</script>";
                }
                break;
            case "addFood":
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name = $_POST['name'];
                    // $referred = $_POST['referred'];
                    $price = $_POST['price'];
                    $img = $_FILES['image']['name'];
                    $iddm = $_POST['id_dm'];
                    if (uploadFile($_FILES['image'])) {
                        addProduct($name, $price, $img, $iddm);
                    } else {
                        echo "<script>alert('oke')</script>";
                    }
                }
                echo "<script>location.href = '?act=qlsp'</script>";
                break;
            case 'editFood':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $id = $_POST["id"];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $iddm = $_POST['id_dm'];
                    if (!empty($_FILES["image"]["name"])) {
                        $img = $_FILES["image"]["name"];
                        uploadFile($_FILES['image']);
                    } else {
                        $img = $_POST['imgOld'];
                    }
                    editProduct($name, $price, $img, $iddm, $id);
                }
                if (!empty($_GET['id'])) {
                    include "view/editFood.php";
                } else {
                    echo "<script>location.href = 'index.php?act=qlsp'</script>";
                }
                break;
            case 'deleteFood':
                if (!empty($_GET['id'])) {
                    deleteProduct($_GET['id']);
                    echo "<script>location.href = '?act=qlsp'</script>";
                } else {
                    echo "<script>location.href = 'index.php'</script>";
                }
                break;
                // case "updateStatusTable":
                //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //         updateStatusTable($_POST['id_table'], $_POST['statusTable']);
                //     }
                //     echo "<script>location.href = 'index.php?act=quanLyBan'</script>";
                //     break;

                // case 'searchStatusTable':
                //     if (isset($_POST['searchTable'])) {
                //         echo $_POST['day'];
                //     }
                //     break;
        }
    } else {
        // echo $_SESSION['id'];

        if (isset($_POST['searchInfo'])) {
            $name = $_POST['name_user'];
            $status = $_POST['status_bill'];
        } else {
            $name = "";
            $status = 2;
        }

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = '';
        }

        if ($page == '' || $page == 1) {
            $page_1 = 0;
        } else {
            $page_1 = ($page * 5) - 5;
        }

        $allBill = loadall_bill($name, $status, $page_1);
        // $count_all_bill = get_count_all_bill();
        $count_all_bill = get_count_all_bill($name, $status, $page_1);

        include "View/listBooking.php";
    }
    include "View/footer.php";
else :
    echo "<script>location.href = 'http://localhost/Booking/?act=login'</script>";
endif;
