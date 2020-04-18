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
            <div class="col-md-8">
                <div class="card card-user">
                <div class="card-header">
                    <h5 class="card-title">Edit Password</h5>
                <div class="card-body">
                    <form>
                    </div>
                    <div class="form-group">
                        <label for="username">Usename</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" id="password" nama="password" placeholder="Password" value="">
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
    <!-- BATAS ISI KONTEN HALAMAN -->

    <!-- FOOTER MEMANGGIL FOOTER YANG ADA DI admin/includes/footer.php -->
    <?php $this->load->view("admin/includes/footer.php") ?>

    <!-- JS MEMANGGIL JS YANG ADA DI admin/includes/js.php -->
    <?php $this->load->view("admin/includes/js.php") ?>
</body>

</html>