<div class="container ">
    <div class="row d-flex justify-content-center">
        <div class="col-4">
            <form action="?act=login" class="card p-4" method="POST">
                <h1 class="text-center">Đăng Nhập</h1>
                <div class="col m-3">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="name" placeholder="Số điện thoại" name="phone_number" required>
                        <label for="username">Số Điện Thoại</label>
                    </div>
                </div>
                <div class="col m-3">
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="password" required>
                        <label for="password">Mật Khẩu</label>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <input type="submit" class="btn bg-primary p-2 text-white" name="btnlogin" value="Đăng Nhập"></input>
                </div>
                <a href="?act=signup" class="nav-link text-primary text-end h7">Đăng Ký</a>
            </form>
        </div>

    </div>
</div>