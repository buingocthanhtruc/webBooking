window.addEventListener('beforeunload', function (event) {
    var currentUrl = window.location.href;

    // Kiểm tra xem địa chỉ URL có phải là http://localhost/Booking/index.php?act=payOnline không
    if (currentUrl.indexOf('http://localhost/Booking/index.php?act=payOnline&idBill=548') !== -1) {
        // Thực hiện các hành động trước khi người dùng rời đi
        document.body.innerHTML = 'Bạn đang rời khỏi trang này. Dữ liệu chưa lưu có thể bị mất.';
    }
});