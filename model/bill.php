<?php
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

function get_count_all_bill()
{
  $sql = "SELECT
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
INNER JOIN bill_detail ON bill.id = bill_detail.id_bill";
  return pdo_query($sql);
}
