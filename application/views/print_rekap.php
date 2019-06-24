<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>print</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('Assets/SB2admin/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('Assets/SB2admin/')?>css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- CSS SIM -->
  <link href="<?=base_url('Assets/')?>template.css" rel="stylesheet">

</head>

<body id="page-top">
  <div class="container-fluid">
  <h1 class="text-center text-dark">REKAP MAGANG/PKL DI BPTP JAWA TIMUR TAHUN <?=$tahunRekap?></h1>
  <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0" style="border-color = black !important">
    <thead class="text-center">
        <tr>
            <th>NO</th>
            <th>NAMA</th>
            <th>SEKOLAH/PT</th>
            <th>WAKTU PKL</th>
            <th>PENEMPATAN/MATERI</th>
            <th>PEMBIMBING</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i=1; $i <= 12 ; $i++) :?>
        <tr>
          <td colspan="6" class="text-center text-white" id="bg-gradient-primary"><b>
          <?php 
              switch ($i){
              case 1:
                  echo "JANUARI";
                  break;
              case 2:
                  echo "FEBRUARI";
                  break;
              case 3:
                  echo "MARET";
                  break;
              case 4:
                  echo "APRIL";
                  break;
              case 5:
                  echo "MEI";
                  break;
              case 6:
                  echo "JUNI";
                  break;
              case 7:
                  echo "JULI";
                  break;
              case 8:
                  echo "AGUSTUS";
                  break;
              case 9:
                  echo "SEPTEMBER";
                  break;
              case 10:
                  echo "OKTOBER";
                  break;
              case 11:
                  echo "NOVEMBER";
                  break;
              case 12:
                  echo "DESEMBER";
                  break;
              }
          ?>
          </b></td>
        </tr>
        <!-- PERULANGAN TIAP BULAN -->
        <?php 
        $counter = 1;
        foreach ($bulan[$i] as $rekap) :?>
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
        </tr>
        <?php 
        $counter++;
        endforeach;?>
        <tr>
          <td colspan="6" class="text-center"><b>Jumlah = <?= $jumlah[$i]." orang"?></b></td>
        </tr>
        <!-- AKHIR DARI PERULANGAN DALAM -->
        <?php endfor;?>        
        <tr>
          <td colspan="6" class="text-center"><b>Jumlah = <?= $total." orang"?></b></td>
        </tr>
    </tbody>
  </table>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('Assets/SB2admin/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('Assets/SB2admin/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('Assets/SB2admin/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('Assets/SB2admin/')?>js/sb-admin-2.min.js"></script>

  
  <!-- Page level plugins -->
  <script src="<?=base_url('Assets/SB2admin/')?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url('Assets/SB2admin/')?>js/demo/chart-area-demo.js"></script>
  <script src="<?=base_url('Assets/SB2admin/')?>js/demo/chart-pie-demo.js"></script>

  <script>
  print();
  </script>
  
</body>

</html>
