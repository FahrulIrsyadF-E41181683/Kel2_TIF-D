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
                <div class="pull-right">
                        <a href="<?=site_url('category/add')?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i> Buat
                        </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama category</th>
                                <th>Actions</th>
                            </tr>    
                        </thead>
                        <tbody>
                            <?php   $no = 1;
                                    foreach($row->result() as $key => $data){?>
                        <tr>
                                <td style="width : 5%"><?=$no++?>.</td>
                                <td><?= $kategori ?></td>
                                <td class="text-center" width="160px">

                                <a href="<?=site_url('category/edit/'. $data->category_id)?>" class="btn btn-primary btn-xs">
                                            <i class="fa fa-pencil"></i> Edit
                                       </a>
                                       <a href="<?=site_url('category/del/'. $data->category_id)?>" onclick="return confirm('apakah Anda Yakin Menghapus Data?')" class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i> Hapus
                                       </a>
                                </td>
                        </tr>
                     <div class="box-body">
                    <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                               
                                <form action="<?=site_url('category/process')?>" method="post">
                                    <div class="form-group">
                                    <input type="hidden" name="id" value="<?=$row->category_id?>">
                                        <p>Tanda <b>*</b> Artinya Wajib Di isi</p>
                                        <label for="">Nama category *</label>
                                        <input type="text" name="category_name" value="<?= $row->name?>" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Simpan</button>
                                        <button type="reset" class="btn btn-flat"><i class="fa fa-undo"></i> Reset</button>
                                    </div>
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                </div>
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