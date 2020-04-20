<div class="row">
<div class="col-lg-6">
<?= $this->session->flashdata('message');?>
</div>
</div>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= base_url('assets/img/profile/').$user['gambar'];?>" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <?php
      foreach($user as $u){?>
        <h5 class="card-title">Username :<?= $u->username?></h5>
        <p class="card-text">Password :<?= $u->password?></p>
        <p class="card-text">Nama :<?= $u->nama?></p>
        <p class="card-text">Alamat :<?= $u->alamat?></p>
        <p class="card-text">No Telepon :<?= $u->no_hp?></p>
        <p class="card-text">Email :<?= $u->email?></p>
        
        <?php } ?>
      </div>
    </div>
  </div>
</div>
  