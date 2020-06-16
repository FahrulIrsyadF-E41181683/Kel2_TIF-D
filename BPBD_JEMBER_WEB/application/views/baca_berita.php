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
                <div class="col-md-9 col-md-offset-2">
                <input type="text" name="id_brt" class="form-control" id="id_brt" value="<?php echo $tb_berita['ID_BRT']?>" hidden>
                <h3 class="pb-2"><?php echo $tb_berita['JUDUL']?></h3>
                    <div class="col-12  pb-5">
                        <p>
                        <?php foreach($tb_kategori as $kategori):?>
                            <?php if($kategori['ID_KTR'] == $tb_berita['ID_KTR']) : ?>
                                <i class="icon-tag"> <?php echo $kategori['KATEGORI']?></i>
                            <?php endif; ?>
                        <?php endforeach ?> /
                        <i class="icon-calendar"> <?php echo $tb_berita['TANGGAL']?></i> /
                        <?php foreach($tb_user as $user):?>
                            <?php if($user['ID_USR'] == $tb_berita['ID_USR']) : ?>
                                <i class="icon-user"> <?php echo $user['NAMA']?></i>
                            <?php endif; ?>
                        <?php endforeach ?> 
                        </p>
                    <div class="pb-5" style="overflow: hidden; padding: 0; max-width: 800px;">
                        <img src="<?php echo base_url('assets/img/berita_gambar/'.$tb_berita['GAMBAR_BRT'])?>" style="width:100%;">
                    </div>
                    <div class="text-dark" style="max-width: 800px;">
                    <?php echo $tb_berita['ISI_BERITA']?>
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