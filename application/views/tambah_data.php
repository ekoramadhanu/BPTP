    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Magang</h1>        
      </div>
        <form method="post" action="<?=base_url('Home/insertData')?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Pemagang</label>
                <input type="text" class="form-control" placeholder="Masukkan nama pemagang" name="nama">                
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Universitas</label>
                <input type="text" class="form-control" placeholder="Masukkan Universitas" name="universitas">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Program Studi</label>
                <input type="text" class="form-control" placeholder="Masukkan Program Studi" name="programStudi">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Penempatan Magang</label>
                <input type="text" class="form-control" placeholder="Masukkan Penempatan Magang" name="penempatanMagang">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Pembimbing Magang</label>
                <input type="text" class="form-control" placeholder="Masukkan Pembimbing Magang" name="pembimbingMagang">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tanggalMulai">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Selesai</label>
                <input type="date" class="form-control" name="tanggalSelesai">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

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
