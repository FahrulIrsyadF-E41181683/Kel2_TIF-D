<!DOCTYPE html>
<html lang="en">
<!-- HEAD MEMANGGIL HEAD YANG ADA DI includes/head.php -->
<?php $this->load->view("includes/head.php") ?>

<body>
    <!-- NAV MEMANGGIL NAVBAR YANG ADA DI includes/navbar.php -->
    <?php $this->load->view("includes/navbar2.php") ?>
    <!-- END nav -->

    <!-- BAGIAN BERITA -->
    <section class="pt-5 ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 pb-5">
                <h4 class="pb-4">Hasil Pencarian : </h4>
                    <?php foreach ($tb_berita as $berita):?>
                    <a href="<?php echo base_url(); ?>beranda/baca/<?php echo $berita['ID_BRT']; ?>">
                    <div class="card mb-4 border-0" >
                        <div class="row no-gutters">
                            <div class="col-4" style="overflow: hidden; padding: 0; max-width: 280px;">
                            <img src="<?php echo base_url('assets/img/berita_gambar/'.$berita['GAMBAR_BRT'])?>" class="thumbnail carousel-inner" alt="..." style="max-height: 200px; display: block; margin: auto; width: 100%;">
                            </div>
                            <div class="col-8">
                            <div class="card-body">
                                <div style="overflow: hidden; white-space: nowrap; max-width:500px; max-height:100px;">
                                <h4 class="card-title"><?php echo $berita["JUDUL"]?></h4>
                                <small class="card-text text-muted"><?php echo $berita["ISI_BERITA"]?></small>
                                </div>
                                <p class="card-text"><small class="text-muted icon-calendar pr-2"> <?php echo $berita['TANGGAL']?></small>
                                <small class="text-muted icon-person pr-2"> <?php echo $berita['NAMA']?></small>
                                <small class="text-muted icon-tag"> <?php echo $berita['KATEGORI']?></small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php endforeach ?>
                    <!-- menampilkan peringatan jika data tidak ada -->
                    <?php if (empty($tb_berita)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>Berita yang anda cari tidak ditemukan</span>
                        </div>
                    <?php endif ?> 
                    <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                        <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                    </div>
                </div>
                

                <!-- SIDEBAR MEMANGGIL SIDEBAR YANG ADA DI includes/sidebar.php -->
                <?php $this->load->view("includes/sidebar.php") ?>

    </section>
    <!-- BATAS BERITA -->

    <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI includes/footer.php -->
    <?php $this->load->view("includes/footer.php") ?>

    <!-- JS MEMANGGIL JS YANG ADA DI includes/js.php -->
    <?php $this->load->view("includes/js.php") ?>

</body>

</html>