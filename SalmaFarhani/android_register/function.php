<?php

//koneksi ke database
include 'includes/connector.php';

// if (isset($_POST["register"])) {
//     if (register($_POST) > 0) {
//         echo "<script>
//             alert ('user berhasil ditambah'); </script>';
//           </script>";
//     } else {
//         echo mysqli_error($koneksi);
//     }
// }


function register($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $username = strtolower(stripslashes($data["nama"]));
    $username = strtolower(stripslashes($data["alamat"]));
    $nomer_hp =  mysqli_real_escape_string($koneksi, $data["no_hp"]);
    $email = mysqli_real_escape_string($koneksi, $data["email"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);


    //id autoincrement dari varchar`
    $cri_id = mysqli_query($koneksi, "SELECT max(ID_USR) AS ID_USR FROM tb_user");
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
    //cek username sudah ada atau belum
    $result = mysqli_query($koneksi, "SELECT USERNAME FROM tb_user
WHERE  USERNAME ='$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert ('username sudah terdaftar')
        </script>";
        return false;
    }
    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }

    //enkripsi password
    $password = md5($password);

    //tambah username ke database
    mysqli_query($koneksi, "INSERT INTO tb_user VALUES('$id', '$username', '$nama', '$alamat', '$nomer_hp'
'$email', '$password')");

    return mysqli_affected_rows($koneksi);
}
