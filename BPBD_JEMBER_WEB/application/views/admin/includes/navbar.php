      <!-- Navbar -->

      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-white panel-header">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <h6><a class="navbar-brand"><?php echo ucfirst($this->uri->segment(2)) ?></a></h6>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p class="countnotif"><?= $notifcount > 0 ? $notifcount : '' ?></p>
                  <p>
                    <span class="d-lg-none d-md-block">Notifikasi</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <?php if (!$notif) : ?>
                    <p><i>Tidak ada laporan</i></p>
                  <?php endif; ?>
                  <?php foreach ($notif as $n) : ?>
                    <a class="dropdown-item notif" href="<?= base_url('admin/daftar_laporan') ?>" data-id_laporan="<?= $n['ID_LPR'] ?>"><?= $n['NAMA_PELAPOR'] ?>&nbsp;<b><?= $n['KATEGORI'] ?></b></a>
                  <?php endforeach; ?>
                  <!-- <a class="dropdown-item" href="#">Laporan Bencana</a>
                  <a class="dropdown-item" href="#">Verifikasi User</a> -->
                </div>
              </li>
              <?php if ($this->session->userdata('ID_USR') != '') { ?>
                <li class="nav-item">
                  <a class="nav-link btn-rotate" data-toggle="modal" data-target="#exampleModal">
                    <i class="nc-icon nc-button-power"></i>
                    Logout
                  </a>
                </li>
              <?php } else {
                // $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                // <strong>Silakan login terlebih dahulu!</strong>
                // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                // <span aria-hidden="true">&times;</span>
                // </button>
                // </div>');
                redirect(base_url('auth/logout'));
              } ?>
            </ul>
          </div>
        </div>
      </nav>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Apakah anda yakin ingin Logout?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <a href="<?= base_url('auth/logout'); ?>" type="button" class="btn btn-primary">Iya</a>
            </div>
          </div>
        </div>
      </div>
      <!-- End Navbar -->