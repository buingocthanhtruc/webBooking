<!DOCTYPE html>
<html lang="en">

<head>
  <title>Admin TLT Restaurant</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description"
    content="Mega Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
  <meta name="keywords"
    content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
  <meta name="author" content="codedthemes" />

  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet" />
  <!-- waves.css -->
  <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all" />
  <!-- Required Fremwork -->
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css" />
  <!-- waves.css -->
  <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all" />
  <!-- themify icon -->
  <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css" />
  <!-- <link rel="stylesheet" type="text/css" href="./assets/icon/themify-icons/themify-icons.css" /> -->
  <!-- Font Awesome -->
  <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css" />
  <!-- scrollbar.css -->
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css" />
  <!-- am chart export.css -->
  <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
  <!-- morris chart -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <!-- Bootstrap -->
  <!-- <link href="./css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- Style.css -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
  <!-- Pre-loader start -->
  <!-- <div class="theme-loader">
    <div class="loader-track">
      <div class="preloader-wrapper">
        <div class="spinner-layer spinner-blue">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
        <div class="spinner-layer spinner-red">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>

        <div class="spinner-layer spinner-yellow">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>

        <div class="spinner-layer spinner-green">
          <div class="circle-clipper left">
            <div class="circle"></div>
          </div>
          <div class="gap-patch">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Pre-loader end -->
  <div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
      <nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">
          <div class="navbar-logo">
            <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
              <i class="ti-menu"></i>
            </a>
            <div class="mobile-search waves-effect waves-light">
              <div class="header-search">
                <div class="main-search morphsearch-search">
                  <div class="input-group">
                    <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                    <input type="text" class="form-control" placeholder="Enter Keyword" />
                    <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="navbar-container container-fluid">
            <ul class="nav-left">
              <li>
                <div class="sidebar_toggle">
                  <a href="javascript:void(0)"><i class="ti-menu"></i></a>
                </div>
              </li>
            </ul>
            <ul class="nav-right">
              <li class="header-notification">
                <a href="#!" class="waves-effect waves-light">
                  <i class="ti-bell"></i>
                  <span class="badge bg-c-red"></span>
                </a>
                <ul class="show-notification">
                  <li>
                    <h6>Thông báo đơn hàng mới</h6>
                    <label class="label label-danger">New</label>
                  </li>
                  <?php foreach ($bill_notify as $bill) :
                    $originalTime = $bill['time_start'];

                    // Tạo một đối tượng DateTime từ chuỗi ban đầu
                    $dateTime = new DateTime($originalTime);

                    // Chuyển đổi đối tượng DateTime về định dạng mới (Y-m-d)
                    $newFormat = $dateTime->format('Y-m-d');
                  ?>
                  <li class="waves-effect waves-light">
                    <div class="media">
                      <img class="d-flex align-self-center img-radius" src="assets/images/user.jpg"
                        alt="Generic placeholder image" />
                      <div class="media-body">
                        <h5 class="notification-user"><?= $bill['name'] ?></h5>
                        <p class="notification-msg">
                          đặt bàn vào ngày <?= $newFormat ?> <br>
                          số lượng người <?= $bill['people'] ?> <br>
                          tổng hóa đơn là : <?= $bill['total'] ?> VNĐ <br>
                          Trạng thái : <?= $bill['status_pay'] ? 'Đã thanh toán' : 'Chưa thanh toán' ?>

                        </p>
                        <?php
                          $orderTime = strtotime($bill['create_at']);
                          $currentTime = time();
                          $timeDifference = $currentTime - $orderTime;
                          $minutesDifference = floor($timeDifference / 60);
                          ?>
                        <div class="d-flex justify-content-end">
                          <span class="notification-time text"><?= $minutesDifference ?> minutes ago</span>
                        </div>
                      </div>
                    </div>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <li class="user-profile header-notification">
                <a href="#!" class="waves-effect waves-light">
                  <img src="assets/images/admin.jpg" class="img-radius" alt="User-Profile-Image" />
                  <span>ADMIN</span>
                  <i class="ti-angle-down"></i>
                </a>
                <ul class="show-notification profile-notification">
                  <li class="waves-effect waves-light">

                    <a href="http://localhost/Booking/index.php"><i class="fa-solid fa-house"></i>Trở về trang chủ</a>
                  </li>
                  <li class="waves-effect waves-light">
                    <a href="?act=chart">
                      <i class="fa-regular fa-money-bill-1"></i> Thông kê doanh thu
                    </a>
                  </li>
                  <li class="waves-effect waves-light">
                    <a href="index.php?act=logout">
                      <i class="ti-layout-sidebar-left"></i> Logout

                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>