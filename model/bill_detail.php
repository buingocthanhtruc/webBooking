<?php
function insert_bill_detail($name, $email, $phone, $list_food, $id_bill, $totalSum, $status = 0, $status_pay = 0)
{
  print_r($list_food);

  $sql = "INSERT INTO `bill_detail`( `name`, `email`, `phone`, `list_food`, `status`, `id_bill`, `status_pay`, `total`) VALUES
    ('$name','$email', '$phone', '$list_food', $status, $id_bill, $status_pay, $totalSum)";

  pdo_execute($sql);
}

function update_status_pay($status, $id)
{
  $sql =  "UPDATE bill_detail SET status_pay = $status WHERE id_bill = $id";
  pdo_execute($sql);
}

function update_status($status, $id)
{
  $sql =  "UPDATE bill_detail SET status = $status WHERE id_bill = $id";
  pdo_execute($sql);
}
