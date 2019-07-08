<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2" style="color:black">Daftar Administrator</h1>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-body">
    <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#tambahAdmin"><i class="fas fa-plus"></i> Tambah Admin</button>
    <br>
    <?= $this->session->flashdata('message')?>    
    <div class="table-responsive">
      <table class="table table-borderedless" id="dataTable" width="100%" cellspacing="0" style="color:black">
        <thead>
          <tr class="align-middle" id="bg-gradient-primary">
            <th>No</th>
            <th>Username</th>
            <th>Peran</th>            
            <th class="text-right pr-5">Keterangan</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $number = 1;
        foreach ($user as $result):?>
          <tr class=" text-black">
            <td class="align-middle"><?=$number?></td>
            <td class="align-middle"><?=$result->username?></td>
            <td class="align-middle"><?=$result->roleName?></td>            
            <td>
            <div class="text-right">
              <button class=" btn btn-outline-success btn-lg updateAdmin"  data-toggle="modal" data-target="#updateAdmin" data-id='<?=$result->id?>'><i class="fas fa-fw fa-pencil-alt"></i></button>
              <button class="  btn btn-outline-danger btn-lg mr-2 hapusAdmin"  data-toggle="modal" data-target="#hapusAdmin"data-id='<?=$result->id?>'><i class="fas fa-fw fa-trash-alt"></i></i></button>
            </div>
            </td>
          </tr>
        <?php 
        $number++;
        endforeach;?>
        </tbody>
        <tfoot>
          <tr class="align-middle" id="bg-gradient-primary">
            <th>No</th>
            <th>Username</th>
            <th>Peran</th>            
            <th class="text-right pr-5">Keterangan</th>
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

<!-- Tambah Admin -->
<div class="modal fade" id="tambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title text-black" id="exampleModalLabel">Isi Form Tambah Admin</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form action="<?=base_url('Admin/tambahAdmin')?>" method="post" class=" needs-validation" novalidate>
      <div class="modal-body">
        <div class="form-group">
          <input type="text" class="form-control form-control-user text-black" placeholder="Username"
           name="username" style="color:black" required id="username">
           <div class="invalid-feedback">
            <p class="pl-2">Username tidak boleh kosong</p>
          </div>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user text-black" placeholder="Nama"
           name="name" style="color:black" required id="namaUser">
           <div class="invalid-feedback">
            <p class="pl-2">Nama tidak boleh kosong</p>
          </div>
        </div>
        <div class="form-group">          
          <select class="form-control" name="role" style="color:black" class="custom-select" required>
            <option disabled selected  style="color:black" value="">Pilih jenis Pelaku</option>
            <option class="" style="color:black">Administrator</option>
            <option class="" style="color:black">Super Administrator</option>            
          </select>
          <div class="invalid-feedback">
            <p class="pl-2">Jenis Pelaku tidak boleh kosong</p>
          </div>
        </div>
      </div>
      <div class="modal-footer" id="footerTambahAdmin">
        <button class="btn btn-danger" type="button" data-dismiss="modal" id="batalTambahAdmin">Batal</button>
        <button class="btn btn-primary" type="submit">Tambah</button>
      </div>
    </form>
  </div>
</div>
</div>

<!-- Hapus Admin-->
<div class="modal fade" id="hapusAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel" style="color:black">Apakah anda yakin ingin mengahapus?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body" style="color:black">Jika iya silahkan pilih tombol 'iya'</div>
    <div class="modal-footer">
      <button class="btn btn-danger " type="button" data-dismiss="modal">Batal</button>
      <form action="<?=base_url('Admin/deleteAdmin')?>" method="post" class="form-hapus">
        <button class="btn btn-primary" type="submit">iya</button>
      </form>
    </div>
  </div>
</div>
</div>

<!-- Update Admin-->
<div class="modal fade" id="updateAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header" style="color:black">
      <h5 class="modal-title" id="exampleModalLabel">Form Ganti User</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <form action="<?=base_url('Admin/updateAdminById')?>" method="post" class="form-update needs-validation" novalidate>
      <div class="modal-body">                
        <div class="form-group">          
          <select class="form-control custom-select" name="role" style="color:black" required>
            <option disabled selected class="" style="color:black" value="">Pilih jenis Pelaku</option>
            <option class="" style="color:black">Administrator</option>
            <option class="" style="color:black">Super Administrator</option>            
          </select>
          <div class="invalid-feedback">
            <p class="pl-2">Jenis Pelaku tidak boleh kosong</p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-danger" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="submit">Ganti</button>
      </div>
  </div>
</div>
</div>