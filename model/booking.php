<?php
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

    $create_at = date('Y-m-d H:i:s');
    $list_food = "" . $_POST['list_food'] . "";

    $items = json_decode($list_food, true);

    // Tính tổng tiền
    if ($items === null && json_last_error() !== JSON_ERROR_NONE) {
        echo "Có lỗi xảy ra trong quá trình chuyển đổi JSON.";
    } else {
        $totalSum = 0;

        foreach ($items as $item) {
            $total = $item['price'] * $item['quantity'];
            $totalSum += $total;
        }
    }


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
    insert_bill_detail($name, $email, $phone, $list_food, $id_bill, $totalSum);
}
