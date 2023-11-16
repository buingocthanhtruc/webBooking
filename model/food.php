<?php
function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by id desc limit 0,8";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}
function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by luotxem desc limit 0,6";
    $listsanpham=pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($iddm=0){
    $sql="SELECT sanpham.* , COUNT(binhluan.id) 'soLuongCMT' FROM sanpham LEFT JOIN binhluan 
    ON sanpham.id = binhluan.idpro WHERE 1 GROUP BY sanpham.id";
    // where 1 tức là nó đúng
    if($iddm>0){
        $sql.=" HAVING iddm ='".$iddm."'";
    }
    // $sql.=" order by id ";
    $listsanpham=pdo_query($sql);
    return  $listsanpham;
}

// 
function loadone_sanpham($id){
    $sql = "select * from sanpham where id = $id";
    $result = pdo_query_one($sql);
    return $result;
}
function load_sanpham_cungloai($id, $iddm){
    $sql = "select * from sanpham where iddm = $iddm and id <> $id";
    $result = pdo_query($sql);
    return $result;
}

function addProduct($name , $price , $img , $mota , $iddm){
    $sql = "INSERT INTO `sanpham`( `name`, `price`, `img`, `mota`, `iddm`)
     VALUES ('$name','$price','$img','$mota','$iddm')";
    pdo_execute($sql);
}

function getProductEdit($id){
    $sql = "SELECT * FROM `sanpham` WHERE `id` = '$id'";
    return pdo_query_one($sql);
}
function editProduct($name , $price , $img , $mota  , $iddm , $id){
    $sql = "UPDATE `sanpham` SET `name`='$name',`price`='$price'
    ,`img`='$img',`mota`='$mota',`iddm`='$iddm' WHERE id =$id";
    pdo_execute($sql);
}

function deleteProduct($id){
    $sql = "DELETE FROM `sanpham` WHERE id ='$id'";
    $sql1 = "DELETE FROM `binhluan` WHERE idpro = $id";
    pdo_execute($sql1);
    pdo_execute($sql);
}

function searchProduct($name){
    $sql = "SELECT * FROM `sanpham` WHERE `name` LIKE '%$name%'";
    return pdo_query($sql);
}

function updateView($id){
    $sql = "SELECT * FROM `sanpham` WHERE `id`=$id";
    $sp =pdo_query_one($sql);
    $viewCurent = $sp['luotxem']+1;
    $viewCurent;
    $sqlUpdate = "UPDATE `sanpham` SET `luotxem`='$viewCurent' WHERE `id`=$id";
    pdo_execute($sqlUpdate);
}
function uploadFile($fileNameField,$target_dir = "../upload/"){
    $target_file = $target_dir . basename($fileNameField["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($fileNameField["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "file của bạn không phải 1 ảnh";
        $uploadOk = 0;
    }
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "chỉ chấp nhận ảnh jpg  , png , jpeg , gif";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "xin lỗi không thế upload";
    } else {
        if (move_uploaded_file($fileNameField["tmp_name"], $target_file)) {
             return true;
        }
        else {
            return false;
        }
    }
}
