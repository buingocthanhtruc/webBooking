<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3 col-sm-6">
        <div class="service-item-sub pt-3">
          <div class="p-4">
            <h3>Menu</h3>

            <a href="index.php?act=profile">
              <p>Thông tin</p>
            </a>
            <a href="index.php?act=history_booking">
              <p>Lịch sử</p>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-9 col-sm-6">
        <div class="service-item-sub pt-3">
          <div class="p-4">
            <h5 class="mb-4">Danh Sách Bàn Đã Đặt</h5>
            <table class="table text-center table-bordered border-primary">
              <thead>
                <tr>
                  <th scope="col">STT</th>
                  <th scope="col">Ngày Đặt</th>
                  <th scope="col">Thời Gian</th>
                  <th scope="col">Số Người</th>
                  <th scope="col">Tổng Tiền</th>
                  <th scope="col">Trạng Thái</th>
                  <th scope="col">Xem Bill</th>
                </tr>
              </thead>
              <tbody>
                <?php

                for ($i = 1; $i <= count($dataHistory); $i++) {

                  // Format Ngày và Thời gian
                  $dateString = $dataHistory[$i - 1]['time_start'];
                  $dateTime = new DateTime($dateString);
                  $formattedDate = $dateTime->format('Y-m-d');
                  $formattedHour = $dateTime->format('H:i');

                  // Tính tiền
                  $json_data = $dataHistory[$i - 1]['list_food'];

                  // Chuyển đổi dữ liệu JSON thành mảng trong PHP
                  $items = json_decode($json_data, true);

                  if ($items === null && json_last_error() !== JSON_ERROR_NONE) {
                    echo "Có lỗi xảy ra trong quá trình chuyển đổi JSON.";
                  } else {
                    $totalSum = 0;
                    foreach ($items as $item) {
                      $total = $item['price'] * $item['quantity'];
                      $totalSum += $total;
                    }
                    // echo "Tổng giá trị của tất cả các mặt hàng: " . $totalSum . " VNĐ";
                  }

                  // Format trạng thái
                  if ($dataHistory[$i - 1]['status'] == 0) {
                    $status_bill = "Chưa Thanh Toán";
                  } else {
                    $status_bill = "Đã Thanh Toán";
                  }

                  echo '
                    <tr>
                      <th scope="row">' . $i . '</th>
                      <td>' . $formattedDate . '</td>
                      <td>' . $formattedHour . '</td>
                      <td>' . $dataHistory[$i - 1]['people'] . '</td>
                      <td>' . number_format($totalSum) . ' VNĐ</td>
                      <td>' . $status_bill . '</td>
                      <td><a href="index.php?act=bill_detail&id=' . $dataHistory[$i - 1]['id_bill'] . '">Xem</a></td>
                    </tr> 
                  ';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>