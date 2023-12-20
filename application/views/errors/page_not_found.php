<!DOCTYPE html>
<html>

<?php $this->load->view('templates/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php 
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar'); 
    ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      <?php $this->load->view('templates/content_header') ?>

      <!-- content -->
      <div class="container-fluid" style="max-width: 800px">
        <div class="card card-outline card-danger" align="center" style="background-color: oldlace; padding: 10px">
          <h1><b>📜?</b></h1> 
          <h1><b>404</b> ; Halaman tidak ditemukan!</h1>
          <h5>Halaman yang kamu cari mungkin masih dikerjakan, atau tidak berada di website ini!</h5>
        </div>
      </div>
      <!-- /.content -->
      
    </div>
    <!-- /.content wrapper -->

    <?php $this->load->view('templates/footer') ?>
    
  </div>
  <!-- /.wrapper -->
</body>
</html>