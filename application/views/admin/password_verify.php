<!DOCTYPE html>
<html>

<?php $this->load->view('templates/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">

	<!-- wrapper -->
	<div class="wrapper">
		<?php 
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		?>

		<div class="content-wrapper">
			<div class="container-fluid pt-5" style="max-width: 500px">
				<div class="card card-outline card-primary p-3" style="background: whitesmoke">

					<div class="card-header h2">
						Verikasi Password <i class="align-right fas fa-cog"></i>
					</div>

					<div class="card-body">
						<p><i class="fas fa-lock"></i> Konfirmasi password Anda terlebih dulu</p>

						<form method="POST">
							<div class="pt-2 pb-1">
								<input type="password" class="<?= form_error('password') || $this->session->flashdata('verify_failed')  ? 'input-invalid' : 'input' ?>" name="password" id="password" value="<?= set_value('password') ?>" placeholder="Masukkan password Anda yang sekarang" required>
								<?= form_error('password', '<div class="text-tomato font-weight-bold">', '</div>') ?>

								<!-- flashdata -->
								<?php if ($this->session->flashdata('verify_failed')) : ?>
								<div class="text-tomato font-weight-bold">
									<?= $this->session->flashdata('verify_failed') ?>
									<?php $this->session->unset_userdata('verify_failed') ?>
								</div>
								<?php endif ?>
							</div>

							<!-- JavaScript show password -->
							<script type="text/javascript">
								function show_password() {
									var pw = document.getElementById("password");
									if (pw.type === "password") {
										pw.type = "text";
									} else {
										pw.type = "password";
									}
								}
							</script>

							<!-- show password -->
							<label>
								<input type="checkbox" title="Make the password readable" onclick="show_password()"> Tampilkan Password
							</label>
							<br>

							<button type="submit" class="btn btn-primary">Verifikasi</button>
						</form>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-wrapper -->
		
		<?php $this->load->view('templates/footer') ?>

	</div>
	<!-- wrapper -->
</body>
</html>