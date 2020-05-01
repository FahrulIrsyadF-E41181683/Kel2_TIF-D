<!DOCTYPE html>
<html lang="en">
<!-- HEAD MEMANGGIL HEAD YANG ADA DI includes/head.php -->
<?php $this->load->view("includes/head.php") ?>

<body>
    <!-- NAV MEMANGGIL NAVBAR YANG ADA DI includes/navbar.php -->
    <?php $this->load->view("includes/navbar2.php") ?>
    <!-- END nav -->

    <!-- BAGIAN VERIF -->
    <section class="ftco-section">
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header text-white text-center bg-info">
                            Verifikasi Akun
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group-row d-flex justify-content-center">
                                    <div class="form-group col-sm-6 text-center mr-2 ml-2">
                                        <img id="prev_foto1" width="300px" src="" class="img-responsive img-thumbnail" alt="Preview Image">
                                        <input type="file" class="form-control" id="foto_ktp" accept="image/*">
                                    </div>
                                    <div class="form-group col-sm-6 text-center mr-2 ml-2">
                                        <img id="prev_foto2" width="300px" src="" class="img-responsive img-thumbnail" alt="Preview Image">
                                        <input type="file" class="form-control" id="foto_org" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputNIK" class="col-sm-1 mt-2 col-form-label">NIK</label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="inputPassword" placeholder="Masukkan NIK anda!">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-info">Selesai</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BATAS AKHIR BAGIAN VERIF -->

    <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI includes/footer.php -->
    <?php $this->load->view("includes/footer.php") ?>

    <!-- JS MEMANGGIL JS YANG ADA DI includes/js.php -->
    <?php $this->load->view("includes/js.php") ?>

</body>

</html>