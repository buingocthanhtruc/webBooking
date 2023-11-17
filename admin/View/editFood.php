<?php
include 'View/titleOfComponents.php';
$food = loadone_sanpham($_GET["id"]);
?>

<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <!-- Basic table card start -->
                <form action="index.php?act=editFood" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $_GET['id'] ?>" name="id">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Món Ăn:</label>
                        <input type="text" class="form-control" id="recipient-name" value="<?= $food['name'] ?>" name="name">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Danh Mục:</label>
                        <select class="form-control" name="id_dm" id="" >
                        <?php foreach($allDanhMuc as $danhmuc): ?>
                            <option <?= $danhmuc["id"]== $food['id_dm']?"selected":''?> value="<?= $danhmuc["id"] ?>"><?= $danhmuc["name"] ?></option>
                          <?php endforeach ;?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Ảnh:</label>
                        <input type="hidden" value="<?=$food['image'] ?>" name="imgOld">
                        <input type="file" class="form-control" id="recipient-name"  name="image">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Giá:</label>
                        <input type="number" class="form-control" id="recipient-name" value="<?= $food['price'] ?>" name="price">
                    </div>
                    <button class="btn bg-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
        <!-- Basic table card end -->
        <!-- Contextual classes table ends -->

    </div>
    <!-- Page-body end -->
</div>
</div>
<!-- Main-body end -->
</div>
