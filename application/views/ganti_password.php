    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0" style="color:black">Ganti Password</h1>        
      </div>
      <!-- from ganti password -->
      <div class="row">
        <div class="col-lg-6">
          <?= $this->session->flashdata('message')?>
          <form class="user" method="post" action="<?=base_url('Home/gantiPassword')?>">
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password Lama" name="passwordLama" style="color:black">                        
              <?= form_error('passwordLama','<small class="text-danger pl-3">','</small>');?>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password Baru" name="passwordBaru" style="color:black">              
              <?= form_error('passwordBaru','<small class="text-danger pl-3">','</small>');?>
            </div>
            <div class="form-group">              
              <input type="password" class="form-control" placeholder="Ulangi Password Baru" name="repasswordBaru" style="color:black">              
              <?= form_error('repasswordBaru','<small class="text-danger pl-3">','</small>');?>
            </div>
            <div class="d-flex justify-content-end">
              <button type="submit" class="btn btn-primary ">Ganti</button>
            </div>
          </form>
        </div>
      </div>
      <!--  -->
    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; BPTP Jawa Timur</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
