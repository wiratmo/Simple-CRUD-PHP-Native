<?php
require_once 'component/header/jpR3Tx7cYKdp.php';
require_once 'component/notification.php';
require_once 'action/db_connection.php';
session_start();
if (empty($_SESSION['id'])) {
  header('Location: index.php?status=warning&msg=Silakan masuk menggunakan username dan password');
}
$query_show_all_data = "SELECT * FROM barang ORDER BY id desc";
$exec_qsad = mysqli_query($conn, $query_show_all_data);
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar <mark>Mutasi <?=isset($_GET['mutasi'])?$_GET['mutasi']:'masuk'?> </mark> <span class="brand-logo">WarungMU</span></h4>
                  <div class="card-description">

                    <p>Pada halaman ini anda bisa <code> menambahkan mutasi masuk</code></p>

                  </div>

                  <div class="notify">
                    <?php
                    if (isset($_GET['msg'])) {
                      notif($_GET['msg'], isset($_GET['status']) ? $_GET['status'] : "success");
                    }
                    ?>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                      <thead class="ctable">
                        <tr>
                          <th rowspan="2">No</th>
                          <th rowspan="2">Kode Barang</th>
                          <th rowspan="2">Nama Barang</th>
                          <th rowspan="2">Stok Awal</th>
                          <th colspan="2">Mutasi</th>
                          <th rowspan="2">Stok Akhir</th>
                          <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                          <th>Masuk</th>
                          <th>Keluar</th>

                        </tr>
                      </thead>
                      <?php
                      if (mysqli_num_rows($exec_qsad) == 0) {
                        echo "<h4>Data Kosong</h4>";
                      } else {
                      ?>
                        <tbody>
                          <?php
                          $no = 0;
                          $data = mysqli_fetch_all($exec_qsad, MYSQLI_ASSOC);
                          foreach ($data as $d) {
                          ?>
                            <tr>
                              <td><?=$no+=1?></td>
                              <td><?= $d['kode'] ?></td>
                              <td><?= $d['nama'] ?></td>
                              <td><?= $d['stokAwal'] ?></td>
                              <td><?= $d['mutasiMasuk'] ?></td>
                              <td><?= $d['mutasiKeluar'] ?></td>
                              <td><?= $d['stokAwal'] + ($d['mutasiMasuk'] - $d['mutasiKeluar']) ?></td>
                              <td class="ctable">
                                <form action="action/mutasi.php" method="POST">
                                  <div class="form-group" style="width: 50%">
                                    <div class="input-group ">
                                      <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                      <input type="number" class="form-control" name="<?= isset($_GET['mutasi'])?$_GET['mutasi']:'masuk' ?>" placeholder="mutasi masuk">
                                      <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" name="tambah" value="tambah" type="submit"><i class="mdi mdi-plus-circle-outline"></i></button>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      <?php
                      }
                      ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <?php require_once 'component/footer/jpR3Tx7cYKdp.php'; ?>