<style>
.grid-container {
  display: grid;
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

.item-disabled {
  background-color: var(--bs-teal) !important;
}
</style>

<div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
  <div class="row g-0">
    <h1 class="text-primary text-center col-12">Chọn Bàn</h1>
    <form class="bg-dark py-2" method="post">
      <div class=" grid-container m-3">

        <?php



echo '<br />';
echo '<br />';

        
          $id_user12 = $_SESSION['id_user']; // Laay dc
          // echo $id_user12;

          $start22 = $_SESSION['start'];
          $end22 = $_SESSION['end'];
          $dateBook = $_SESSION['date'];

          echo $start22;
          echo '<br />';
          echo $end22;
          echo $dateBook;
          // echo $dateBook;
          // echo $_SESSION['date'];
          // echo $start22;
          // echo $end22;

          $sql_get_id = "SELECT id FROM bill WHERE id_user = $id_user12 ORDER BY id DESC LIMIT 1;";
          $id = pdo_query_one($sql_get_id);
          $string = implode(', ', $id);
          // echo $string;

          // CÂU LỆNH NÀY ĐỂ LẤY RA ID NHỮNG BÀN BỊ ĐẶT RỒI TRONG KHOẢNG THỜI GIAN ... BETWEEEN ...
          // $sql = "SELECT id_table FROM `bill` WHERE DATE(time_start) = DATE($dateBook) AND $start22 BETWEEN HOUR(time_start) AND HOUR(time_end)
          //  OR $end22 BETWEEN HOUR(time_start) AND HOUR(time_end)";
          $sql = "SELECT id_table FROM `bill` WHERE DATE(time_start) = DATE($dateBook) AND $start22 >= HOUR(time_start) AND $start22 < HOUR(time_end)
           OR $end22 > HOUR(time_start) AND $end22 <= HOUR(time_end)";

          
          $result = pdo_query($sql);
            // echo $result;
            // print_r($result);
            // echo '<br />';
            // echo '<br />';
            // echo '<br />';
            // print_r($allTable);
            // print_r($result[0][1]);

            // HIỂN THỊ RA TẤT CẢ CÁ BÀN (BÀN NÀO CŨNG CHỌN ĐC)
          if($result == false) { 
            foreach($allTable as $table): 
              extract($table);
              echo '<div class="grid-item">'.$name.'<br><input type="checkbox" class="" value='.$id.' name="" id=""></div>';
            endforeach;
            } 

          else {
            $arr_dis = [];
            foreach($result as $value):
              extract($value);
              array_push($arr_dis, $id_table);
            endforeach;
            foreach($allTable as $table):
              extract($table);
              $key = array_search($id, $arr_dis);
              if ($key !== false) {
                echo '<div class="grid-item item-disabled">'.$name.'<br><input type="checkbox" class="inp" value='.$id.' name="table[]" disabled id=""></div>';
            } else {
                echo '<div class="grid-item">'.$name.'<br><input type="checkbox" class="inp" value='.$id.' name="table[]" id=""></div>';

            }
            endforeach;


          }  
        ?>
      </div>
      <div class=" d-flex justify-content-center mt-3 mb-3">
        <input type="hidden" name="id_of_book" value="<?php echo $string ?>">
        <button class="btn bg-primary text-white col-1" id="btnSubmit" name="send_id_table">Gửi</button>
      </div>
    </form>
  </div>
</div>

<script>
// const btnSubmit = document.querySelector('#btnSubmit');
// // btnSubmit.addEventListener('click', e => {
// // e.preventDefault();

// // })


// const checkboxes = document.querySelectorAll('.inp');
// let checkedCount = 0;
// let arr = 0;

// // function getCheckedCheckboxes() {
// // const checkedCheckboxes = [];


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



// Send id_table:
// function sendIdTable() {
//   const datas = {

//   }
// }
</script>


<?php 


  ?>