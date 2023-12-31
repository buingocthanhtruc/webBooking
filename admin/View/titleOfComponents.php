<?php
$title = "Danh Sách Đặt Bàn";
$descriptions = "Thông tin đặt bàn";

if (isset($_GET['act'])) {
  if ($_GET['act'] === 'formCreate') {
    $title = "Đặt Bàn Ăn";
    $descriptions = "Món ăn Việt - Yêu thương quay về";
  }

  if ($_GET['act'] === 'qlsp') {
    $title = "Quản Lý Sản Phẩm";
    $descriptions = "Thông Tin về sản phẩm và danh mục sản phẩm";
  }
  if ($_GET['act'] === 'quanLyUser') {
    $title = "Danh sách người dùng";
    $descriptions = "Thông Tin người dùng ";
  }

  if ($_GET['act'] === 'chooseTable') {
    $title = "Chọn bàn";
    $descriptions = "Trạng thái bàn";
  }

  if ($_GET['act'] === 'chart') {
    $title = "Thống kê hoạt động";
    $descriptions = "Nhà hàng hoạt động";
  }
}

?>

<div class="pcoded-content">
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-8">
          <div class="page-header-title">
            <h5 class="m-b-10"><?php echo $title; ?></h5>
            <h6 class="m-b-0"><?php echo $descriptions; ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>