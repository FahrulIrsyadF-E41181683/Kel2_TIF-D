<!DOCTYPE html>
<html lang="en">

<head>
  <!-- HEAD MEMANGGIL HEAD YANG ADA DI admin/includes/head.php -->
  <?php $this->load->view("admin/includes/head.php") ?>
</head>

<body class="">
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
              <a href="<?php echo base_url('admin/kategori/tambah') ?>"><button type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kategori</button></a>
            </div>
          </div>
          <!-- TABEL LIST -->
          <div class="card-body mb-3">
            <div class="table-responsive">
              <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr class="text-center">
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <!-- MENGAMBIL DATA DARI DATABASE -->
                <tbody>
                  <?php foreach ($tb as $kategori) : ?>
                    <tr>
                      <td class="text-center"><?php echo $kategori['KATEGORI'] ?></td>
                      <td class="text-justify" width="600"><?php echo $kategori['KETERANGAN'] ?></td>
                      <td class="text-center" width="130">
                        <a href="<?= base_url('admin/kategori/edit/') . $kategori['ID_KTR'] ?>" class="btn btn-primary btn-sm rounded-pill m-1"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('admin/kategori/hapus/') . $kategori['ID_KTR'] ?>" class="btn btn-danger btn-sm rounded-pill m-1" onclick="return confirm('yakin?');"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <!-- menampilkan peringatan jika data tidak ada -->
            </div>
            <?php echo $this->pagination->create_links(); ?>
            <!-- bagian keterangan -->
            <div class="col-md small">
              <h6>Keterangan :</h6>
              <table>
                <tr>
                  <td><a href="" class="btn btn-primary btn-sm rounded-pill mr-2"><i class="fas fa-edit"></i></a></td>
                  <td class="pt-3 pl-3">
                    <p> : Action untuk merubah data berita</p>
                  </td>
                </tr>
                <tr>
                  <td><a href="" class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-trash"></i></a></td>
                  <td class="pt-3 pl-3">
                    <p> : Action untuk menghapus data berita</p>
                  </td>
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