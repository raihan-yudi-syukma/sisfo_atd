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

    <!-- content wrapper -->
    <div class="content-wrapper">
      <?php $this->load->view('templates/content_header') ?>
      
      <!-- main content -->
      <div class="container-fluid" style="max-width: 900px;">
        <!-- row -->
        <div class="row">

          <div class="small-box col-lg-2 col-4 m-3 bg-success" align="center">
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <h3><?= $count_prodi['count_mi'] ?></h3>
            <h5>Mahasiswa Manajemen Informatika</h5>
          </div>

          <div class="small-box col-lg-2 col-4 m-3 bg-info" align="center">
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <h3><?= $count_prodi['count_si'] ?></h3>
            <h5>Mahasiswa Sistem Informasi</h5>
          </div>

          <div class="small-box col-lg-2 col-4 m-3 bg-warning" align="center">
            <div class="icon">
              <i class="fas fa-user"></i>
            </div>
            <h3><?= $count_prodi['count_tk'] ?></h3>
            <h5>Mahasiswa Teknik Komputer</h5>
          </div>

          <div class="small-box col-lg-2 col-4 m-3 bg-danger" align="center">
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <h3>
              <?= 
                $count_prodi['count_mi'] + 
                $count_prodi['count_si'] +
                $count_prodi['count_tk']; 
              ?>
            </h3>
            <h5>
              Total Mahasiswa<br>
            </h5>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content wrapper -->

    <?php $this->load->view('templates/footer'); ?>
    
  </div>
  <!--/.wrapper -->
</body>
</html>