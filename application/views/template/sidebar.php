
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #2dad21 !important">    
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('Home')?>">
    <div class="sidebar-brand-icon">
      <img src="<?=base_url('Assets/image/logo.png')?>" witdh='40' height='40'>
    </div>
    <div class="sidebar-brand-text mx-3">
      <?php
        if($role == 1){
          echo 'DBA SIM';
        }else{
          echo 'ADMIN SIM';
        }
      ?>
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item 
  <?php
    if($title =='Informasi'){
      echo 'active';
    }
  ?>
  ">
    <a class="nav-link" href="<?=base_url('Home')?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Informasi</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading text-white">
    Peserta Magang
  </div>

  <!-- Nav Item - Tables -->
  <li class="nav-item 
    <?php
      if($title =='Daftar Magang'){
        echo 'active';
      }
    ?>
  ">
    <a class="nav-link" href="<?=base_url('Home/daftarMagang')?>" id="daftarMagang">
      <i class="fas fa-fw fa-table"></i>
      <span>Daftar Magang</span></a>
  </li>

  <li class="nav-item 
    <?php
      if($title =='Tambah Data'){
        echo 'active';
      }
    ?>
  ">
    <a class="nav-link" href="<?=base_url('Home/tambahData')?>">
      <i class="fas fa-fw fa-plus"></i>
      <span>Tambah Data</span></a>
  </li>
  
  <!-- Nav Item - Tables -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="
    <?php
    // base_url('Home/permintaan')
    ?>
    ">
      <i class="fas fa-fw fa-table"></i>
      <span>Permintaan Magang</span></a>
  </li> -->

  <!-- tambahan navbar super administrasi-->
  <?php if($role == 1):?>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading text-white">
      Administrator
    </div>      
    <!-- Nav Item - Tables -->
    <li class="nav-item 
      <?php
        if($title =='Daftar Administrator'){
          echo 'active';
        }
      ?>
    ">
      <a class="nav-link" href="<?=base_url('Home/daftarAdministrator')?>">
        <i class="fas fa-fw fa-table"></i>
        <span>Daftar Administrator</span></a>
    </li>    
  <?php endif ;?>
  <!-- berakhir tambahan navbar -->
    
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading text-white">
    Pengguna
  </div>

  <!-- Nav Item - Tables -->
  <li class="nav-item 
    <?php
      if($title =='Ganti Password'){
        echo 'active';
      }
    ?>
  ">
    <a class="nav-link" href="<?=base_url('Home/gantiPassword')?>">
      <i class="fas fa-fw fa-key"></i>
      <span>Ganti Password</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
    <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>keluar</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin keluar?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Jika iya silahkan pilih tombol 'keluar'</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
      <a class="btn btn-danger" href="<?=base_url('Home/logout')?>">Keluar</a>
    </div>
  </div>
</div>
</div>