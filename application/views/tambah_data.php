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
                <input type="date" class="form-control text-black" name="tanggalMulai">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Selesai</label>
                <input type="date" class="form-control text-black" name="tanggalSelesai">
            </div>
            <div class="form-group">
              <label id="daftarMagang">Daftar angota</label>                
              <div id="listAnggota"></div>
              <a class="text-white btn btn-primary" data-toggle="modal" data-target="#tambahAnggota">Tambah Anggota</a>
            </div>
            <button class="btn btn-primary ">tambah</button>
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

<!-- tambah anggota -->
<div class="modal fade" id="tambahAnggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header" style="color:black">
      <h5 class="modal-title" id="exampleModalLabel">Isi Form Tambah Anggota</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>    
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="Nama anggota"  id="namaAnggota"
          name="namaAggota" required style="color:black">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="NIM/NISN" id="nomorInduk"
          name="nomorInduk" min='0'required style="color:black">
        </div>        
        <div class="form-group">          
          <label class="text-black">jenis kelamin</label>
          <select class="form-control" name="jenisKelamin" style="color:black" id="jenisKelamin">            
            <option class="" style="color:black">Laki - Laki</option>
            <option class="" style="color:black">Perempuan</option>            
          </select>
        </div>                                                        
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" id="tambah">tambah</button>
      </div>    
  </div>
</div>
</div>