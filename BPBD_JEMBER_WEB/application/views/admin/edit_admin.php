<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body id="">


    <!-- ISI KONTEN HALAMAN -->

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">
                    <?php $this->load->view("admin/includes/breadcrumb.php") ?>
                </div>
                <div class="card card-stats">
                    <div class="card-body col-md-12">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-7 float-left">
                                <!-- input judul -->
                                <div class="form-group">
                                    <label for="judul">Nama</label>
                                    <input type="text" name="nama" class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" id="nama" value="<?= $admin['NAMA']; ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nama') ?>
                                    </div>
                                </div>
                                <!-- input alamat -->
                                <div class="form-group">
                                    <label for="judul">Alamat</label>
                                    <input type="text" class="form-control <?php echo form_error('alamat') ? 'is-invalid' : '' ?>" name="alamat" value="<?= $admin['ALAMAT']; ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('alamat') ?>
                                    </div>
                                </div>
                                <!-- input nomor -->
                                <div class="form-group">
                                    <label for="judul">Nomor</label>
                                    <input type="text" class="form-control <?php echo form_error('nomor') ? 'is-invalid' : '' ?>" name="nomor" value="<?= $admin['NOMER']; ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('nomor') ?>
                                    </div>
                                </div>
                                <!-- input email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= $admin['EMAIL']; ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('email') ?>
                                    </div>
                                </div>
                                <!-- input username -->
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control <?php echo form_error('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= $admin['USERNAME']; ?>">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('username') ?>
                                    </div>
                                </div>
                                <!-- input password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('password') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 float-right">
                                <div class="from-group col-md-11">
                                    <label for="name">Gambar</label>
                                    <!-- gambar priview -->
                                    <div class="imgWrap pb-2">
                                        <img src="<?php echo $admin['GAMBAR'] == 'default.png' ? base_url('assets/img/berita_gambar/default.png') : base_url('assets/img/Profile/') . $admin['GAMBAR'] ?>" id="imgView" class="card-img-top img-fluid">
                                    </div>
                                    <!-- input gambar -->
                                    <div class="custom-file">
                                        <input type="file" id="inputFile" name="gambar" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" name="gambar" for="inputFile">Ganti Gambar</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 pb-3">
                        <!-- tombol simpan -->
                        <button type="submit" value="upload" name="tambah" class="btn btn-primary float-right ">Tambah Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- BATAS ISI KONTEN HALAMAN -->

    <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI admin/includes/footer.php -->
    <?php $this->load->view("admin/includes/footer.php") ?>

    <!-- JS MEMANGGIL JS YANG ADA DI admin/includes/js.php -->
    <?php $this->load->view("admin/includes/js.php") ?>

</body>

</html>