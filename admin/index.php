<?php
if (isset($_GET['act'])) {
    $act = $_GET['act'];
} else {
    $act = "";
}
include "../model/pdo.php";
include "View/header.php";
include "View/sideBar.php";
include "../model/category.php";
include "../model/food.php";
include "../model/table.php";
$allDanhMuc = loadall_danhmuc();
$allFood = all_food();
$allTable = loadall_table();
if (!empty($act)) {
    switch ($act) {
        case 'formCreate':
            include "View/formCreate.php";
            break;
        case 'qlsp':
            include "view/quanLySP.php";
            break;
        case 'quanLyUser':
            include "view/quanLyUser.php";
            break;
        case 'quanLyBan':
            include "view/quanLyBan.php";
            break;
        case 'addDm':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                addDanhMuc($_POST['category'], $_POST['id_group']);
                echo "<script>location.href = '?act=qlsp'</script>";
            }
            break;
        case 'editDm':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                updateDanhMuc($_POST['id'], $_POST['category'], $_POST['id_group']);
                echo "<script>location.href = '?act=qlsp'</script>";
            }
            if (!empty($_GET['id'])) {
                include "view/editDm.php";
            } else {
                echo "<script>location.href = 'index.php'</script>";
            }
            break;
        case 'deleteDm':
            if (!empty($_GET['id'])) {
                deleteDanhMuc($_GET['id']);
                echo "<script>location.href = '?act=qlsp'</script>";
            } else {
                echo "<script>location.href = 'index.php'</script>";
            }
            break;
        case "addFood":
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $referred = $_POST['referred'];
                $price = $_POST['price'];
                $img = $_FILES['image']['name'];
                $iddm = $_POST['id_dm'];
                if (uploadFile($_FILES['image'])) {
                    addProduct($name, $price, $img, $referred, $iddm);
                } else {
                    echo "<script>alert('oke')</script>";
                }
            }
            echo "<script>location.href = '?act=qlsp'</script>";
            break;
        case 'editFood':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST["id"];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $iddm = $_POST['id_dm'];
                if (!empty($_FILES["image"]["name"])) {
                    $img = $_FILES["image"]["name"];
                    uploadFile($_FILES['image']);
                } else {
                    $img = $_POST['imgOld'];
                }
                editProduct($name, $price, $img, $iddm, $id);
            }
            if (!empty($_GET['id'])) {
                include "view/editFood.php";
            } else {
                echo "<script>location.href = 'index.php?act=qlsp'</script>";
            }
            break;
        case 'deleteFood':
            if (!empty($_GET['id'])) {
                deleteProduct($_GET['id']);
                echo "<script>location.href = '?act=qlsp'</script>";
            } else {
                echo "<script>location.href = 'index.php'</script>";
            }
            break;
        case "updateStatusTable":
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                updateStatusTable($_POST['id_table'], $_POST['statusTable']);
            }
            echo "<script>location.href = 'index.php?act=quanLyBan'</script>";
            break;
    }
} else {
    include "View/listBooking.php";
}
include "View/footer.php";
