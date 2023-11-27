<?php
function loadall_table()
{
  $sql = "select * from `table` where 1 ";
  return pdo_query($sql);
}

function update_id_table($id, $id_user, $id_table)
{
  $sql = "UPDATE bill SET id_table = $id_table WHERE id = $id AND id_user = $id_user";
  return pdo_query($sql);
}

function updateStatusTable($id, $status)
{
  $sql = "UPDATE `table` SET `status`='$status' WHERE id = $id";
  pdo_execute($sql);
}
// test
