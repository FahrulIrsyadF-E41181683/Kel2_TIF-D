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
				<li class="dropdown nav-item">
					<a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="fas fa-user-circle" style="font-size:35px"></i>
					</a>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<?php if ($this->session->userdata('ID_USR') == '') { ?>
							<a href="<?= base_url('auth'); ?>" class="dropdown-item">Login</a>
						<?php } else { ?>
							<p class="dropdown-item">Halo, <?= $this->session->userdata('NAMA') ?></p>
							<hr>
							<a class="dropdown-item" href="<?= base_url('profile/edituser') ?>">User Profile</a>
							<a class="dropdown-item" href="<?= base_url('profile/changePassword') ?>">Ubah Password</a>
							<a href="<?= base_url('auth/logout'); ?>" class="dropdown-item">Logout</a>
						<?php } ?>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>