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

  <div class="row">
    <div class="col-lg-12">      
      <?= $this->session->flashdata('message')?>    
    </div>
  </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="row pt-2 pl-2 pr-2">    
      <div class="col-lg-12 col-md-12 col-xs-12 d-flex justify-content-end">
        <form action="<?=base_url('Magang/daftarMagang')?>" method="post" id="form-cari" class="form-inline">
          <div class="input-group">
            <input type="text" class="form-control mr-3" placeholder="Nama" name="nama" autocomplete="off">            
            <input type="number" class="form-control mr-3 " placeholder="Tahun" name="tahun" min='1' autocomplete="off">
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
              <th class="align-middle border border-black">Nomor Surat</th>
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
                      // echo $nomor.". ".$name->fullname."<br>";
                      echo"<div class='d-sm-flex'>";
                      echo "<div class='mr-1'>".$nomor.". </div>";                      
                      echo "<div class='d-none d-sm-inline-block' >".$name->fullname."</div>";
                      echo "<br>";
                      echo"</div>";
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
              <td class="border border-black"><?=$rekap->nomorSurat?></td>
              <td class="text-center">      
              <?php 
                if($rekap->status == "terdaftar"){
                  echo "<button type='submit' class='cetak btn btn-sm btn-outline-primary mr-1' data-kelompok='".$rekap->kelompok."'data-toggle='modal' data-target='#cetakBalasan'><i class='fas fa-fw fa-print'></i></button>";
                  echo "<button type='submit' class='hapusMagang btn btn-sm btn-outline-danger' data-kelompok='".$rekap->kelompok."'data-toggle='modal' data-target='#hapusDataMagang'><i class='fas fa-fw fa-trash-alt'></i></button>";
                }else if($rekap->status == "ditolak"){
                  echo "<p class='text-danger'>Ditolak</p>";
                }else{
                  echo "<button type='submit' class='tolak btn btn-outline-danger btn-sm mr-1' data-kelompok='".$rekap->kelompok."'data-toggle='modal' data-target='#tolak'><i class='fas fa-fw fa-thumbs-down'></i></button>";
                  echo "<button type='submit' class='setuju btn btn-outline-success btn-sm' data-kelompok='".$rekap->kelompok."'data-toggle='modal' data-target='#setuju'><i class='fas fa-fw fa-thumbs-up'></i></button>";
                }
              ?>                                
                  <!-- <button type="submit" class="cetak btn btn-outline-primary" data-kelompok='<?=$rekap->kelompok?>'class="btn btn-primary btn-user btn-block" data-toggle="modal" data-target="#cetakBalasan">Cetak</button>                 -->
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
              <th class="align-middle">Nomor Surat</th>
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
<div class="modal fade" id="cetakBalasan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
data-backdrop="static" data-keyboard="false">
<div class="modal-dialog" role="document">
  <div class="modal-content" id="headerBalasan">
    <div class="modal-header " style="color:black">
      <h5 class="modal-title" id="exampleModalLabel">Isi Formulir Cetak</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="xBalasan">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form class="form-cetak needs-validation" action="<?=base_url('Magang/cetakBalasan')?>" method="get" novalidate>
      <div class="modal-body">
        <div class="form-group">
          <input type="number" class="form-control form-control-user" placeholder="Nomor Surat" 
          name="nomorSurat" min='0'required style="color:black" id="nomorSurat">
          <div class="invalid-feedback">
            <p class="pl-2 text-capitalize">Nomor surat tidak boleh kosong</p>
          </div>
        </div>
        <div class="form-group">
          <input type="number" class="form-control form-control-user" placeholder="Jumlah Lampiran" 
          name="nomorLampiran" min='0'required style="color:black" id="jumlahLampiran">
          <div class="invalid-feedback">
            <p class="pl-2 text-capitalize">Jumlah lampiran tidak boleh kosong</p>
          </div>
        </div>        
        <div class="form-group">
          <input type="text" class="form-control form-control-user"  placeholder="Nama Penerima"
           name="penerima" required style="color:black" id="namaPenerima">
           <div class="invalid-feedback">
            <p class="pl-2 text-capitalize">Nomor penerima tidak boleh kosong</p>
          </div>
        </div>                
        <div class="form-group">
          <input type="text" class="form-control form-control-user"  placeholder="Tempat Surat Dituju"
           name="tempatTujuan" required style="color:black" id="tempatSurat">
           <div class="invalid-feedback">
            <p class="pl-2 text-capitalize">Tempat surat dituju tidak boleh kosong</p>
          </div>
        </div>                
        <div class="form-group">
          <input type="text" class="form-control form-control-user" placeholder="Nomor Surat yang Akan Dibalas"
           name="nomorBalasan" required style="color:black" id="nomorSuratBalasan">
           <div class="invalid-feedback">
            <p class="pl-2 ">Nomor Surat yang Dibalas Tidak Boleh Kosong</p>
          </div>
        </div>
        <div class="form-group">
          <label class="text-black">Tanggal Surat yang Akan Dibalas</label>
          <input type="date" class="form-control form-control-user" placeholder="Tanggal Surat yang Dibalas"
           name="tanggalSurat" required style="color:black" id="tanggalSuratBalasan">
           <div class="invalid-feedback">
            <p class="pl-2">Tanggal Surat yang Dibalas Tidak Boleh Kosong</p>
          </div>
        </div>                                
      </div>
      <div class="modal-footer" id="footerBalasan">
        <button class="btn btn-danger" type="button" data-dismiss="modal" id="batalBalasan">Batal</button>
        <button class="btn btn-primary btnCetakBalasan" type="submit">Cetak</button>
      </div>
    </form>
  </div>
