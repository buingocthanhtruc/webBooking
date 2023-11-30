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
  /* padding: 15px 10px; */
  font-size: 15px;
  /* text-align: center; */
}

.icon-block-blue {
  background-color: #12c9f1;
}

.icon-block-green {
  background-color: #27bf1d;
}
</style>

<div class="pcoded-inner-content">
  <!-- Main-body start -->
  <div class="main-body">
    <div class="page-wrapper">
      <!-- Page body start -->
      <div class="page-body">
        <div class="grid-container">
          <!-- ITEM 1 -->
          <div class="grid-item shadow bg-white rounded">
            <div class="d-flex align-items-center p-3">
              <div class="icon-block-blue px-4 py-3 mx-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512">
                  <style>
                  svg {
                    fill: #fff
                  }
                  </style>
                  <path
                    d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z" />
                </svg>
              </div>
              <div class="d-flex flex-column mt-3">
                <p class="mb-2">Tổng số user</p>
                <h6><?php echo count($allUser); ?></h6>
              </div>
            </div>
          </div>
          <div class="grid-item shadow bg-white rounded">
            <div class="d-flex align-items-center p-3">
              <div class="icon-block-green px-4 py-3 mx-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                  <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                  <style>
                  svg {
                    fill: #ffffff
                  }
                  </style>
                  <path
                    d="M0 192c0-35.3 28.7-64 64-64c.5 0 1.1 0 1.6 0C73 91.5 105.3 64 144 64c15 0 29 4.1 40.9 11.2C198.2 49.6 225.1 32 256 32s57.8 17.6 71.1 43.2C339 68.1 353 64 368 64c38.7 0 71 27.5 78.4 64c.5 0 1.1 0 1.6 0c35.3 0 64 28.7 64 64c0 11.7-3.1 22.6-8.6 32H8.6C3.1 214.6 0 203.7 0 192zm0 91.4C0 268.3 12.3 256 27.4 256H484.6c15.1 0 27.4 12.3 27.4 27.4c0 70.5-44.4 130.7-106.7 154.1L403.5 452c-2 16-15.6 28-31.8 28H140.2c-16.1 0-29.8-12-31.8-28l-1.8-14.4C44.4 414.1 0 353.9 0 283.4z" />
                </svg>
              </div>
              <div class="d-flex flex-column">
                <p>Tổng số món ăn</p>
                <h6><?php echo count($allFood); ?></h6>
              </div>
            </div>
          </div>

          <div class="grid-item shadow bg-white rounded">
            <div class="d-flex align-items-center p-3">
              <div class="bg-c-yellow px-4 py-3 mx-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                  <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                  <style>
                  svg {
                    fill: #ffffff
                  }
                  </style>
                  <path
                    d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V424c0 11 9 20 20 20s20-9 20-20V410.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l0 0-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V216z" />
                </svg>
              </div>
              <div class="d-flex flex-column">
                <p>Tổng doanh thu của hôm nay</p>
                <h6><?php
                    $total = $total_money_today[0]['total'];
                    echo number_format($total); ?> VNĐ</h6>
              </div>
            </div>
          </div>
          <!-- 4 -->
          <div class="grid-item shadow bg-white rounded">
            <div class="d-flex align-items-center p-3">
              <div class="icon-block-blue px-4 py-3 mx-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                  <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                  <style>
                  svg {
                    fill: #ffffff
                  }
                  </style>
                  <path
                    d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V424c0 11 9 20 20 20s20-9 20-20V410.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l0 0-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V216z" />
                </svg>
              </div>
              <div class="d-flex flex-column">
                <p>Tổng doanh thu của tuần</p>
                <h6><?php
                    $total = $total_money_cur_week[0]['total'];
                    echo number_format($total); ?> VNĐ</h6>
              </div>
            </div>
          </div>
          <!-- 5 -->
          <div class="grid-item shadow bg-white rounded">
            <div class="d-flex align-items-center p-3">
              <div class="icon-block-green px-4 py-3 mx-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                  <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                  <style>
                  svg {
                    fill: #ffffff
                  }
                  </style>
                  <path
                    d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V424c0 11 9 20 20 20s20-9 20-20V410.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l0 0-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V216z" />
                </svg>
              </div>
              <div class="d-flex flex-column">
                <p>Tổng doanh thu của tháng</p>
                <h6><?php
                    $total = $total_money_cur_month[0]['total'];
                    echo number_format($total); ?> VNĐ</h6>
              </div>
            </div>
          </div>
          <!-- 6 -->
          <div class="grid-item shadow bg-white rounded">
            <div class="d-flex align-items-center p-3">
              <div class="bg-c-yellow   px-4 py-3 mx-3 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 512 512">
                  <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                  <style>
                  svg {
                    fill: #ffffff
                  }
                  </style>
                  <path
                    d="M320 96H192L144.6 24.9C137.5 14.2 145.1 0 157.9 0H354.1c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128H320c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96H96c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4l0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20v14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1l0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4V424c0 11 9 20 20 20s20-9 20-20V410.2c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15l0 0-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7V216z" />
                </svg>
              </div>
              <div class="d-flex flex-column">
                <p>Tổng doanh thu của năm</p>
                <h6><?php
                    $total = $total_money_cur_year[0]['total'];
                    echo number_format($total); ?> VNĐ</h6>
              </div>
            </div>

          </div>

        </div>
        <div class="row mt-3">
          <!--Thống kê các tháng trong năm  -->
          <div class="col-md-12 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5>Thống kê các tháng</h5>
                <span>Doanh thu của nhà hàng qua các tháng</span>
              </div>
              <div class="card-block">
                <div id="morris-bar-chart-month"></div>
              </div>
            </div>
          </div>

          <!-- Thống kê các năm -->
          <div class="col-md-12 col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5>Thống kê các năm</h5>
                <span>Doanh thu của nhà hàng qua các năm</span>
              </div>
              <div class="card-block">
                <div id="morris-bar-chart-year"></div>
              </div>
            </div>
          </div>
        </div>
        <script>
        // CHART MONTH
        Morris.Bar({

          element: "morris-bar-chart-month",

          data: [
            <?php foreach ($get_total_money_month as $month) :
                extract($month);
              ?> {
              y: "<?php echo $month; ?>",
              b: <?php echo $total; ?>,
            },
            <?php endforeach; ?>

          ],
          xkey: "y",
          ykeys: ["b"],
          labels: ["Tổng"],
          barColors: ["#5FBEAA", "#5FBEAA", "#cCcCcC"],
          hideHover: "auto",
          gridLineColor: "#eef0f2",
          resize: true,
        });

        // /////////////////////////////////////////////////////
        // CHART YEAR
        Morris.Bar({

          element: "morris-bar-chart-year",

          data: [
            <?php foreach ($get_total_money_year as $year) :
                extract($year);
              ?> {
              y: "<?php echo $year; ?>",
              b: <?php echo $total; ?>,
            },
            <?php endforeach; ?>

          ],
          xkey: "y",
          ykeys: ["b"],
          labels: ["Tổng"],
          barColors: ["#5FBEAA", "#5FBEAA", "#cCcCcC"],
          hideHover: "auto",
          gridLineColor: "#eef0f2",
          resize: true,
        });
        </script>