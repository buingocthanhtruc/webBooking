<!-- <div class="pcoded-content"> -->
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
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5>Material Form Inputs</h5>
                <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
              </div>
              <div class="card-block">
                <form class="form-material">
                  <div class="form-group form-default">
                    <input type="text" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Username</label>
                  </div>
                  <div class="form-group form-default">
                    <input type="text" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Email (exa@gmail.com)</label>
                  </div>
                  <div class="form-group form-default">
                    <input type="password" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Password</label>
                  </div>
                  <div class="form-group form-default">
                    <input type="text" name="footer-email" class="form-control" required="" value="My value">
                    <span class="form-bar"></span>
                    <label class="float-label">Predefine value</label>
                  </div>
                  <div class="form-group form-default">
                    <input type="text" name="footer-email" class="form-control" required="" disabled>
                    <span class="form-bar"></span>
                    <label class="float-label">Disabled</label>
                  </div>
                  <div class="form-group form-default">
                    <input type="text" name="footer-email" class="form-control" required="" maxlength="6">
                    <span class="form-bar"></span>
                    <label class="float-label">Max length 6 char</label>
                  </div>
                  <div class="form-group form-default">
                    <textarea class="form-control" required=""></textarea>
                    <span class="form-bar"></span>
                    <label class="float-label">Text area Input</label>
                  </div>
                </form>
              </div>
            </div>
          </div>