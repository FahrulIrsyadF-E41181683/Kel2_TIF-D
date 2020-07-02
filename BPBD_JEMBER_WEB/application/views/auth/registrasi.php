<div class="container">
	<div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
		<div class="card-body p-0">
			<!-- Nested Row within Card Body -->
			<div class="row">
				<div class="col-lg">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Buat akun baru!</h1>
						</div>
						<form class="user" method="POST" action="<?= base_url('auth/registrasi'); ?>">
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="id_user" name="id_user" value="<?= set_value('ID_USR', $id); ?>" readonly hidden>
							</div>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama" value="<?= set_value('name'); ?>">
								<?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
								<?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value('alamat'); ?>">
								<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="nomer" name="nomer" placeholder="Nomer Telepon" value="<?= set_value('nomer'); ?>" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '')">
								<?= form_error('nomer', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group">
								<input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
								<?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
							</div>
							<div class="form-group row">
								<div class="col-sm-6 mb-3 mb-sm-0">
									<input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
									<?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
								</div>
								<div class="col-sm-6">
									<input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
								</div>
							</div>
							<button type="submit" class="btn btn-success btn-user btn-block">
								Daftar
							</button>
						</form>
						<hr>
						<div class="text-center">
							<a class="medium text-secondary" href="<?= base_url('auth'); ?>">Sudah punya akun? Login sekarang!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>