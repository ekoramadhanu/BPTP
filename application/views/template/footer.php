<!-- Bootstrap core JavaScript-->
<script src="<?=base_url('Assets/SB2admin/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('Assets/SB2admin/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('Assets/SB2admin/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('Assets/SB2admin/')?>js/sb-admin-2.min.js"></script>
  
  <!-- Page level plugins -->
  <script src="<?=base_url('Assets/SB2admin/')?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('Assets/SB2admin/')?>js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url('Assets/SB2admin/')?>js/demo/chart-pie-demo.js"></script>
  <script src="<?=base_url('Assets/')?>jquery.js"></script>
  <script>
  var ambilVal;
    // event yang diambil dari tempat view daftar_magang
    $('.cetak').click(function () {
      ambilVal= $(this).attr('data-kelompok');        
      console.log(ambilVal);
      $('.form-cetak').attr('action', $('.form-cetak').attr('action') + '/' + ambilVal)
    });

    // event yang diambil dari tempat view daftar_administrator untuk hapus
    $('.hapusAdmin').click(function () {
      ambilVal= $(this).attr('data-id');        
      console.log(ambilVal);
      $('.form-hapus').attr('action', $('.form-hapus').attr('action') + '/' + ambilVal)
    });
    // event yang diambil dari tempat view daftar_administrator untuk update
    $('.updateAdmin').click(function () {
      ambilVal= $(this).attr('data-id');        
      console.log(ambilVal);
      $('.form-update').attr('action', $('.form-update').attr('action') + '/' + ambilVal)
    });

  </script>
</body>

</html>