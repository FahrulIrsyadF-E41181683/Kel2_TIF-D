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
          <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('flash')?>"></div>
          <?php if( $this->session->flashdata('flash') ) : ?>
          <div class="alert alert-success alert-dismissible fade show">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
              <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>Data Berita berhasil <?php echo $this->session->flashdata('flash');?></span>
          </div>
          <?php endif; ?>
            <div class="container-fluid">
                <?php $this->load->view("admin/includes/breadcrumb.php") ?>
              </div>
            <div class="card card-stats">
            <div class="card-header col-md-12">
              <!-- TOMBOL TAMBAH -->
              <div class="col-md-4 float-left">
              <a href="<?php echo base_url('admin/berita/tambah') ?>"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Berita Baru</button></a>
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
                <h6 class="col-md">Jumlah data berita : <?php echo $total_rows;?></h6>
                <div class="table-responsive" id="data">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr class="text-center">
                      <th>Judul</th>
                      <th>Kategori</th>
                      <th>Tanggal</th>
                      <th>Lokasi</th>
                      <!-- <th>Isi Berita</th> -->
                      <th>Gambar</th>
                      <th>User</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <!-- MENGAMBIL DATA DARI DATABASE -->
                  <tbody>
                   <?php foreach($tb_berita as $berita):?>
                    <tr>
                      <input type="hidden" name="id" value="<?php echo $berita['ID_BRT']?>">
                      <td width="150"><?php echo $berita['JUDUL'] ?></td>
                      <td width="130"><?php echo $berita['KATEGORI']?></td>
                      <td><?php echo $berita['TANGGAL']?></td>
                      <td><?php echo $berita['LOKASI']?></td>
                      <!-- <td class="small"><?php echo $berita['ISI_BERITA']?></td> -->
                      <td><img src="<?php echo base_url('assets/img/berita_gambar/'.$berita['GAMBAR_BRT'])?>" width="64"></td>
                      <td><?php echo $berita['NAMA']?></td>
                      <!-- merubah status agar mudah dipahami -->
                      <td class="text-center"><a href="<?php echo base_url(); ?>admin/berita/status/<?php echo $berita['ID_BRT']; ?>/<?php echo $berita['STATUS_BRT']; ?>">
                      <?php if($berita['STATUS_BRT'] == 1) : ?>
                      <span href="" class="btn btn-success btn-circle btn-sm">
                        <i class="fas fa-check"></i>
                      </span>
                      <?php else : ?>
                      <span href="" class="btn btn-danger btn-circle btn-sm">
                        <i class="fas fa-times"></i>
                      </span>
                      <?php endif;?>
                        </a></td>
                      <td class="text-center" width="130">
											<a href="<?php echo base_url(); ?>admin/berita/ubah/<?php echo $berita['ID_BRT']; ?>" class="btn btn-primary btn-sm rounded-pill m-1"><i class="fas fa-edit"></i></a>
                      <a href="<?php echo base_url(); ?>admin/berita/hapus/<?php echo $berita['ID_BRT']; ?>" class="btn btn-danger btn-sm rounded-pill m-1 tombol-hapus" onclick="return confirm('yakin?');"><i class="fas fa-trash"></i></a>
										  </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
                <!-- menampilkan peringatan jika data tidak ada -->
                <?php if (empty($tb_berita)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                          <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="nc-icon nc-simple-remove"></i>
                          </button>
                          <span>Berita yang anda cari tidak ditemukan</span>
                        </div>
                    <?php endif ?>
                </div>
                <?php echo $this->pagination->create_links();?>
                <!-- bagian keterangan -->
                <div class="col-md small">
                  <h6>Keterangan :</h6>
                  <table>
                    <tr>
                      <td><span href="" class="btn btn-success btn-circle btn-sm">
                        <i class="fas fa-check"></i>
                      </span></td>
                      <td class="pt-3 pl-3"><p> : Berita ditampilkan pada halaman utama</p></td>
                    </tr>
                    <tr>
                      <td><span href="" class="btn btn-danger btn-circle btn-sm">
                          <i class="fas fa-times"></i>
                      </span></td>
                      <td class="pt-3 pl-3"><p> : Berita tidak ditampilkan pada halaman utama</p></td>
                    </tr>
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