<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('templates/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">

	<!-- wrapper -->
	<div class="wrapper">

		<?php 
		$this->load->view('templates/sidebar');
		$this->load->view('templates/navbar');
		?>

		<!-- content -->
		<div class="content-wrapper">
			<section>
				<div class="container-fluid" style="max-width: 1000px; padding-top: 20px">
					<h1 class="text-white">Feedbacks <i class="fas fa-comments"></i></h1>
					<a title="No feedbacks at all.." class="btn btn-danger" role="button" href="<?= site_url('admin/akademik/feedback/truncate') ?>" onclick="return confirm('⚠ Anda yakin ingin menghapus semua item?')">
							<i class="fas fa-fire"></i> Delete All Feedbacks
					</a><br><br>

					<!-- flashdata -->
					<?php if ($this->session->flashdata('feedback_deleted')) : ?>
					<div align="center" class="alert alert-dismissible fade show bg-success" role="alert" style="width: 320px">
						<h6>
							<?= $this->session->flashdata('feedback_deleted') ?> <i class="fas fa-trash"></i>
						</h6>
						<?php $this->session->unset_userdata('feedback_deleted') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endif ?>

					<!-- feedbacks -->
					<?php foreach ($feedbacks as $feedback) : ?>
					<div class="card card-outline card-info" style="background-color: oldlace">
						<div class="card-header">
							<div>
								<b><?= $feedback->name ?></b> 
								<small class="text-secondary"><?= $feedback->email ?></small>
							</div>
							<div>
								<small class="text-secondary"><?= $feedback->created_at ?></small>
							</div>
							<p><?= $feedback->message ?></p>
							<a title="delete feedback from our dearest susbscriber" href="<?= site_url('admin/akademik/feedback/delete/'.$feedback->id) ?>" class="btn btn-danger btn-small" onclick="return confirm('⚠ Anda yakin ingin hapus item ini?')">
								<i class="fas fa-trash"></i> Hapus
							</a>
						</div>
					<?php endforeach ?>
					</div>
					<!-- /.feedbacks -->
				</div>
				<!-- /. container-fluid -->
			</section>
		</div>	
		<!-- /. content-wrapper -->

		<?php $this->load->view('templates/footer') ?>

	</div>
	<!-- /.wrapper -->
</body>
</html>