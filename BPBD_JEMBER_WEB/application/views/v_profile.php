<!DOCTYPE html>
<html lang="en">
<!-- HEAD MEMANGGIL HEAD YANG ADA DI includes/head.php -->
<?php $this->load->view("includes/head.php") ?>

<body>
    <!-- NAV MEMANGGIL NAVBAR YANG ADA DI includes/navbar.php -->
    <?php $this->load->view("includes/navbar2.php") ?>
    <!-- END nav -->
    <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0"><div class="row">
<div class="col-lg-6">
<?= $this->session->flashdata('message');?>
</div>
</div>

<div class="card mb-4" style="max-width: 540px;">
<div class="row no-gutters">
    <div class="col-md-">
      <img src="<?= base_url('assets/img/Profile/default.jpg').$tb_user['GAMBAR'];?>" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Username :<?= $tb_user['USERNAME']; ?></h5>
        <p class="card-text">Password :<?= $tb_user['PASSWORD']; ?></p>
        <p class="card-text">Nama :<?= $tb_user['NAMA']; ?></p>
        <p class="card-text">Alamat :<?= $tb_user['ALAMAT']; ?></p>
        <p class="card-text">No Telepon :<?= $tb_user['NOMER']; ?></p>
        <p class="card-text">Email :<?= $tb_user['EMAIL']; ?></p>
        
        
      </div>
      <div class="col-sm-10">
  <button href="<?= base_url('profile/changePassword'); ?>" type="submit" class="btn btn-primary">Ubah Password</button>
  </div>
  <div class="col-sm-10">
  <button href="<?= base_url('profile/edituser'); ?>" type="submit" class="btn btn-primary">Edit Profil</button>
  </div>
    </div>

  </div>
</div>

    <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI includes/footer.php -->
    <!-- <?php $this->load->view("includes/footer.php") ?> -->

    <!-- JS MEMANGGIL JS YANG ADA DI includes/js.php -->
    <?php $this->load->view("includes/js.php") ?>

</body>

</html>
  