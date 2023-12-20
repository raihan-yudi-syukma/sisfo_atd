<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: royalblue">

  <!-- Logo -->
  <a target="_blank" title="Website resmi Sisfo ATD" href="https://sisfo.amiktridharmapku.ac.id" class="brand-link">
    <img src="<?= base_url('assets/img/atd_logo.png') ?>" width="80px" alt="Logo ATD" class="img-circle elevation-3">
    <span class="font-weight-bold text-white">&nbsp Sisfo ATD</span>
  </a>

  <!-- user panel -->
  <?php if ($current_user == TRUE) : ?>
  <a href="<?= site_url('admin/setting') ?>" title="Aministrator's Settings">
    <div class="user-panel mt-3 pb-3 mb-2 d-flex">
      <!-- avatar -->
      <div class="image">
        <img class="img-circle elevation-2" src="<?php echo $current_user->avatar ? $current_user->avatar : base_url('assets/img/koperasi_logo.png') ?>" alt="<?= htmlentities($current_user->name, TRUE) ?>">
      </div>
      <!-- username --> 
      <div class="text-white info">
        <b><?= htmlentities($current_user->name) ?></b><br>  
        <small>
          <i class="nav-icon fas fa-envelope"></i>
          <?= htmlentities($current_user->email) ?>
        </small>
      </div>
    </div>
  </a>
  <?php endif ?>
  <!-- /.user panel -->

  <!-- sidebar container -->
  <div class="sidebar">
    <!-- sidebar menu -->
    <nav class="mt-2">
      <!-- data accordion -->
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Admin Only Items -->

        <?php if ($current_user == TRUE) : ?>
          <!-- dashboard -->
          <li class="nav-item">
            <a title="Admin's Dashboard" class="nav-link <?php if ($meta['title'] == 'Dashboard') echo 'active'?>" href="<?= site_url('admin/dashboard') ?>">
              <i class="nav-icon fas fa-desktop"></i>
              <p><b>Dashboard</b></p>
            </a>
          </li>

          <!-- mahasiswa menu -->
          <li class="nav-item <?php if ($meta['title'] == 'Mahasiswa') echo 'menu-open' ?>">
            <a title="Student's menu" href="#" class="nav-link <?php if ($meta['title'] == 'Mahasiswa') echo 'active' ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                <b>Mahasiswa</b>
                <i class="right fas fa-angle-left"></i>
              </p>
                
              <!-- flashdata -->
              <?php if ($this->session->flashdata('mahasiswa_saved')) : ?>
              <b class="text-lime">
                <i class="fas fa-check"></i> 
                <?= $this->session->flashdata('mahasiswa_saved') ?>
              </b>

              <?php elseif ($this->session->flashdata('mahasiswa_updated')) : ?>
              <b class="text-lime">
                <i class="fas fa-pen"></i>
                <?= $this->session->flashdata('mahasiswa_updated') ?>
              </b>

              <?php elseif ($this->session->flashdata('mahasiswa_deleted')) : ?>
              <b class="text-lime">
                <i class="fas fa-trash"></i>
                <?= $this->session->flashdata('mahasiswa_deleted') ?>
              </b>

              <?php elseif ($this->session->flashdata('mahasiswa_truncated')) : ?>
              <b class="text-lime">
                <i class="fas fa-fire"></i> 
                <?= $this->session->flashdata('mahasiswa_truncated') ?>
              </b>
              <?php endif ?>
              <!-- /.flashdata -->
            </a>

            <ul class="nav nav-treeview">
              <!-- mahasiswa list -->
              <li class="nav-item">
                <a title="Students List" href="<?= site_url('admin/akademik/mahasiswa') ?>" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>Daftar Mahasiswa</p>
                </a>
              </li>
                    
              <!-- mahasiswa add -->
              <li class="nav-item">
                <a title="Add new Student" href="<?= base_url('admin/akademik/mahasiswa/add') ?>" class="nav-link">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>Tambah Data</p>
                </a>
              </li>

              <!-- Google Forms -->
              <li class="nav-item">
                <a title="Add via Google Forms" target="new" href="https://docs.google.com/forms/d/e/1FAIpQLSdn3tOMHIv-w5n1kJUpN-kKRlIPF1BYcebEdg97A0XjiApbyQ/viewform?pli=1" class="nav-link">
                  <i class="nav-icon fas fa-file text-purple"></i>
                  <p>PMB Google Forms</p>
                </a>
              </li>

            </ul>
          </li>
          <!-- /.mahasiswa menu -->

          <!-- post menu -->
          <li class="nav-item <?php if ($meta['title'] == 'Posts') echo 'menu-open' ?>">
            <a title="Manage our articles" class="nav-link <?php if ($meta['title'] == 'Posts') echo 'active' ?>" href="#">
              <i class="nav-icon fa fa-object-group"></i>
              <p>
                <b>Posts</b>
                <i class="right fas fa-angle-left"></i>
              </p>

              <!-- flashdata -->
              <?php if ($this->session->flashdata('post_saved')) : ?>
              <b class="text-lime">
                <i class="fas fa-check"></i> 
                <?= $this->session->flashdata('post_saved') ?>
              </b>

              <?php elseif ($this->session->flashdata('post_updated')) : ?>
              <b class="text-lime">
                <i class="fas fa-pen"></i>
                <?= $this->session->flashdata('post_updated') ?>
              </b>

              <?php elseif ($this->session->flashdata('post_deleted')) : ?>
              <b class="text-lime">
                <i class="fas fa-trash"></i>
                <?= $this->session->flashdata('post_deleted') ?>
              </b>

              <?php elseif ($this->session->flashdata('post_truncated')) : ?>
              <b class="text-lime">
                <i class="fas fa-fire"></i> 
                <?= $this->session->flashdata('post_truncated') ?>
              </b>
              <?php endif ?>
              <!-- /.flashdata -->
            </a>

            <ul class="nav nav-treeview">
              <!-- post list -->
              <li class="nav-item">
                <a title="View the created articles" href="<?= site_url('admin/akademik/post') ?>" class="nav-link">
                  <i class="nav-icon fas fa-list"></i>
                  <p>Post List</p>
                </a>
              </li>
                    
              <!-- post add -->
              <li class="nav-item">
                <a title="Create new article" href="<?= base_url('admin/akademik/post/add') ?>" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Create Post</p>
                </a>
              </li>
            </ul>
          </li>
          <!--post menu -->

          <!-- payroll menu -->
          <li class="nav-item">
            <a title="Payroll Sytem" href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                <b>Payroll (in development)</b>
                <i class="right fas fa-angle-left"></i>
              </p>

            <ul class="nav nav-treeview">
              <!-- jabatan -->
              <li class="nav-item">
                <a title="Jabatan2 di ATD" href="#" class="nav-link">
                  <i class="nav-icon fas fa-laptop"></i>
                  <p>Jabatan</p>
                </a>
              </li>
                    
              <!-- karyawan -->
              <li class="nav-item">
                <a title="Data SDM" href="#" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>Karyawan</p>
                </a>
              </li>

              <!-- Penggajian -->
              <li class="nav-item">
                <a title="Payroll" href="#" class="nav-link">
                  <i class="nav-icon text-lime">$</i>
                  <p>Penggajian</p>
                </a>
              </li>
              
            </ul>
          </li>
          <!-- /.payroll menu -->

          <!-- feedback -->
          <li class="nav-item">
            <a title="See messages" class="nav-link <?php if ($meta['title'] == 'Feedback') echo 'active' ?>" href="<?= site_url('admin/akademik/feedback') ?>">
              <i class="nav-icon fas fa-comments"></i>
              <p><b>Feedback</b></p>
              <!-- flashdata -->
              <?php if ($this->session->flashdata('feedback_deleted')) : ?>
              <b class="text-lime">
                <i class="fas fa-trash"></i> 
                <?= $this->session->flashdata('feedback_deleted') ?>
              </b>
              <?php elseif ($this->session->flashdata('feedback_truncated')) : ?> 
              <b class="text-lime">
                <i class="fas fa-fire"></i> 
                <?= $this->session->flashdata('feedback_truncated') ?>
              </b>
              <?php endif ?>
            </a>
          </li>

          <!-- logout -->
          <li class="nav-item">
            <a title="You have to login again if you logout!" href="<?= base_url('auth/logout') ?>" class="nav-link text-danger" onclick="return confirm('⚠ Anda yakin ingin Logout?')">
              <i class="nav-icon fas fa-power-off"></i>
              <p><b>Logout</b></p>
            </a>
          </li>
        <?php endif ?>
        <!-- /.Admin Only Items -->
      </ul>
      <!-- /.data accordion -->
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar container -->
</aside>