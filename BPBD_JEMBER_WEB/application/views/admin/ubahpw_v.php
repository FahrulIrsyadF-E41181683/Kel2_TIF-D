<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<div class="content">
    <div class="row">
        <!-- Tampilan Edit Profil Admin -->
        <div class="col-md-8">
            <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit Password</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('admin/profil/changepassword'); ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="current_password">Password Saat Ini</label>
                            <input type="password" class="form-control" id="current_password" name="current_password"
                                placeholder="Password Saat Ini">
                            <?= form_error('current_password', ' <small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="new_password1">Password Baru</label>
                                    <input type="password" class="form-control" id="new_password1" name="new_password1"
                                        placeholder="Password Baru">
                                    <?= form_error('new_password1', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="new_password2">Ulangi Password Baru</label>
                                    <input type="password" class="form-control" id="new_password2" name="new_password2"
                                        placeholder="Ulangi Password Baru">
                                    <?= form_error('new_password2', ' <small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="update ml-auto mr-auto">
                                <button type="submit" class="btn btn-primary btn-round">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("admin/includes/js.php") ?>

<!-- BATAS ISI KONTEN HALAMAN -->