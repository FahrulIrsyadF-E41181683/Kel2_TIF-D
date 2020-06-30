<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $id = $_POST['ID_USR'];

    require_once 'connector.php';

    $sql = "SELECT * FROM tb_user WHERE ID_USR='$id' ";

    $response = mysqli_query($koneksi, $sql);

    $result = array();
    $result['read'] = array();

    if( mysqli_num_rows($response) === 1 ) {
        
        if ($row = mysqli_fetch_assoc($response)) {
 
             $h['USERNAME']        = $row['USERNAME'] ;
             $h['NAMA']       = $row['NAMA'] ;
             $h['ALAMAT']       = $row['ALAMAT'] ;
             $h['NOMER']       = $row['NOMER'] ;
             $h['EMAIL']       = $row['EMAIL'] ;
 
             array_push($result["read"], $h);
 
             $result["success"] = "1";
             echo json_encode($result);
        }
 
   }
 
 }else {
 
     $result["success"] = "0";
     $result["message"] = "Error!";
     echo json_encode($result);
 
     mysqli_close($koneksi);
 }
 
 ?>