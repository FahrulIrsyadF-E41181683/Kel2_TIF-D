<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['USERNAME'];
    $nama = $_POST['NAMA'];
    $alamat = $_POST['ALAMAT'];
    $nomer = $_POST['NOMER'];
    $email = $_POST['EMAIL'];
    $id = $_POST['ID_USR'];

    require_once 'connector.php';

    $sql = "UPDATE tb_user SET USERNAME='$username', NAMA='$nama', ALAMAT='$alamat', NOMER='$nomer',  EMAIL='$email' WHERE ID_USR='$id' ";

    if(mysqli_query($koneksi, $sql)) {

          $result["success"] = "1";
          $result["message"] = "success";

          echo json_encode($result);
          mysqli_close($conn);
      }
  }

else{

   $result["success"] = "0";
   $result["message"] = "error!";
   echo json_encode($result);

   mysqli_close($koneksi);
}

?>


