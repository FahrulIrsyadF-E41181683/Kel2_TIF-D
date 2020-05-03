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
        <div class="card-body p-0"><div id="content">
				<div class="my_info">
					<h2 class="content_title-big">Edit Profile</h2>
					<div class="my_info_area">
						<h3 class="my_info_title">Akun</h3>
	
    <!-- agar bisa mengupload atau mengedit file image -->
<?= form_open_multipart('profile/edit');?>
<div class="form-group row">
    <label for="USERNAME" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="USERNAME" name="USERNAME" value="<?= $tb_user['USERNAME'];?>">
      <?= form_error('USERNAME', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="PASSWORD" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="PASSWORD" class="form-control" id="PASSWORD" name="PASSWORD" value="<?= $tb_user['PASSWORD'];?>">
      <?= form_error('PASSWORD', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="NAMA" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="NAMA" name="NAMA" value="<?= $tb_user['NAMA'];?>">
      <?= form_error('NAMA', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="ALAMAT" name="ALAMAT" value="<?= $tb_user['ALAMAT'];?>">
      <?= form_error('ALAMAT', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="NOMER" class="col-sm-2 col-form-label">Nomer Hp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="NOMER" name="NOMER" value="<?= $tb_user['NOMER'];?>">
      <?= form_error('NOMER', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="EMAIL" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="EMAIL" name="EMAIL" value="<?= $tb_user['EMAIL'];?>">
      <?= form_error('EMAIL', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Image</div>
    <div class="col-sm-10">
    <div class="row">
    <div class="col-sm-3">
    <img src="<?= base_url('assets/img/profile/'). $tb_user['GAMBAR'];?>" class="img-thumbnail">
    </div>
    <div class="col-sm-9">
    <div class="custom-file">
  <input type="file" class="custom-file-input" id="GAMBAR" name="GAMBAR">
  <label class="custom-file-label" for="GAMBAR">Choose file</label>
</div>

    </div>
    </div>
    </div>
    </div>
  </div>
  <div class="form-group row justify-content-end">
  <div class="col-sm-10">
  <button type="submit" class="btn btn-primary">Edit</button>
  </div>
  </div>
</form>
						
					</div>
					</div>
					</div>

  <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI includes/footer.php -->
    <!-- <?php $this->load->view("includes/footer.php") ?> -->

    <!-- JS MEMANGGIL JS YANG ADA DI includes/js.php -->
    <?php $this->load->view("includes/js.php") ?>

</body>

</html>

