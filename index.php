<?php 

  require_once 'component/header/jpR3Tx7cYKdp.php'; 
  require_once 'component/notification.php';
  session_start();
  if(isset($_SESSION['id'])){
    header('Location: dashboard.php');
  }

?>

<body id="loginbg">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                WarungMU
              </div>
              <h4>Hello! dude, <b>Happy</b> Shopping.</h4>
                <code><h4>Akun default:</h4></code>
                <code>Username : kasir</code>
                <code>Password : kasir</code>
              <div class="notify">
                <?php
                if (isset($_GET['msg'])) {
                  notif($_GET['msg'], isset($_GET['status']) ? $_GET['status'] : "success");
                }
                ?>
              </div>
              <form class="pt-3" action="action/login.php" method="POST">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name='login' type="submit">SIGN IN</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <?php require_once 'component/footer/jpR3Tx7cYKdp.php'; ?>