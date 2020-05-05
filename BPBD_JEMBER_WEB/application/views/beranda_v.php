<!DOCTYPE html>
<html lang="en">
<!-- HEAD MEMANGGIL HEAD YANG ADA DI includes/head.php -->
<?php $this->load->view("includes/head.php") ?>

<body>
    <!-- NAV MEMANGGIL NAVBAR YANG ADA DI includes/navbar.php -->
    <?php $this->load->view("includes/navbar.php") ?>
    <!-- END nav -->

    <!-- BAGIAN BERITA TERBARU -->
    <div id="beranda"></div>
    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url('assets/img/bg1.jpg') ?>');" data-stellar-background-ratio="0.5">
        <div class="overlay">
        </div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-12">
                    <div id="berita1">
                        <div class="col-6 float-left">
                            <div class="card bg-dark text-white">
                                <div>
                                    <img src="<?php echo base_url('assets/img/bg1.jpg')?>" class="card-img" alt="...">
                                    <div class="bagian card-img-overlay pt-5">
                                        <h5 class="card-title" style="color: white"><u>Berita</u></h5>
                                        <p class="card-text text-white"><small class="icon-calendar pr-2"> 24 April 2020</small>
                                        <small class="icon-person pr-2"> Admin</small>
                                        <small class="icon-chat"> 19</small></p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-6 float-right pb-4">
                            <div id="berita2" class="card bg-dark text-white">
                                <div>
                                    <img src="<?php echo base_url('assets/img/berita.jpg')?>" class="card-img" alt="..." style="height:210px; weight:10px;">
                                    <div class="card-img-overlay pt-5" style="margin-top: 60px ">
                                        <h5 class="card-title" style="color: white"><u>Berita</u></h5>
                                        <p class="card-text text-white"><small class="icon-calendar pr-2"> 24 April 2020</small>
                                        <small class="icon-person pr-2"> Admin</small>
                                        <small class="icon-chat"> 19</small></p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="col-6 float-right">
                            <div id="berita3" class="card bg-dark text-white">
                                <div>
                                    <img src="<?php echo base_url('assets/img/berita.jpg')?>" class="card-img" alt="..." style="height:210px; weight:10px;">
                                    <div class="card-img-overlay pt-5" style="margin-top: 60px ">
                                        <h5 class="card-title" style="color: white"><u>Berita</u></h5>
                                        <p class="card-text text-white"><small class="icon-calendar pr-2"> 24 April 2020</small>
                                        <small class="icon-person pr-2"> Admin</small>
                                        <small class="icon-chat"> 19</small></p>
                                    </div>    
                                </div>
                            </div>
                        </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- BATAS -->

    <!-- BAGIAN BERITA -->
    <div id="berita"></div>
    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                <h4 class="pb-4">Dafter Berita</h4>
                    <div class="card mb-4 border-0" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="<?php echo base_url('assets/img/berita.jpg')?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Berita 1</h5>
                                <p class="card-text"><small class="text-muted icon-calendar pr-2"> 24 April 2020</small>
                                <small class="text-muted icon-person pr-2"> Admin</small>
                                <small class="text-muted icon-chat"> 19</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 border-0" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="<?php echo base_url('assets/img/berita.jpg')?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Berita 1</h5>
                                <p class="card-text"><small class="text-muted icon-calendar pr-2"> 24 April 2020</small>
                                <small class="text-muted icon-person pr-2"> Admin</small>
                                <small class="text-muted icon-chat"> 19</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 border-0" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="<?php echo base_url('assets/img/berita.jpg')?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Berita 1</h5>
                                <p class="card-text"><small class="text-muted icon-calendar pr-2"> 24 April 2020</small>
                                <small class="text-muted icon-person pr-2"> Admin</small>
                                <small class="text-muted icon-chat"> 19</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 border-0" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="<?php echo base_url('assets/img/berita.jpg')?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Berita 1</h5>
                                <p class="card-text"><small class="text-muted icon-calendar pr-2"> 24 April 2020</small>
                                <small class="text-muted icon-person pr-2"> Admin</small>
                                <small class="text-muted icon-chat"> 19</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 border-0" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                            <img src="<?php echo base_url('assets/img/berita.jpg')?>" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Berita 1</h5>
                                <p class="card-text"><small class="text-muted icon-calendar pr-2"> 24 April 2020</small>
                                <small class="text-muted icon-person pr-2"> Admin</small>
                                <small class="text-muted icon-chat"> 19</small></p>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                    <div class="col text-center pb-5">
                        <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- SIDEBAR MEMANGGIL SIDEBAR YANG ADA DI includes/sidebar.php -->
                <?php $this->load->view("includes/sidebar.php") ?>

    </section>
    <!-- BATAS BERITA -->

    <!-- BAGIAN ABOUT -->
    <div id="tentang"></div>
    <div class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url('assets/img/bg2.jpg') ?>');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-12">
                    <div class="col-3 float-left">
          			<img src="<?php echo base_url('assets/img/logo.png')?>" alt="">
                    </div>
                    <div class="col-7 mt-5 pt-5 pb-5 float-right border-left">
                    <h2 class="text-white pb-4 pl-5">BPBD PROV.JEMBER</h2>
                    <p class="pl-5">Badan Penanggulangan Bencana Daerah adalah lembaga pemerintah non-departemen yang melaksanakan tugas penanggulangan bencana di daerah baik Provinsi maupun Kabupaten/ Kota dengan berpedoman pada kebijakan yang ditetapkan oleh Badan Nasional Penanggulangan Bencana</p>
                    </div>
          		</div>
            </div>
        </div>
    </div>
    <!-- BATAS ABOUT -->

    <!-- BAGIAN KONTAK -->
    <div id="kontak"></div>
    <div class="container">
        <section id="contact" class="pt-4 my-5 font-m-light text-center">
            <h2 class="font-m-bold pt-5">KONTAK</h2>
            <h5 class="w-75 mx-auto">Silahkan isi formulir dibawah ini jika anda memiliki pertanyaan atau kritik dan saran.</h5>
            <form action="contact_us.php" method="post">
                <div class="row text-left mt-5">
                    <div class="col-6">
                        <div class="form-group">
                            <input type="text" class="form-control border-right-0 border-left-0 border-top-0" id="kontak_nama" name="kontak_nama" aria-describedby="usernameHelp" placeholder="Masukkan Nama" required pattern="^[A-Za-z -.]+$" title="Mohon masukkan hanya huruf">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control border-right-0 border-left-0 border-top-0" id="kontak_email" name="kontak_email" aria-describedby="usernameHelp" placeholder="Masukkan Email" required title="Mohon masukkan Email Valid">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control border-right-0 border-left-0 border-top-0" id="kontak_telepon" name="kontak_telepon" aria-describedby="usernameHelp" placeholder="Masukkan Telepon/HP" required pattern="[0-9 ()]{12,13}" title="Mohon masukkan hanya angka dan ( ), 12 - 13 digit">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control border-right-0 border-left-0 border-top-0" id="kontak_subject" name="kontak_subject" aria-describedby="usernameHelp" placeholder="Masukkan Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="kontak_pesan" id="kontak_pesan" class="form-control border-right-0 border-left-0 border-top-0" placeholder="Tuliskan pesan yang anda kirimkan, minimal 20 karakter" required minlength=20 title="Kirim Komplain, Request Produk, dan Mulai kerja sama perusahaan dengan cara menghubungi kami dan mengisi form ini."></textarea>
                        </div>
                        <div class="form-froup text-right">
                            <input type="submit" name="kontak_kirim" id="kontak_kirim" class="btn btn-primary" value="KIRIM">
                        </div>
            </form>
    </div>
    <div class="col-6 text-center">
        <div class="row text-left justify-content-center">
            <div class="col-1 text-right border-left">
                <p><i class="fa fa-tag fa-1x icon-pencil"></i></p>
            </div>
            <div class="col-6">
                <p>
                    BPBD KAB.JEMBER<br> Jl. Danau Toba No.30, Lingkungan Panji, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur <br>68124
                </p>
            </div>
        </div>
        <div class="row text-left justify-content-center">
            <div class="col-1 text-right border-left">
                <p><i class="fa fa-phone fa-1x icon-phone"></i></p>
            </div>
            <div class="col-6">
                <p>
                    +62 85 101 767 00 (Hp) <br> (0331) 3229665 (Telp)
                </p>
            </div>
        </div>
        <div class="row text-left justify-content-center">
            <div class="col-1 text-right border-left">
                <p><i class="fa fa-envelope fa-1x icon-envelope"></i></p>
            </div>
            <div class="col-6">
                <p>
                    ********@gmail.com
                </p>
            </div>
        </div>
    </div>
    </div>
    </section>
    </div>
    <!-- BATAS KONTAK -->

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.46831333133!2d113.71519574506495!3d-8.15548077784726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b3675f7995%3A0xa0f959a7e37dc91e!2sBadan%20Penanggulangan%20Bencana%20Daerah%20(BPBD)!5e0!3m2!1sen!2sid!4v1585912403847!5m2!1sen!2sid" width="100%" height="350" frameborder="0" style="padding:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI includes/footer.php -->
    <?php $this->load->view("includes/footer.php") ?>

    <!-- JS MEMANGGIL JS YANG ADA DI includes/js.php -->
    <?php $this->load->view("includes/js.php") ?>

</body>

</html>