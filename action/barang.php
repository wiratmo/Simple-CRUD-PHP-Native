<?php
require_once 'db_connection.php';

if(isset($_POST['tambah'])){
    $kode = mysqli_real_escape_string($conn, $_POST['kode']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $stokAwal = mysqli_real_escape_string($conn, $_POST['stokAwal']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);

    $query_cek_kode_exist = "SELECT kode FROM barang WHERE kode = '$kode'";
    $exec_qcke = mysqli_query($conn, $query_cek_kode_exist);
    if(mysqli_num_rows($exec_qcke)>0){
        header('Location: ../barang.php?status=denger&msg=Kode Barang telah dipakai');
    } else {
        $query_add_barang = "INSERT INTO barang(kode, nama, stokAwal, harga) VALUE ('$kode', '$nama', '$stokAwal', '$harga')";
        $exec_ab = mysqli_query($conn, $query_add_barang);
        header('Location: ../barangList.php?status=success&msg=Barang '.$nama.' Berhasil ditambahkan');
    }
} else if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $kode = mysqli_real_escape_string($conn, $_POST['kode']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $stokAwal = mysqli_real_escape_string($conn, $_POST['stokAwal']);
    $harga = mysqli_real_escape_string($conn, $_POST['harga']);

    $query_update_barang = "UPDATE barang SET kode='$kode', nama='$nama', stokAwal = '$stokAwal', harga = '$harga' WHERE id = '$id'";
    
    $exec_qub = mysqli_query($conn, $query_update_barang);
    header('Location: ../barangList.php?status=success&msg=Barang dengan id '.$id.' Berhasil diubah');


    var_dump($_POST);
} else if (isset($_POST['hapus'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query_delete_barang = "DELETE FROM barang WHERE id = $id";
    $exec_qdb = mysqli_query($conn, $query_delete_barang);
    header('Location: ../barangList.php?status=success&msg=Barang dengan id'.$id.' Berhasil dihapus');
}

?>