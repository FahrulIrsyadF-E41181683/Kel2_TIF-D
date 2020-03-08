<!DOCTYPE html>
<html>
<head>
	<title>Membuat login dengan codeigniter | www.malasngoding.com</title>
</head>
<body>
	<h1>Login berhasil !</h1>

<!-- MENAMPILKAN NAMA USER YANG TELAH LOGIN -->

	<h2>Hai, <?php echo $this->session->userdata("nama"); ?></h2>

<!-- MENAMPILKAN LINK UNTUK LOGOUT SETELAH LOGIN -->

	<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
</body>
</html>