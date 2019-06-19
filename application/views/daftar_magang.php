<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Magang</h1>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead >
          <tr class="text-center text-white" id="bg-gradient-primary">
            <th class="align-middle">No</th>
            <th class="align-middle">Jumlah Peserta</th>            
            <th class="align-middle">Sekolah</th>
            <th class="align-middle">Waktu PKL</th>
            <th class="align-middle">Penempatan</th>
            <th class="align-middle">Pembimbing</th>
            <th class="align-middle">Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $counter = 1;
          foreach ($daftarMagang as $daftar):?>
            <tr>
              <td><?= $counter ?></td>
              <td><?=$daftar->jumlah." orang"?></td>
              <td><?=$daftar->institute?></td>
              <td><?=$daftar->waktupkl?></td>
              <td><?=$daftar->place?></td>
              <td><?=$daftar->guide?></td>
              <td>
                <button href="" class="btn btn-primary btn-user btn-block">
                  Detail
                </button>      
              </td>
            </tr>
          <?php 
           $counter++;
          endforeach;?>
        </tbody>
        <tfoot>
          <tr class="text-center text-white " id="bg-gradient-primary">
            <th class="align-middle">No</th>
            <th class="align-middle">Jumlah Peserta</th>            
            <th class="align-middle">Sekolah</th>
            <th class="align-middle">Waktu PKL</th>
            <th class="align-middle">Penempatan</th>
            <th class="align-middle">Pembimbing</th>
            <th class="align-middle">Keterangan</th>
          </tr>
        </tfoot>        
      </table>
    </div>
  </div>
</div>

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

