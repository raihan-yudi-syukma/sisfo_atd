<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/atd_favicon.ico') ?>">
  <title>
    <?php echo $current_user == FALSE ? 'Sisfo ATD' : 'Admin ATD' ?> | <?= $meta['title'] ?>
  </title>

  <!-- background settings -->
  <style type="text/css">
    body, .content-wrapper, .wrapper { 
      background-image: url(<?= base_url('assets/img/abstract_blue_wallpaper.jpg') ?>)
    }
  </style>

  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/template/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('assets/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url('assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/template/dist/css/adminlte.min.css') ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">  
</head>