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
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" class="form-control <?php echo form_error('judul') ? 'is-invalid' : '' ?>" id="judul">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('judul') ?>
                                    </div>
                                </div>
                                <!-- input combobox kategori berdasarkan db -->
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori">
                                        <?php foreach ($tb_kategori as $kategori) : ?>
                                            <option value="<?php echo $kategori['ID_KTR'] ?>"><?php echo $kategori['KATEGORI'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <!-- input tanggal -->
                                <div class="form-group">
                                    <label for="judul">Tanggal</label>
                                    <input type="text" id="datepicker" class="form-control <?php echo form_error('tanggal') ? 'is-invalid' : '' ?>" name="tanggal">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('tanggal') ?>
                                    </div>
                                </div>
                                <!-- input lokasi -->
                                <div class="form-group">
                                    <label for="lokasi">Lokasi</label>
                                    <input type="text" class="form-control <?php echo form_error('lokasi') ? 'is-invalid' : '' ?>" id="lokasi" name="lokasi">
                                    <div class="invalid-feedback">
                                        <?php echo form_error('lokasi') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 float-right">
                                <div class="from-group col-md-11">
                                    <label for="name">Gambar</label>
                                    <!-- gambar priview -->
                                    <div class="imgWrap pb-2">
                                        <img src="<?php echo base_url('assets/img/berita_gambar/default.png') ?>" id="imgView" class="card-img-top img-fluid">
                                    </div>
                                    <!-- input gambar -->
                                    <div class="custom-file">
                                        <input type="file" id="inputFile" name="gambar" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" name="gambar" for="inputFile">Pilih Gambar Thumbnail Berita</label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <input type="text" class="form-control" value="<?php echo $ID_USER?>" id="user" name="user" hidden>
                    <div class="col-md-12 pb-3">
                        <!-- input isi berita -->
                        <div class="form-group col-md-12 pb-3">
                            <label for="isi_berita">Isi Berita</label>
                            <textarea id="ckeditor" name="isi_berita" class="form-control <?php echo form_error('isi_berita') ? 'is-invalid' : '' ?>"></textarea>
                            <div class="invalid-feedback">
                                <?php echo form_error('isi_berita') ?>
                            </div>
                        </div>
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