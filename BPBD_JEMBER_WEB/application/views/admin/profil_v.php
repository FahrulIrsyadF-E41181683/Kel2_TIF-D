<!DOCTYPE html>
<html lang="en">

<head>
    <!-- HEAD MEMANGGIL HEAD YANG ADA DI admin/includes/head.php -->
    <?php $this->load->view("admin/includes/head.php") ?>
</head>

<body class="">
    <!-- SIDEBAR MEMANGGIL SIDEBAR YANG ADA DI admin/includes/sidebar.php -->
    <?php $this->load->view("admin/includes/sidebar.php") ?>

    <!-- SIDEBAR MEMANGGIL NAVBAR YANG ADA DI admin/includes/sidebar.php -->
    <?php $this->load->view("admin/includes/navbar.php") ?>

    <!-- ISI KONTEN HALAMAN -->
    <?php 
    
    foreach ($tb_admin as $ad ) : 
        $id = $ad['ID_ADM'];
    ?>
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                <div class="image">
                    <!-- <img src="../assets/img/damir-bosnjak.jpg" alt="..."> -->
                </div>
                <div class="card-body">
                    <div class="author">
                    <a href="#">
                    <img class="avatar border-gray" src="<?= base_url(). './assets/img/Profile/' . $ad['GAMBAR'];?>" alt="gambar profile">
                    </a>
                    <h5 class="title"><?= $ad['USERNAME'];?></h5>
                    </div>
                    <p class="description text-center">
                    "I like the way you work it <br>
                    No diggity <br>
                    I wanna bag it up"
                    </p>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="button-container">
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Ubah Password</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/profil/update');?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="ID_ADM" id="ID_ADM" value="<?= $id; ?>" hidden>
                    <div class="row">
                        <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>Lembaga</label>
                            <input type="text" class="form-control" disabled="" placeholder="" value="BPBD Kabupaten Jember">
                        </div>
                        </div>
                        <div class="col-md-7 pl-1">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="EMAIL" value="<?= $ad['EMAIL'];?>">
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="NAMA" placeholder="Nama" value="<?= $ad['NAMA'];?>">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Nomer</label>
                            <input type="text" class="form-control" id="nomer" name="NOMER" placeholder="Nomer" value="<?= $ad['NOMER'];?>">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control textarea" name="ALAMAT"><?= $ad['ALAMAT'];?></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="GAMBAR" id="gambar">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Update Profil</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- BATAS ISI KONTEN HALAMAN -->

    <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI admin/includes/footer.php -->
    <?php $this->load->view("admin/includes/footer.php") ?>

    <!-- JS MEMANGGIL JS YANG ADA DI admin/includes/js.php -->
    <?php $this->load->view("admin/includes/js.php") ?>
</body>

</html>