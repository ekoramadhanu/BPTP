    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ganti Password</h1>        
      </div>
      <!-- from ganti password -->
      <div class="row">
        <div class="col-lg-6">
          <form class="user" method="post" action="<?=base_url('Password')?>">
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password Lama" name="passwordLama">                        
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password Baru" name="passwordBaru">              
            </div>
            <div class="form-group">              
              <input type="password" class="form-control" placeholder="Ulangi Password Baru" name="repasswordBaru">              
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
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
