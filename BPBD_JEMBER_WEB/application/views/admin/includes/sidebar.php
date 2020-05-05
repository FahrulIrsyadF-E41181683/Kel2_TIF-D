<div class="wrapper ">
    <div class="sidebar" data-color="black" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php echo base_url('assets/img/logo.png')?>">
          </div>
        </a>
        <a class="simple-text logo-normal">
            <?php echo SITE_NAME?>
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <div class="col-md mt-3">
            <p class="text-white">Home</p>
          </div>
          <li class="nav-item <?php echo $this->uri->segment(2) == 'dashboard' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('admin/dashboard') ?>">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item <?php echo $this->uri->segment(2) == 'berita' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('admin/berita') ?>">
              <i class="nc-icon nc-paper"></i>
              <p>Data Berita</p>
            </a>
          </li>
          <li class="nav-item <?php echo $this->uri->segment(2) == 'kategori' ? 'active': '' ?>">
            <a href="<?php echo base_url('admin/kategori')?>">
              <i class="nc-icon nc-tag-content"></i>
              <p>Kategori</p>
            </a>
          </li>
          <div class="col-md mt-3">
            <p class="text-white">Setting</p>
          </div>
          <li class="nav-item <?php echo $this->uri->segment(2) == 'profil' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('admin/profil') ?>">
            <i class="nc-icon nc-single-02"></i>
              <p>Profil</p>
            </a>
          </li>
          <li class="nav-item <?php echo $this->uri->segment(2) == 'daftar_admin' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('admin/daftar_admin') ?>">
              <i class="nc-icon nc-badge"></i>
              <p>Daftar Admin</p>
            </a>
          </li>
          <li class="nav-item <?php echo $this->uri->segment(2) == 'listuser' ? 'active': '' ?>">
            <a class="nav-link" href="<?php echo site_url('admin/listuser') ?>">
              <i class="nc-icon nc-book-bookmark"></i>
              <p>Daftar Pengguna</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">