<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'DatabaseConfig.php';

    $con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);
    $username = $_POST['USERNAME'];
    $password = $_POST['PASSWORD'];

    $Sql_Query = "select * from tb_user where USERNAME = '$username' and PASSWORD = '$password'";
    $check = mysqli_fetch_array(mysqli_query($con, $Sql_Query));
    if (isset($check)){
        echo "Data Sesuai";
    } else{
        echo "Data yang dimasukkan salah";
    }
}else{
    echo "Mohon periksa kembali";
}
mysqli_close($con);
?>