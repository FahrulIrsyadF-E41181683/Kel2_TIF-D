<?php

if($_SERVER['REQUEST_METHOD']== 'POST'){
    

    include 'DatabaseConfig.php';
    $con =  mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);
   
        //id autoincrement dari varchar
        $cri_id = mysqli_query($con, "SELECT max(ID_USR) AS ID_USR FROM tb_user");
        $cari = mysqli_fetch_array($cri_id);
        $kode = substr($cari['ID_USR'], 2, 5);
        $id_tbh = $kode + 1;
    
        if ($id_tbh < 10) {
            $id = "USR000" . $id_tbh;
        } else if ($id_tbh >= 10 && $id_tbh < 100) {
            $id = "USR00" . $id_tbh;
        } else {
            $id = "USR0" . $id_tbh;
        }

    $Username = $_POST['USERNAME'];
    $Nama = $_POST['NAMA'];
    $Alamat = $_POST['ALAMAT'];
    $Nomer = $_POST['NOMER'];
    $Email = $_POST['EMAIL'];
    $Password = $_POST['PASSWORD'];
    $CheckSQL = "SELECT * FROM tb_user WHERE USERNAME= '$Username'";
    $check = mysqli_fetch_array(mysqli_query($con, $CheckSQL));
    if(isset($check)){
        echo 'Username telah terdaftar, Mohon masukkan Username yang lain.';
    }else{
        $Sql_Query = "INSERT INTO tb_user (ID_USR, USERNAME, NAMA, ALAMAT, NOMER, EMAIL, PASSWORD) values($id, $Username, $Nama, $Alamat, $Nomer, $Email, $Password)";
        if(mysqli_query($con, $Sql_Query))
        {
            echo 'User berhasil ditambahkan';
        }else{
            echo 'Terjadi kesalahan dalam mendaftarkan user';
        } 
    }
}
    
    
mysqli_close($con);


?>