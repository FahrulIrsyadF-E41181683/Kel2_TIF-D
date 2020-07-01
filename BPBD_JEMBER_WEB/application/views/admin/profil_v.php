    <!-- ISI KONTEN HALAMAN -->
    <!-- <?php

            // foreach ($tb_admin as $admin) :
            //     $id = $admin['ID_USR'];
            ?> -->
    <div class="content">
        <div class="row">
            <div class="col-md-4">
                <!-- Tampilan Kartu Nama Admin -->
                <div class="card card-user">
                    <div class="image">
                        <!-- <img src="../assets/img/damir-bosnjak.jpg" alt="..."> -->
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="<?= base_url() . './assets/img/Profile/' . $admin['GAMBAR']; ?>" alt="gambar profile">
                            </a>
                            <h5 class="title"><?= $admin['NAMA']; ?></h5>
                            <!-- <h7 class="title">Admin/Petugas</h7> -->
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
            <!-- Tampilan Edit Profil Admin -->
            <div class="col-md-8">
                <div class="card card-user">
                    <div class="card-header">
                        <h5 class="card-title">Edit Profile</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('admin/profil/update'); ?>" method="post" enctype="multipart/form-data">
                            <input type="text" name="ID_USR" id="ID_USR" value="<?= $admin['ID_USR']; ?>" hidden>
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
                                        <input type="email" class="form-control" id="EMAIL" name="EMAIL" value="<?= $admin['EMAIL']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="NAMA" name="NAMA" placeholder="Nama" value="<?= $admin['NAMA']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nomer</label>
                                        <input type="text" class="form-control" id="NOMER" name="NOMER" placeholder="Nomer" value="<?= $admin['NOMER']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control textarea" id="ALAMAT" name="ALAMAT"><?= $admin['ALAMAT']; ?></textarea>
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

    <!-- BATAS ISI KONTEN HALAMAN -->

    <!-- Modal Ubah Username dan Password -->
    <!-- <?php
            foreach ($user as $i) :
                $ID_USR = $i['ID_USR'];

            ?>
        <div class="modal fade" id="modal_edit<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="myModalLabel">Edit Password</h3>
                        <button class="close" type="button" data-dismiss="modal" aria-hidden="true">x</button>
                    </div>
                    <div class="modal-body">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('profil/edit_password'); ?>" method="post">
                            <div class="form-group">
                                <label for="passwordSkrg">Password Lama</label>
                                <input type="password" id="passwordSkrg" name="passwordSkrg" class="form-control">
                                <?= form_error('passwordSkrg', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="passwordBaru1">Password Baru</label>
                                <input type="password" id="passwordBaru1" name="passwordBaru1" class="form-control">
                                <?= form_error('passwordBaru1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="passwordBaru2">Ulangi Password Baru</label>
                                <input type="password" id="passwordBaru2" name="passwordBaru2" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Ganti Password</button>
                            </div>
                        </form>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info">Update</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>
    <?php endforeach; ?> -->