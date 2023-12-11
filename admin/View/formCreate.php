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
        <form class="form-material create-form" action="index.php?act=chooseTable" method="post">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5>Thông tin khách hàng</h5>
                </div>
                <div class="card-block">

                  <div class="form-group form-default">
                    <input type="text" name="user" class="form-control" required="" id="name">
                    <span class="form-bar"></span>
                    <label class="float-label">Tên khách hàng</label>
                  </div>
                  <div class="form-group form-default">
                    <input type="text" name="email" class="form-control" id="email" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Email (abc@gmail.com)</label>
                  </div>
                  <div class="form-group form-default mb-2">
                    <input id="date_picker" type="date" name="dataBook" class="form-control">
                    <label class="float-label">
                    </label>
                  </div>

                  <div class="form-group form-default">
                    <input type="text" name="phone" class="form-control" required="" id="phone">
                    <span class="form-bar"></span>
                    <label class="float-label">Số điện thoại</label>
                  </div>

                  <div class="form-group form-default">
                    <select class="form-select form-control" id="people" name="numberOfPeople" aria-label="Default select example" required>
                      <?php
                      echo '<option selected>Số người</option>';
                      for ($i = 0; $i < 7; $i++) {
                        echo '<option value="' . $i . '">' . $i . '</option>';
                      }
                      ?>
                      <!-- <span class="form-bar"></span> -->
                    </select>
                    <label class="float-label">Người</label>
                  </div>

                  <div class="form-group form-default">
                    <select class="form-select form-control" id="timeBook" aria-label="Default select example">
                      <option value="1">11h - 13h</option>
                      <option value="2">13h - 15h</option>
                      <option value="3">15h - 17h</option>
                      <option value="4">17h - 19h</option>
                      <option value="5">19h - 21h</option>
                      <option value="6">21h - 23h</option>
                    </select>
                    <label class="float-label">Giờ</label>
                  </div>

                  <!-- <div class="form-group form-default">
                    <select class="form-select form-control" id="status" name="state" aria-label="Default select example">
                      <option value="0">Chưa xác nhận</option>
                      <option value="1">Xác nhận</option>
                    </select>
                    <label class="float-label">Trạng thái</label>
                  </div> -->

                  <!-- <div class="form-group form-default">
                    <select class="form-select form-control" id="status_pay" name="state" aria-label="Default select example">
                      <option value="0">Chưa thanh toán</option>
                      <option value="1">Thanh toán</option>
                    </select>
                    <label class="float-label">Thanh toán</label>
                  </div> -->

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
                            <!-- <li class="active mr-4"><a data-toggle="tab" href="#home">Món khai vị</a></li>
                            <li><a class="mr-4" data-toggle="tab" href="#menu1">Đồ uống</a></li> -->

                            <?php foreach ($allDanhMuc as $danhMuc) : ?>
                              <li class="nav-item">
                                <a href="<?= "#" . $danhMuc["id_group"] ?>" class="nav-link mr-4" data-toggle="tab"><?= $danhMuc["name"] ?> </a>
                              </li>
                            <?php endforeach; ?>

                          </ul>

                          <div class="tab-content">
                            <?php foreach ($allDanhMuc as $danhMuc) : ?>
                              <div id="<?= $danhMuc["id_group"] ?>" class="tab-pane fade in">
                                <?php foreach (getFoodsByCategory($danhMuc["id"]) as $food) : ?>
                                  <div class="d-flex align-items-center">
                                    <h6 class="col-3"><?= $food["name"] ?></h6>
                                    <span class=" col-2"><?= number_format($food["price"]) ?> VNĐ</span>
                                    <input type="hidden" class="product-name" value="<?= $food["name"] ?>">
                                    <input type="hidden" class="product-price" value="<?= $food["price"] ?>">
                                    <select class="form-select form-control product-quantity" name="" aria-label="Default select example">
                                      <?php
                                      echo '<option selected>Số lượng</option>';
                                      for ($i = 0; $i <= 50; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                      }

                                      ?>
                                      <span class="form-bar"></span>
                                    </select>
                                  </div>
                                <?php endforeach; ?>
                              </div>
                            <?php endforeach; ?>
                          </div>
                        </div>
                      </form>
                    </div>
                    <input type="hidden" name="" class="hidden_data" value="">
                  </div>
                </div>
              </div>
        </form>

        <button class="btn btn-warning btn-submit" id="btnSubmit">Gửi</button>
        </form>
      </div>

      <!-- Logic -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

      <script>
        function createObject(e) {
          // e.preventDefault();
          const productData = [];
          const productNames = document.querySelectorAll(".product-name");
          const productPrices = document.querySelectorAll('.product-price');
          const productQuantities = document.querySelectorAll('.product-quantity');

          // Lặp qua từng cặp input và tạo đối tượng cho mỗi sản phẩm
          for (let i = 0; i < productNames.length; i++) {
            const productName = productNames[i].value;
            const productPrice = productPrices[i].value;
            const productQuantity = productQuantities[i].value;

            const product = {
              "name": productName,
              "price": +productPrice,
              "quantity": +productQuantity
            };

            productData.push(product);
          }
          console.log(productData)
          const jsonData = JSON.stringify(productData);
          console.log(jsonData)


          // LƯU THÔNG TIN NGƯỜI DÙNG CHỌN MÓN VÀO INPUT HIDDEN NÀY ĐỂ KHI POST SẼ LẤY NHỮNG GIÁ TRỊ ĐÓ
          const hidden = document.querySelector(".hidden_data");
          hidden.value = jsonData
          // console.log(hidden.value)
          // console.log(datass)

          const datas = {
            name: $('#name').val(),
            email: $('#email').val(),
            phone: $('#phone').val(),
            date_picker: $('#date_picker').val(),
            timeBook: +$('#timeBook').val(),
            people: $('#people').val(),
            // id_of_user: +$('.id_of_user').val(),
            list_food: jsonData,
          };
          console.log(datas)

          $.ajax({
            // URL này phải đặt đúng URL ở máy mọi người (Vì Có thể AE sẽ đặt tên Folder khác nhau)
            // url: "http://localhost/DuAn1/webBooking/admin/index.php?act=formCreate",
            url: "http://localhost/Booking/admin/index.php?act=formCreate",
            data: datas,
            method: "POST",
            dataType: "json",
          })
        }
        const btnSubmit = document.querySelector('#btnSubmit');
        btnSubmit.addEventListener('click', createObject)
      </script>