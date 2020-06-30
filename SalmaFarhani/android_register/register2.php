<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    require_once 'connector.php';
    //id autoincrement dari varchar`
        $cri_id = mysqli_query($koneksi, "SELECT max(ID_USR) AS id_user FROM tb_user");
        $cari = mysqli_fetch_array($cri_id);
        $kode = substr($cari['id_user'], 3, 7);
        $id_tbh = $kode + 1;
    
        if ($id_tbh < 10) {
            $id = "USR000" . $id_tbh;
        } else if ($id_tbh >= 10 && $id_tbh < 100) {
            $id = "USR00" . $id_tbh;
        } else {
            $id = "USR0" . $id_tbh;
        }
    

    $id_user= $_POST['id_user'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nomer = $_POST['nomer'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password = password_hash($password, PASSWORD_DEFAULT);

    

    $sql = "INSERT INTO tb_user(ID_USR, USERNAME, NAMA, ALAMAT, NOMER, EMAIL, PASSWORD) VALUES ('$id_user', '$username', '$nama', '$alamat', '$nomer', '$email', '$password')";

    if(mysqli_query($conn, $sql)){
        $result["success"]= "1";
        $result["message"]= "success";

        echo json_encode($result);
        mysqli_close($conn);

    }else{
        $result["success"]= "0";
        $result["message"]= "error";

        echo json_encode($result);
        mysqli_close($conn);
    }
}
?>