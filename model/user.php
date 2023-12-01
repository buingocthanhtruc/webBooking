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

function dangnhap($phone_number, $password)
{
  $sql = "SELECT * FROM user WHERE phone_number = '$phone_number' and passwords = '$password'";
  $taikhoan = pdo_query_one($sql);

  if ($taikhoan != false) {
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

function dangxuat()
{
  if (isset($_SESSION['id'])) {
    session_unset();
  }
}
function get_user_by_phone($phone){
  $sql = "SELECT * FROM user WHERE phone_number = '$phone'";
  return pdo_query_one($sql);
}
function get_user_by_email($email){
  $sql = "SELECT * FROM user WHERE email = '$email'";
  return pdo_query_one($sql);
}
function dangky($phone_number, $password, $re_password, $fullname, $email)
{
  if(!preg_match("/^0[0-9]{9}/",$phone_number)){
    return "vui lòng nhập đúng số điện thoại phù hợp";
  }
  if(get_user_by_phone($phone_number)){
    return "Số điện thoại đã được đăng kí vui lòng thử số khác";
  }
  if(get_user_by_email($email)){
    return "Email đã được sử dụng";
  }
  if ($password != $re_password) {
    return "Mật khẩu không khớp !!!";
  }
  $sql = "INSERT INTO user(phone_number, passwords, fullname, email, role) VALUES ('$phone_number', '$password', '$fullname', '$email', 0) ";
  pdo_execute($sql);
  return "Đăng ký thành công";
}

function update_account($id, $fullname, $email, $phone_number)
{
  $sql = "UPDATE `user` SET `phone_number`='$phone_number',`fullname`='$fullname',`email`='$email'
     WHERE id = $id";

  $_SESSION['fullname'] = $fullname;
  $_SESSION['email'] = $email;
  $_SESSION['phone_number'] = $phone_number;

  pdo_execute($sql);
}

function get_info_user()
{
  $sql = "SELECT id, phone_number, fullname, email FROM user WHERE role = 0";
  return pdo_query($sql);
}

