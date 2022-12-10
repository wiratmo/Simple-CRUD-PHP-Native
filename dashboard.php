<?php 

require_once 'component/header/tJ8kbc9JGm7h.php'; 
session_start();
if (empty($_SESSION['id'])){
  header('Location: index.php?status=warning&msg=Silakan masuk menggunakan username dan password');
}
?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require_once 'component/navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <?php require_once 'component/sidebar.php' ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          Selamat Datang <mark><?= $_SESSION['username']?></mark>
        </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- End custom js for this page-->

  <?php require_once 'component/footer/tJ8kbc9JGm7h.php'; ?>