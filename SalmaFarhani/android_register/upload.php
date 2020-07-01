<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['ID_USR'];
    $photo = $_POST['GAMBAR'];

    $path = "profile_image/$id.jpeg";
    $finalPath = "http://192.168.1.104/android_register/".$path;

    require_once 'connector.php';

    $sql = "UPDATE tb_user SET GAMBAR='$finalPath' WHERE ID='$id' ";

    if (mysqli_query($koneksi, $sql)) {
        
        if ( file_put_contents( $path, base64_decode($photo) ) ) {
            
            $result['success'] = "1";
            $result['message'] = "success";

            echo json_encode($result);
            mysqli_close($koneksi);

        }

    }

}

?>