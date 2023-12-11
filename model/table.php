<?php
function loadall_table()
{
  $sql = "select * from `table` where 1 ";
  return pdo_query($sql);
}

function update_table_temporary($id, $id_user, $id_table)
{
  $sql = "UPDATE bill SET table_temporary = $id_table WHERE id = $id AND id_user = $id_user";
  // return pdo_query($sql);
  pdo_execute($sql);
}

function insert_id_table($id, $id_user, $id_table, $status_order)
{
  $sql = "UPDATE bill SET id_table = $id_table, status_order = $status_order WHERE id = $id AND id_user = $id_user";
  // return pdo_query($sql);
  pdo_execute($sql);
}

function updateStatusTable($id, $status)
{
  $sql = "UPDATE `table` SET `status`='$status' WHERE id = $id";
  pdo_execute($sql);
}

function update_id_table($id)
{
  $sql_sub = "SELECT
      bill.id_table,
      bill.time_start,
      bill.table_temporary,
      bill_detail.status,
      bill_detail.status_pay
    FROM
      bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill";
  $results = pdo_query($sql_sub);

  // Lấy data của id muốn update Bill
  $sql_sub_2 = "SELECT
      bill.id_table,
      bill.time_start,
      bill.table_temporary,
      bill_detail.status,
      bill_detail.status_pay
    FROM
      bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill WHERE bill.id = $id";
  $results_2 = pdo_query_one($sql_sub_2);
  $table_temp = $results_2['table_temporary'];
  $time_stated = $results_2['time_start'];

  foreach ($results as $value) {
    extract($value);
    $sql = "UPDATE
    `bill`
SET
    id_table = $table_temp
WHERE
    id = $id AND NOT EXISTS(
    SELECT
        1
    FROM
        bill
    INNER JOIN bill_detail ON bill.id = bill_detail.id_bill
    WHERE
        bill.id_table = $table_temp AND DATE(bill.time_start) = DATE('$time_stated') AND TIME(bill.time_start) = TIME('$time_stated') AND 
        bill_detail.status = 1 AND bill.id != $id)";
    return pdo_execute_update($sql);
  }
}
// function update_both_status($id)
// {
//   $sql_sub = "SELECT
//       bill.id_table,
//       bill.time_start,
//       bill.table_temporary,
//       bill_detail.status,
//       bill_detail.status_pay
//     FROM
//       bill
//     INNER JOIN bill_detail ON bill.id = bill_detail.id_bill";
//   $results = pdo_query($sql_sub);

//   // Lấy data của id muốn update Bill
//   $sql_sub_2 = "SELECT
//       bill.id_table,
//       bill.time_start,
//       bill.table_temporary,
//       bill_detail.status,
//       bill_detail.status_pay
//     FROM
//       bill
//     INNER JOIN bill_detail ON bill.id = bill_detail.id_bill WHERE bill.id = $id";
//   $results_2 = pdo_query_one($sql_sub_2);
//   $table_temp = $results_2['table_temporary'];
//   $time_stated = $results_2['time_start'];

//   foreach ($results as $value) {
//     extract($value);
//     $sql = "UPDATE
//     `bill`
// SET
//     id_table = $table_temp
// WHERE
//     id = $id AND NOT EXISTS(
//     SELECT
//         1
//     FROM
//         bill
//     INNER JOIN bill_detail ON bill.id = bill_detail.id_bill
//     WHERE
//         bill.id_table = $table_temp AND DATE(bill.time_start) = DATE('$time_stated') AND TIME(bill.time_start) = TIME('$time_stated') AND 
//         bill_detail.status = 1 AND bill.id <> $id)";
//     return pdo_execute_update($sql);
//   }
// }