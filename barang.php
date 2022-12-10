<?php
require_once 'component/header/tJ8kbc9JGm7h.php';
require_once 'component/notification.php';
require_once 'action/db_connection.php';
session_start();
if (empty($_SESSION['id'])) {
  header('Location: index.php?status=warning&msg=Silakan masuk menggunakan username dan password');
}
if(isset($_GET['option'])){
  if(isset($_GET['id']) and $_GET['option']  == 'edit'){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query_cek_id_barang = "SELECT * FROM barang WHERE id = '$id'";
    $exec_qcib = mysqli_query($conn, $query_cek_id_barang);
    if(mysqli_num_rows($exec_qcib)== 1){
      // "id"]=> string(1) "5" ["kode"]=> string(10) "M-22011015" ["nama"]=> string(14) "Sari Roti Keju" ["stokAwal"]=> string(1) "5" ["harga"]=> string(5) "11800" ["mutasiMasuk"]=> string(1) "0" ["mutasiKeluar"]=> string(1) "0" ["stokAkhir"]=> string(1) 
      $data = mysqli_fetch_assoc($exec_qcib);
    } else {
      header('Location: ../barang.php?status=denger&msg=Data Barang Tidak Ada');
    }
  }
} 
$id = isset($data['id'])?($data['id']):'';
$kode = isset($data['kode'])?($data['kode']):'';
$nama = isset($data['nama'])?($data['nama']):'';
$stokAwal = isset($data['stokAwal'])?($data['stokAwal']):'';
$harga = isset($data['harga'])?($data['harga']):'';
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
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tambah Barang <span class="brand-logo">WarungMU</span></h4>
                  <form class="form-sample" action="action/barang.php" method="POST">
                    <p class="card-description">
                      Pencatat barang yang masuk gudang
                    </p>
                    <div class="notify">
                      <?php
                      if (isset($_GET['msg'])) {
                        notif($_GET['msg'], isset($_GET['status']) ? $_GET['status'] : "success");
                      }
                      ?>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Kode Barang</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="kode" value="<?=$kode?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Nama Barang</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama" value="<?=$nama?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Jumlah Stok Masuk</label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="stokAwal" value="<?=$stokAwal?>"/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Harga Barang</label>
                          <div class="col-sm-10">
                            <div class="input-group">

                              <div class="input-group-prepend">
                                <span class="input-group-text bg-primary text-white">Rp</span>
                              </div>
                              <input type="number" class="form-control" name="harga" value="<?=$harga?>">
                              <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                    if(isset($_GET['option'])){
                      if($_GET['option'] == 'edit'){
                        echo '<input type="hidden" name="id" value="'.$id.'">';
                        echo '<button name="update" value="'.$id.'" type="submit" class="btn btn-primary mr-2">Update</button>';
                      } else {
                        echo '<button name="tambah" type="submit" class="btn btn-primary mr-2">Tambah</button>';
                      }
                    }
                    ?>
                    
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <!-- End custom js for this page-->

  <?php require_once 'component/footer/tJ8kbc9JGm7h.php'; ?>