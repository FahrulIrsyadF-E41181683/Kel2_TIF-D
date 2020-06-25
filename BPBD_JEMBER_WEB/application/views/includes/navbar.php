<nav class="navbar px-md-0 navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="<?php echo base_url('beranda') ?>"> <img src="<?php echo base_url('assets/img/logo.png') ?>" style="height:45px; padding-right:10px;"> BPBD<i> KAB.JEMBER</i></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>

		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto" id="nav">
				<li class="nav-item"><a href="#beranda" class="nav-link">Beranda</a></li>
				<li class="nav-item"><a href="#berita" class="nav-link">Berita</a></li>
				<li class="nav-item"><a href="#tentang" class="nav-link">Tentang</a></li>
				<li class="nav-item"><a href="#kontak" class="nav-link">Kontak</a></li>
				<li class="nav-item"><a href="<?= base_url('laporan'); ?>" class="nav-link">Lapor Bencana</a></li>
				<?php if ($this->session->userdata('ID_USR') == '') { ?>
				<li class="nav-item"><a href="<?= base_url('auth'); ?>" class="nav-link">Login</a></li>
				<?php }else{ ?>
				<li class="nav-item"><a href="<?= base_url('auth/logout'); ?>" class="nav-link">Logout</a></li>
				<?php }?>
			</ul>
		</div>
	</div>
</nav>