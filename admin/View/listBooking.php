<!-- Page-header start -->
<?php
include 'View/titleOfComponents.php';
?>

<div class="pcoded-inner-content">
  <!-- Main-body start -->
  <div class="main-body">
    <div class="page-wrapper">

      <!-- Page body start -->
      <div class="page-body">
        <div class="card">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <a class="text-primary h5" href="">Form tìm kiếm</a>

            </li>
            <li class="list-group-item">
              <form class="mb-5" method="post">
                <div class="form-row">
                  <div class="col">
                    <input type="text" class="form-control mt-2" placeholder="Tên khách hàng" name="name_user">
                  </div>
                  <div class="col">
                    <select class="form-control" name="status_bill">
                      <option value="2">Tất cả</option>
                      <option value="0">Chưa xác nhận</option>
                      <option value="1">Xác nhận</option>
                    </select>
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <button class="btn btn-success mt-3" name="searchInfo">Tìm kiếm</button>
                  <button class="btn btn-primary mt-3">
                    <a class="text-white" href="index.php?act=formCreate">Thêm mới</a>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>

        <table class="table align-middle mb-0 bg-white">
          <thead class="bg-light">
            <tr>
              <th>ID</th>
              <th>Thông tin khách hàng</th>
              <th>Thông tin đặt bàn</th>
              <th>Trạng thái</th>
              <th>Thanh toán</th>
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <!-- <tr>
              <td>
                <div class="ms-3">
                  <p class="fw-bold mb-1">1</p>
                </div>
              </td>
              <td>
                <p class="fw-normal mb-3">Họ và tên: Nguyễn Văn A</p>
                <p class="fw-normal mb-3">Email: abclgdfg@gmail.com</p>
                <p class="fw-normal mb-3">Phone: 09876531231</p>

              </td>
              <td>
                <p class="fw-normal mb-2">Ngày đặt: Nguyễn Văn A</p>
                <p class="fw-normal mb-2">Giờ tới: abclgdfg@gmail.com</p>
                <p class="fw-normal mb-2">Số người: 09876531231</p>
                <p class="fw-normal mb-2">Tổng tiền: 09876531231</p>
              </td>
              <td>
                <button class="btn btn-warning">Chưa xác nhận</button>
              </td>
              <td>
                <button class="btn btn-dark">Chưa thanh toán</button>
              </td>
              <td>
                <div class="dropdown show">
                  <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Hành động
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Hủy</a>
                    <a class="dropdown-item" href="#">Chưa xác nhận</a>
                    <a class="dropdown-item" href="#">Đã thanh toán</a>
                    <a class="dropdown-item" href="#">Xác nhận</a>
                  </div>

                  <button type="button" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                      </path>
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                      </path>
                    </svg>
                  </button>

                  <button type="button" class="btn btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                      <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z">
                      </path>
                    </svg>
                  </button>
                </div>
              </td>
            </tr> -->
            <!-- PHP -->
            <?php
            foreach ($allBill as $index => $value) :
              extract($value);
            ?>
              <?php
              $dateString = $time_start;
              $dateTime = new DateTime($dateString);
              $formattedDate = $dateTime->format('Y-m-d');
              $formattedHour = $dateTime->format('H:i');
              ?>

              <tr>
                <td>
                  <div class="ms-3">
                    <p class="fw-bold mb-1"><?php echo $id; ?></p>
                  </div>
                </td>
                <td>
                  <p class="fw-normal mb-3">Họ và tên: <?php echo $name; ?></p>
                  <p class="fw-normal mb-3">Email: <?php echo $email; ?></p>
                  <p class="fw-normal mb-3">Phone: <?php echo $phone; ?></p>
                  <p class="fw-normal mb-3">Bàn: <?php echo $id_table; ?></p>

                </td>
                <td>
                  <p class="fw-normal mb-2">Ngày đặt: <?php echo $formattedDate; ?></p>
                  <p class="fw-normal mb-2">Giờ tới: <?php echo $formattedHour; ?></p>
                  <p class="fw-normal mb-2">Số người: <?php echo $people; ?></p>
                  <p class="fw-normal mb-2">Tổng tiền: <?php echo number_format($total); ?> VNĐ</p>
                </td>
                <td>
                  <?php
                  $trangthai = $status == 0 ? '<button class="btn btn-warning">Chưa xác nhận</button>' : '<button class="btn btn-success">Xác nhận</button>';
                  echo $trangthai;
                  ?>
                </td>
                <td>
                  <!-- <button class="btn btn-dark">Chưa thanh toán</button> -->
                  <?php
                  $trangthai = $status_pay == 0 ? '<button class="btn btn-dark">Chưa thanh toán</button>' : '<button class="btn btn-success">Đã thanh toán</button>';
                  echo $trangthai;
                  ?>
                </td>
                <td class="row">
                  <div class="dropdown show mr-3">
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Hành động
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Hủy</a>
                      <!-- <a class="dropdown-item" href="#">Chưa xác nhận</a> -->
                      <!-- <a class="dropdown-item" href="#">Đã thanh toán</a> -->
                      <a class="dropdown-item" href="index.php?act=updateStatus&id=<?php echo $id_bill; ?>">Xác nhận</a>
                    </div>
                  </div>

                  <!-- Thanh Toán -->
                  <div class="dropdown show mr-3">
                    <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownThanhToan" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Thanh toán
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownThanhToan">
                      <a class="dropdown-item" href="#">Hủy</a>
                      <a class="dropdown-item" href="index.php?act=updateStatusPay&id=<?php echo $id_bill; ?>">Đã thanh
                        toán</a>
                    </div>
                  </div>

                  <a href="../index.php?act=bill_detail&id=<?php echo $id_bill; ?>">
                    <button type="button" class="btn btn-secondary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                        </path>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                        </path>
                      </svg>
                    </button>
                  </a>

                </td>
              </tr>

            <?php endforeach; ?>

          </tbody>
        </table>

        <nav class="mt-3" aria-label="...">
          <ul class="pagination">
            <?php

            $count = count($count_all_bill);
            $bill = count($allBill);
            $pages = ceil($count / 7);

            for ($i = 1; $i <= $pages; $i++) {
              $active = $page == $i ? 'active' : '';
              echo '<li class="page-item ' . $active . '"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
            }
            ?>
            <!-- <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
              <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li> -->
          </ul>
        </nav>