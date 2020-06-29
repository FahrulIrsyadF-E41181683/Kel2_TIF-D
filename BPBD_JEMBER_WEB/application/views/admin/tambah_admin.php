<!DOCTYPE html>
<html lang="en">

<head>
    <!-- HEAD MEMANGGIL HEAD YANG ADA DI admin/includes/head.php -->
    <?php $this->load->view("admin/includes/head.php") ?>
</head>

<body id="">
    <!-- SIDEBAR MEMANGGIL SIDEBAR YANG ADA DI admin/includes/sidebar.php -->
    <?php $this->load->view("admin/includes/sidebar.php") ?>
        
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
                        <label for="NAMA">Nama</label>
                        <input type="text" name="NAMA" class="form-control <?php echo form_error('NAMA') ? 'is-invalid':'' ?>" id="NAMA">
                        <div class="invalid-feedback">
							<?php echo form_error('NAMA') ?>
						        </div>
                                </div>
                 <div class="form-group">
                        <label for="ALAMAT">Alamat</label>
                        <input type="text" name="ALAMAT" class="form-control <?php echo form_error('ALAMAT') ? 'is-invalid':'' ?>" id="ALAMAT">
                        <div class="invalid-feedback">
							<?php echo form_error('ALAMAT') ?>
						        </div>
                                </div>
                 <div class="form-group">
                        <label for="NOMER">Nomer</label>
                        <input type="number" name="NOMER" class="form-control <?php echo form_error('NOMER') ? 'is-invalid':'' ?>" id="NOMER">
                        <div class="invalid-feedback">
							<?php echo form_error('NOMER') ?>
						        </div>
                
                		        </div>
                 <div class="form-group">
                        <label for="EMAIL">Email</label>
                        <input type="text" name="EMAIL" class="form-control <?php echo form_error('EMAIL') ? 'is-invalid':'' ?>" id="EMAIL">
                        <div class="invalid-feedback">
							<?php echo form_error('EMAIL') ?>
						        </div>
                                </div>
                    </div>
                                <div class="col-md-5 float-right">
                <div class="from-group col-md-11">
                    <label for="name">Gambar</label>
                        <!-- gambar priview -->
                        <div class="imgWrap pb-2">
                            <img src="<?php echo base_url('assets/img/berita_gambar/default.png')?>" id="imgView" class="card-img-top img-fluid">
                        </div>
                        <!-- input gambar -->
                        <div class="custom-file">
                            <input type="file" id="inputFile" name="gambar" class="imgFile custom-file-input" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" name="gambar" for="inputFile">Pilih Gambar Thumbnail Berita</label>
                        </div>             
                     </table>
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