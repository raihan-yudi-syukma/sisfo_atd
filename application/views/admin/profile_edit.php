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
						<h1><i class="fas fa-cog text-secondary"></i> Edit Profile</h1>
					</div>

					<div class="card-body">
						<form method="POST">
							<div>
								<label for="name">Name</label><br>
								<input type="text" name="name" class="<?= form_error('name') ? 'input-invalid' : 'input' ?>" value="<?= set_value('name', $current_user->name) ?>" placeholder="Enter name | Maks. 32 karakter" maxlength="32" required>
								<i class="fas fa-user"></i>
								<?= form_error('name', '<div class="text-danger font-weight-bold">', '</div>') ?>
							</div>

							<div class="pt-2">
								<label for="email">E-Mail</label><br>
								<input type="email" name="email" class="<?= form_error('email') ? 'input-invalid' : 'input' ?>" value="<?= set_value('email', $current_user->email) ?>" placeholder="Your E-Mail Address | Maks. 32 karakter" maxlength="32" required>
								<i class="fas fa-envelope"></i>
								<?= form_error('email', '<div class="text-danger font-weight-bold">', '</div>') ?>
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