<?php

require_once 'component/header/jpR3Tx7cYKdp.php';
require_once 'component/notification.php';
require_once 'action/db_connection.php';
session_start();
if (empty($_SESSION['id'])) {
  header('Location: index.php?status=warning&msg=Silakan masuk menggunakan username dan password');
}

if (empty($_GET['cari'])) {
  $query_show_all_data = "SELECT * FROM barang ORDER BY id desc";
  $exec_qsad = mysqli_query($conn, $query_show_all_data);
} else {
  $query_show_all_data = "SELECT * FROM barang WHERE kode like '%".$_GET['cari']."%'or nama like '%".$_GET['cari']."%' ORDER BY id desc; ";
  $exec_qsad = mysqli_query($conn, $query_show_all_data);
}

?>

<body>
  <div class="container-scroller">

    <!-- komponen navbar di folder component -->
    <?php require_once 'component/navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <!-- komponen sidebar di folder component -->
      <?php require_once 'component/sidebar.php' ?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Daftar Barang <span class="brand-logo">WarungMU</span></h4>
                  <div class="card-description">
                    <p>Pada halaman ini anda bisa <code> menambahkan, mengedit, menghapus dan mencari barang </code></p>
                    <div class="float-right btn-plus">
                      <a href="barangAdd.php">
                        <button class="btn btn-success"><i class="mdi mdi-plus-circle"></i> Tambah Barang</button>
                      </a>
                    </div>
                    <div class="notify">
                      <?php
                      if (isset($_GET['msg'])) {
                        notif($_GET['msg'], isset($_GET['status']) ? $_GET['status'] : "success");
                      }
                      ?>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                      <thead class="ctable">
                        <tr>
                          <th rowspan="2">No</th>
                          <th rowspan="2">Kode Barang</th>
                          <th rowspan="2">Nama Barang</th>
                          <th rowspan="2">Stok Awal</th>
                          <th rowspan="2">Harga Barang</th>
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
                              <td><?= $no += 1 ?></td>
                              <td><?= $d['kode'] ?></td>
                              <td><?= $d['nama'] ?></td>
                              <td><?= $d['stokAwal'] ?></td>
                              <td> Rp. <?= number_format($d['harga'], 2); ?></td>
                              <td><?= $d['mutasiMasuk'] ?></td>
                              <td><?= $d['mutasiKeluar'] ?></td>
                              <td><?= $d['stokAwal'] + ($d['mutasiMasuk'] - $d['mutasiKeluar']) ?></td>
                              <td class="ctable">
                                <div style="display: inline-flex;">
                                <a href="barang.php?option=edit&id=<?=$d['id']?>"><label class="btn btn-sm btn-warning"><i class="mdi mdi-pen"></i></label></a>
                                <form action="action/barang.php" method="POST">
                                  <input type="hidden" name="id" value="<?= $d['id']?>">
                                  <button type="submit" name="hapus" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></button>
                                </form>
                                </div>
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