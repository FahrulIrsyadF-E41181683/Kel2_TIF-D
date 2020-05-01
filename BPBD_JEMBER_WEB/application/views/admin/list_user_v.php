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
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
            </div>
            <div class="card-body ">
                <div class="row">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nomer</th>
                            <th>Foto KTP</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        foreach ($pengguna as $ad ) { ?>
                        <tr>
                            <td><?=$ad->NAMA?></td>
                            <td><?=$ad->ALAMAT?></td>
                            <td><?=$ad->NOMER?></td>
                            <td><?=$ad->FOTO_KTP?></td>
                            <td>
                            <a class="btn btn-primary" href="<?php echo base_url('admin/listuser/edit/'. $ad->ID_USR); ?>"><i class="fas fa-pencil-alt"></i></a>
                            <a class="btn btn-danger" href="<?php echo base_url('admin/listuser/hapus/'. $ad->ID_USR); ?>"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
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