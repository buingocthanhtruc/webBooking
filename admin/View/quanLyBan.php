<?php
include 'View/titleOfComponents.php';
?>

<style>
  .grid-container {
    display: grid;
    place-items: center;
    grid-template-columns: auto auto auto auto;
    gap: 5px;
  }

  .grid-item {
    background-color: rgba(255, 255, 255, 0.8);
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

                  <input type="hidden" class="data_id_table" value="" name="id_table">

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
            // echo '<div class="grid-item bg-success">' . $name . '<br><input type="checkbox" class="inp" value=' . $id . ' name="" id=""></div>';
            echo '<img class="img-tables" src="assets/images/full.png" alt="Error Image Table" data-image="' . $id . '">';
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
              echo '<img class="img-tables" src="assets/images/hollow.png" alt="Error Image Table" data-image="' . $id . '">';
            } else {
              // echo '<div class="grid-item bg-success">' . $name . '<br><input type="checkbox" class="inp" value=' . $id . ' name="table[]" id=""></div>';
              echo '<img class="img-tables" src="assets/images/full.png" alt="Error Image Table" data-image="' . $id . '">';
            }
          endforeach;
        }

        ?>
      </div>


      <script>
        const images = document.querySelectorAll('.img-tables');

        const grid_container = document.querySelector('.grid-container');
        grid_container.addEventListener('click', function(e) {
          const chooseTable = e.target.closest('.img-tables');
          console.log(chooseTable)

          if (!chooseTable) return;

          images.forEach(img => img.classList.remove('img-tables_active'));

          chooseTable.classList.add('img-tables_active');

          document.querySelector('.data_id_table').value = chooseTable.dataset.image;

        })
      </script>