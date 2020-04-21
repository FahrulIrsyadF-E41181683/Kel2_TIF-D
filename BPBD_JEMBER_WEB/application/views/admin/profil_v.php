    <!-- ISI KONTEN HALAMAN -->
    <?php 
    
    foreach ($tb_admin as $ad ) : 
        $id = $ad['ID_ADM'];
    ?>
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-user">
                <div class="image">
                    <!-- <img src="../assets/img/damir-bosnjak.jpg" alt="..."> -->
                </div>
                <div class="card-body">
                    <div class="author">
                    <a href="#">
                    <img class="avatar border-gray" src="<?= base_url(). './assets/img/Profile/' . $ad['GAMBAR'];?>" alt="gambar profile">
                    </a>
                    <h5 class="title"><?= $ad['USERNAME'];?></h5>
                    </div>
                    <p class="description text-center">
                    "I like the way you work it <br>
                    No diggity <br>
                    I wanna bag it up"
                    </p>
                </div>
                <div class="card-footer">
                    <hr>
                    <div class="button-container">
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Ubah Password</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/profil/update');?>" method="post" enctype="multipart/form-data">
                    <input type="text" name="ID_ADM" id="ID_ADM" value="<?= $id; ?>" hidden>
                    <div class="row">
                        <div class="col-md-5 pr-1">
                        <div class="form-group">
                            <label>Lembaga</label>
                            <input type="text" class="form-control" disabled="" placeholder="" value="BPBD Kabupaten Jember">
                        </div>
                        </div>
                        <div class="col-md-7 pl-1">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="EMAIL" name="EMAIL" value="<?= $ad['EMAIL'];?>">
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="NAMA" name="NAMA" placeholder="Nama" value="<?= $ad['NAMA'];?>">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Nomer</label>
                            <input type="text" class="form-control" id="NOMER" name="NOMER" placeholder="Nomer" value="<?= $ad['NOMER'];?>">
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control textarea" id = "ALAMAT" name="ALAMAT"><?= $ad['ALAMAT'];?></textarea>
                        </div>
                        </div>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="GAMBAR" id="">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="row">
                        <div class="update ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary btn-round">Update Profil</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- BATAS ISI KONTEN HALAMAN -->

    <?php
foreach ($koleksi as $i) :
    $id_koleksi = $i['id_koleksi'];
    $judul = $i['judul'];
    $nim = $i['nim'];
    $isbn = $i['isbn'];
    $penerbit = $i['penerbit'];
    $penulis = $i['penulis'];
    $tahun_terbit = $i['tahun_terbit'];
    $nama_kategori = $i['nama_kategori'];
    ?>
    <div class="modal fade" id="modal_edit<?= $id_koleksi; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Edit Koleksi</h3>
                    <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                </div>
                <?= form_open_multipart('koleksi/edit_koleksi'); ?>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Judul</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="judul" value="<?= $judul; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-xs-3">NIM</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="nim" value="<?= $nim; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">ISBN</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="isbn" value="<?= $isbn; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Penerbit</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="penerbit" value="<?= $penerbit; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Penulis</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="penulis" value="<?= $penulis; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3">Tahun Terbit</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="tahun_terbit" value="<?= $tahun_terbit; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label  col-xs-3">Kategori Koleksi</label>
                        <select class="form-control" name="nama_kategori" id="nama_kategori">
                            <?php foreach ($getKategoriKoleksi as $bc) : ?>
                                <option value="<?= $bc['nama_kategori']; ?>"><?= $bc['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-info">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
