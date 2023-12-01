<?php
include 'View/titleOfComponents.php';
?>

<style>
  .grid-container {
    display: grid;
    grid-template-columns: auto auto auto;
    gap: 10px;
  }

  .grid-item {
    background-color: rgba(255, 255, 255, 0.8);
    border: 3px solid rgba(0, 0, 0, 0.8);
    padding: 20px;
    font-size: 30px;
    text-align: center;
  }
</style>

<div class="pcoded-inner-content">
  <!-- Main-body start -->
  <div class="main-body">
    <div class="page-wrapper">

      <!-- Page body start -->
      <div class="page-body">
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a class="text-primary h5" href="">Hành Động</a>
            </li>

            <li class="list-group-item">
              <form class="mb-3" method="post">
                <div class="form-row">
                  <div class="col mr-4">
                    <select name="time_order" class="form-control" id="">
                      <option value="1">11h - 13h</option>
                      <option value="2">13h - 15h</option>
                      <option value="3">15h - 17h</option>
                      <option value="4">17h - 19h</option>
                    </select>
                  </div>

                  <div class="col mr-4">
                    <div class="form-floating date" id="date3" data-target-input="nearest">
                      <input id="date_picker" type="date" name="day_book" class="form-control">
                    </div>
                  </div>

                  <div class="col-3">
                    <button class="btn btn-primary form-control" name="searchTable">Tìm kiếm</button>
                  </div>
                </div>
              </form>
            </li>
          </ul>

        </div>
      </div>


      <div class="grid-container">


        <?php
        if ($table_booked == false) {
          // $allTable là câu lệnh SELECT tất cả cái bàn ko dựa vào WHERE gì -> Vì lúc này không có bàn nào đc book
          foreach ($allTable as $table) :
            extract($table);
            echo '<div class="grid-item bg-success">' . $name . '<br><input type="checkbox" class="inp" value=' . $id . ' name="" id=""></div>';
          endforeach;
        }

        // Hiện thị tất cả các bàn (không chọn đc và chọn đc)
        else {
          $arr_dis = [];
          foreach ($table_booked as $value) :
            extract($value);
            array_push($arr_dis, $id_table);
          endforeach;
          foreach ($allTable as $table) :
            extract($table);
            $key = array_search($id, $arr_dis);
            if ($key !== false) {
              echo '<div class="grid-item item-disabled">' . $name . '<br><input type="checkbox" class="inp" value=' . $id . ' name="table[]" disabled id=""></div>';
            } else {
              echo '<div class="grid-item bg-success">' . $name . '<br><input type="checkbox" class="inp" value=' . $id . ' name="table[]" id=""></div>';
            }
          endforeach;
        }

        ?>
      </div>

      <?php
      // $currentTime = date("Y-m-d H:i:s");
      // echo "Thời gian hiện tại là: " . $currentTime;
      print_r($table_booked);

      ?>

      <script>
        // const btnSubmit = document.querySelector('#btnSubmit');
        // // btnSubmit.addEventListener('click', e => {
        // // e.preventDefault();

        // // })


        const checkboxes = document.querySelectorAll('.inp');
        let checkedCount = 0;
        let arr = 0;

        // function getCheckedCheckboxes() {
        // const checkedCheckboxes = [];


        for (let i = 0; i < checkboxes.length; i++) {
          checkboxes[i].addEventListener('change', function() {
            if (this.checked) {
              checkedCount += 1;
              console.log(this.value)
              arr = this.value
              // checkedCheckboxes.push(checkbox.name)

              if (checkedCount > 1) {
                this.checked = false; // Ngăn không cho chọn thêm khi đã đạt tối đa 1 mục
                checkedCount -= 1;
              }

            } else {
              checkedCount -= 1;
            }
          })
        }
      </script>