</div>
</div>


<!-- cetak rekap -->
<div class="modal fade" id="cetakRekap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
data-backdrop="static" data-keyboard="false">
<div class="modal-dialog" role="document">
  <div class="modal-content" id="headerRekap">
    <div class="modal-header" style="color:black">
      <h5 class="modal-title" id="exampleModalLabel">Isi Formulir Cetak</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="xRekap">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form action="<?=base_url('Magang/cetakRekap')?>" method="get" class="needs-validation" novalidate id="form-rekap">
      <div class="modal-body" style="color:black">
        <div class="form-group">
          <input type="number" class="form-control form-control-user" placeholder="Tahun Rekap"
           name="tahun" min="0" style="color:black" id="tahunRekap" required>
           <div class="invalid-feedback">
              <p class="pl-2 text-capitalize">Tahun tidak boleh kosong</p>
            </div>
        </div>         
      </div>
      <div class="modal-footer" id="footerRekap">
        <button class="btn btn-danger" type="button" data-dismiss="modal" id="batalRekap">Batal</button>
        <button class="btn btn-primary btnCetakMagang" type="submit">Cetak</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- menyetujui -->
<div class="modal fade" id="setuju" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
data-backdrop="static" data-keyboard="false">
<div class="modal-dialog" role="document">
  <div class="modal-content" id="headerRekap">
    <div class="modal-header" style="color:black">
      <h5 class="modal-title" id="exampleModalLabel">Isi Formulir Setuju</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close" id="xRekap">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form action="<?=base_url('Magang/setuju')?>" method="post" class="needs-validation form-setuju" novalidate>
      <div class="modal-body" style="color:black">
        <div class="form-group">
          <label class="text-black">Pembimbing Magang</label>
          <input type="text" class="form-control" name="pembimbingMagang" required>                
          <div class="invalid-feedback">
            <p class="pl-2 text-capitalize">Pembimbing magang tidak boleh kosong</p>
          </div>
        </div> 
        <div class="form-group">
          <label class="text-black">Penempatan Magang</label>
          <input type="text" class="form-control" name="penempatanMagang" required>
          <div class="invalid-feedback">
              <p class="pl-2 text-capitalize">Penempatan magang tidak boleh kosong</p>
          </div>
        </div>
      </div>
      <div class="modal-footer" id="footerRekap">
        <button class="btn btn-danger" type="button" data-dismiss="modal" id="batalRekap">Batal</button>
        <button class="btn btn-success btnSetujuMagang" type="submit">Setuju</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- Tolak -->
<div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
data-backdrop="static" data-keyboard="false">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title text-capitalize" id="exampleModalLabel" style="color:black">Apakah anda yakin ingin menolak?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body" style="color:black">Jika iya silahkan pilih tombol 'Iya'</div>
    <div class="modal-footer">
      <button class="btn btn-primary " type="button" data-dismiss="modal">Batal</button>
      <form action="<?=base_url('Magang/tolak')?>" method="post" class="form-tolak">
        <button class="btn btn-danger btnTolakMagang" type="submit">Iya</button>
      </form>
    </div>
  </div>
</div>
</div>

<!-- Hapus Data Magang-->
<div class="modal fade" id="hapusDataMagang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"
data-backdrop="static" data-keyboard="false">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title text-capitalize" id="exampleModalLabel" style="color:black">Apakah anda yakin ingin menghapus?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body" style="color:black">Jika iya silahkan pilih tombol 'Iya'</div>
    <div class="modal-footer">
      <button class="btn btn-primary " type="button" data-dismiss="modal">Batal</button>
      <form action="<?=base_url('Magang/delete')?>" method="post" class="form-hapus-magang">
        <button class="btn btn-danger btnHapusDataMagang" type="submit" id="">Iya</button>
      </form>
    </div>
  </div>
</div>
</div>