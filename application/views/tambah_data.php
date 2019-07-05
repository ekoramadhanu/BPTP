    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-black">Tambah Magang</h1>        
      </div>
        <form method="post" action="<?=base_url('Home/tambahData')?>" class="pl-3 pr-3">
            <div class="form-group">
                <label class="text-black">Nama Pemagang</label>
                <input type="text" class="form-control" name="nama[]" required>                
            </div>
            <div class="form-group">
                <label class="text-black">NIM/NISN</label>
                <input type="number" class="form-control" name="nomor[]" required>                
            </div>
            <div class="form-group">          
              <label class="text-black">Jenis Kelamin</label>
              <select class="form-control" name="jenisKelamin[]" style="color:black">            
                <option class="" style="color:black" value="L">Laki - Laki</option>
                <option class="" style="color:black" value="P">Perempuan</option>            
              </select>
            </div>                                                        
            <div class="form-group">          
              <label class="text-black">Pekerjaan </label>
              <select class="form-control" name="pekerjaan" style="color:black" id="pekerjaan" >            
                <option class="" style="color:black" value="siswa">Siswa</option>
                <option class="" style="color:black" value="mahasiswa">Mahasiswa</option>            
              </select>
            </div>                                                        
            <div class="form-group">
                <label class="text-black" id="labelSekolah">Sekolah</label>
                <input type="text" class="form-control" name="sekolah" id="inputSekolah" required>
            </div>
            <div class="form-group">
                <label class="text-black" id="labeljurusan">Jurusan</label>
                <input type="text" class="form-control" name="fakultas" required>                
            </div>
            <div class="form-group" id="programStudi">                
            </div>
            <div class="form-group">
                <label class="text-black">Penempatan Magang</label>
                <input type="text" class="form-control" name="penempatanMagang" required>
            </div>
            <div class="form-group">
                <label class="text-black">Pembimbing Magang</label>
                <input type="text" class="form-control" name="pembimbingMagang" required>
            </div>
            <div class="form-group">
                <label class="text-black">Tanggal Mulai</label>
                <input type="date" class="form-control text-black" name="tanggalMulai" required>
            </div>
            <div class="form-group">
                <label class="text-black">Tanggal Selesai</label>
                <input type="date" class="form-control text-black" name="tanggalSelesai" required>
            </div>
            <div class="form-group">
              <label id="daftarMagang" class="text-black">Daftar angota</label>                
              <div id="listAnggota"></div>
              <a class="small text-primary" href="" data-toggle="modal" data-target="#tambahAnggota" >Tambah Anggota</a>
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
          name="namaAggota" required style="color:black" required>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="NIM/NISN" id="nomorInduk"
          name="nomorInduk" min='0'required style="color:black" required>
        </div>        
        <div class="form-group">          
          <label class="text-black">jenis kelamin</label>
          <select class="form-control" name="jenisKelamin" style="color:black" id="jenisKelamin">            
            <option class="" style="color:black" value="L">Laki - Laki</option>
            <option class="" style="color:black" value="P">Perempuan</option>            
          </select>
        </div>                                                        
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" id="tambah" data-dismiss="modal">tambah</button>
      </div>    
  </div>
</div>
</div>