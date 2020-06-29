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
                <div class="card-body col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-7 float-left">

                    <div class="form-group">
                        <label for="KATEGORI">Kategori</label>
                        <input type="text" name="KATEGORI" class="form-control <?php echo form_error('KATEGORI') ? 'is-invalid':'' ?>" id="KATEGORI">
                        <div class="invalid-feedback">
							<?php echo form_error('KATEGORI') ?>
						        </div>
                    </div>

                    <div class="form-group">
                        <label for="KETERANGAN">Keterangan</label>
                        <input type="text" name="KETERANGAN" class="form-control <?php echo form_error('KETERANGAN') ? 'is-invalid':'' ?>" id="KETERANGAN">
                        <div class="invalid-feedback">
							<?php echo form_error('KETERANGAN') ?>
						        </div>
                    </div>

                    </div>
                    </div>
                    <!-- tombol simpan -->
                    <button type="submit" value="upload" name="tambah" class="btn btn-primary float-right ">Tambah Data</button>
                    </div>
                    </form>
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