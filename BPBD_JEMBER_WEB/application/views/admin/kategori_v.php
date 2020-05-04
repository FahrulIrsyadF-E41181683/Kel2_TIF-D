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
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Kategori</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">
    <!-- isien ndek kene cym -->
                <div class="card shadow mb-4">
           <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Kategori Bencana </h6>
               </div>
           <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Kategori</th> 
                <th>Keterangan</th>
                <th></th>
            
              </tr>
             </thead>
             <tfoot>
              <tr>
                
              
              </tr>
            </tfoot>
        <tbody>
        <?php 
        foreach ($tb->result() as $t ) { ?>
          <tr>
            <td><?=$t->KATEGORI?></td>
            <td><?=$t->KETERANGAN?></td>
            <td>
              <a class="btn btn-primary" href="<?php base_url('admin/kategori_v/edit/'. $t->ID_KTR); ?>">EDIT<i class="icon-check-2"></i></a>
              <a class="btn btn-danger" href="<?php base_url('admin/kategori_v/hapus/'. $t->ID_KTR); ?>">HAPUS<i class="icon-trash-simple"></i></a>
            </td>
          </tr>
        <?php } ?>
          </tbody>
        </table>
        </div>
    </div>
    </div>
    
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> Updated 3 minutes ago
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