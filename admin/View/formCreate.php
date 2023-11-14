<!-- <div class="pcoded-content"> -->
<!-- Page-header start -->
<?php
    include 'View/titleOfComponents.php';
?>


<div class="pcoded-inner-content">
  <!-- Main-body start -->
  <div class="main-body">
    <div class="page-wrapper">

      <!-- Page body start -->
      <div class="page-body">
        <form class="form-material create-form">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5>Thông tin khách hàng</h5>
                </div>
                <div class="card-block">

                  <div class="form-group form-default">
                    <input type="text" name="user" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Tên khách hàng</label>
                  </div>
                  <div class="form-group form-default">
                    <input type="text" name="email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Email (abc@gmail.com)</label>
                  </div>
                  <div class="form-group form-default">
                    <input type="password" name="pass" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Mật khẩu</label>
                  </div>
                  <div class="form-group form-default mb-2">
                    <input id="date_picker" type="date" name="dataBook" class="form-control">
                    <label class="float-label">
                    </label>
                  </div>

                  <div class="form-group form-default">
                    <input type="text" name="phone" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Số điện thoại</label>
                  </div>

                  <div class="form-group form-default">
                    <select class="form-select form-control" name="numberOfPeople" aria-label="Default select example">

                      <?php 
                      echo '<option selected>Số người</option>';
                        for($i=0;$i<=100;$i++){
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                      ?>
                      <!-- <span class="form-bar"></span> -->
                    </select>
                    <label class="float-label">Người</label>
                  </div>

                  <div class="form-group form-default">
                    <select class="form-select form-control" name="timeBook" aria-label="Default select example">
                      <option selected>Chọn giờ</option>
                      <option value="1">10:00</option>
                      <option value="2">10:30</option>
                      <option value="3">11:00</option>
                      <option value="4">11:30</option>
                      <option value="5">12:00</option>
                      <option value="6">13:00</option>
                      <option value="7">18:00</option>
                      <option value="8">18:30</option>
                      <option value="9">19:00</option>
                      <option value="10">19:30</option>
                      <option value="11">20:00</option>
                      <option value="12">20:30</option>
                      <option value="13">21:00</option>
                      <option value="14">21:30</option>
                      <option value="15">22:00</option>
                    </select>
                    <label class="float-label">Giờ</label>
                  </div>

                  <div class="form-group form-default">
                    <select class="form-select form-control" name="state" aria-label="Default select example">
                      <option selected>Trạng thái</option>
                      <option value="1">Chưa xác nhận</option>
                      <option value="2">Chưa thanh toán cọc</option>
                      <option value="4">Đã thanh toán cọc</option>
                      <option value="3">Đã thanh toán</option>
                    </select>
                    <label class="float-label">Trạng thái</label>
                  </div>

                  <div class="form-group form-default form-static-label">
                    <input type="text" name="footer-email" class="form-control" required="" value="0 đ" disabled="">
                    <span class="form-bar"></span>
                    <label class="float-label">Tổng tiền</label>
                  </div>
                </div>
              </div>

              <!-- 2 -->

              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <h5>Danh sách món ăn</h5>
                    </div>
                    <div class="card-block">
                      <form class="form-material">
                        <div class="form-group form-default">
                          <ul class="nav nav-tabs form-control d-flex mb-4">
                            <li class="active mr-4"><a data-toggle="tab" href="#home">Món khai vị</a></li>
                            <li><a class="mr-4" data-toggle="tab" href="#menu1">Đồ uống</a></li>
                            <li><a class="mr-4" data-toggle="tab" href="#menu2">Món chính</a></li>
                            <li><a class="mr-4" data-toggle="tab" href="#menu3">Món tráng miệng</a></li>
                          </ul>

                          <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                              <div class="d-flex align-items-center">
                                <h6 class="col-3">Bò K</h6>
                                <span class="mr-2">6.000.000đ</span>
                                <select class="form-select form-control" name="beef"
                                  aria-label="Default select example">
                                  <?php 
                                  echo '<option selected>Số lượng</option>';  
                                      for($i=0;$i<=70 ;$i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                      }
                                    ?>
                                  <span class="form-bar"></span>
                                </select>
                              </div>
                            </div>

                            <div id="menu1" class="tab-pane fade in">
                              <div class="d-flex align-items-center">
                                <h6 class="col-3">Nước Cam</h6>
                                <span class="mr-2">100.000đ</span>
                                <select class="form-select form-control" name="orange"
                                  aria-label="Default select example">
                                  <?php 
                                  echo '<option selected>Số lượng</option>';
                                      for($i=0;$i<=70 ;$i++){
                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                      }
                                    ?>
                                  <span class="form-bar"></span>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

        </form>

        <button class="btn btn-warning btn-submit">Gửi</button>
        </form>
      </div>

      <script>
      const form = document.querySelector('.create-form')
      console.log(form)

      form.addEventListener("submit", function(e) {
        e.preventDefault();
        const dataArr = [...new FormData(this)];
        const data = Object.fromEntries(dataArr);
        console.log(data);
      });
      </script>