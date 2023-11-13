<!-- Reservation Start -->
<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
  <div class="row g-0">
    <h1 class="text-primary text-center col-6">Đặt bàn trực tuyến</h1>
    <h1 class="text-primary text-center col-6">Menu</h1>
    <form class="row bg-dark py-2">
      <div class="col-md-6 ">
        <div class="p-2 wow fadeInUp" data-wow-delay="0.2s">
          <div class="row g-3">
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="name" placeholder="Your Name">
                <label for="name">Họ tên</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="email" class="form-control" id="email" placeholder="Your Email">
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
                <select name="time_order" id="" class="valid form-select" aria-invalid="false">
                  <?php
                  $minute = 0;
                  for ($i = 10; $i < 21; $i++) :
                    for ($j = 0; $j < 2; $j++) :
                  ?>
                      <option value="<?= $i . ":" . $minute ?>0" type_time="day" number_time="<?= $i ?>"><?= $i . ":" . $minute ?>0</option>
                  <?php
                      if ($minute == 3) {
                        $minute = 0;
                      } else {
                        $minute += 3;
                      }
                    endfor;
                  endfor;
                  ?>
                </select>
                <label for="">Chọn giờ</label>
              </div>

            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <select class="form-select" id="select1">

                  <?php for ($i = 1; $i < 100; $i++) : ?>
                    <?= '<option value=' . $i . '>' . $i . ' người</option>' ?>
                  <?php endfor ?>
                </select>
                <label for="select1">Số người </label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                <label for="message">yêu cầu</label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 ">
        <div class="p-2 wow fadeInUp row" data-wow-delay="0.2s">
          <ul class="nav nav-pills mb-2">
            <li class="nav-item">
              <a href="#drinks" class="nav-link " data-bs-toggle="pill">Đồ Uống </a>
            </li>
            <li class="nav-item">
              <a href="#Appetizer" class="nav-link " data-bs-toggle="pill">Món Khai vị </a>
            </li>
            <li class="nav-item">
              <a href="#food" class="nav-link " data-bs-toggle="pill">Đồ Uống </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="row  container tab-pane active" id="drinks">
              <div class="row">
                <span class="text-white col-8">Bò hầm </span>
                <span class="col-2 text-white">10000đ</span>
                <input type="number" value="0" class="col-2 ">
              </div>
            </div>
            <div class="row  container tab-pane fade" id="Appetizer">
              <div class="row">
                <span class="text-white col-7">tHIT HEO </span>
                <span class="col-3 text-white">10000đ</span>
                <input type="number" value="0" class="col-2 ">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=" d-flex justify-content-center mt-3 mb-3">
        <button class="btn bg-primary text-white col-1 ">Gửi</button>
      </div>
    </form>
  </div>
</div>


<!-- Reservation Start -->