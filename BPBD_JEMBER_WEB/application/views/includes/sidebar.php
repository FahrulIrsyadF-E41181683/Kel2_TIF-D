<div class="col-lg-3 sidebar pl-lg-0 pr-0">
    <div class="sidebar-box">
        <form action="<?php echo base_url('beranda/daftar')?>" method="get" class="search-form">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" name="cari" class="form-control" placeholder="Pencarian" autocomplete="off">
            </div>
        </form>
    </div>

    <!-- Kategori sidebar -->
    <div class="sidebar-box ">
        <div class="categories">
        <h3>Kategori</h3>
        <?php foreach($tb_kategori as $kategori):?>
            <form action="<?php echo base_url('beranda/daftar')?>" method="get">
            <input type="text" name="cari" value="<?php echo $kategori['ID_KTR']?>" hidden>
            <input class="btn btn btn-secondry mb-2 text-left" type="submit" value="<?php echo $kategori['KATEGORI']?>" style="width:100%;">
            </form>
        <?php endforeach; ?>
        </div>
    </div>

    <!-- Berita Terbaru sidebar -->
    <div class="sidebar-box ">
        <h3>Berita Terbaru</h3>
        <?php foreach($tb_berita_baru as $berita):?>
        <div class="block-21 d-flex">
            <a href="<?php echo base_url(); ?>beranda/baca/<?php echo $berita['ID_BRT']; ?>" class="blog-img mr-4"><img src="<?php echo base_url('assets/img/berita_gambar/'.$berita['GAMBAR_BRT'])?>" class="card-img" alt="..."></a>
            <div class="text" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis; max-width:500px">
                <h4 class="heading"><a href="<?php echo base_url(); ?>beranda/baca/<?php echo $berita['ID_BRT']; ?>"><?php echo $berita['JUDUL'] ?></a></h4>
                <div class="meta">
                    <div><a href="<?php echo base_url(); ?>beranda/baca/<?php echo $berita['ID_BRT']; ?>"><span class="icon-calendar"></span> <?php echo $berita['TANGGAL'] ?></a></div>
                    <div><a href="<?php echo base_url(); ?>beranda/baca/<?php echo $berita['ID_BRT']; ?>"><span class="icon-person"></span> <?php echo $berita['NAMA'] ?></a></div>
                </div>
            </div>
        </div>
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