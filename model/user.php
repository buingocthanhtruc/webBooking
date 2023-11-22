<?php
require_once 'pdo.php';

function checkUser($phone_number, $password)
{
    $conn = pdo_get_connection();
    $stmt = $conn -> prepare ("SELECT * FROM `user` WHERE `phone_number` = '$phone_number' AND `password` = '$password'");
    $stmt -> execute();
    $result = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt -> fetchAll();
    if(count($kq) > 0) return $kq[0]['role'];
    else return 0;
   
}

function user_insert($phone_number, $password, $fullname, $email)
{
    $sql = "INSERT INTO `user`( `phone_number`, `password`, `fullname`, `email`)
    VALUES ('$phone_number','$password', '$fullname','$email')";
    pdo_execute($sql);
}
