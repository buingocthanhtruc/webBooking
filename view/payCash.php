<div class="flex-column justify-content-center p-5" >
    <h4 class="text-success text-center">Đặt bàn thành công 🥳</h4> <br>
    <div class="text-center">Đơn đặt bàn của bạn đã được hệ thống ghi nhận vui lòng chú ý điện thoại chúng tôi sẽ gọi để xác nhận đơn đặt bàn </div>
    <div class="text-center">Chúc quý khách có một trải nghiệm tuyệt vời với <strong class="text-primary">TLT restaurant</strong></div>
    <div class="d-flex justify-content-center my-3">
        <a href="index.php" class="mx-2 btn btn-primary">Trang chủ </a>
        <a href="" class="mx-2 btn btn-secondary">Quay lại trang chủ sau <span id="time_reload">5</span>s</a>
    </div>
</div>
<script>
    var i =5;
    let flag_out = setInterval(function(){
        document.getElementById("time_reload").innerText = i;
        i--;
        if(i ==0){
            clearInterval(flag_out);
            location.href = "index.php";
        }
    } , 1500);
</script>