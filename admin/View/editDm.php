<?php
include 'View/titleOfComponents.php';
?>

<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <!-- Basic table card start -->
                <form action="index.php?act=editDm" method="post">
                    <div class="form-floating mt-3 mb-3">
                        <label for="nameCategory" >Tên danh mục</label>
                        <input type="hidden" value="<?= getNameDanhMuc($_GET['id'])['id']?>" name="id">
                        <input required type="text" class="form-control" placeholder="Tên danh mục" id="nameCategory" name="category" value="<?= getNameDanhMuc($_GET['id'])['name']?>">
                    </div>
                    <button class="btn bg-success">Gửi</button>
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