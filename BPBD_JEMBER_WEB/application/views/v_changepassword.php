<div class="row">
<div class="col-lg-6">

<?= $this->session->flashdata('message'); ?>
<form action="<?= base_url('profile/changepassword')?>" method="post">
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
  <div class="form-groups">
        <button type="submit" class="btn btn-primary">Ubah Password</button>
  </div>
</form>
</div>
</div>