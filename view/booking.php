<!-- Reservation Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
  <div class="row g-0">
    <h1 class="text-primary text-center col-6">Đặt bàn trực tuyến</h1>
    <h1 class="text-primary text-center col-6">Menu</h1>
    <form action="index.php?act=chooseTable" class="bg-dark py-2 " method="post">
      <div class="row">
        <div class="col-md-6 ">
          <div class="p-2 wow fadeInUp" data-wow-delay="0.2s">
            <div class="row g-3">
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                  <label for="name">Họ tên</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                  <label for="email">Email</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating date" id="date3" data-target-input="nearest">
                  <input id="date_picker" type="date" class="form-control">
                  <label for="datetime">Ngày đặt bàn</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select name="time_order" id="timeBook" class="valid form-select" aria-invalid="false">
                    <option value="1">11h - 13h</option>
                    <option value="2">13h - 15h</option>
                    <option value="3">15h - 17h</option>
                    <option value="4">17h - 19h</option>
                  </select>
                  <label for="">Chọn giờ</label>
                </div>

              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <select class="form-select choose-people" id="people">
                    <?php for ($i = 1; $i < 7; $i++) : ?>
                      <?= '<option value=' . $i . '>' . $i . ' người</option>' ?>
                    <?php endfor ?>
                  </select>
                  <label>Số người </label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating">
                  <input type="text" class="form-control" id="phone" placeholder="Your Number Phone" maxlength="10" required>
                  <label id="label_phone" for="phone">Phone Number</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 ">
          <div class="p-2 wow fadeInUp row" data-wow-delay="0.2s">
            <ul class="nav nav-pills mb-2">
              <?php foreach ($allDanhMuc as $danhMuc) : ?>
                <li class="nav-item">
                  <a href="<?= "#" . $danhMuc["id_group"] ?>" class="nav-link " data-bs-toggle="pill"><?= $danhMuc["name"] ?> </a>
                </li>
              <?php endforeach; ?>
            </ul>

            <div class="tab-content">
              <?php foreach ($allDanhMuc as $danhMuc) : ?>
                <div class="row  container tab-pane fade" id="<?= $danhMuc["id_group"] ?>">
                  <?php foreach (getFoodsByCategory($danhMuc["id"]) as $food) : ?>
                    <div class="row">
                      <span class="text-white col-7"><?= $food["name"] ?> </span>
                      <span class="col-3 text-white"><?= $food["price"] ?> VNĐ</span>
                      <input type="hidden" class="product-name" value="<?= $food["name"] ?>">
                      <input type="hidden" class="product-price" value="<?= $food["price"] ?>">
                      <input type="number" value="0" min="0" class="col-2 product-quantity">
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>

        <input type="hidden" name="" class="hidden_data" value="">
        <div id="error_msg"></div>
        <div class=" d-flex justify-content-center mt-3 mb-3">
          <button class="btn bg-primary text-white col-1" id="btnSubmit" name="sendIF">Gửi</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Reservation Start -->

<!-- Logic -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
  function createObject(e) {
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
    console.log(hidden.textContent)
    // console.log(datass)

    const datas = {
      name: $('#name').val(),
      email: $('#email').val(),
      phone: $('#phone').val(),
      date_picker: $('#date_picker').val(),
      timeBook: +$('#timeBook').val(),
      people: $('#people').val(),
      // id_of_user: +$('.id_of_user').val(),
      list_food: jsonData
    };
    const pattern = /^0[0-9]{9}/;
    if (pattern.test(datas.phone)) {
      $.ajax({
        // URL này phải đặt đúng URL ở máy mọi người (Vì Có thể AE sẽ đặt tên Folder khác nhau)
        url: "http://localhost/DuAn1/webBooking/index.php?act=booking",
        data: datas,
        method: "POST",
        dataType: "json",
      })
    } else {
      $("#label_phone").text("Số điện thoại không đúng").addClass("text-danger");
      e.preventDefault();
    }

  }
  const btnSubmit = document.querySelector('#btnSubmit');
  btnSubmit.addEventListener('click', createObject)
</script>