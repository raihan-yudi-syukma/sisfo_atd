<nav class="main-header navbar navbar-expand" style="background-color: crimson">

  <ul class="navbar-nav" >
     <!-- pushmenu -->
     <li>
        <a class="nav-link text-white" title="Hide or show the sidebar" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i>
        </a>
      </li>

    <!-- home -->
    <li>
      <a title="Go to homepage" href="<?= site_url() ?>" class="nav-link text-white">
        <i class="fas fa-home"></i>
        <b>Home</b>
      </a>
    </li>

    <!-- article -->
    <li>
      <a title="See our published articles" href="<?= site_url('article') ?>" class="nav-link text-white">
        <i class="fas fa-book"></i>
        <b>Artikel</b>
      </a>
    </li>

      <!-- about -->
    <li>
      <a title="About ATD" href="<?= site_url('page/about') ?>" class="nav-link text-white">
        <i class="fas fa-info"></i>
        <b>About Us</b>
      </a>
    </li>

    <!-- contact -->
    <li>
      <a title="Send a message to us!" href="<?= site_url('page/contact') ?>" class="nav-link text-white">
        <i class="fas fa-comment text-teal"></i>
        <b>Contact</b>
      </a>
    </li>

    <!-- login-->
    <?php if ($current_user == FALSE) : ?>
      <li style="margin-left: auto">
        <a title="Login if you're an administrator" href="<?= site_url('auth/login') ?>" class="nav-link text-white">
          <i class="fas fa-key text-lime"></i>
          <b>Login</b>
        </a>
      </li>
    <?php endif; ?>
  </ul>
  <!-- /. Left navbar links -->
</nav>