<div id="content">
				<div class="my_info">
					<h2 class="content_title-big">Edit Profile</h2>
					<div class="my_info_area">
						<h3 class="my_info_title">Akun</h3>
	
    <!-- agar bisa mengupload atau mengedit file image -->
<?= form_open_multipart('profile/edit');?>
<div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'];?>">
      <?= form_error('username', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" value="<?= $user['password'];?>">
      <?= form_error('password', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'];?>">
      <?= form_error('nama', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'];?>">
      <?= form_error('alamat', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="no_hp" class="col-sm-2 col-form-label">Nomer Hp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $user['no_hp'];?>">
      <?= form_error('no_hp', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'];?>">
      <?= form_error('email', ' <small class="text-danger pl-3">', '</small>'); ?>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Image</div>
    <div class="col-sm-10">
    <div class="row">
    <div class="col-sm-3">
    <img src="<?= base_url('assets/img/profile/'). $user['gambar'];?>" class="img-thumbnail">
    </div>
    <div class="col-sm-9">
    <div class="custom-file">
  <input type="file" class="custom-file-input" id="gambar" name="gambar">
  <label class="custom-file-label" for="gambar">Choose file</label>
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

