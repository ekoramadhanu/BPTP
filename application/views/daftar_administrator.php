<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Daftar Administrator</h1>
<br>
<!-- DataTales Example -->
<div class="card shadow mb-4">

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-borderedless" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center text-white" id="bg-gradient-primary">
            <th>No</th>
            <th>Username</th>
            <th>Peran</th>            
            <th>Keterangan</th>
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
              <button class=" btn btn-outline-success btn-lg"><i class="fas fa-fw fa-pencil-alt"></i></button>
              <button class="  btn btn-outline-danger btn-lg mr-2"><i class="fas fa-fw fa-trash-alt"></i></i></button>
            </div>
            </td>
          </tr>
        <?php 
        $number++;
        endforeach;?>
        </tbody>
        <tfoot>
          <tr class="text-center text-white" id="bg-gradient-primary">
            <th>No</th>
            <th>Username</th>
            <th>Peran</th>            
            <th>Keterangan</th>
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

