<?php
// require_once 'pdo.php';

// function checkUser($phone_number, $password)
// {
//     $conn = pdo_get_connection();
//     $stmt = $conn -> prepare ("SELECT * FROM `user` WHERE `phone_number` = '$phone_number' AND `password` = '$password'");
//     $stmt -> execute();
//     $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
//     $kq = $stmt -> fetchAll();
//     if(count($kq) > 0) return $kq[0]['role'];
//     else return 0;
   
// }

// function user_insert($phone_number, $password, $fullname, $email)
// {
//     $sql = "INSERT INTO `user`( `phone_number`, `password`, `fullname`, `email`)
//     VALUES ('$phone_number','$password', '$fullname','$email')";
//     pdo_execute($sql);
// }

// CODE OF LUONG
function dangnhap($phone_number, $password) {
    $sql = "SELECT * FROM user WHERE phone_number = '$phone_number' and passwords = '$password'";
    $taikhoan = pdo_query_one($sql);
    
    if($taikhoan != false) {
      $_SESSION['id'] = $taikhoan['id'];
      $_SESSION['phone_number'] = $taikhoan['phone_number'];
      $_SESSION['passwords'] = $taikhoan['passwords'];
      $_SESSION['fullname'] = $taikhoan['fullname'];
      $_SESSION['email'] = $taikhoan['email'];
      $_SESSION['role'] = $taikhoan['role'];
    } else {
      return "Đăng nhập sai !!!";
    }
  }

  function dangxuat() {
    if(isset($_SESSION['id'])) {
      // unset($_SESSION['user']);
      // unset($_SESSION['id']);
      // unset($_SESSION['email']);
      // unset($_SESSION['address']);
      // unset($_SESSION['tel']);
      session_unset(); 
    }
  }

  function dangky($phone_number, $password, $re_password, $fullname, $email){
    if($phone_number == "" || $password == "" || $fullname == "" || $email == "") {
      return "Bạn nhập thiếu dữ liệu";
    }

    if($password != $re_password) {
      return "Mật khẩu không khớp !!!";
    }
    $sql = "INSERT INTO user(phone_number, passwords, fullname, email, role) VALUES ('$phone_number', '$password', '$fullname', '$email', 0) ";
    pdo_execute($sql);
    return "Đăng ký thành công";
  }



?>