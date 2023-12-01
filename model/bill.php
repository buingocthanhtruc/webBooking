<?php
// Fomat thoi gian
function formartTime($time)
{
  $thoi_gian = new DateTime();
  $thoi_gian->setTime($time, 0, 0);

  // Format lại thời gian để hiển thị giờ, phút và giây
  return $thoi_gian->format('H:i:s');
}

function loadall_bill_home()
{
  $sql = "select * from bill where 1 order by id desc";
  $listsanpham = pdo_query($sql);
  return  $listsanpham;
}

function insert_bill($id_user, $time_start, $time_end, $create_at, $people)
{
  $sql = "INSERT INTO bill (`id_user`, `time_start`, `time_end`, `create_at`, `people`)
    VALUES ($id_user, '$time_start', '$time_end', '$create_at', $people)";

  pdo_execute($sql);
}

function get_id_bill($id_user)
{
  $sql_get_id = "SELECT id FROM bill WHERE id_user = $id_user ORDER BY id DESC LIMIT 1";
  return pdo_query_one($sql_get_id);
}

function get_info_history($id_user)
{
  $sql = "SELECT bill.time_start, bill.people, bill_detail.list_food, bill_detail.status, bill_detail.id_bill FROM bill INNER JOIN bill_detail ON 
    bill.id = bill_detail.id_bill WHERE bill.id_user = $id_user";

  return pdo_query($sql);
}

function bill_detail($id)
{
  $sql = "SELECT
      bill.time_start,
      bill.people,
      bill_detail.list_food,
      bill_detail.name,
      bill_detail.email,
      bill_detail.phone
    FROM
      bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill
    WHERE
      bill.id = $id";

  return pdo_query_one($sql);
}

// function loadall_bill()
// {
//   $sql = "SELECT
//       bill.time_start,
//       bill.people,
//       bill_detail.list_food,
//       bill_detail.name,
//       bill_detail.email,
//       bill_detail.phone,
//       bill_detail.total,
//       bill_detail.status,
//       bill_detail.status_pay,
//       bill_detail.id_bill
//     FROM
//       bill
//     INNER JOIN bill_detail ON bill.id = bill_detail.id_bill ORDER BY bill.id DESC";

//   return pdo_query($sql);
// }

function loadall_bill($name = "", $status = 0, $page_1)
{
  $sql = "SELECT
      bill.id,
      bill.id_table,
      bill.time_start,
      bill.people,
      bill_detail.list_food,
      bill_detail.name,
      bill_detail.email,
      bill_detail.phone,
      bill_detail.total,
      bill_detail.status,
      bill_detail.status_pay,
      bill_detail.id_bill
    FROM
      bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill 
    WHERE bill.id > 0 ";

  if ($name != '') {
    $sql .= "AND bill_detail.name LIKE '%$name%' ";
  }

  if ($status == 0) {
    $sql .= "AND bill_detail.status = '$status' ";
  }

  if ($status == 1) {
    $sql .= " AND bill_detail.status = '$status'";
  }

  $sql .= " ORDER BY bill.id DESC LIMIT $page_1, 5";
  // $sql .= " ORDER BY bill.id DESC ";

  return pdo_query($sql);
}

function get_count_all_bill($name = "", $status = 0, $page_1)
{
  $sql = "SELECT
      bill.id,
      bill.id_table,
      bill.time_start,
      bill.people,
      bill_detail.list_food,
      bill_detail.name,
      bill_detail.email,
      bill_detail.phone,
      bill_detail.total,
      bill_detail.status,
      bill_detail.status_pay,
      bill_detail.id_bill
    FROM
      bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill 
    WHERE bill.id > 0 ";

  if ($name != '') {
    $sql .= "AND bill_detail.name LIKE '%$name%' ";
  }

  if ($status == 0) {
    $sql .= "AND bill_detail.status = '$status' ";
  }

  if ($status == 1) {
    $sql .= " AND bill_detail.status = '$status'";
  }

  $sql .= " ORDER BY bill.id DESC";
  // $sql .= " ORDER BY bill.id DESC ";

  return pdo_query($sql);
}

function deleteBill($id)
{
  $sql = "DELETE FROM `bill` WHERE id = $id";
  $sql_bill_detail = "DELETE FROM `bill_detail` WHERE id_bill = $id";

  pdo_execute($sql);
  pdo_execute($sql_bill_detail);
}


function searchStatusTable($khung_gio = 1, $day = '')
{
  if ($day === '') {
    $day = date("Y-m-d H:i:s");
    // $day = '2023-11-30 13:00:00';
  }
  if ($khung_gio == 1) {
    $time_start = formartTime(11);
    $time_end = formartTime(13);
  }

  if ($khung_gio == 2) {
    $time_start = formartTime(13);
    $time_end = formartTime(15);
  }

  if ($khung_gio == 3) {
    $time_start = formartTime(15);
    $time_end = formartTime(17);
  }

  if ($khung_gio == 4) {
    $time_start = formartTime(17);
    $time_end = formartTime(19);
  }

  $sql = "SELECT id_table 
  FROM `bill` 
  WHERE DATE(time_end) = DATE('$day') 
    AND TIME(time_start) BETWEEN '$time_start' AND '$time_end'
    AND TIME(time_end) BETWEEN '$time_start' AND '$time_end'";

  return pdo_query($sql);
}


// SELECT id_table 
//   FROM `bill` 
//   WHERE DATE(time_end) = DATE('2023-12-03 19:00:00')
//     AND TIME(time_start) BETWEEN '2023-12-03 17:00:00' AND '2023-12-03 19:00:00'
//     AND TIME(time_end) BETWEEN '2023-12-03 17:00:00' AND '2023-12-03 19:00:00'