<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $payment = $_POST['payment'];

    switch ($payment) {
        case 'cash':
            echo "<script> 
            alert('Đặt bàn thành công. Quý khách vui lòng đến đúng hẹn.');
            </script>";
            break;
        case 'vnpay':
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
            $vnp_TmnCode = "0LXMRAJ0"; //Mã website tại VNPAY 
            $vnp_HashSecret = "KHSGRJGQZXNATRFLJVLAVFNIYMTCNNFT"; //Chuỗi bí mật

            $vnp_TxnRef = rand(0, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toan dat ban';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = 100000 * 100;
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
                'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            );
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                die();
            }
            // else {
            //     echo json_encode($returnData);
            // }
            break;
    }
}
?>

<div class="container">
    <div class="head">
        <div class="logo">
            <a href="#">TLT RESTAURANT</a>
        </div>
        <div class="infor">
            <div class="infor_restaurant">
                <h5>Nhà Hàng</h5>
                <span>Tầng 3 - Tòa P</span>
                <span>Tòa Nhà FPT POLYTECHNIC</span>
                <span>Phone: 18001008</span>
                <span>Email: tltrestaurant@gmail.com</span>
            </div>
            <div class="infor_cutomers">
                <h5>Khách Hàng</h5>
                <span>Nguyễn Văn Anh</span>
                <span>Số điện thoại: 0999888222</span>
                <span>Email: tltrestaurant@gmail.com</span>
                <span>Ngày đặt: 2023-11-11</span>
                <span>Giờ vào: 15h</span>
                <span>Số Người: 10</span>
            </div>
            <div class="infor_bill">
                <h5>Thanh Toán</h5>
                <span>Tổng Tiền: 1.897.000</span>
                <span>Đã cọc: 0</span>
                <span>Còn lại: 1.897.000</span>
            </div>
        </div>
    </div>
    <table id="customers">
        <tr>
            <th>STT</th>
            <th>Món Ăn</th>
            <th>Số Lượng</th>
            <th>Giá Món</th>
            <th>Tổng Tiền</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Pizza</td>
            <td>1</td>
            <td>350.000</td>
            <td>350.000</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Coca Cola</td>
            <td>2</td>
            <td>20.000</td>
            <td>40.000</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Mỳ Ý</td>
            <td>3</td>
            <td>89.000</td>
            <td>267.000</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Combo Gà Rán</td>
            <td>4</td>
            <td>150.000</td>
            <td>600.000</td>
        </tr>
    </table>
    <div class="total">
        <table>
            <tr>
                <td>Thuế:</td>
                <td>700.000</td>
            </tr>
            <tr>
                <td>Tổng Tiền:</td>
                <td>1.897.000</td>
            </tr>x
        </table>
        <p style="text-align: center; opacity: 80%;">Lựa chọn phương thức thanh toán</p>
        <form action="?act=thanhtoan" method="post">
            <div class="choose_payment">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" id="inlineRadio1" value="cash">
                    <label class="form-check-label" for="inlineRadio1">Thanh toán trực tiếp</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" id="inlineRadio2" value="vnpay">
                    <label class="form-check-label" for="inlineRadio2">VNPay</label>
                </div>
            </div>
            <br>
            <input type="submit" class="pay" name="redirect" value="Thanh Toán">
        </form>
    </div>
</div>