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

		<!-- content -->
		<div class="content-wrapper">
			<div class="container-fluid" style="max-width: 1000px; padding-top: 20px">
				<!-- mahasiswa row -->
				<h1 class="text-white"><i class="fas fa-users"></i> Mahasiswa</h1>
		        <div class="row">
		        	<!-- manajemen informatika -->
		        	<div class="small-box col-lg-2 col-4 m-3 bg-success">
		        		<a href="<?= site_url('admin/akademik/mahasiswa') ?>?program_studi=Manajemen Informatika">
					        <div class="icon"><i class="fas fa-user"></i></div>
					    	<h3><?= $mahasiswa_count['mi_count'] ?></h3>
					        <p class="h5">Mahasiswa<br><b>MANAJEMEN INFORMATIKA</b></p>
					    </a>
				     </div>

			        <!-- sistem informasi -->
			        <div class="small-box col-lg-2 col-4 m-3 bg-info">
			        	<a href="<?= site_url('admin/akademik/mahasiswa') ?>?program_studi=Sistem Informasi">
				            <div class="icon"><i class="fas fa-user"></i></div>
				            <h3><?= $mahasiswa_count['si_count'] ?></h3>
				            <p class="h5">Mahasiswa<br><b>SISTEM INFORMASI</b></p>
				        </a>
			        </div>

			        <!-- teknik komputer -->
			        <div class="small-box col-lg-2 col-4 m-3 bg-warning">
			        	<a href="<?= site_url('admin/akademik/mahasiswa') ?>?program_studi=Teknik Komputer">
				            <div class="icon"><i class="fas fa-user"></i></div>
				            <h3><?= $mahasiswa_count['tk_count'] ?></h3>
				            <p class="h5">Mahasiswa<br><b>TEKNIK KOMPUTER</b></p>
				        </a>
			        </div>

			        <!-- all mahasiswa -->
			        <div class="small-box col-lg-2 col-4 m-3 bg-danger">
			        	<a href="<?= site_url('admin/akademik/mahasiswa') ?>">
				            <div class="icon"><i class="fas fa-users"></i></div>
				            <h3>
				            	<?= 
				            	$mahasiswa_count['mi_count'] + 
				                $mahasiswa_count['si_count'] +
				                $mahasiswa_count['tk_count'] 
				              	?>
				            </h3>
				            <h5>Total<br>Mahasiswa</h5>
				        </a>
			        </div>
		        </div><br>
		        <!-- /.mahasiswa row -->

				<hr class="bg-white">

		        <!-- article row -->
		        <h1 class="text-white"><i class="fas fa-book"></i> Articles</h1>
				<div class="row">
					<!-- draft -->
				    <div class="small-box col-lg-2 col-4 m-3 card card-outline card-secondary" style="background-color: oldlace">
				    	<a class="text-dark" href="<?= site_url('admin/akademik/post') ?>">
							<div class="icon"><i class="fas fa-edit"></i></div>
							<h3><?= $article_count['draft_count'] ?></h3>
							<p class="h5">Articles<br><b>IN DRAFT</b></p>
						</a>
					</div>

					<!-- published -->
					<div class="small-box col-lg-2 col-4 m-3 card card-outline card-info" style="background-color: oldlace">
						<a class="text-dark" href="<?= site_url('admin/akademik/post') ?>">
							<div class="icon"><i class="fas fa-eye"></i></div>
							<h3><?= $article_count['published_count'] ?></h3>
							<p class="h5">Articles<br><b>PUBLISHED</b></p>
						</a>
					</div>

					<!-- all articles --->
					<div class="small-box col-lg-2 col-4 m-3 card card-outline card-success" style="background-color: oldlace">
						<a class="text-dark" href="<?= site_url('admin/akademik/post') ?>">
							<div class="icon">
								<i class="fas fa-edit"></i>
								<i class="fas fa-eye"></i>
							</div>
							<h3><?= 
								$article_count['draft_count'] + 
								$article_count['published_count'] 
								?>
							</h3>
							<h5>Total<br>Articles</h5>
						</a>
					</div>
				</div><br>
				<!-- article row -->

				<!-- feedback row-->
				<div class="row">
					<div class="small-box col-lg-2 col-4 m-3 card card-outline card-primary bg-teal">
						<a class="text-info" href="<?= site_url('admin/akademik/feedback') ?>">
							<div class="icon"><i class="fas fa-comments text-dark"></i><br></div>
							<h3><?= $feedback_count?></h3>
							<h5>Feedbacks</h5>
						</a>
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