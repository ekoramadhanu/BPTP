<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #2dad21 !important">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('Help')?>">
    <div class="sidebar-brand-icon">
        <i class="fas fa-home"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SIM BPTP</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading text-white">
  Bantuan
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">    
    <span class=>Penerimaan Magang</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">      
      <a class="collapse-item" href="<?=base_url('Help/alurPenerimaanMagang')?>">Alur penerimaan magang</a>
      <a class="collapse-item" href="<?=base_url('Help/cetakSuratBalasan')?>">Mencetak surat balasan</a>
      <a class="collapse-item" href="<?=base_url('Help/cetakLaporan')?>">Mencetak rekap magang</a>
      <a class="collapse-item" href="<?=base_url('Help/menghapusDataMagang')?>">Menghapus data magang</a>
      <a class="collapse-item" href="<?=base_url('Help/tambahData')?>">Menambah data</a>
    </div>
  </div>
</li>
<?php if($role==1) :?>
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">    
      <span>Menambah Pengguna</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?=base_url('Help/membuatAkun')?>">Membuat akun</a>
        <a class="collapse-item" href="<?=base_url('Help/mengubahHakAkses')?>">Mengubah hak akses</a>
        <a class="collapse-item" href="<?=base_url('Help/menghapusAkun')?>">Menghapus akun</a>      
      </div>
    </div>
  </li>
<?php endif;?>

<li class="nav-item">
    <a class="nav-link" href="<?=base_url('Help/menggantiKataSandi')?>">    
    <span>Mengganti kata sandi </span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

</ul>
<!-- End of Sidebar -->

  
