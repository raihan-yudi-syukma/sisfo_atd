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

	    	<!-- main-content -->
	    	<div class="container-fluid" style="max-width: 1300px; padding-top: 50px">	
		    	<div class="card card-outline card-success" style="background-color: oldlace">
		    		<article class="article">
		    			<!-- article title and meta -->
		    			<h1 class="post-title">
		    				<?= $article->title ? html_escape($article->title) : 'Tidak Berjudul' ?>
		    			</h1>
		    			<div class="post-meta">
		    				Published at <?= $article->created_at ?>
		    			</div><br>

		    			<div align="center">
		    				<img width="300px" src="<?php echo $article->image ? $article->image : base_url('assets/img/atd_logo.png') ?>" alt="<?= htmlentities($article->title, TRUE) ?>">
		    			</div><br>

		    			<!-- article body -->
		    			<div class="post-body">
		    				<?= $article->content ?>
		    			</div><br> 
		    		</article>
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