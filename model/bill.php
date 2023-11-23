<?php
  function loadall_bill_home(){
    $sql="select * from bill where 1 order by id desc";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}


?>