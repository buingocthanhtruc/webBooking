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
            <?php if($_SESSION['role'] == 1) :?>
            <a href="http://localhost/Booking/admin/index.php">
              <p>Quản lý</p>
            </a>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-9 col-sm-6">
        <div class="service-item-sub pt-3">
          <div class="p-4">
            <h5>Thông Tin Tài Khoản</h5>
            <form method="post">
              <div class="form-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1"
                  value="<?php echo $_SESSION['fullname'] ?>" name="fullname" aria-describedby="emailHelp">
              </div>
              <div class="form-group mb-3">
                <input type="email" class="form-control" id="exampleInputEmail1"
                  value="<?php echo $_SESSION['email'] ?>" name="email" aria-describedby="emailHelp">
              </div>
              <div class="form-group mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1"
                  value="<?php echo $_SESSION['phone_number'] ?>" name="phone_number" aria-describedby="emailHelp">
              </div>
              <button type="submit" class="btn btn-primary" name="capnhat">sửa</button>
              <button type="reset" class="btn btn-primary" name="capnhat">Nhập lại</button>
            </form>
            <?php 
              if(isset($thongbao) && $thongbao != "") {
                echo '<h4 class="mt-3 pb-5 text-success text-center">'.$thongbao.'</h4>';
              }
            ?>
          </div>
        </div>
      </div>
    </div>