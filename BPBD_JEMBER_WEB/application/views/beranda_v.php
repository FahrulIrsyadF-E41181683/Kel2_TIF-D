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
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
            <div class="col-md-12 pt-4">
            <!-- slider -->
            <div class="col-" style="max-width: 100%; float:left;"> 
                <div id="carouselExampleIndicators" class="carousel slide pt-4" data-ride="carousel">
                    <!-- indicator -->
                    <ol class="carousel-indicators">
                    <?php $result = count($tb_berita_baru);?>
                    <?php for($i=0; $i<$result;$i++){
                            echo '
                            <li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"';
                            if($i==0){echo'class="active"';}echo'></li>';
                        }?>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                    <?php $result = count($tb_berita_baru);?>
                    <?php $count=0; $count<$result;?>
                        <?php foreach ($tb_berita_baru as $b):?>
                        
                    <?php
                        if($count == 0){
                            $output = 'active';
                        }
                        else{
                            $output = '';
                        } 
                            echo'
                            <div class="carousel-item '.$output.'" data-slide="'.$count.'">
                            <a href="'.base_url().'beranda/baca/'.$b['ID_BRT'].'"><img src="'.base_url().'assets/img/berita_gambar/'.$b['GAMBAR_BRT'].'" width="1200" height="560" class="" alt="..."></a>
                            <a href="'.base_url().'beranda/baca/'.$b['ID_BRT'].'"><div class="text-left carousel-caption col-sm-12" style="background: rgba(53, 53, 53, 0.8); left:0; bottom:0; ">
                            <h3 class="text-white">'.$b['JUDUL'].'</h3>
                            <p><small class="icon-calendar pr-2"> '.$b['TANGGAL'].'</small>
                                <small class="icon-person pr-2"> '.$b['NAMA'].'</small>
                                <small class="icon-tag"> '.$b['KATEGORI'].'</small></p>
                            </div></a>
                            </div>';
                            $count++;
                        ?>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>    
                </div>
            </div>
            
            </div>
        </div>
    </div>
    </div>
    <div class="hero-wrap" style="background-image: url('<?php echo base_url('assets/img/bg4.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="hero-wrap" style="background: rgba(53, 53, 53, 0.8);" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="col-md-12 p-5 text-center">
                <h3 class="text-white">Terjadi Bencana di sekitar anda?</h3>
                <h5 class="text-white mt-3">Segera hubungi atau laporkan bencana tersebut sebelum terlambat! klik tombol dibawah ini untuk melaporkan bencana</h5>
                <a type="button" class="btn btn-info mt-4 text-white">Lapor Benacana</a>
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
                    <?php foreach ($tb_berita as $berita):?>
                    <a href="<?php echo base_url(); ?>beranda/baca/<?php echo $berita['ID_BRT']; ?>">
                    <div class="card mb-4 border-0" >
                        <div class="row no-gutters">
                            <div class="col-4" style="overflow: hidden; padding: 0; max-width: 300px;">
                            <img src="<?php echo base_url('assets/img/berita_gambar/'.$berita['GAMBAR_BRT'])?>" class="thumbnail carousel-inner" alt="..." style="max-height: 200px; display: block; margin: auto; width: 100%;">
                            </div>
                            <div class="col-8">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $berita["JUDUL"]?></h4>
                                <div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width:500px">
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
                    <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27">
                        <?php echo $this->pagination->create_links(); ?>
                        <!-- <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul> -->
                        </div>
                    </div>
                    </div>
                </div>

                <!-- SIDEBAR MEMANGGIL SIDEBAR YANG ADA DI includes/sidebar.php -->
                <?php $this->load->view("includes/sidebar.php") ?>

    </section>
    <!-- BATAS BERITA -->

    <!-- BAGIAN ABOUT -->
    <div class="pb-5" id="tentang"></div>
    <div class="hero-wrap" style="background-image: url('<?php echo base_url('assets/img/bg2.jpg') ?>');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center text-center justify-content-start" data-scrollax-parent="true">
                <div class="col-md-12 p-4">
                    <div class="col-md">
          			<img src="<?php echo base_url('assets/img/logo.png')?>" width="400" height="400" style="max-width: 100%; height: auto; float:left; padding:50px;">
                    </div>
                    <div class="col-md mr-5 mt-5 pt-5 text-justify">
                    <h2 class="text-white pb-4">BPBD PROVENSI JEMBER</h2>
                    <p class="">Badan Penanggulangan Bencana Daerah adalah lembaga pemerintah non-departemen yang melaksanakan tugas penanggulangan bencana di daerah baik Provinsi maupun Kabupaten/ Kota dengan berpedoman pada kebijakan yang ditetapkan oleh Badan Nasional Penanggulangan Bencana</p>
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
            <h5 class=" mx-auto">Silahkan isi formulir dibawah ini jika anda memiliki pertanyaan atau kritik dan saran.</h5>
            <form action="contact_us.php" method="post">
                <div class="row text-left mt-5">
                    <div class="col-md pr-5">
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
    <div class="col-md pt-3" style="padding-right:0px;">
        <div class="row text-left justify-content-center">
            <div class="col-2 border-left"></div>
            <div class="col-md">
                <p>
                <i class="fa fa-tag fa-1x icon-pencil" style="float:left; margin:0 8px 4px 0;"></i> BPBD KAB.JEMBER<br> Jl. Danau Toba No.30, Lingkungan Panji, Tegalgede, Kec.Sumbersari, Kabupaten Jember, Jawa Timur <br>68124
                </p>
            </div>
        </div>
        <div class="row text-left justify-content-center">
            <div class="col-2 border-left"></div>
            <div class="col-md">
                <p>
                <i class="fa fa-phone fa-1x icon-phone" style="float:left; margin:0 8px 4px 0;"></i> +62 85 101 767 00 (Hp) <br> (0331) 3229665 (Telp)
                </p>
            </div>
        </div>
        <div class="row text-left justify-content-center">
            <div class="col-2 border-left"></div>
            <div class="col-md">
                <p>
                <i class="fa fa-envelope fa-1x icon-envelope" style="float:left; margin:0 8px 4px 0;"></i> ********@gmail.com
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