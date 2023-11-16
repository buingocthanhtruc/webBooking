<?php 
  $title = "ádsdsa";
  $descriptions = "ádsad";

if(isset($_GET['act'])) {
  if($_GET['act'] === 'formCreate') {
    $title = "Đặt Bàn Ăn";
    $descriptions = "Món ăn Việt - Yêu thương quay về";
  }

  if($_GET['act'] === 'listBooking') {
    $title = "Danh Sách Đặt Bàn";
    $descriptions = "Thông Tin";
  }
  
  if($_GET['act'] === 'qlsp') {
    $title = "Quản Lý Sản Phẩm";
    $descriptions = "Thông Tin";
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