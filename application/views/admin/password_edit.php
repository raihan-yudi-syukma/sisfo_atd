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
			<div class="container-fluid" style="max-width: 500px; padding-top: 20px">
				<div class="card card-outline card-primary p-1" style="background-color: oldlace">
					<div class="card-header">
						<h2><i class="fas fa-cog text-secondary"></i> Password Change</h2>
					</div>

					<div class="card-body">
						<form method="POST">
							<div>
								<label for="password">Password</label><br>
								<input type="password" name="password" class="<?= form_error('password') ? 'input-invalid' : 'input' ?>" value="<?= set_value('password') ?>" placeholder="Enter your new password" required>
								<i class="fas fa-lock"></i>
								<?= form_error('password', '<div class="text-danger font-weight-bold">', '</div>') ?>
							</div>

							<div class="pt-2">
								<label for="password_confirm">Konfirmasi Password</label><br>
								<input type="password" name="password_confirm" class="<?= form_error('password_confirm') ? 'input-invalid' : 'input' ?>" value="<?= set_value('password_confirm') ?>" placeholder="Password harus cocok" required>
								<i class="fas fa-screwdriver"></i>
								<?= form_error('password_confirm', '<div class="text-danger font-weight-bold">', '</div>') ?>
							</div><br>

							<div>
								<button type="submit" class="btn btn-primary">
									Save changes <i class="fas fa-save"></i>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-wrapper -->
		
		<?php $this->load->view('templates/footer') ?>

	</div>
	<!-- wrapper -->
</body>
</html>