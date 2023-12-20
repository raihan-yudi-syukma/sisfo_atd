<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('templates/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">
    <?php 
    $this->load->view('templates/navbar'); 
    $this->load->view('templates/sidebar'); 
    ?>

    <div class="content-wrapper">
      <div class="container-fluid" style="padding-top: 20px; max-width: 1300px;">
        <div class="card card-outline card-info">
          <table border="1">

            <!-- title -->
            <thead>
              <tr>
                <td class="tb-header-mhs" colspan="10">
                  <!-- title -->
                  <div class="tb-title-mhs" align="center">
                    <a title="Go back, if the data you're searches with keyword is not found." class="text-white" href="<?= site_url('admin/akademik/mahasiswa') ?>">
                      <i class="far fa-circle fas fa-users"></i> Daftar Mahasiswa
                    </a>
                  </div>

                  <div align="center">
                  <!-- flashdata -->
                    <?php if ($this->session->flashdata('mahasiswa_deleted')) : ?>
                    <div class="alert alert-dismissible fade show bg-lime" role="alert" style="width: 380px">
                      <h4 align="center">
                        <?= $this->session->flashdata('mahasiswa_deleted') ?>
                        <i class="fas fa-trash"></i> 
                        <?php $this->session->unset_userdata('mahasiswa_deleted') ?>
                      </h4>
                      <button type="button" class="close" data-dismiss="alert" aria-label="close">
                         <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <?php elseif ($this->session->flashdata('mahasiswa_truncated')) : ?>
                    <div align="center" class="alert alert-dismissible fade show bg-lime" role="alert" style="width: 500px">
                      <h4> 
                        <?= $this->session->flashdata('mahasiswa_truncated') ?>
                        <i class="fas fa-fire"></i>
                        <?php $this->session->unset_userdata('mahasiswa_truncated') ?>
                      </h4>
                      <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php endif ?>
                         
                    <!-- search -->
                    <h5>- Pencarian Data -</h5>
                    <!-- form search -->
                    <form method="GET">
                      <!-- input keyword -->
                      <label for="keyword">1. </label>
                      <input title="Enter the keyword" type="search" class="input" style="width: 230px;" name="keyword" placeholder="Masukkan NIM / Nama" value="<?= html_escape($keyword) ?>">&nbsp&nbsp

                      <!-- select kelamin -->
                      <label for="kelamin">2. </label>
                      <select title="Select the gender" class="input" style="width: 230px;" name="kelamin">
                        <option value="" selected>Semua Jenis Kelamin</option>
                        <?php foreach ($kelaminx as $klm) : ?>
                        <option value="<?= $klm ?>" <?= set_select('kelamin', $klm, $klm == $kelamin ? TRUE : FALSE) ?>>
                          <?= $klm ?>
                        </option>
                        <?php endforeach ?>
                      </select>&nbsp&nbsp

                      <!-- select prodi -->
                      <label for="program_studi">3. </label>
                      <select title="I dont know what this text means in english.." class="input" style="width: 230px;" name="program_studi">
                        <option value="" selected>Semua Program Studi</option>
                        <?php foreach ($program_studix as $prodi) : ?>
                        <option value="<?= $prodi ?>" <?= set_select('program_studi', $prodi, $prodi == $program_studi ? TRUE : FALSE) ?>>
                          <?= $prodi ?>
                        </option>
                        <?php endforeach ?>
                      </select>&nbsp&nbsp

                      <!-- btn submit -->
                      <button title="Search engine, activated!" type="submit" class="btn-submit" style="background-color: aquamarine">
                        Cari <i class="fas fa-search"></i>
                      </button>
                    </form>
                    <!-- /.form search -->
                  </div>
                  <!-- /.Seacrh -->
                </td>
              </tr>
            </thead>
            <!-- title -->

            <!-- content -->
            <tbody>
              <tr>
                <td style="background-color: oldlace;">
                  <h1 align="center">Tidak ada yang ditemukan!</h1>
                  <h5 align="center">
                    <a class="text-info" href="<?= site_url('admin/akademik/mahasiswa/add') ?>">Tambah data</a> atau coba cari dengan kata kunci yang berbeda!
                  </h5>
                </td>
              </tr>
            </tbody>
            <!-- content -->

          </table> 
        </div>
        <!-- /.card -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
    <?php $this->load->view('templates/footer') ?>

  </div>
  <!-- /.wrapper -->
</body>
</html>