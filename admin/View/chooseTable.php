<?php
include 'View/titleOfComponents.php';
?>

<style>
  .grid-container {
    display: grid;
    place-items: center;
    grid-template-columns: auto auto auto;
    gap: 10px;
  }

  .grid-item {
    background-color: var(--bs-gray);
    border: 3px solid rgba(0, 0, 0, 0.8);
    padding: 20px;
    font-size: 30px;
    text-align: center;
  }

  .img-tables {
    filter: contrast(200%);
    width: 65%;
  }

  .img-tables_active {
    filter: contrast(2000%);
  }
</style>
<div class="pcoded-inner-content">
  <!-- Main-body start -->
  <div class="main-body">
    <div class="page-wrapper">

      <!-- Page body start -->
      <div class="page-body">
        <div class="container-xxl py-2 px-0 wow fadeInUp" data-wow-delay="0.1s">
          <div class="row">
            <h1 class="text-primary text-center col-12">Chọn Bàn</h1>
            <form class="py-2 col-12" method="post" id="myForm">
              <div class="grid-container m-3 mb-5">
                <?php

                // function formartTime($time)
                // {
                //   $thoi_gian = new DateTime();
                //   $thoi_gian->setTime($time, 0, 0);

                //   // Format lại thời gian để hiển thị giờ, phút và giây
                //   // echo $thoi_gian->format('H:i:s');
                //   return $thoi_gian->format('H:i:s');
                // }

                $start = formartTime($_SESSION['start']);
                $end = formartTime($_SESSION['end']);
                // echo '<br />';
                // echo $start;
                // dataBook là năm, tháng, ngày -> Ta lấy để so sánh năm, tháng, ngày trong DB 
                $dateBook = $_SESSION['date'];

                $sql = "SELECT id_table 
          FROM `bill` 
          WHERE DATE(time_end) = '$dateBook' 
            AND TIME(time_start) BETWEEN '$start' AND '$end'
            AND TIME(time_end) BETWEEN '$start' AND '$end'";

                $result = pdo_query($sql);
                // print_r($result);

                // Lấy id_user để SELECT đc id ở bảng bill mới nhất mà user này mới đặt
                $id_user = $_SESSION['id'];
                $sql_get_id = "SELECT id FROM bill WHERE id_user = $id_user ORDER BY id DESC LIMIT 1;";
                $id = pdo_query_one($sql_get_id);

                // Chuyển từ mảng sang String để ta lưu vào 1 input hidden -> Khi ấn gửi thì ta sẽ qua index xử lý 
                $string = implode(', ', $id);

                // HIỂN THỊ RA TẤT CẢ CÁ BÀN (BÀN NÀO CŨNG CHỌN ĐC)
                if ($result == false) {
                  // $allTable là câu lệnh SELECT tất cả cái bàn ko dựa vào WHERE gì -> Vì lúc này không có bàn nào đc book
                  foreach ($allTable as $table) :
                    extract($table);
                    // echo '<div class="grid-item bg-success">' . $name . '<br><input type="checkbox" class="inp" value=' . $id . ' name="" id=""></div>';
                    echo '<img class="img-tables" src="assets/images/full.png" alt="Error Image Table" data-image="' . $id . '">';
                  endforeach;
                }

                // Hiện thị tất cả các bàn (không chọn đc và chọn đc)
                else {
                  $arr_dis = [];
                  foreach ($result as $value) :
                    extract($value);
                    array_push($arr_dis, $id_table);
                  endforeach;
                  foreach ($allTable as $table) :
                    extract($table);
                    $key = array_search($id, $arr_dis);
                    if ($key !== false) {
                      echo '<img class="img-tables" src="assets/images/hollow.png" alt="Error Image Table" data-image="">';
                    } else {
                      // echo '<div class="grid-item bg-success">' . $name . '<br><input type="checkbox" class="inp" value=' . $id . ' name="table[]" id=""></div>';
                      echo '<img class="img-tables" src="assets/images/full.png" alt="Error Image Table" data-image="' . $id . '">';
                    }
                  endforeach;
                }
                ?>

              </div>
              <div class=" d-flex justify-content-center mt-3 mb-3">
                <!-- Ta gửi $string này là id mới nhất ở DB bill của user -->
                <input type="hidden" name="id_of_book" value="<?php echo $string ?>">
                <input type="hidden" class="data_id_table" value="" name="id_table">
                <button class="btn bg-primary text-white col-1" id="btnSubmit" name="send_id_table">Gửi</button>
              </div>
            </form>
          </div>
        </div>

        <script>
          // const checkboxes = document.querySelectorAll('.inp');
          // let checkedCount = 0;
          // let arr = 0;

          // for (let i = 0; i < checkboxes.length; i++) {
          //   checkboxes[i].addEventListener('change', function() {
          //     if (this.checked) {
          //       checkedCount += 1;
          //       console.log(this.value)
          //       arr = this.value
          //       // checkedCheckboxes.push(checkbox.name)

          //       if (checkedCount > 1) {
          //         this.checked = false; // Ngăn không cho chọn thêm khi đã đạt tối đa 1 mục
          //         checkedCount -= 1;
          //       }

          //     } else {
          //       checkedCount -= 1;
          //     }
          //   })
          // }

          const images = document.querySelectorAll('.img-tables');

          const grid_container = document.querySelector('.grid-container');
          grid_container.addEventListener('click', function(e) {
            const chooseTable = e.target.closest('.img-tables');
            console.log(chooseTable)

            if (!chooseTable) return;
            if (chooseTable.dataset.image == '') alert('Bàn này đã được Book, Vui lòng chọn bàn khác')

            images.forEach(img => img.classList.remove('img-tables_active'));

            chooseTable.classList.add('img-tables_active');

            document.querySelector('.data_id_table').value = chooseTable.dataset.image;

          })
        </script>


        <?php


        ?>