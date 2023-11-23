<?php 

    function addInFoBook($id_user, $start, $end) {
        $people = $_POST['people'];
        
        $_SESSION['date'] = $_POST['date_picker'];
        $timeBook = $_POST['timeBook'];
        $time_start = $_POST['date_picker'] . ' ' . $start;
        $time_end = $_POST['date_picker'] . ' ' . $end;
        
        // $list_food = 'email';
        $create_at = date('Y-m-d H:i');
        $CMT = "".$_POST['list_food']."";
        $list_food = $_POST['list_food'];
        

        $sql = "INSERT INTO bill (`id_user` , `list_food`, `time_start`, `time_end`, `create_at`, `people`)
        VALUES ($id_user, '$list_food', '$time_start', '$time_end', '$create_at', $people)";
        pdo_execute($sql);
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
        
        addInFoBook(1, $start, $end);
      }
      if($_POST['timeBook'] == 2) {
        $start = 13;
        $end = 15;
        $_SESSION['start'] = 13;
        $_SESSION['end'] = 15;
        
        addInFoBook(1, $start, $end);
      }

      if($_POST['timeBook'] == 3) {
        $start = 15;
        $end = 17;
        $_SESSION['start'] = 15;
        $_SESSION['end'] = 17;
        
        addInFoBook(1, $start, $end);
      }
      
      if($_POST['timeBook'] == 4) {
        $start = 17;
        $end = 19;
        $_SESSION['start'] = 17;
        $_SESSION['end'] = 19;
        
        addInFoBook(1, $start, $end);
      }
    }
  }

  ?>