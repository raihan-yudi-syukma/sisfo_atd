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

	    	<!-- content -->
	    	<div class="container-fluid" style="max-width: 1000px">
	    		<div class="card card-outline card-success article" style="background-color: oldlace">
		    		<h1><i class="fas fa-list"></i> List Artikel</h1>
		    		<ul>
				    	<?php foreach ($articles as $article) : ?>
				    		<li>
				    			<a title="Read this article" class="text-info" href="<?= base_url('article/'.$article->slug) ?>">
				    				<?= $article->title ? html_escape($article->title) : "Tidak Berjudul" ?>
				    			</a>
				    		</li>
				    	<?php endforeach ?>
				    </ul>
				</div>
		    </div>
	    	<!-- /.content -->
	    	
	    </div>
	    <!-- /.content-wrapper -->

	    <?php $this->load->view('templates/footer') ?>

	</div>
	<!-- /.wrapper -->
</body>
</html>