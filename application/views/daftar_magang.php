<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0" style="color:black">Daftar Magang</h1>  
  </div>
  <div class="row mb-2">
    <div class="col-lg-12 text-right">      
      <button  data-toggle="modal" data-target="#cetakRekap" class="btn btn-sm shadow-sm text-white btn-primary"><i class="fas fa-print fa-sm text-white"></i> Cetak Rekap per Tahun</a>      
    </div>
  </div>
  
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="row pt-2 pl-2 pr-2">    
      <div class="col-lg-12 col-md-12 col-xs-12 d-flex justify-content-end">
        <form action="<?=base_url('Home/daftarMagang')?>" method="post" id="form-cari" class="form-inline">
          <div class="input-group">
            <input type="text" class="form-control mr-3" placeholder="nama" name="nama" autocomplete="off">            
            <input type="number" class="form-control mr-3 " placeholder="tahun" name="tahun" min='1' autocomplete="off">
            <input class="btn btn-outline-primary " type="submit" name="submit" value="Cari">            
          </div>      
        </form>
      </div>        
  </div>
  <div class="row">  
    <div class="card-body col-lg-12">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="color:black">
          <thead >
            <tr class="text-center" id="bg-gradient-primary">
              <th class="align-middle border border-black">No</th>
              <th class="align-middle border border-black">Jumlah Peserta</th>            
              <th class="align-middle border border-black">Sekolah</th>
              <th class="align-middle border border-black">Waktu PKL</th>
              <th class="align-middle border border-black">Penempatan</th>
              <th class="align-middle border border-black">Pembimbing</th>
              <th class="align-middle border border-black">Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php             
              foreach ($daftarMagang as $rekap):
            ?>
            <tr>            
              <td class="border border-black"><?=++$start?></td>
              <td>
                <?php          
                  $kelompok = $rekap->kelompok;                  
                  $nomor = 1;
                  $query = "select fullname from internship where id_kelompok =".$kelompok." order by fullname asc";
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
              <td class="border border-black"><?=$rekap->institute?></td>
              <td class="border border-black"><?=$rekap->startDay."-".$rekap->StartMonth."-".$rekap->satrtYear
              ." sd ".$rekap->endDay."-".$rekap->endMonth."-".$rekap->endYear?></td>
              <td class="border border-black"><?=$rekap->place?></td>
              <td class="border border-black"><?=$rekap->guide?></td>
              <td class="text-center">        
                <button type="submit" class="cetak btn btn-outline-primary" data-kelompok='<?=$rekap->kelompok?>'class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#cetakBalasan">Cetak</button>
              </td>
            </tr>
                
            <?php
            endforeach; ?>
          </tbody>
          <tfoot>
            <tr class="text-center">
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
<?php 
 echo $this->pagination->create_links();
?>
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
    <div class="modal-header " style="color:black">
      <h5 class="modal-title" id="exampleModalLabel">Isi Form cetak</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form class="form-cetak" action="<?=base_url('Magang/cetakBalasan')?>" method="get">
      <div class="modal-body">
        <div class="form-group">
          <input type="number" class="form-control form-control-user" placeholder="Nomor surat" 
          name="nomorSurat" min='0'required style="color:black">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="Jumlah Lampiran" 
          name="nomorLampiran" min='0'required style="color:black">
        </div>        
        <div class="form-group">
          <input type="text" class="form-control form-control-user"  placeholder="Nama Penerima"
           name="penerima" required style="color:black">
        </div>                
        <div class="form-group">
          <input type="text" class="form-control form-control-user"  placeholder="Tempat surat dituju"
           name="tempatTujuan" required style="color:black">
        </div>                
        <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="Nomor surat yang akan dibalas"
           name="nomorBalasan" required style="color:black">
        </div>
        <div class="form-group">
          <label class="text-black">Tanggal surat yang akan dibalas</label>
          <input type="date" class="form-control form-control-user" placeholder="Tanggal surat yang dibalas"
           name="tanggalSurat" required style="color:black">
        </div>                                
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
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
    <div class="modal-header" style="color:black">
      <h5 class="modal-title" id="exampleModalLabel">Isi Form cetak</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form action="<?=base_url('Magang/cetakRekap')?>" method="get">
      <div class="modal-body" style="color:black">
      <div class="form-group">
          <input type="number" class="form-control form-control-user" placeholder="Tahun rekap"
           name="tahun" min="0" required style="color:black" id="tahunRekap">
        </div>         
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal" id="batalRekap">Batal</button>
        <button class="btn btn-primary" type="submit" id="cetakRekap">Cetak</button>
      </div>
    </form>
  </div>
</div>
</div>

