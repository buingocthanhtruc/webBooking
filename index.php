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
include "model/booking.php";
include "model/payOnline.php";
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
                if (isset($_POST['id_table'])) {
                    $id_table = $_POST['id_table'];
                    update_table_temporary($id, $id_user, $id_table);
                    echo "<script>location.href = '?act=payOnline&idBill=$id'</script>";
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
        case 'testTable':
            include "view/testTable.php";
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
                $bill_detail = bill_detail($id);
            }
            include 'view/bill_detail.php';
            break;
        case 'payOnline':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $payment = $_POST['payment'];
                $total_monney = $_POST['total_money'];
                switch ($payment) {
                    case 'cash':
                        $status = 1;
                        update_status_order($status, $_POST['id_bill']);
                        echo "<script>location.href = '?act=payCashSuccess'</script>";
                        break;
                    case 'vnpay':
                        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                        $vnp_Returnurl = "http://localhost/Booking/index.php?act=ReturnPay&id_bill=" . $_POST['id_bill'];
                        $vnp_TmnCode = "0LXMRAJ0"; //Mã website tại VNPAY 
                        $vnp_HashSecret = "KHSGRJGQZXNATRFLJVLAVFNIYMTCNNFT"; //Chuỗi bí mật
                        $vnp_TxnRef = rand(0, 99999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                        $vnp_OrderInfo = 'Thanh toan dat ban';
                        $vnp_OrderType = 'billpayment';
                        $vnp_Amount = $total_monney * 100;
                        $vnp_Locale = 'vn';
                        $vnp_BankCode = 'NCB';
                        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                        //Add Params of 2.0.1 Version
                        //$vnp_ExpireDate = $expire;
                        $inputData = array(
                            "vnp_Version" => "2.1.0",
                            "vnp_TmnCode" => $vnp_TmnCode,
                            "vnp_Amount" => $vnp_Amount,
                            "vnp_Command" => "pay",
                            "vnp_CreateDate" => date('YmdHis'),
                            "vnp_CurrCode" => "VND",
                            "vnp_IpAddr" => $vnp_IpAddr,
                            "vnp_Locale" => $vnp_Locale,
                            "vnp_OrderInfo" => $vnp_OrderInfo,
                            "vnp_OrderType" => $vnp_OrderType,
                            "vnp_ReturnUrl" => $vnp_Returnurl,
                            "vnp_TxnRef" => $vnp_TxnRef,
                            //"vnp_ExpireDate" => $vnp_ExpireDate,
                        );

                        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                            $inputData['vnp_BankCode'] = $vnp_BankCode;
                        }
                        //var_dump($inputData);
                        ksort($inputData);
                        $query = "";
                        $i = 0;
                        $hashdata = "";
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }

                        $vnp_Url = $vnp_Url . "?" . $query;
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }
                        $returnData = array(
                            'code' => '1', 'message' => 'success', 'data' => $vnp_Url
                        );
                        if (isset($_POST['redirect'])) {
                            echo "<script>location.href = '$vnp_Url'</script>";
                            die();
                        }
                        break;
                    case "momo":
                        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
                        $partnerCode = 'MOMOBKUN20180529';
                        $accessKey = 'klm05TvNBzhg7h7j';
                        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                        $orderInfo = "Thanh toán qua MoMo";
                        $amount = $total_monney;
                        $orderId = rand(0, 99999);
                        $redirectUrl = "http://localhost/Booking/index.php?act=ReturnPay&id_bill=" . $_POST['id_bill'];
                        $ipnUrl = "http://localhost/Booking/index.php?act=ReturnPay&id_bill=" . $_POST['id_bill'];
                        $extraData = "";
                        $requestId = time() . "";
                        $requestType = "payWithATM";
                        //before sign HMAC SHA256 signature
                        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                        $signature = hash_hmac("sha256", $rawHash, $secretKey);
                        $data = array(
                            'partnerCode' => $partnerCode,
                            'partnerName' => "Test",
                            "storeId" => "MomoTestStore",
                            'requestId' => $requestId,
                            'amount' => $amount,
                            'orderId' => $orderId,
                            'orderInfo' => $orderInfo,
                            'redirectUrl' => $redirectUrl,
                            'ipnUrl' => $ipnUrl,
                            'lang' => 'vi',
                            'extraData' => $extraData,
                            'requestType' => $requestType,
                            'signature' => $signature
                        );
                        $result = execPostRequest($endpoint, json_encode($data));
                        $jsonResult = json_decode($result, true);  // decode json

                        //Just a example, please check more in there
                        $myPayUrl = $jsonResult['payUrl'];
                        echo "<script>location.href = '$myPayUrl'</script>";
                        break;
                }
            }
            if (isset($_GET['idBill'])) {
                $bill_detail = bill_detail($_GET['idBill']);
            }
            include 'view/payOnline.php';
            break;
        case "ReturnPay":
            if (isset($_GET['vnp_ResponseCode']) && $_GET['vnp_ResponseCode'] == "00") {
                $status = 1;
                $id = $_GET['id_bill'];
                $time = DateTime::createFromFormat('YmdHis', $_GET['vnp_PayDate'])->format('Y-m-d H:i:s');
                update_time_pay($time, $id);
                update_status_pay($status, $id);
                update_status($status, $id);
                update_status_order($status, $id);
                update_id_table_pay($id);
                include 'view/paySuccess.php';
                return;
            }
            if (isset($_GET['resultCode']) && $_GET['resultCode'] == "0") {
                $status = 1;
                $id = $_GET['id_bill'];
                $time = date('Y-m-d H:i:s', $_GET['responseTime'] / 1000);
                update_time_pay($time, $id);
                update_status_pay($status, $id);
                update_status($status, $id);
                update_status_order($status, $id);
                update_id_table_pay($id);
                include 'view/paySuccess.php';
                return;
            } else {
                include 'view/payFail.php';
            }
            break;
        case "payCashSuccess":
            include 'view/payCash.php';
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
