<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('templates/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">

	<!-- wrapper -->
	<div class="wrapper">
		<?php
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		?>

		<!-- content -->
		<div class="content-wrapper">
			<div class="container-fluid pt-5" align="center" style="max-width: 1500px">
				<h2 class="text-white text-center">
					<i class="fas fa-cog text-secondary"></i> Admin's Settings
				</h2>

				<!-- flashdata -->
				<?php if ($this->session->flashdata('message')) : ?>
				<div class="alert alert-dismissable fade show bg-lime h4" style="width: 400px">
					<?= $this->session->flashdata('message') ?> 👍
					<?php $this->session->unset_userdata('message') ?>
					<button title="Close this notification" type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif ?>

				<div class="row">
					<!-- avatar settings -->
					<div class="small-box col-lg-3 m-5 p-3" style="background-color: whitesmoke">
						<div class="icon"><i class="fas fa-camera"></i></div>
						<div class="card-header"><h4>Picture</h4></div>
						<div class="card-body">
							<div class="d-flex" style="grid-gap: 1em">
								<a class="btn btn-info" role="button" href="<?= site_url('admin/setting/upload_avatar') ?>">
									Change Pic (coming soon)
								</a>
								<a class="btn btn-danger" role="button" href="<?= site_url('admin/setting/remove_avatar') ?>">
									Remove Pic (coming soon)
								</a>
							</div>
							<br>
							<img src="<?= $current_user->avatar ? 
								base_url('upload/avatar/'.$current_user->avatar)
								: base_url('assets/img/koperasi_logo.png') ?>" 
								alt="<?= htmlentities($current_user->name, TRUE) ?>" width="150" height="150" style="border-radius: 100px">
						</div>
					</div>

					<!-- profile settings -->
					<div class="small-box col-lg-3 m-5 p-3" style="background-color: whitesmoke">
						<div class="icon"><i class="fas fa-user"></i></div>
						<div class="card-header"><h4>Profile</h4></div>
						<div class="card-body">
							<a class="btn btn-info" role="button" href="<?= site_url('admin/setting/profile_edit') ?>">
								Edit Profile
							</a>
							<br><br>
							<p>
								<i class="fas fa-user"></i> Name:<br>
								<span class="font-weight-bold"><?= html_escape($current_user->name) ?></span>
							</p>
							<p>
								<i class="fas fa-envelope"></i> E-mail:<br>
								<span class="font-weight-bold"><?= html_escape($current_user->email) ?></span>
							</p>
						</div>
					</div>

					<!-- security -->
					<div class="small-box col-lg-3 m-5 p-3" style="background-color: whitesmoke">
						<div class="icon"><i class="fas fa-lock"></i></div>
						<div class="card-header"><h4>Security</h4></div>
						<div class="card-body">
							<a class="btn btn-info" role="button" href="<?= site_url('admin/setting/password_verify') ?>">Change Password</a>
							<br><br>
							<p>
								<i class="fas fa-key"></i> Password:<br>
								<span class="font-weight-bold">**** (dummy)</span>
							</p>
							<p>
								<i class="fas fa-tachometer-alt"></i> Terakhir diubah:<br>
								<span class="font-weight-bold">19-12-2023 (dummy)</span>
							</p>
						</div>
					</div>
				</div>
				<!-- /.row -->

				<hr class="bg-white">
				
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /.content-wrapper -->
		
		<?php $this->load->view('templates/footer') ?>

	</div>
	<!-- wrapper -->
</body>
</html>