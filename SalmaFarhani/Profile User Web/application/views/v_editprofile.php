<div id="content">
				<div class="my_info">
					<h2 class="content_title-big">Edit Profile</h2>
					<div class="my_info_area">
						<h3 class="my_info_title">Akun</h3>
	
    <!-- agar bisa mengupload atau mengedit file image -->
<?= form_open_multipart('profile/edit');?>
<div class="form-group row">
    <label for="USERNAME" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="USERNAME" name="USERNAME" value="<?= $user['USERNAME'];?>">
      <?= form_error('USERNAME', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="PASSWORD" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="PASSWORD" class="form-control" id="PASSWORD" name="PASSWORD" value="<?= $user['PASSWORD'];?>">
      <?= form_error('PASSWORD', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="NAMA" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="NAMA" name="NAMA" value="<?= $user['NAMA'];?>">
      <?= form_error('NAMA', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['ALAMAT'];?>">
      <?= form_error('alamat', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="NOMER" class="col-sm-2 col-form-label">Nomer Hp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="NOMER" name="NOMER" value="<?= $user['NOMER'];?>">
      <?= form_error('NOMER', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="EMAIL" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="EMAIL" name="EMAIL" value="<?= $user['EMAIL'];?>">
      <?= form_error('EMAIL', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Image</div>
    <div class="col-sm-10">
    <div class="row">
    <div class="col-sm-3">
    <img src="<?= base_url('assets/img/profile/'). $user['GAMBAR'];?>" class="img-thumbnail">
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

