<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('templates/head') ?>

<body class="hold-transition sidebar-mini layout-fixed">
  
  <div class="wrapper">
    <?php 
    $this->load->view('templates/navbar');
    $this->load->view('templates/sidebar'); 
    ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">

      <!-- Main content -->
      <div class="container-fluid" style="padding-top: 20px; max-width: 3500px">
        <div class="card card-outline card-info">
          <table border="1">

            <!-- table title -->
            <thead>
              <tr>
                <td class="tb-header-mhs" colspan="10">

                  <!-- title -->
                  <div title="This is the title" class="tb-title-mhs" align="center">
                    <i class="far fa-circle fas fa-users"></i> Daftar Mahasiswa
                  </div>

                  <div align="center">

                    <!-- flashdata -->
                    <?php if ($this->session->flashdata('mahasiswa_deleted')) : ?>
                    <div class="alert alert-dismissible fade show bg-lime" role="alert" style="width: 350px">
                      <h4 align="center">
                        <?= $this->session->flashdata('mahasiswa_deleted') ?>
                        <i class="fas fa-trash"></i> 
                        <?php $this->session->unset_userdata('mahasiswa_deleted') ?>
                      </h4>
                      <button title="close this notification" type="button" class="close" data-dismiss="alert" aria-label="close">
                         <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <?php endif ?>

                    <!-- Search -->
                    <h5>- Pencarian Data -</h5>
                    <!-- form search -->
                    <form method="GET">
                      <!-- input keyword -->
                      <label for="keyword">1. </label>
                      <input type="search" title="Enter the keyword" class="input" name="keyword" placeholder="Masukkan NIM / Nama" value="<?= html_escape($keyword) ?>" style="width: 230px">&nbsp&nbsp

                      <!-- select kelamin -->
                      <label for="kelamin">2. </label>
                      <select title="Select gender" class="input" style="width: 230px" name="kelamin">
                        <option value="" selected>Semua Jenis Kelamin</option>
                        <?php foreach ($kelaminx as $klm) : ?>
                        <option value="<?= $klm ?>" <?= set_select('kelamin', $klm, $klm == $kelamin ? TRUE : FALSE) ?>>
                          <?= $klm ?>
                        </option>
                        <?php endforeach ?>
                      </select>&nbsp&nbsp

                      <!-- select program studi -->
                      <label for="program_studi">3. </label>
                      <select title="Select.. uh, study program?" class="input" style="width: 230px" name="program_studi">
                        <option value="" selected>Semua Program Studi</option>
                        <?php foreach ($program_studix as $prodi) : ?>
                        <option value="<?= $prodi ?>" <?= set_select('program_studi', $prodi, $prodi == $program_studi ? TRUE : FALSE) ?>>
                          <?= $prodi ?>
                        </option>
                        <?php endforeach ?>
                      </select>&nbsp&nbsp

                      <!-- submit -->
                      <button title="Activate search engine" value="search" type="submit" class="btn-submit" style="background-color: aquamarine">
                        Cari <i class="fas fa-search"></i>
                      </button>
                    </form>
                  </div>
                  <!-- /.Seacrh -->

                </td>
              </tr>
            </thead>
            <!-- /.table title -->

            <!-- table header column -->
            <thead>
              <tr>
                <th class="th-mhs">No.</th>
                <th class="th-mhs">NIM</th>
                <th class="th-mhs">Nama</th>
                <th class="th-mhs">Tempat Lahir</th>
                <th class="th-mhs">Tanggal Lahir</th>
                <th class="th-mhs">Jenis Kelamin</th>
                <th class="th-mhs">Alamat</th>
                <th class="th-mhs">No. Telepon</th>
                <th class="th-mhs">Program Studi</th>
                <th class="th-mhs">Aksi</th>
              </tr>
            </thead>
            <!-- /.table header column -->

            <!-- table contents -->
            <?php 
            $i = 1; foreach ($mahasiswa as $mhs) : ?>
            <tbody>
              <tr class="tr-mhs">
                <td align="center" bgcolor="skyblue"><b><?= $i."." ?></b></td>
                <td class="td-mhs" bgcolor="papayawhip"><?= $mhs->nim ?></td>
                <td class="td-mhs" bgcolor="oldlace"><?=  $mhs->nama ?></td>
                <td class="td-mhs" bgcolor="papayawhip"><?=  $mhs->tpt_lahir ?></td>
                <td class="td-mhs" bgcolor="oldlace"><?=  $mhs->tgl_lahir ?></td>
                <td class="td-mhs" bgcolor="papayawhip"><?=  $mhs->kelamin ?></td>
                <td class="td-mhs" bgcolor="oldlace"><?=  $mhs->alamat ?></td>
                <td class="td-mhs" bgcolor="papayawhip"><?=  $mhs->no_telepon ?></td>
                <td class="td-mhs" bgcolor="oldlace"><?=  $mhs->program_studi ?></td>
                <td class="td-aksi-mhs">
                  <a title="Edit this Student's data" href="<?= base_url('admin/akademik/mahasiswa/edit/'.$mhs->id) ?>">
                    <Button class="btn-ubah-mhs">
                      Ubah<img class="img-ubah-mhs" src="<?= base_url('assets/img/pencil.png') ?>">
                    </Button>
                  </a><br>
                  <a title="Delete this Student's data" href="<?= base_url('admin/akademik/mahasiswa/delete/'. $mhs->id) ?>" onclick="return confirm('⚠ Hapus data? NIM: <?=  $mhs->nim.',  Nama: '. $mhs->nama ?>')">
                    <Button class="btn-hapus">
                      Hapus<img class="img-hapus-mhs" src="<?= base_url('assets/img/cross_red.png') ?>">
                    </Button>
                  </a>
                </td>
              </tr>
            </tbody>
            <?php $i++; endforeach; ?>
            <!-- /.table contents -->

            <!-- table footer -->
            <tr>
              <td class="tb-footer-mhs" colspan="10" style="padding-right: 10px">
                <?php
                if (!empty($keyword) || !empty($kelamin) || !empty($program_studi)) { /* do nothing... I make it like this, so when the user use the search feature, the pagination feature won't showing (because i still have problems with search and pagination feature combined) */} 
                else {
                  echo $this->pagination->create_links();
                }
                ?>
                <a title="All data will DELETED!" href="<?= base_url('admin/akademik/mahasiswa/truncate') ?>" onclick="return confirm('⚠ Anda yakin ingin MENGHAPUS SELURUH DATA MAHASISWA?')">
                  <button class="btn-truncate-mhs">🔥 Hapus seluruh data</button>
                </a>
              </td>
            </tr>
          </table>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view('templates/footer') ?>

  </div>
  <!-- /.wrapper -->
</body>
</html>