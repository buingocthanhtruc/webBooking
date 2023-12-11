<div class="container-fluid mt-5">
  <div class="row g-4">
    <div class="col-lg-3 col-sm-6 pr-4">
      <p>Thông Tin Nhà Hàng</p>
      <h5>TLT Restaurant</h5>
      <p>Phố Trịnh Văn Bô, Phường Phương Canh, Quận Nam Từ Liêm, TP.Hà Nội</p>
      <p>Phone: 19009999</p>
      <p>Email: tltrestaurant@gmail.com</p>
    </div>
    <div class="col-lg-3 col-sm-6">
    </div>
    <div class="col-lg-3 col-sm-6">
      <p>Khách Hàng</p>
      <?php
      extract($bill_detail);
      // Format thời gian
      $dateString = $time_start;
      $dateTime = new DateTime($dateString);
      $formattedDate = $dateTime->format('Y-m-d');
      $formattedHour = $dateTime->format('H:i');

      echo '<h5>' . $name . '</h5>';
      echo '<p>Phone: ' . $phone . '</p>';
      echo '<p>Email: ' . $email . '</p>';
      echo '<p>Ngày đặt: ' . $formattedDate . '</p>';
      echo '<p>Giờ vào: ' . $formattedHour . '</p>';
      echo '<p>Số người: ' . $people . '</p>';
      ?>
    </div>
  </div>
  <?php

  $items = json_decode($list_food, true);

  if ($items === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "Có lỗi xảy ra trong quá trình chuyển đổi JSON.";
  } else {
    // Bắt đầu table
    echo '<table class="table table-bordered table-hover text-center mt-3">
            <tr>
                <th>STT</th>
                <th>Món</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tổng tiền</th>
            </tr>';

    $total = 0;
    for ($i = 1; $i <= count($items); $i++) {
      if ($items[$i - 1]['quantity'] > 0) {
        // Hiển thị thông tin của mặt hàng có quantity > 0 trong bảng
        $total += $items[$i - 1]['price'] * $items[$i - 1]['quantity'];
        echo '<tr>';
        echo '<td>' . $i . '</td>';
        echo '<td>' . $items[$i - 1]['name'] . '</td>';
        echo '<td>' . $items[$i - 1]['quantity'] . '</td>';
        echo '<td>' . number_format($items[$i - 1]['price']) . ' VNĐ</td>';
        echo '<td>' . number_format($items[$i - 1]['price'] * $items[$i - 1]['quantity']) . ' VNĐ</td>';
        echo '</tr>';
      }
    }

    // Kết thúc table
    echo '</table>';
  }
  ?>

  <div class="row g-4 mt-3">
    <div class="col-lg-7"></div>
    <div class="col-lg-5">
      <div class="row">
        <h6 class="col-6">Tổng tiền:</h6>
        <p class="col-6"><?php echo number_format($total); ?> VNĐ</p>

      </div>
    </div>
  </div>

</div>