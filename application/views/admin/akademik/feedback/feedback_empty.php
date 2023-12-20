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
			<div class="container-fluid" style="max-width: 800px; padding-top: 50px">
				<!-- flashdata -->
				<?php if ($this->session->flashdata('feedback_deleted')) : ?>
				<div class="alert alert-dismissible fade show bg-success" role="alert" style="width: 320px;">
					<h6>
						<?= $this->session->flashdata('feedback_deleted') ?>
						<i class="fas fa-trash"></i>
						<?php $this->session->unset_userdata('feedback_deleted') ?>
					</h6>
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php elseif ($this->session->flashdata('feedback_truncated')) : ?>
				<div class="alert alert-dismissible fade show bg-success" role="alert" style="width: 350px;">
					<h6>
						<?= $this->session->flashdata('feedback_truncated') ?>
						<i class="fas fa-trash"></i>
						<?php $this->session->unset_userdata('feedback_truncated') ?>
					</h6>
					<button type="button" class="close" data-dismiss="alert" aria-label="close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php endif ?>
				<!-- /.flashdata -->

				<div class="card card-outline card-warning" align="center" style="background-color: oldlace; padding: 10px; width: 700px">
	                <h2>No Feedbacks... <i class="fas fa-wind"></i> <i class="fas fa-leaf"></i></h2>
	                <h4>But you can <a class="text-info" href="<?= site_url('page/contact') ?>">create your own feedback!</h4>
	            </div>
			</div>
			<!-- container-fluid -->
		</div>
		<!-- /.content-wrapper -->
		
		<?php $this->load->view('templates/footer') ?>

	</div>
	<!-- wrapper -->

</body>
</html>