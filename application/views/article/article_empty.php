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

	    <!-- content-wrapper -->
	    <div class="content-wrapper">
	    	<?php $this->load->view('templates/content_header') ?>

	    	<!-- main-content -->
	    	<div class="container-fluid" style="max-width: 800px">
	    		<div class="card card-outline card-warning article" style="background-color: oldlace;">
		    		<h1>Belum ada Artikel!</h1>
		    		<p>Artikel mungkin masih di dalam draft, penulis akan segera menyelesaikannya... <span class="h1">👨‍💻</span></p>
				</div>
		    </div>
	    	<!-- /.main-content -->
	    	
	    </div>
	    <!-- /.content-wrapper -->

	    <?php $this->load->view('templates/footer') ?>

	</div>
	<!-- /.wrapper -->
</body>
</html>