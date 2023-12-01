<div class="container ">
  <div class="row d-flex justify-content-center">
    <div class="col-4">
      <form action="?act=signup" class="card p-4" method="POST">
      <?php 
        if(isset($thongbao) && $thongbao != "") {
          echo '<p class="mt-3 text-danger text-center">'.$thongbao.'</p>';
        }
      ?>
        <h1 class="text-center">Đăng Ký</h1>
        <div class="col m-3">
          <div class="form-floating">
            <input type="text" class="form-control" id="name" placeholder="Số điện thoại" name="phone_number" required>
            <label for="username">Số điện thoại</label>
          </div>
        </div>
        <div class="col m-3">
          <div class="form-floating">
            <input type="email" class="form-control" id="name" placeholder="Email" name="email" required>
            <label for="email">Email</label>
          </div>
        </div>
        <div class="col m-3">
          <div class="form-floating">
            <input type="text" class="form-control" id="name" placeholder="Họ tên" name="fullname" required>
            <label for="fullname">Họ tên</label>
          </div>
        </div>
        <div class="col m-3">
          <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password" required>
            <label for="password">Mật khẩu</label>
          </div>
        </div>
        <div class="col m-3">
          <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="cpassword" required>
            <label for="cpassword">Nhập lại mật khẩu</label>
          </div>
        </div>
        <div class="d-flex justify-content-center">
          <input type="submit" class="btn bg-primary p-2 text-white" name="btnsignup" value="Đăng Ký"></input>
        </div>
        <a href="index.php?act=login" class="nav-link text-primary text-end h7">Đăng Nhập</a>
      </form>
    </div>

  </div>
</div>