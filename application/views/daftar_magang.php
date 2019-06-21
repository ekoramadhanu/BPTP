<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Magang</h1>
        <button  data-toggle="modal" data-target="#cetakRekap" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm text-white"><i class="fas fa-download fa-sm text-white"></i> Cetak Rekap per Tahun</a>
      </div>
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
          for ($i=1; $i <= 12 ; $i++) :?>                          
          <?php 
          foreach ($daftarMagang[$i] as $rekap) :?>
          <tr>            
              <td><?=$counter?></td>
              <td>
              <?php          
                  $kelompok = $rekap->kelompok;                  
                  $nomor = 1;
                  $query = "select fullname from internship where is_kelompok =".$kelompok;
                  $fullname = $this->db->query($query)->result();                            
                  $check = $this->db->query($query);                                           
                  foreach ($fullname as $name) {
                      if($check->num_rows() == 1){
                        echo $name->fullname."<br>";
                      }else{
                        echo $nomor.". ".$name->fullname."<br>";
                        $nomor++;
                      }                    
                  }
              ?>
              </td>
              <td><?=$rekap->institute?></td>
              <td><?=$rekap->startDay."-".$rekap->StartMonth."-".$rekap->satrtYear
              ." sd ".$rekap->endDay."-".$rekap->endMonth."-".$rekap->endYear?></td>
              <td><?=$rekap->place?></td>
              <td><?=$rekap->guide?></td>
              <td>
              
                  <button type="submit" class="cetak" data-kelompok='<?=$rekap->kelompok?>'class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#cetakBalasan">Cetak</button>
              <!-- </form> -->
              </td>
          </tr>
          <?php 
          $counter++;
          endforeach;?>
          <?php endfor;?>
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
<!-- cetak balasan -->
<div class="modal fade" id="cetakBalasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Isi Form cetak</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form class="form-cetak" action="<?=base_url('Magang/cetakBalasan')?>" method="get">
      <div class="modal-body">
        <div class="form-group">
          <input type="number" class="form-control form-control-user" placeholder="Nomor surat" 
          name="nomor" min='0'>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="Nomor surat yang dibalas"
           name="balasan">
        </div>                
        <div class="form-group">
          <input type="text" class="form-control form-control-user"  placeholder="Surat ditujukan kepada"
           name="tujuan">
        </div>                
        <div class="form-group">
          <input type="text" class="form-control form-control-user"  placeholder="tempat tujuan pengiriman surat"
           name="tempat">
        </div>                
        <div class="form-group">
          <input type="date" class="form-control form-control-user" placeholder="Tanggal surat yang diterima"
           name="tanggal">
        </div>                        
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="submit">Cetak</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- cetak rekap -->
<div class="modal fade" id="cetakRekap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Isi Form cetak</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form action="<?=base_url('Magang/cetakRekap')?>" method="get">
      <div class="modal-body">
      <div class="form-group">
          <input type="number" class="form-control form-control-user" placeholder="Tahun rekap"
           name="tahun" min="0">
        </div>         
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="submit">Cetak</button>
      </div>
    </form>
  </div>
</div>
</div>
<script></script>
