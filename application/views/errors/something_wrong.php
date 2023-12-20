<!DOCTYPE html>
<html>

<?php $this->load->view('templates/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php 
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar'); 
    ?>

    <!-- content-wrapper -->
    <div class="content-wrapper">

      <?php $this->load->view('templates/content_header'); ?>

      <!-- main content -->
      <div class="container-fluid" style="max-width: 600px">
        <div class="card card-outline card-danger" align="center" style="background-color: oldlace; padding: 10px">
          <h2>
            <b>Terjadi Kesalahan... <i class="fas fa-bug"></i></b>
          </h2>
          <h4>Coba ulangi proses, atau hubungi administrator</h4>
        </div>
      </div>

    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view('templates/footer') ?>

  </div>
  <!-- /.wrapper -->
</body>
</html>