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
		<div class="container-fluid" style="padding-top: 20px; max-width: 1400px">
			<div class="card card-outline card-info article" style="background-color: oldlace">
				<!-- header -->   
				<div class="card-header">
					<h1><i class="fas fa-list"></i> Post List</h1>
					<div class="toolbar">
						<!-- post add -->
						<a href="<?= site_url('admin/akademik/post/add') ?>" class="btn btn-primary" role="button">
							<i class="fas fa-edit"></i> Create Post
						</a>&nbsp &nbsp

						<!-- post truncate -->
						<a href="<?= site_url('admin/akademik/post/truncate') ?>" class="btn btn-danger" role="button" onclick="return confirm('⚠ Anda yakin ingin menghapus semua artikel?')">
							<i class="fas fa-fire"></i> Delete all Posts
						</a>&nbsp &nbsp &nbsp

						<!-- flashdata -->
						<?php if ($this->session->flashdata('post_saved')): ?>
						<span class="alert alert-dismissible fade show bg-lime" role="alert">
							<?= $this->session->flashdata('post_saved') ?> 👍
							<?php $this->session->unset_userdata('post_saved') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
						</span>
						<?php elseif ($this->session->flashdata('post_updated')): ?>
						<span class="alert alert-dismissible fade show bg-lime" role="alert">
							<?= $this->session->flashdata('post_updated') ?> 👍
							<?php $this->session->unset_userdata('post_updated') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
						</span>
						<?php elseif ($this->session->flashdata('post_deleted')): ?>
						<span class="alert alert-dismissible fade show bg-lime" role="alert">
							<?= $this->session->flashdata('post_deleted') ?> <i class="fas fa-trash"></i>
							<?php $this->session->unset_userdata('post_deleted') ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="close">
								<span aria-hidden="true">&times;</span>
							</button>
						</span>
						<?php endif ?>

					</div>
				</div>
				<!--/.header -->

				<!-- body -->
				<table class="table card-body">
					<thead>
						<tr bgcolor="springgreen">
							<th>Judul</th>
							<th style="width: 15%;" class="text-center">Status</th>
							<th style="width: 25%;" class="text-center">Aksi</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach ($articles as $article) : ?>
						<tr>
							<!-- title column -->
							<td>
								<div><?= $article->title ?></div>
								<div style="color: grey">
									<small>
										Created at <?= $article->created_at ?>
										<?php if ($article->updated_at) : ?>
										| Updated at <?= $article->updated_at ?>
										<?php endif ?>
									</small>
								</div>
							</td>

							<!-- status column -->
							<?php if ($article->draft === 'true') : ?>
							<td class="text-center text-secondary">Draft</td>
							<?php else : ?>
							<td class="text-center text-success">Published</td>
							<?php endif; ?>

							<!-- action column -->
							<td>
								<div>
									<a href="<?= site_url('article/show/'.$article->slug) ?>" class="btn btn-small btn-info" role="button" target="_blank">Preview</a>

									<a href="<?= site_url('admin/akademik/post/edit/'.$article->id) ?>" class="btn btn-small btn-info" role="button">Edit</a>

									<a href="<?= site_url('admin/akademik/post/delete/'.$article->id) ?>" class="btn btn-small btn-danger" role="button" onclick="return confirm('⚠ Anda yakin ingin menghapus artikel ini?')">Hapus</a>
								</div>
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- /.content -->
	
	<?php $this->load->view('templates/footer') ?>

</div>
<!-- wrapper -->

</body>
</html>