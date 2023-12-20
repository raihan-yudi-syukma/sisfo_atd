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
     		<?php $this->load->view('templates/content_header') ?>

      		<!-- main content -->
      		<section class="content">
        		<div class="container-fluid" style="max-width: 800px">
					<h1>About Us</h1>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
				<!--/.container fluid -->
			</section>
			<!-- /.main content -->

		</div>
		<!-- /.content-wrapper -->

		<?php $this->load->view('templates/footer') ?>
		
	</div>
	<!-- /.wrapper -->
</body>
</html>