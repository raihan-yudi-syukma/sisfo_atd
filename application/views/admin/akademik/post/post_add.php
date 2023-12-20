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
			<div class="container-fluid" style="max-width: 1000px; padding-top: 20px">
				<div class="card card-outline card-info article" style="background-color: oldlace">
					<h1 class="post-title">Tulis Artikel Baru</h1>

					<form method="POST">   
						<label for="title"><i class="fas fa-flag"></i> Judul</label><br>
						<input class="<?= form_error('title') ? 'input-invalid' : 'input' ?>" type="text" name="title" id="title" placeholder="Maks. 128 karakter | Judul tidak boleh sama" title="Judul artikel wajib diisi!" value="<?= set_value('title') ?>" required>
						<?= form_error('title', '<div class="text-danger font-weight-bold">', '</div>') ?><br>

						<label for="content"><i class="fas fa-edit"></i> Konten</label><br>
						<textarea class="<?= form_error('content') ? 'input-invalid' : 'input' ?>" name="content" id="content" title="Write the contents here..." cols="30" rows="10" placeholder="Write your imagination..." style="resize: none; width: 800px" required><?= set_value('content') ?></textarea>
						<?= form_error('content', '<div class="text-danger font-weight-bold">', '</div>') ?><br>

						<script type="text/javascript">
							function resetValue() {
								document.getElementById('title').value = '';
								document.getElementById('content').value = '';
							}
						</script>

						<div>
							<button class="btn btn-secondary" type="submit" name="draft" value="true">Simpan ke Draft</button>
							<button class="btn btn-primary" type="submit" name="draft" value="false">Publish</button>
							<button class="btn btn-danger" type="button" onclick="resetValue()">Bersih</button>
							<?= form_error('draft', '<div class="text-danger font-weight-bold>"', '</div>') ?>
						</div><br>
					</form>

				</div>
			</div>
		</div>
		<!-- /.content -->
		
		<?php $this->load->view('templates/footer') ?>

	</div>
	<!-- wrapper -->

</body>
</html>