<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0"><div class="row">
<div class="col-lg-6">
<?= $this->session->flashdata('message');?>
</div>
</div>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?= base_url('assets/img/Profile/').$user['GAMBAR'];?>" class="card-img">
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <?php
      foreach($user as $u){?>
        <h5 class="card-title">Username :<?= $u->USERNAME?></h5>
        <p class="card-text">Password :<?= $u->PASSWORD?></p>
        <p class="card-text">Nama :<?= $u->NAMA?></p>
        <p class="card-text">Alamat :<?= $u->ALAMAT?></p>
        <p class="card-text">No Telepon :<?= $u->NOMER?></p>
        <p class="card-text">Email :<?= $u->EMAIL?></p>
        
        <?php } ?>
      </div>
    </div>
  </div>
</div>


  