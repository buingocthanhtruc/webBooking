<?php
include 'View/titleOfComponents.php';
?>

<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto auto;
  gap: 10px;
}

.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 3px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
</style>

<div class="pcoded-inner-content">
  <!-- Main-body start -->
  <div class="main-body">
    <div class="page-wrapper">

      <!-- Page body start -->
      <div class="page-body">
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a class="text-primary h5" href="">Hành Động</a>
            </li>
            <li class="list-group-item">
              <form class="mb-5">
                <div class="form-row">
                  <div class="col mr-4">
                    <select name="" class="form-control" id="">
                      <option value="">Bàn 1</option>
                      <option value="">Bàn 2</option>
                      <option value="">Bàn 3</option>

                    </select>
                  </div>
                  <div class="col mr-4">
                    <select name="" class="form-control" id="">
                      <option value="">Nghỉ</option>
                      <option value="">Hoạt Động</option>
                    </select>
                  </div>
                  <div class="col-3">
                    <button class="btn btn-primary form-control">Cập Nhật</button>
                  </div>
                </div>
              </form>
            </li>
          </ul>

        </div>


        <div class="grid-container">
          <div class="grid-item bg-success">Bàn 1</div>
          <div class="grid-item">Bàn 2</div>
          <div class="grid-item">Bàn 3</div>
          <div class="grid-item">Bàn 4</div>
          <div class="grid-item">Bàn 5</div>
          <div class="grid-item">Bàn 6</div>
          <div class="grid-item">Bàn 7</div>
          <div class="grid-item">Bàn 8</div>
          <div class="grid-item">Bàn 9</div>
        </div>