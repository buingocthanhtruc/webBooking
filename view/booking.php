<!-- Reservation Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
  <div class="row g-0">
    <h1 class="text-primary text-center col-6">Đặt bàn trực tuyến</h1>
    <h1 class="text-primary text-center col-6">Menu</h1>
    <form action="index.php?act=chooseTable" class="bg-dark py-2" method="post">
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
                  <input type="number" class="form-control" id="phone" placeholder="Your Number Phone" maxlength="10"
                    required>
                  <label for="email">Phone Number</label>
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
                <a href="<?= "#".$danhMuc["id_group"] ?>" class="nav-link "
                  data-bs-toggle="pill"><?= $danhMuc["name"] ?> </a>
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
                  <input type="number" value="0" min="0" class="col-2 ip" data-name="<?= $food['referred']?>">
                </div>
                <?php endforeach; ?>
              </div>
              <?php endforeach ?>
            </div>
          </div>
        </div>
        <input type="hidden" class="hidden_data">
        <div id="error_msg"></div>
        <div class=" d-flex justify-content-center mt-3 mb-3">
          <button class="btn bg-primary text-white col-1" id="btnSubmit" name="sendIF">Gửi</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Reservation Start -->
<?php
// echo $_SESSION['id'];

// echo '<br />';
// $date = date('i:s');
// echo $date;

// echo' <br />';
// Tạo một đối tượng DateTime với múi giờ mặc định
// $now = new DateTime();

// Lấy giờ và phút
// $phut = $now->format('i'); // 'i' là định dạng cho phút
// $giay = $now->format('s'); // 'H' là định dạng cho giờ trong định dạng 24 giờ

// echo "Giờ hiện tại là: $phut:$giay";

// echo $_SESSION['start'];
 ?>
<!-- Logic -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
function createObject(e) {
  // e.preventDefault();
  const inputElements = document.querySelectorAll(".ip");
  const dataObject = {};

  for (let i = 0; i < inputElements.length; i++) {
    const key = inputElements[i].dataset.name;
    const value = +inputElements[i].value;

    // Sử dụng giá trị của trường input làm key và value làm giá trị trong object
    dataObject[key] = value;
  }
  console.log(JSON.stringify(dataObject));
  const datass = JSON.stringify(dataObject)


  // LƯU THÔNG TIN NGƯỜI DÙNG CHỌN MÓN VÀO INPUT HIDDEN NÀY ĐỂ KHI POST SẼ LẤY NHỮNG GIÁ TRỊ ĐÓ
  const hidden = document.querySelector(".hidden_data");
  hidden.innerHTML = datass
  // console.log(hidden.textContent)
  // console.log(datass)

  const datas = {
    name: $('#name').val(),
    email: $('#email').val(),
    phone: $('#phone').val(),
    date_picker: $('#date_picker').val(),
    timeBook: +$('#timeBook').val(),
    people: $('#people').val(),
    id_of_user: +$('.id_of_user').val(),
    list_food: $('.hidden_data').text()
  };
  console.log(datas)

  $.ajax({
    // url: "http://localhost/duan1Copy/webBooking/model/api.php",

    // URL này phải đặt đúng URL ở máy mọi người (Vì Có thể AE sễ đặt tên Folder khác nhau)
    url: "http://localhost/DuAn1/webBooking/index.php",
    data: datas,
    method: "POST",
    dataType: "json",
  })
}
const btnSubmit = document.querySelector('#btnSubmit');
btnSubmit.addEventListener('click', createObject)
</script>