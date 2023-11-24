<?php 

    function addInFoBook($start, $end) {
        $people = $_POST['people'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        // Sesion này để lấy lấy năm, tháng ngày để so sánh năm, tháng ngày 
        // trong DB trùng nhau -> In ra bàn đang hoạt động 

        $_SESSION['date'] = $_POST['date_picker'];
        $timeBook = $_POST['timeBook'];

        // Format cho đúng định dạng để insert vào đc Databasse 
        $time_start = $_POST['date_picker'] . ' ' . $start;
        $time_end = $_POST['date_picker'] . ' ' . $end;
        
        $create_at = date('Y-m-d H:i');
        $list_food = "".$_POST['list_food']."";

        // Session này đc tạo khi user đăng nhập -> Trường hợp user ko đ/nhập thì cho id_user = 0
        if(!isset($_SESSION['id'])) {
          // Khi ko có $_SESSION['id'], ta sẽ tạo $_SESSION['id'] biết user nào
          $id_user = 0;
          $_SESSION['id'] = $id_user;
        } else {
          $id_user = $_SESSION['id'];
        }
        
        // Insert thông tin vào bảng bill
        $sql = "INSERT INTO bill (`id_user`, `time_start`, `time_end`, `create_at`, `people`)
        VALUES ($id_user, '$time_start', '$time_end', '$create_at', $people)";

        // Insert thông tin vào bảng bill_detail
        $sql_1 = "INSERT INTO `bill_detail`(`id_user`, `name`, `email`, `phone`, `list_food`, `state`) VALUES
         ($id_user, '$name','$email', '$phone', '$list_food', 0)";

        pdo_execute($sql);
        pdo_execute($sql_1);
    }

  if ($_SERVER["REQUEST_METHOD"] === "POST"){
    if(!isset($_POST['date_picker']) || $_POST['date_picker'] === ""){
      return;
    } else {
      if($_POST['timeBook'] == 1) {
        $start = 11;
        $end = 13;
        $_SESSION['start'] = 11;
        $_SESSION['end'] = 13;

        addInFoBook($start, $end);
      }
      
      if($_POST['timeBook'] == 2) {
        $start = 13;
        $end = 15;
        $_SESSION['start'] = 13;
        $_SESSION['end'] = 15;
        
        addInFoBook($start, $end);
      }

      if($_POST['timeBook'] == 3) {
        $start = 15;
        $end = 17;
        $_SESSION['start'] = 15;
        $_SESSION['end'] = 17;
        
        addInFoBook($start, $end);
      }
      
      if($_POST['timeBook'] == 4) {
        $start = 17;
        $end = 19;
        $_SESSION['start'] = 17;
        $_SESSION['end'] = 19;
        
        addInFoBook($start, $end);
      }
    }
  }

  ?>