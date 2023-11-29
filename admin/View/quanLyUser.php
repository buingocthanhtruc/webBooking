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
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">

                        <h5>Danh Sách User</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên khách hàng</th>
                                        <th> Email</th>
                                        <th>Số điện Thoại</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                    <td>1</td>
                    <td>Bùi Ngọc Thanh Trúc</td>
                    <td>Trucbntph33131@gmail.com</td>
                    <td>0975107204</td>
                  </tr> -->

                                    <?php
                                    foreach ($allUser as $user) :
                                        extract($user);
                                    ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $fullname; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $phone_number; ?></td>
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>
                        </div>
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