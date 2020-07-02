<!DOCTYPE html>
<html lang="en">
<!-- HEAD MEMANGGIL HEAD YANG ADA DI includes/head.php -->
<?php $this->load->view("includes/head.php") ?>

<body>
  <!-- NAV MEMANGGIL NAVBAR YANG ADA DI includes/navbar2.php -->
  <?php $this->load->view("includes/navbar2.php") ?>

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <div id="content">
          <div class="my_info">
            <h2 class="content_title-big mt-3">Ubah Password</h2>
            <hr>

            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('profile/changepassword') ?>" method="post">
              <div class="form-group">
                <label for="current_password">Password Saat ini</label>
                <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password saat ini">
                <?= form_error('current_password', ' <small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="new_password1">Password Baru</label>
                <input type="password" class="form-control" id="new_password1" name="new_password1" placeholder="Password Baru">
                <?= form_error('new_password1', ' <small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <label for="new_password2">Ulangi Password</label>
                <input type="password" class="form-control" id="new_password2" name="new_password2" placeholder="Konfirmasi Password Baru">
                <?= form_error('new_password2', ' <small class="text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-groups mb-3">
                <button type="submit" class="btn btn-primary">Ubah Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI includes/footer.php -->
  <?php $this->load->view("includes/footer.php") ?>
  <!-- JS MEMANGGIL JS YANG ADA DI includes/js.php -->
  <?php $this->load->view("includes/js.php") ?>
  <?php $this->load->view("admin/includes/js.php") ?>
</body>

</html>