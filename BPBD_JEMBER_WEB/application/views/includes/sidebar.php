<div class="col-lg-3 sidebar pl-lg-0 pr-0">
    <div class="sidebar-box">
        <form action="#" class="search-form">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Pencarian">
            </div>
        </form>
    </div>

    <!-- Kategori sidebar -->
    <div class="sidebar-box ">
        <div class="categories">
        <h3>Kategori</h3>
        <?php foreach($tb_kategori as $kategori):?>
            <li><a href="#"><?php echo $kategori['KATEGORI']?><span class="ion-ios-arrow-forward"></span></a></li>
        <?php endforeach; ?>
        </div>
    </div>

    <!-- Berita Terbaru sidebar -->
    <div class="sidebar-box ">
        <h3>Berita Terbaru</h3>
        <?php foreach($tb_berita as $berita):?>
        <?php if($berita['STATUS_BRT'] == 1) : ?>
        <div class="block-21 d-flex">
            <a class="blog-img mr-4"><img src="<?php echo base_url('assets/img/berita_gambar/'.$berita['GAMBAR_BRT'])?>" class="card-img" alt="..."></a>
            <div class="text">
                <h3 class="heading"><a href="#"><?php echo $berita['JUDUL'] ?></a></h3>
                <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php echo $berita['TANGGAL'] ?></a></div>
                    <div><a href="#"><span class="icon-person"></span> <?php echo $berita['NAMA'] ?></a></div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach ?>
    </div>

    <!-- Sosial Media sidebar -->
    <div class="sidebar-box ">
        <h3>Sosial Media</h3>
            <a href="https://twitter.com/pusdalops_jbr"><span class="icon-twitter p-2" style="font-size:40px;"></span></a>
		    <a href="https://www.facebook.com/bpbd.jember"><span class="icon-facebook p-2" style="font-size:40px;"></span></a>
			<a href="https://www.instagram.com/pusdalops_jember/"><span class="icon-instagram p-2" style="font-size:40px;"></span></a>
    </div>

</div>