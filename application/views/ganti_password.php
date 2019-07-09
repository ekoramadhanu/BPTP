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
          <?=form_error('passwordBaru', '<div class="alert alert-danger" role="alert">', '</div>')?>
          <form class="user needs-validation" method="post" action="<?=base_url('UserControler')?>" novalidate>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="kata Sandi Lama" name="passwordLama" style="color:black" required>                                      
              <div class="invalid-feedback">
                <p class="pl-2">Kata sandi lama tidak boleh kosong</p>
              </div>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="kata Sandi Baru" name="passwordBaru" style="color:black" required>                            
              <div class="invalid-feedback">
                <p class="pl-2">Kata sandi baru tidak boleh kosong</p>
              </div>
            </div>
            <div class="form-group">              
              <input type="password" class="form-control" placeholder="Ulangi Kata Sandi Baru" name="repasswordBaru" style="color:black" required>                            
              <div class="invalid-feedback">
                <p class="pl-2">Ulangi kata sandi anda</p>
              </div>
            </div>
            <div class="">
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
