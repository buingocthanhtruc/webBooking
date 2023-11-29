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
            <h5>Danh Mục</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Thêm mới
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Danh Mục Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="index.php?act=addDm" method="post">
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Danh Mục:</label>
                        <input type="text" class="form-control" id="recipient-name" name="category">
                      </div>
                      <div class="form-group">
                        <label for="ID_group" class="col-form-label">ID_group</label>
                        <input type="text" class="form-control" id="ID_group" name="id_group" placeholder="yêu cầu viết liền">
                      </div>
                      <button class="btn btn-success">Thêm</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-block table-border-style">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th width="20%">STT</th>
                    <th width="30%">Tên</th>
                    <th width="40%">ID Group</th>
                    <th width="10%">Hàng Động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($allDanhMuc as $danhmuc) : ?>
                    <tr>
                      <th scope="row"><?= $danhmuc["id"] ?></th>
                      <td><?= $danhmuc["name"] ?></td>
                      <td><?= $danhmuc["id_group"] ?></td>
                      <td class="box-active">
                        <a href="?act=deleteDm&id=<?= $danhmuc["id"] ?>" onclick=" return confirm('Bạn có chắc muốn xóa không')"><button type="button" class="btn rounded btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z">
                              </path>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z">
                              </path>
                            </svg>
                          </button>
                        </a>
                        <a href="?act=editDm&id=<?= $danhmuc["id"] ?>" class="btn btn-success rounded">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z">
                            </path>
                          </svg>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Basic table card end -->
        <!-- Basic table card start -->
        <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Danh Sách Món Ăn</h5>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-whatever="">Thêm mới
            </button>
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Món Ăn Mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="index.php?act=addFood" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="col-form-label">Tên Món Ăn:</label>
                        <input name="name" required type="text" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Danh Mục:</label>
                        <select class="form-control" name="id_dm">
                          <?php foreach ($allDanhMuc as $danhmuc) : ?>
                            <option value="<?= $danhmuc["id"] ?>"><?= $danhmuc["name"] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Ảnh:</label>
                        <input name="image" required type="file" class="form-control">
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Giá:</label>
                        <input name="price" required type="number" class="form-control">
                      </div>
                      <button class="btn btn-success">Thêm</button>
                    </form>
                  </div>
                  <div class="modal-footer"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-block table-border-style">
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th width="10%">STT</th>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Loại</th>
                    <th width="10%">Hàng Động</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($allFood as $food) : ?>
                    <tr>
                      <td><?= $food["id"] ?></td>
                      <td><img src="assets/images/<?= $food["image"] ?>" alt="IMG" width="50px"></td>
                      <td><?= $food["name"] ?></td>
                      <td><?= number_format($food["price"]) ?> VNĐ</td>
                      <td><?= getNameDanhMuc($food["id_dm"])["name"] ?></td>
                      <td class="box-active">
                        <a href="?act=deleteFood&id=<?= $food["id"] ?>" onclick=" return confirm('Bạn có chắc muốn xóa không')"><button type="button" class="btn rounded btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                              <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z">
                              </path>
                              <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z">
                              </path>
                            </svg>
                          </button>
                        </a>
                        <a href="?act=editFood&id=<?= $food["id"] ?>" class="btn btn-success rounded">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z">
                            </path>
                          </svg>
                        </a>
                      </td>
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