<?php
require_once 'db_connection.php';
if(isset($_POST['tambah'])){
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $query_cek_mutasi = "SELECT id, mutasiMasuk, mutasiKeluar, stokAkhir FROM barang WHERE id = '$id' ";
    $exec_qcm = mysqli_query($conn, $query_cek_mutasi);
    $data = mysqli_fetch_assoc($exec_qcm);

    if(isset($_POST['masuk']) and $_POST['masuk'] != ''){
        $masuk = mysqli_real_escape_string($conn, $_POST['masuk']);
        $mutasiMasuk = $data['mutasiMasuk']+$masuk;

        $stokAkhir = $data['stokAkhir']+$masuk;

        $query_add_mutasi_masuk = "UPDATE barang set mutasiMasuk = '$mutasiMasuk', stokAkhir = '$stokAkhir' WHERE id = $id ";
        $exec_amm = mysqli_query($conn, $query_add_mutasi_masuk);
        header('Location: ../barangMutasi.php?mutasi=masuk&status=success&msg=barang telah ditambahkan mutasi masuk');
        
        
    } else if(isset($_POST['keluar'])and $_POST['keluar'] != ''){
        $keluar = mysqli_real_escape_string($conn, $_POST['keluar']);
        $mutasiKeluar = $data['mutasiKeluar']+$keluar;
        $stokAkhir = $data['stokAkhir']-$keluar;

        if($stokAkhir < 0){
            header('Location: ../barangMutasi.php?mutasi=keluar&status=danger&msg=barang gagal karena jumlah dibawah 0');
        } else {
            $query_add_mutasi_keluar = "UPDATE barang set mutasiKeluar = '$mutasiKeluar', stokAkhir = '$stokAkhir' WHERE id = $id ";
            $exec_amk = mysqli_query($conn, $query_add_mutasi_keluar);
            header('Location: ../barangMutasi.php?mutasi=keluar&status=success&msg=barang telah ditambahkan mutasi keluar');
        }
        
    }
}
?>