<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="css/dt.css">
  <title>Chi tiết hóa đơn</title>
</head>

<body>
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
        </tr>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
  </script>
</body>

</html>