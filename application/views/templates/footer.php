<footer class="main-footer bg-purple" 
<?php if ($current_user == TRUE) echo 'style="text-align: center"' ?>>

  <?php if ($current_user == FALSE) : ?>
  Developed with ❤ by
  <a target="_blank" title="Website resmi ATD" href="https://.amiktridharmapku.ac.id">
    <b class="text-white">AMIK "TRI DHARMA"</b>
  </a>
  <div class="float-right d-none d-sm-inline-block">
    Powered by
    <a target="_blank" title="Website resmi ATD" href="https://.amiktridharmapku.ac.id">
      <b class="text-white">AZ-ZUHRA GROUP</b>
    </a>
  </div>
  <?php else : ?>
  &copy; <?= date('Y') ?> <b>Sisfo ATD v.1.0.0</b>
  <?php endif ?>
</footer>

<!-- jQuery -->
<script src="<?= base_url('assets/template/plugins/jquery/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/template/plugins/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/template/plugins/chart.js/Chart.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/template/plugins/sparklines/sparkline.js')?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('assets/template/plugins/jqvmap/jquery.vmap.min.js')?>"></script>
<script src="<?= base_url('assets/template/plugins/jqvmap/maps/jquery.vmap.usa.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/template/plugins/jquery-knob/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/template/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/template/dist/js/adminlte.min.js')?>"></script>