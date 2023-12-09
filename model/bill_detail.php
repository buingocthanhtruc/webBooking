<?php
function insert_bill_detail($name, $email, $phone, $list_food, $id_bill, $totalSum, $status = 0, $status_pay = 0)
{
  // print_r($list_food);

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

function update_status_order($status, $id)
{
  $sql =  "UPDATE bill SET status_order = $status WHERE id = $id";
  pdo_execute($sql);
}

function update_id_table_pay($id)
{
  $sql =  "UPDATE bill SET id_table = table_temporary WHERE id = $id";
  pdo_execute($sql);
}

function update_time_pay_ad($id)
{
  $time_pay = date('Y-m-d H:i:s');
  $sql =  "UPDATE bill SET time_pay = '$time_pay' WHERE id = $id";
  pdo_execute($sql);
}

function get_status_id_bill($id)
{
  $sql =  "SELECT bill_detail.status FROM bill_detail WHERE id_bill = $id";
  return pdo_query_one($sql);
}

function get_total_money_today()
{
  $sql = "SELECT SUM(bill_detail.total) AS total
  FROM bill_detail INNER JOIN bill ON bill_detail.id_bill = bill.id
  WHERE DATE(bill.time_pay) = CURDATE()
  AND status = 1 AND status_pay = 1
  ";
  return pdo_query($sql);
}

function get_total_money_cur_week()
{
  $sql = "SELECT 
    SUM(bill_detail.total) AS total
      FROM
        bill
      INNER JOIN bill_detail ON bill.id = bill_detail.id_bill
      WHERE
        YEARWEEK(time_pay, 1) = YEARWEEK(CURDATE(), 1)
        AND status = 1 AND status_pay = 1";
  return pdo_query($sql);
}

function get_total_money_cur_month()
{
  $sql = "SELECT
      SUM(bill_detail.total) AS total
    FROM
      bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill
    WHERE
      YEAR(bill.time_pay) = YEAR(CURDATE()) AND
      MONTH(bill.time_pay) = MONTH(CURDATE())
      AND status = 1 AND status_pay = 1";

  return pdo_query($sql);
}

function get_total_money_cur_year()
{
  $sql = "SELECT
      SUM(bill_detail.total) AS total
    FROM
      bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill
    WHERE
      YEAR(bill.time_pay) = YEAR(CURDATE())
      AND status = 1 AND status_pay = 1";
  return pdo_query($sql);
}

// ---- LẤY TỔNG TIỀN GIỮA CÁC THÁNG -----
function get_total_money_month()
{
  $sql = "SELECT
      MONTH(bill.time_pay) AS month,
      SUM(bill_detail.total) AS total
    FROM
      bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill
    WHERE
    YEAR(bill.time_pay) = YEAR(CURDATE()) 
      AND STATUS = 1 AND status_pay = 1
    GROUP BY
      MONTH(bill.time_pay)";

  return pdo_query($sql);
}

// ---- LẤY TỔNG TIỀN GIỮA CÁC NĂM -----
function get_total_money_year()
{
  $sql = "SELECT
      YEAR(bill.time_pay) AS year,
      SUM(bill_detail.total) AS total
    FROM
      bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill
    WHERE
      STATUS = 1 AND status_pay = 1
    GROUP BY
      YEAR(bill.time_pay)";
  return pdo_query($sql);
}
