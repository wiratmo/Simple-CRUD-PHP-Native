<?php
require_once '../component/notification.php';
require_one 'db_connection.php';
session_start();

if(isset($_POST['login'])){
    if(!(($_POST['username']=='') and ($_POST['password']==''))){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query_check_username_exist = "SELECT id FROM user where username = '$username'";
        $exec_qcue= mysqli_query($conn, $query_check_username_exist);

        if(mysqli_num_rows($exec_qcue)!=1){
            header('Location: ../index.php?status=error&msg=Username yang anda masukkan belum terdaftar');
        } else {
            $user = mysqli_fetch_assoc($exec_qcue);
            $query_check_username_password = "SELECT id, username FROM user where username = '$username' and password = md5('$password)";
            $exec_cup = mysqli_query($conn, $query_check_username_password);
            $data = mysqli_fetch_assoc($exec_cup);
            if(isset($data)){
                $_SESSION['id'] = $data['id'];
                $_SESSION['username'] = $data['username'];
                header('Location: ../dashboard.php');
            } else {
                header('Location: ../index.php?status=warning&msg=Username dan Password yang anda masukkan tidak cocok');
            }
        }
    } else {
        header('Location: ../index.php?status=warning&msg=silakan memasukkan username dan password');
    }
} else {
    header('Location: ../index.php');
}
?>