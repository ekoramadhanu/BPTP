<?php
function printDate($rekap){
  if($rekap->satrtYear ==$rekap->endYear){    
    if($rekap->startDay == 0 && $rekap->endDay == 0 ) {      
      switch ($rekap->StartMonth){
          case 1:
            echo "Januari ";
            break;
          case 2:
            echo "Februari ";
            break;
          case 3:
            echo "Maret ";
            break;
          case 4:
            echo "April ";
            break;
          case 5:
            echo "Mei ";
            break;
          case 6:
            echo "Juni ";
            break;
          case 7:
            echo "Juli ";
            break;
          case 8:
            echo "Agustus ";
            break;
          case 9:
            echo "September ";
            break;
          case 10:
            echo "Oktober ";
            break;
          case 11:
            echo "November ";
            break;
          case 12:
            echo "Desember ";
            break;
      }
      echo " - <br>";
      switch ($rekap->endMonth){
          case 1:
            echo "Januari ".$rekap->endYear;
            break;
          case 2:
            echo "Februari ".$rekap->endYear;
            break;
          case 3:
            echo "Maret ".$rekap->endYear;
            break;
          case 4:
            echo "April ".$rekap->endYear;
            break;
          case 5:
            echo "Mei ".$rekap->endYear;
            break;
          case 6:
            echo "Juni ".$rekap->endYear;
            break;
          case 7:
            echo "Juli ".$rekap->endYear;
            break;
          case 8:
            echo "Agustus ".$rekap->endYear;
            break;
          case 9:
            echo "September ".$rekap->endYear;
            break;
          case 10:
            echo "Oktober ".$rekap->endYear;
            break;
          case 11:
            echo "November ".$rekap->endYear;
            break;
          case 12:
            echo "Desember ".$rekap->endYear;
            break;
      }                
    }else if($rekap->endDay == 0){      
      switch ($rekap->StartMonth){
          case 1:
            echo $rekap->startDay." Januari ";
            break;
          case 2:
            echo $rekap->startDay." Februari ";
            break;
          case 3:
            echo $rekap->startDay." Maret ";
            break;
          case 4:
            echo $rekap->startDay." April ";
            break;
          case 5:
            echo $rekap->startDay." Mei ";
            break;
          case 6:
            echo $rekap->startDay." Juni ";
            break;
          case 7:
            echo $rekap->startDay." Juli ";
            break;
          case 8:
            echo $rekap->startDay." Agustus ";
            break;
          case 9:
            echo $rekap->startDay." September ";
            break;
          case 10:
            echo $rekap->startDay." Oktober ";
            break;
          case 11:
            echo $rekap->startDay." November ";
            break;
          case 12:
            echo $rekap->startDay." Desember ";
            break;
      }
      echo " - <br>";
      switch ($rekap->endMonth){
          case 1:
            echo "Januari ".$rekap->endYear;
            break;
          case 2:
            echo "Februari ".$rekap->endYear;
            break;
          case 3:
            echo "Maret ".$rekap->endYear;
            break;
          case 4:
            echo "April ".$rekap->endYear;
            break;
          case 5:
            echo "Mei ".$rekap->endYear;
            break;
          case 6:
            echo "Juni ".$rekap->endYear;
            break;
          case 7:
            echo "Juli ".$rekap->endYear;
            break;
          case 8:
            echo "Agustus ".$rekap->endYear;
            break;
          case 9:
            echo "September ".$rekap->endYear;
            break;
          case 10:
            echo "Oktober ".$rekap->endYear;
            break;
          case 11:
            echo "November ".$rekap->endYear;
            break;
          case 12:
            echo "Desember ".$rekap->endYear;
            break;
      }                 
    }else if($rekap->startDay == 0){      
      switch ($rekap->StartMonth){
          case 1:
            echo "Januari ";
            break;
          case 2:
            echo "Februari ";
            break;
          case 3:
            echo "Maret ";
            break;
          case 4:
            echo "April ";
            break;
          case 5:
            echo "Mei ";
            break;
          case 6:
            echo "Juni ";
            break;
          case 7:
            echo "Juli ";
            break;
          case 8:
            echo "Agustus ";
            break;
          case 9:
            echo "September ";
            break;
          case 10:
            echo "Oktober ";
            break;
          case 11:
            echo "November ";
            break;
          case 12:
            echo "Desember ";
            break;
      }
      echo " - <br>";
      switch ($rekap->endMonth){
          case 1:
            echo $rekap->endDay." Januari ".$rekap->endYear;
            break;
          case 2:
            echo $rekap->endDay." Februari ".$rekap->endYear;
            break;
          case 3:
            echo $rekap->endDay." Maret ".$rekap->endYear;
            break;
          case 4:
            echo $rekap->endDay." April ".$rekap->endYear;
            break;
          case 5:
            echo $rekap->endDay." Mei ".$rekap->endYear;
            break;
          case 6:
            echo $rekap->endDay." Juni ".$rekap->endYear;
            break;
          case 7:
            echo $rekap->endDay." Juli ".$rekap->endYear;
            break;
          case 8:
            echo $rekap->endDay." Agustus ".$rekap->endYear;
            break;
          case 9:
            echo $rekap->startDay." September ".$rekap->endYear;
            break;
          case 10:
            echo $rekap->endDay." Oktober ".$rekap->endYear;
            break;
          case 11:
            echo $rekap->endDay." November ".$rekap->endYear;
            break;
          case 12:
            echo $rekap->endDay." Desember ".$rekap->endYear;
            break;
      }                  
    }else{      
      switch ($rekap->StartMonth){
          case 1:
            echo $rekap->startDay." Januari ";
            break;
          case 2:
            echo $rekap->startDay." Februari ";
            break;
          case 3:
            echo $rekap->startDay." Maret ";
            break;
          case 4:
            echo $rekap->startDay." April ";
            break;
          case 5:
            echo $rekap->startDay." Mei ";
            break;
          case 6:
            echo $rekap->startDay." Juni ";
            break;
          case 7:
            echo $rekap->startDay." Juli ";
            break;
          case 8:
            echo $rekap->startDay." Agustus ";
            break;
          case 9:
            echo $rekap->startDay." September ";
            break;
          case 10:
            echo $rekap->startDay." Oktober ";
            break;
          case 11:
            echo $rekap->startDay." November ";
            break;
          case 12:
            echo $rekap->startDay." Desember ";
            break;
      }
      echo " - <br>";
      switch ($rekap->endMonth){
          case 1:
            echo $rekap->endDay." Januari ".$rekap->endYear;
            break;
          case 2:
            echo $rekap->endDay." Februari ".$rekap->endYear;
            break;
          case 3:
            echo $rekap->endDay." Maret ".$rekap->endYear;
            break;
          case 4:
            echo $rekap->endDay." April ".$rekap->endYear;
            break;
          case 5:
            echo $rekap->endDay." Mei ".$rekap->endYear;
            break;
          case 6:
            echo $rekap->endDay." Juni ".$rekap->endYear;
            break;
          case 7:
            echo $rekap->endDay." Juli ".$rekap->endYear;
            break;
          case 8:
            echo $rekap->endDay." Agustus ".$rekap->endYear;
            break;
          case 9:
            echo $rekap->startDay." September ".$rekap->endYear;
            break;
          case 10:
            echo $rekap->endDay." Oktober ".$rekap->endYear;
            break;
          case 11:
            echo $rekap->endDay." November ".$rekap->endYear;
            break;
          case 12:
            echo $rekap->endDay." Desember ".$rekap->endYear;
            break;
      }                
    }
  }else{    
    if($rekap->startDay == 0 && $rekap->endDay == 0 ) {
      switch ($rekap->StartMonth){
          case 1:
            echo "Januari ";
            break;
          case 2:
            echo "Februari ";
            break;
          case 3:
            echo "Maret ";
            break;
          case 4:
            echo "April ";
            break;
          case 5:
            echo "Mei ";
            break;
          case 6:
            echo "Juni ";
            break;
          case 7:
            echo "Juli ";
            break;
          case 8:
            echo "Agustus ";
            break;
          case 9:
            echo "September ";
            break;
          case 10:
            echo "Oktober ";
            break;
          case 11:
            echo "November ";
            break;
          case 12:
            echo "Desember ";
            break;
      }
      echo " - <br>";
      switch ($rekap->endMonth){
          case 1:
            echo "Januari ".$rekap->endYear;
            break;
          case 2:
            echo "Februari ".$rekap->endYear;
            break;
          case 3:
            echo "Maret ".$rekap->endYear;
            break;
          case 4:
            echo "April ".$rekap->endYear;
            break;
          case 5:
            echo "Mei ".$rekap->endYear;
            break;
          case 6:
            echo "Juni ".$rekap->endYear;
            break;
          case 7:
            echo "Juli ".$rekap->endYear;
            break;
          case 8:
            echo "Agustus ".$rekap->endYear;
            break;
          case 9:
            echo "September ".$rekap->endYear;
            break;
          case 10:
            echo "Oktober ".$rekap->endYear;
            break;
          case 11:
            echo "November ".$rekap->endYear;
            break;
          case 12:
            echo "Desember ".$rekap->endYear;
            break;
      }                
    }else if($rekap->endDay == 0){
      switch ($rekap->StartMonth){
          case 1:
            echo $rekap->startDay." Januari ".$rekap->satrtYear;
            break;
          case 2:
            echo $rekap->startDay." Februari ".$rekap->satrtYear;
            break;
          case 3:
            echo $rekap->startDay." Maret ".$rekap->satrtYear;
            break;
          case 4:
            echo $rekap->startDay." April ".$rekap->satrtYear;
            break;
          case 5:
            echo $rekap->startDay." Mei ".$rekap->satrtYear;
            break;
          case 6:
            echo $rekap->startDay." Juni ".$rekap->satrtYear;
            break;
          case 7:
            echo $rekap->startDay." Juli ".$rekap->satrtYear;
            break;
          case 8:
            echo $rekap->startDay." Agustus ".$rekap->satrtYear;
            break;
          case 9:
            echo $rekap->startDay." September ".$rekap->satrtYear;
            break;
          case 10:
            echo $rekap->startDay." Oktober ".$rekap->satrtYear;
            break;
          case 11:
            echo $rekap->startDay." November ".$rekap->satrtYear;
            break;
          case 12:
            echo $rekap->startDay." Desember ".$rekap->satrtYear;
            break;
      }
      echo " - <br>";
      switch ($rekap->endMonth){
          case 1:
            echo "Januari ".$rekap->endYear;
            break;
          case 2:
            echo "Februari ".$rekap->endYear;
            break;
          case 3:
            echo "Maret ".$rekap->endYear;
            break;
          case 4:
            echo "April ".$rekap->endYear;
            break;
          case 5:
            echo "Mei ".$rekap->endYear;
            break;
          case 6:
            echo "Juni ".$rekap->endYear;
            break;
          case 7:
            echo "Juli ".$rekap->endYear;
            break;
          case 8:
            echo "Agustus ".$rekap->endYear;
            break;
          case 9:
            echo "September ".$rekap->endYear;
            break;
          case 10:
            echo "Oktober ".$rekap->endYear;
            break;
          case 11:
            echo "November ".$rekap->endYear;
            break;
          case 12:
            echo "Desember ".$rekap->endYear;
            break;
      }                 
    }else if($rekap->startDay == 0){
      switch ($rekap->StartMonth){
          case 1:
            echo "Januari ".$rekap->satrtYear;
            break;
          case 2:
            echo "Februari ".$rekap->satrtYear;
            break;
          case 3:
            echo "Maret ".$rekap->satrtYear;
            break;
          case 4:
            echo "April ".$rekap->satrtYear;
            break;
          case 5:
            echo "Mei ".$rekap->satrtYear;
            break;
          case 6:
            echo "Juni ".$rekap->satrtYear;
            break;
          case 7:
            echo "Juli ".$rekap->satrtYear;
            break;
          case 8:
            echo "Agustus ".$rekap->satrtYear;
            break;
          case 9:
            echo "September ".$rekap->satrtYear;
            break;
          case 10:
            echo "Oktober ".$rekap->satrtYear;
            break;
          case 11:
            echo "November ".$rekap->satrtYear;
            break;
          case 12:
            echo "Desember ".$rekap->satrtYear;
            break;
      }
      echo " - <br>";
      switch ($rekap->endMonth){
          case 1:
            echo $rekap->endDay." Januari ".$rekap->endYear;
            break;
          case 2:
            echo $rekap->endDay." Februari ".$rekap->endYear;
            break;
          case 3:
            echo $rekap->endDay." Maret ".$rekap->endYear;
            break;
          case 4:
            echo $rekap->endDay." April ".$rekap->endYear;
            break;
          case 5:
            echo $rekap->endDay." Mei ".$rekap->endYear;
            break;
          case 6:
            echo $rekap->endDay." Juni ".$rekap->endYear;
            break;
          case 7:
            echo $rekap->endDay." Juli ".$rekap->endYear;
            break;
          case 8:
            echo $rekap->endDay." Agustus ".$rekap->endYear;
            break;
          case 9:
            echo $rekap->startDay." September ".$rekap->endYear;
            break;
          case 10:
            echo $rekap->endDay." Oktober ".$rekap->endYear;
            break;
          case 11:
            echo $rekap->endDay." November ".$rekap->endYear;
            break;
          case 12:
            echo $rekap->endDay." Desember ".$rekap->endYear;
            break;
      }                  
    }else{
      switch ($rekap->StartMonth){
          case 1:
            echo $rekap->startDay." Januari ".$rekap->satrtYear;
            break;
          case 2:
            echo $rekap->startDay." Februari ".$rekap->satrtYear;
            break;
          case 3:
            echo $rekap->startDay." Maret ".$rekap->satrtYear;
            break;
          case 4:
            echo $rekap->startDay." April ".$rekap->satrtYear;
            break;
          case 5:
            echo $rekap->startDay." Mei ".$rekap->satrtYear;
            break;
          case 6:
            echo $rekap->startDay." Juni ".$rekap->satrtYear;
            break;
          case 7:
            echo $rekap->startDay." Juli ".$rekap->satrtYear;
            break;
          case 8:
            echo $rekap->startDay." Agustus ".$rekap->satrtYear;
            break;
          case 9:
            echo $rekap->startDay." September ".$rekap->satrtYear;
            break;
          case 10:
            echo $rekap->startDay." Oktober ".$rekap->satrtYear;
            break;
          case 11:
            echo $rekap->startDay." November ".$rekap->satrtYear;
            break;
          case 12:
            echo $rekap->startDay." Desember ".$rekap->satrtYear;
            break;
      }
      echo " - <br>";
      switch ($rekap->endMonth){
          case 1:
            echo $rekap->endDay." Januari ".$rekap->endYear;
            break;
          case 2:
            echo $rekap->endDay." Februari ".$rekap->endYear;
            break;
          case 3:
            echo $rekap->endDay." Maret ".$rekap->endYear;
            break;
          case 4:
            echo $rekap->endDay." April ".$rekap->endYear;
            break;
          case 5:
            echo $rekap->endDay." Mei ".$rekap->endYear;
            break;
          case 6:
            echo $rekap->endDay." Juni ".$rekap->endYear;
            break;
          case 7:
            echo $rekap->endDay." Juli ".$rekap->endYear;
            break;
          case 8:
            echo $rekap->endDay." Agustus ".$rekap->endYear;
            break;
          case 9:
            echo $rekap->startDay." September ".$rekap->endYear;
            break;
          case 10:
            echo $rekap->endDay." Oktober ".$rekap->endYear;
            break;
          case 11:
            echo $rekap->endDay." November ".$rekap->endYear;
            break;
          case 12:
            echo $rekap->endDay." Desember ".$rekap->endYear;
            break;
      }                
    }
  }  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?=base_url('Assets/')?>image/logo.ico" type="image/x-icon">
  <link rel="icon" href="<?=base_url('Assets/')?>image/logo.ico" type="image/x-icon">  
  <title>print</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('Assets/SB2admin/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('Assets/bootstrap/')?>css/bootstrap.min.css" rel="stylesheet">
  
  <!-- CSS SIM -->
  <link href="<?=base_url('Assets/')?>template.css" rel="stylesheet">

</head>

<body id="page-top"style="font-family:verdana">
  <div class="container-fluid">
  <h2 class="text-center text-black mt-3">REKAP MAGANG/PKL DI BPTP JAWA TIMUR TAHUN <?=$tahunRekap?></h2> 
  <br>
  <table class="table table-bordered table-sm text-black border border-dark" id="dataTable" width="100%" cellspacing="0" style="border-color = black !important">
    <thead class="text-center">
        <tr>
            <th style="border: 1px solid #000 !important" class="align-middle">NO</th>
            <th style="border: 1px solid #000 !important" width="20%" class="align-middle">NAMA</th>
            <th style="border: 1px solid #000 !important" width="18%" class="align-middle">SEKOLAH/PT</th>
            <th style="border: 1px solid #000 !important" class="align-middle" width="20%">WAKTU PKL</th>
            <th style="border: 1px solid #000 !important" width="17%" class="align-middle">PENEMPATAN/<br>MATERI</th>
            <th style="border: 1px solid #000 !important" class="align-middle">PEMBIMBING</th>            
        </tr>
    </thead>
    <tbody>
        <?php for ($i=1; $i <=12 ; $i++) :?>
        <tr>
          <td colspan="6" class="text-center text-black" style="border: 1px solid #000 !important"><b>
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
        <!-- perulangan rekapnya tiap bulan yang dimulai dari startPKL-->            
        <?php 
        $counter = 1;
        foreach ($startMonth[$i] as $rekap):?>
          <tr>            
            <td style="border: 1px solid #000 !important"><?=$counter?></td>
            <td style="border: 1px solid #000 !important" width="20%">
            <?php          
              $kelompok = $rekap->kelompok;
              $nomor = 1;
              $query = "select fullname from internship where id_kelompok =".$kelompok;
              $fullname = $this->db->query($query)->result();                            
              $check = $this->db->query($query);                                           
              foreach ($fullname as $name) {
                if($check->num_rows() == 1){
                   echo $name->fullname."<br>";
                }else{
                //   echo $nomor.". ".$name->fullname."<br>";
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
              <td style="border: 1px solid #000 !important" width="18%"><?=$rekap->institute?></td>
              <td style="border: 1px solid #000 !important"  width="20%">                
              <?php 
              printDate($rekap);
              ?>                            
              </td>
              <td style="border: 1px solid #000 !important" width="17%"><?=$rekap->place?></td>
              <td style="border: 1px solid #000 !important"><?=$rekap->guide?></td>              
            </tr>
            <?php 
            $counter++;
            endforeach;?>
            <!-- akhir perulangan startdate -->            
            <!--  awal dari perulangan endPKL-->
            <?php for ($j=1; $j <$i ; $j++) :?>
                <?php             
                foreach ($endMonth[$i][$j] as $rekap):?>
                <tr>            
                    <td style="border: 1px solid #000 !important"><?=$counter?></td>
                    <td style="border: 1px solid #000 !important" width="20%">
                    <?php          
                        $kelompok = $rekap->kelompok;
                        $nomor = 1;
                        $query = "select fullname from internship where id_kelompok =".$kelompok;
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
                    <td style="border: 1px solid #000 !important" width="18%"><?=$rekap->institute?></td>
                    <td style="border: 1px solid #000 !important"  width="20%">
                    <?php 
                    printDate($rekap);
                    ?>                     
                    </td>
                    <td style="border: 1px solid #000 !important" width="17%"><?=$rekap->place?></td>
                    <td style="border: 1px solid #000 !important"><?=$rekap->guide?></td>                    
                </tr>
                <?php 
                $counter++;
                endforeach;?>   
            <?php endfor;?>                        
            <!-- akhir perulangan enddate -->
            <!-- awal perulangan next in now -->
            <?php foreach ($endMonthNextInNow[$i] as $rekap) : ?>
            <tr>            
                    <td style="border: 1px solid #000 !important"><?=$counter?></td>
                    <td style="border: 1px solid #000 !important" width="03%">
                    <?php          
                        $kelompok = $rekap->kelompok;
                        $nomor = 1;
                        $query = "select fullname from internship where id_kelompok =".$kelompok;
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
                    <td style="border: 1px solid #000 !important" width="18%"><?=$rekap->institute?></td>
                    <td style="border: 1px solid #000 !important"  width="20%">
                    <?php 
                    printDate($rekap);                    
                    ?>                     
                    </td>
                    <td style="border: 1px solid #000 !important" width="17%"><?=$rekap->place?></td>
                    <td style="border: 1px solid #000 !important"><?=$rekap->guide?></td>                    
                </tr>
                <?php 
             $counter++;
             endforeach; ?>
             <!-- akhir perulangan endMonth in next -->
             <!-- awal perulangan endMonth in prev -->
             <?php foreach ($endMonthPrevInNow[$i] as $rekap) : ?>
            <tr>            
                    <td style="border: 1px solid #000 !important"><?=$counter?></td>
                    <td style="border: 1px solid #000 !important" width="20%">
                    <?php          
                        $kelompok = $rekap->kelompok;
                        $nomor = 1;
                        $query = "select fullname from internship where id_kelompok =".$kelompok;
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
                    <td style="border: 1px solid #000 !important" width="18%"><?=$rekap->institute?></td>
                    <td style="border: 1px solid #000 !important"  width="20%">
                    <?php 
                    printDate($rekap);
                    ?>                     
                    </td>
                    <td style="border: 1px solid #000 !important" width="17%"><?=$rekap->place?></td>
                    <td style="border: 1px solid #000 !important"><?=$rekap->guide?></td>                    
                </tr>
                <?php 
             $counter++;
             endforeach; ?>
             <!-- akhir perulangan endMonth in prev -->
             <!-- perhitungan untuk  -->
             <tr>
                <td colspan="6" class="text-center" style="border: 1px solid #000 !important">
                    <b>JUMLAH =                 
                        <?php
                        $jumlah = 0 ;
                        $jumlah += $jumlahStartDate[$i] ;
                        $jumlah += $JumlahendMonthNextInNow[$i] ;
                        $jumlah += $JumlahendMonthPrevInNow[$i] ;
                        for ($j=1; $j <$i ; $j++) { 
                                $jumlah += $jumlahEndaDate[$i][$j];
                        }
                        echo $jumlah." ORANG ";
                        ?>
                    </b>
                </td>
            </tr>
        <?php endfor;?>
        <tr>
            <td colspan="6" class="text-center text-uppercase" style="border: 1px solid #000 !important"><b>Total Magang = <?= $total." orang"?></b></td>
        </tr>
    </tbody>
  </table>
  </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		print();
	</script>
</body>

</html>
