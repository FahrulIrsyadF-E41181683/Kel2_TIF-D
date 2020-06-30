<!DOCTYPE html>
<html lang="en">

<head>
    <!-- HEAD MEMANGGIL HEAD YANG ADA DI admin/includes/head.php -->
    <?php $this->load->view("admin/includes/head.php") ?>
</head>

<body id="">
    <!-- SIDEBAR MEMANGGIL SIDEBAR YANG ADA DI admin/includes/sidebar.php -->
    <?php $this->load->view("admin/includes/sidebar.php") ?>

    <!-- SIDEBAR MEMANGGIL NAVBAR YANG ADA DI admin/includes/sidebar.php -->
    <?php $this->load->view("admin/includes/navbar.php") ?>

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
                                    <label for="judul">Nama Kategori</label>
                                    <input type="text" value="<?= isset($kategori) ? $kategori['KATEGORI'] : '' ?>" name="kategori" class="form-control <?php echo form_error('kategori') ? 'is-invalid' : '' ?>" id="judul">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('kategori') ?>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-12 pb-3">
                        <!-- input isi berita -->
                        <div class="form-group col-md-12 pb-3">
                            <label for="isi_berita">Deskripsi Kategori</label>
                            <textarea id="ckeditor" name="desk_kategori" class="form-control <?php echo form_error('desk_kategori') ? 'is-invalid' : '' ?>"><?= isset($kategori) ? $kategori['KETERANGAN'] : '' ?></textarea>
                            <div class="invalid-feedback">
                                <?php echo form_error('desk_kategori') ?>
                            </div>
                        </div>
                        <!-- tombol simpan -->
                        <button type="submit" name="tambah" class="btn btn-primary float-right "><?= isset($kategori) ? 'Edit Data' : 'Tambah Data' ?></button>
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