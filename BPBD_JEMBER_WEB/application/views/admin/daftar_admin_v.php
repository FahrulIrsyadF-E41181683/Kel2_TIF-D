<!DOCTYPE html>
<html lang="en">

<head>
    <!-- HEAD MEMANGGIL HEAD YANG ADA DI admin/includes/head.php -->
    <?php $this->load->view("admin/includes/head.php") ?>
</head>

<body id="">
    <!-- SIDEBAR MEMANGGIL SIDEBAR YANG ADA DI admin/includes/sidebar.php -->
    <?php $this->load->view("admin/includes/sidebar.php") ?>

    <!-- SIDEBAR MEMANGGIL NAVBAR YANG ADA DI admin/includes/sidebar.php -->
    <?php $this->load->view("admin/includes/navbar.php") ?>
        
    <!-- ISI KONTEN HALAMAN -->
        
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
                <?php $this->load->view("admin/includes/breadcrumb.php") ?>
              </div>
            <div class="card card-stats">
            <div class="card-header col-md-12">
              <!-- TOMBOL TAMBAH -->
              <div class="col-md-4 float-left">
              <a href=""><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Admin</button></a>
              </div>
              <!-- PENCARIAN -->
              <div class="col-md-4 pt-2 float-right">
              <form action="" method="post">
                <div class="input-group no-border">
                  <input type="text" name="cari" class="form-control" placeholder="Pencarian..." autocomplete="off" autofocus>
                  <div class="input-group-append">
                    <input class="btn btn-primary" type="submit" name="submit" hidden>
                    <div class="input-group-text">
                      <i class="nc-icon nc-zoom-split"></i>
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <!-- TABEL LIST -->
              <div class="card-body mb-3">
                <h6 class="col-md">Jumlah data admin : </h6>
                <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>Nomer</th>
                      <th>Email</th>
                      <th>Gambar</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- MENGAMBIL DATA DARI DATABASE -->
                  <tbody>
                   <?php foreach( $tb_user as $admin) : ?>
                    <?php if ($admin['ROLE'] == 1) : ?>
                    <tr class="text-center">
                    <td><?php echo $admin['NAMA']?></td>
                    <td><?php echo $admin['ALAMAT']?></td>
                    <td><?php echo $admin['NOMER']?></td>
                    <td><?php echo $admin['EMAIL']?></td>
                    <td><img src="<?php echo base_url('assets/img/Profile/'.$admin['GAMBAR']) ?>" width="64"></td>
                    <td class="text-center" width="130">
					    <a href="" class="btn btn-primary btn-sm rounded-pill m-1"><i class="fas fa-edit"></i></a>
                        <a href="" class="btn btn-danger btn-sm rounded-pill m-1" onclick="return confirm('yakin?');"><i class="fas fa-trash"></i></a>
					</td>
                    </tr>
                    <?php endif; ?>
                   <?php endforeach; ?>
                  </tbody>
                </table>
                <!-- menampilkan peringatan jika data tidak ada -->
                </div>
                <?php echo $this->pagination->create_links();?>
                <!-- bagian keterangan -->
                <div class="col-md small">
                  <h6>Keterangan :</h6>
                  <table>
                    <tr>
                      <td><a href="" class="btn btn-primary btn-sm rounded-pill mr-2"><i class="fas fa-edit"></i></a></td>
                      <td class="pt-3 pl-3"><p> : Action untuk merubah data berita</p></td>
                    </tr>
                    <tr>
                      <td><a href="" class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-trash"></i></a></td>
                      <td class="pt-3 pl-3"><p> : Action untuk menghapus data berita</p></td>
                    </tr>
                  </table>
                </div>
                <!-- batas bagian keterangan -->
              </div> 
            </div>
        </div>      
    </div>     
    
    <!-- BATAS ISI KONTEN HALAMAN -->

    <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI admin/includes/footer.php -->
    <?php $this->load->view("admin/includes/footer.php") ?>
    
    <!-- JS MEMANGGIL JS YANG ADA DI admin/includes/js.php -->
    <?php $this->load->view("admin/includes/js.php") ?>

</body>

</html>