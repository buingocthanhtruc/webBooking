<?php
function insert_bill_detail($name, $email, $phone, $list_food, $id_bill)
{
  $sql = "INSERT INTO `bill_detail`( `name`, `email`, `phone`, `list_food`, `status`, `id_bill`) VALUES
    ('$name','$email', '$phone', '$list_food', 0, $id_bill)";

  pdo_execute($sql);
}
