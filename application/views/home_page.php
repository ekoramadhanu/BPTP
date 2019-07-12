    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0" style="color:black" >Informasi Umum Pada Tahun <?=$tahun?></h1>        
      </div>
      
      <div class="text-right">
        <form class="d-none d-sm-inline-block text-white form-inline mb-4" mehod="get" action="<?=base_url('Home')?>">
          <div class="form-group">            
             <input type="number" class="form-control" placeholder="Tahun" min="1" name="tahun" style="color:black">
             <input class="btn btn-outline-primary ml-3 " type="submit" name="submit" value="Cari">            
          </div>
       </form>        
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Total Magang Card -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-2" style="color:black">Total Magang</div>
                  <div class="h5 mb-0 font-weight-bold" style="color:black"><?=$totalMagang?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-3x text-success"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Magang Laki - Laki Card -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-2" style="color:black">Total Laki-laki</div>
                  <div class="h5 mb-0 font-weight-bold" style="color:black"><?=$totalLaki?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-male fa-3x text-primary"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Magang Perempuan Card -->
        <div class="col-xl-4 col-md-6 mb-4">
          <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-2" style="color:black">Total Perempuan</div>
                  <div class="h5 mb-0 font-weight-bold" style="color:black"><?=$totalPerempuan?></div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-female fa-3x text-danger"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        
      </div>

      <!-- Content Row -->

      <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
              <h6 class="m-0 font-weight-bold" style="color:black">Jumlah Magang Tiap bulan</h6>              
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-area">
                <canvas id="myAreaChart"></canvas>
              </div>
            </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
              <h6 class="m-0 font-weight-bold" style="color:black">Status Magang</h6>              
            </div>
            <!-- Card Body -->
            <div class="card-body">
              <div class="chart-pie pt-4 pb-2">
                <canvas id="myPieChart"></canvas>
              </div>
              <div class="mt-4 text-center small">
                <span class="mr-2">
                  <i class="fas fa-circle text-warning"></i> Menunggu
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle" style="color:#c43516"></i> Ditolak
                </span>
                <span class="mr-2">
                  <i class="fas fa-circle text-primary"></i> Terdaftar
                </span>
              </div>
            </div>
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



