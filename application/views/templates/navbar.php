<nav class="main-header navbar navbar-expand" style="background: crimson">

  <ul class="navbar-nav">
     <!-- pushmenu -->
     <li>
        <a class="nav-link text-white" role="button" title="Hide or show the sidebar" data-widget="pushmenu" href="#">
          <i class="fas fa-bars"></i>
        </a>
      </li>

    <!-- home -->
    <li>
      <a class="nav-link text-white font-weight-bold" title="Go to homepage" href="<?= site_url() ?>">
        <i class="fas fa-home"></i> Home
      </a>
    </li>

    <!-- article -->
    <li>
      <a class="nav-link text-white font-weight-bold" title="See our published articles" href="<?= site_url('article') ?>">
        <i class="fas fa-book"></i> Artikel
      </a>
    </li>

      <!-- about -->
    <li>
      <a class="nav-link text-white font-weight-bold" title="About ATD" href="<?= site_url('page/about') ?>">
        <i class="fas fa-info"></i> About Us
      </a>
    </li>

    <!-- contact -->
    <li>
      <a class="nav-link text-white font-weight-bold" title="Send a message to us!" href="<?= site_url('page/contact') ?>">
        <i class="fas fa-comment text-teal"></i> Contact
      </a>
    </li>
  </ul>
  <!-- /. Left navbar links -->

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- login-->
    <?php if ($current_user == FALSE) : ?>
      <li class="pr-5">
        <a class="nav-link btn bg-lime font-weight-bold" role="button" title="Login if you're an administrator" href="<?= site_url('auth/login') ?>">
          <i class="fas fa-key"></i> Login
        </a>
      </li>
    <?php endif; ?>
  </ul>
  <!-- /. Right navbar links -->
</nav>
