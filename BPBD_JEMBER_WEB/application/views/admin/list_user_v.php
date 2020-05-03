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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class=" text-primary">
                                    <tr>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Nomer</th>
                                        <th class="text-center">Foto KTP</th>
                                        <th class="text-center">Foto Pemilik KTP</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($pengguna as $ad) :
                                        $id = $ad['ID_USR'];
                                    ?>
                                        <tr>
                                            <td><?= $ad['NAMA']; ?></td>
                                            <td><?= $ad['ALAMAT']; ?></td>
                                            <td><?= $ad['NOMER']; ?></td>
                                            <td><img src="<?= base_url() . './assets/img/Profile/' . $ad['FOTO_KTP']; ?>" width="190"></td>
                                            <td><img src="<?= base_url() . './assets/img/Profile/' . $ad['FOTO_ORG']; ?>" width="90"></td>
                                            <td>
                                                <a class="btn btn-primary" href="<?= base_url('admin/profil/konfirmasi' . $ad['ID_USR']); ?>">Konfirmasi<i class="icon-check-2"></i></a>
                                                <a class="btn btn-danger" href="<?= base_url('admin/profil/hapus' . $ad['ID_USR']); ?>">Hapus<i class="icon-trash-simple"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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