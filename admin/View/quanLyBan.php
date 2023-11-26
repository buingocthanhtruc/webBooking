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
              <form class="mb-5" action="index.php?act=updateStatusTable" method="post">
                <div class="form-row">
                  <div class="col mr-4">
                    <select name="id_table" class="form-control" id="">
                      <?php foreach($allTable as $table): ?>
                      <option value="<?=$table['id']?>"><?=$table['name']?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col mr-4">
                    <select name="statusTable" class="form-control" id="">
                      <option value="0">Nghỉ</option>
                      <option value="1">Hoạt Động</option>
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
          <?php foreach($allTable as $table): ?>
                <div class="grid-item <?= $table['status']?'bg-success':''?>"><?= $table['name']?></div>
            <?php endforeach; ?>
        </div>
        