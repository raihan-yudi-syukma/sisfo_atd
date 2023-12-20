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
		<div class="container-fluid" style="padding-top: 50px; max-width: 600px">

			<?php if ($this->session->flashdata('post_deleted')) : ?>
			<div class="alert alert-dismissible fade show bg-lime" role="alert" style="width: 280px;">
				<?= $this->session->flashdata('post_deleted') ?> <i class="fas fa-trash"></i>
				<?php $this->session->unset_userdata('post_deleted') ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<?php elseif ($this->session->flashdata('post_truncated')) : ?>
			<div class="alert alert-dismissible fade show bg-lime" role="alert" style="width: 350px">
				<?= $this->session->flashdata('post_truncated') ?> <i class="fas fa-fire"></i>
				<?php $this->session->unset_userdata('post_truncated') ?>
				<button type="button" class="close" data-dismiss="alert" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?php endif ?>
			
			<div class="card card-outline card-danger" style="background-color: oldlace; padding: 15px;">
				<h1>Tidak ada Artikel... <i class="fas fa-frown"></i></h1>
				<p>Need Inspiration? Check <a class="text-info" target="new" title="cats.com" href="https://cats.com/do-cats-like-bells-on-their-collars">this</a> out!</p>
				<div>
					<a href="<?= site_url('admin/akademik/post/add') ?>" class="btn btn-primary">
					<i class="fas fa-edit"></i> Tulis Artikel
				</a>
			</div>
				</div>
			</div>

		</div>
	</div>
	<!-- /.content -->
	
	<?php $this->load->view('templates/footer') ?>

</div>
<!-- wrapper -->

</body>
</html>