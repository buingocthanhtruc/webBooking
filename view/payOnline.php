<?php
extract($bill_detail);
// Format thời gian
$dateString = $time_start;
$dateTime = new DateTime($dateString);
$formattedDate = $dateTime->format('Y-m-d');
$formattedHour = $dateTime->format('H:i');
?>
<div class="container">
    <div class="head">
        <div class="logo">
            <h1 class="text-primary text-center">TLT Restaurant</h1>
        </div>
        <div class="container">
            <div class="row p-5">
                <div class="row col-6">
                    <h5>Nhà Hàng</h5>
                    <span>Tầng 3 - Tòa P</span>
                    <span>Tòa Nhà FPT POLYTECHNIC</span>
                    <span>Phone: 18001008</span>
                    <span>Email: tltrestaurant@gmail.com</span>
                </div>
                <div class="row col-6">
                    <h5>Khách Hàng</h5>
                    <span><?= $name ?></span>
                    <span>Số điện thoại: <?= $phone ?></span>
                    <span>Email: <?= $email ?></span>
                    <span>Ngày đặt: <?= $formattedDate ?></span>
                    <span>Giờ vào: <?= $formattedHour ?></span>
                    <span>Số Người: <?= $people ?></span>
                </div>
            </div>
        </div>

    </div>
    <?php
    $list_food = json_decode($list_food);
    ?>
    <table id="customers" class="table">
        <tr>
            <th>STT</th>
            <th>Món Ăn</th>
            <th>Số Lượng</th>
            <th>Giá Món</th>
            <th>Tổng Tiền</th>
        </tr>
        <?php 
            $total = 0 ;
            $stt = 1;
            foreach ($list_food as $food) :
                 if ($food->quantity != 0) :
        ?>
                <tr>
                    <td><?= $stt ?></td>
                    <td><?= $food->name ?></td>
                    <td><?= $food->quantity ?></td>
                    <td><?= $food->price?> VNĐ</td>
                    <td><?=$food->quantity*$food->price?> VNĐ</td>
                </tr>
        <?php
            $stt++;
            $total +=$food->quantity*$food->price; 
                endif;
            endforeach;
        ?>
    </table>
    <div class="d-flex justify-content-end">
        <span>Tổng tiền :</span>
        <span class="mx-3"><?=$total?> VNĐ</span>
    </div>
    <div class="total">
        <h5 style="text-align: center; opacity: 80%;" class=" text-success">Lựa chọn phương thức thanh toán</h5>
        <form action="?act=payOnline" method="post">
            <div class="choose_payment d-flex justify-content-center p-3">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" id="inlineRadio1" value="cash" checked >
                    <label class="form-check-label" for="inlineRadio1">Thanh toán trực tiếp</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" id="inlineRadio2" value="vnpay">
                    <label class="form-check-label" for="inlineRadio2">VNPay</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="payment" id="inlineRadio3" value="momo">
                    <label class="form-check-label" for="inlineRadio3">Momo</label>
                </div>
            </div>
            <input type="hidden" name="id_bill" value="<?=$_GET['idBill']?>">
            <input type="hidden" name="total_money" value="<?=$total?>">
            <div class="d-flex justify-content-center m-2">
                <input type="submit" class="pay btn btn-primary" name="redirect" value="Tiến hành thanh toán">
            </div>
        </form>
    </div>
</div>