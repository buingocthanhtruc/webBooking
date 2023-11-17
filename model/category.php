<?php
function loadall_danhmuc(){
    $sql="select * from category order by id desc";
    $listdanhmuc=pdo_query($sql);
    return  $listdanhmuc;
}
// function load_ten_dm($iddm){
//     if($iddm>0){
//         $sql="select * from sanpham where id=".$iddm;
//         $dm=pdo_query_one($sql);
//         print_r($dm);
//         // extract($dm);
//         // return $name;
//     }else{
//         return "";
//     }
// }
function getNameDanhMuc($iddm){
    $sql="select * from category where id=".$iddm;
    return pdo_query_one($sql);
}
function addDanhMuc($name,$id_group){
    $sql="INSERT INTO `category`(`name` , `id_group`) VALUES ('$name' ,'$id_group')";
    pdo_execute($sql);
}
function updateDanhMuc($id,$name , $id_group){
    $sql ="UPDATE `category` SET `name`='$name',`id_group`=' $id_group' WHERE id=$id";
    pdo_execute($sql);
}
function deleteDanhMuc($id){
    $sql ="DELETE FROM `category` WHERE `id` =$id";
    pdo_execute($sql);
}
?>