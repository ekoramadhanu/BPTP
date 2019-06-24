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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('Assets/bootstrap/')?>css/bootstrap.min.css" rel="stylesheet">
  
  <!-- CSS SIM -->
  <link href="<?=base_url('Assets/')?>template.css" rel="stylesheet">

</head>

<body id="page-top">
	<div class="container-fluid text-dark">
		<div class="row row mt-3 mb-3">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<div class="row">
					<div class="col-lg-1 col-md-1 col-xs-1">
						<img src="<?=base_url('Assets/image/logo.png')?>" height="120" class="mx-auto d-block mt-2" >	
					</div>
					<div class="col-lg-10 col-md-10 col-xs-10 text-center" style="color=#000">				
						<h5 style="margin:0;" class="text-black"> KEMENTRIAN PERTANIAN </h5>
						<h5 style="margin:0;" class="text-black">BADAN PENELITIAN PENGEMBANGAN PERTANIAN</h5>
						<h4 style="margin:0;" class="font-weight-bold text-black">BALAI PENGKAJIAN TEKNOLOGI PERTANIAN JAWA TIMUR</h4>
						<h6 style="margin:0;" class="text-black">JL. RAYA KARANGPLOSO KM 4 MALANG 65101 KOTAK POS 188 </h6>
						<h6 style="margin:0;" class="text-black">TELEPONE (0341) 494052, 485055 FAXIMILI (0341) 471255</h6>
						<h6 style="margin:0;" class="text-black"><span style="font-size: 12px">WEBSITE : </span>www.jatim.litbang.pertanian.go.id </h6>
						<h6 style="margin:0;" class="text-black"><span style="font-style: 12px">EMAIL : </span> bptpjatim@yahoo.com, bptp-jatim@litbang.pertanian.go,id</h6>
					</div>
				</div>
				<hr style="width: 98%; border: 2px solid #000; margin-top: 0" class="mt-1">
				<hr style="width: 97%; border: 1px solid #000; margin-top: -13px">	
			</div>
		</div>
		<div class="row mt-3 mb-3 ml-4 mr-5">
			<div class="col-lg-9 col-md-9 col-xs-9">
				<p style="margin:0" class="text-black">Nomor <span style="display:inline-block; width: 40px;"></span>: B- <?=$nomorSurat?><span style="display:inline-block;"></span>/HM.240/H.12.15/<?=$bulan."/".$tahun?></p>
				<p style="margin:0" class="text-black">Sifat<span style="display:inline-block; width: 63px;"></span>: Biasa</p>
				<p style="margin:0" class="text-black">Lampiran <span style="display:inline-block; width: 23px;"></span>: -</p>
				<p style="margin:0" class="text-black">Hal<span style="display:inline-block; width: 69px;"></span>: Praktek Kerja Lapangan</p>
				<p style="margin:0" class="mt-5 text-black"><b>Yth. <?=$tujuan?></b></p>
				<p style="margin:0" class="text-black"><b>Di <?=$tempat?></b></p>
			</div>
			<div class="col-lg-3 col-md-3 col-xs-3">
				<p class="text-right text-black"><?php
				switch ($bulan){					
					case 1:
                  echo $tanggal." Januari ".$tahun;
                  break;
              case 2:
                  echo $tanggal." Februari ".$tahun;
                  break;
              case 3:
                  echo $tanggal." Maret ".$tahun;
                  break;
              case 4:
                  echo $tanggal." April " .$tahun;
                  break;
              case 5:
                  echo $tanggal." Mei ".$tahun;
                  break;
              case 6:
                  echo $tanggal." Juni ".$tahun;
                  break;
              case 7:
                  echo $tanggal." Juli ".$tahun;
                  break;
              case 8:
                  echo $tanggal." Agustus ".$tahun;
                  break;
              case 9:
                  echo $tanggal." September ".$tahun;
                  break;
              case 10:
                  echo $tanggal." Oktober ".$tahun;
                  break;
              case 11:
                  echo $tanggal." November ".$tahun;
                  break;
              case 12:
                  echo $tanggal." Desember ".$tahun;
                  break;
				}
				?></p>
			</div>
		</div>
		<div class="row mt-5 mb-3 ml-4 mr-5">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<p class="text-black">Menanggapi surat Saudara Nomor: <?=$nomorbalasan." tanggal "?><?php
					switch ($bulanBalasan){					
						case 1:
					  echo $tanggalBalasan." Januari ".$tahunBalasan;
					  break;
				  case 2:
					  echo $tanggalBalasan." Februari ".$tahunBalasan;
					  break;
				  case 3:
					  echo $tanggalBalasan." Maret ".$tahunBalasan;
					  break;
				  case 4:
					  echo $tanggalBalasan." April " .$tahunBalasan;
					  break;
				  case 5:
					  echo $tanggalBalasan." Mei ".$tahunBalasan;
					  break;
				  case 6:
					  echo $tanggalBalasan." Juni ".$tahunBalasan;
					  break;
				  case 7:
					  echo $tanggalBalasan." Juli ".$tahunBalasan;
					  break;
				  case 8:
					  echo $tanggalBalasan." Agustus ".$tahunBalasan;
					  break;
				  case 9:
					  echo $tanggalBalasan." September ".$tahunBalasan;
					  break;
				  case 10:
					  echo $tanggalBalasan." Oktober ".$tahunBalasan;
					  break;
				  case 11:
					  echo $tanggalBalasan." November ".$tahunBalasan;
					  break;
				  case 12:
					  echo $tanggalBalasan." Desember ".$tahunBalasan;
					  break;
					}
				?> , perihal sebagaimana pada pokok surat. Kami memberikan ijin untuk kegiatan Praktek 
				Kerja Lapangan di BPTP Balitbangtan Jawa Timur. Pelaksanaan kegiatan tersebut sesuai 
				dengan permintaan terhitung mulai tanggal <b>
					<?=$detail->startDay."-".$detail->StartMonth."-".$detail->satrtYear." sd ".$detail->endDay." - ".$detail->endMonth." - ".$detail->endYear?>
					</b> bagi mahasiswa
				Program Studi <?=$detail->department?> berikut: </p>
				<table class="table table-bordered text-black">
					<thead>
						<tr>
							<th class="pt-1 pb-1"> No.</th>
							<th class="pt-1 pb-1" width="65%">Nama</th>
							<th class="pt-1 pb-1" width="35%">		
								<?php 
									foreach ($fullname as $name) {
										if($name->is_sekolah == 1) {
											echo "NISN" ;
											break;
										}else{
											echo "NIM" ;
											break;
										}
									}
								?>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$counter =1;
						foreach ($fullname as $name) :?>
							<tr>
								<td class="pt-1 pb-1"><?=$counter?></td>
								<td class="pt-1 pb-1"><?=$name->fullname?></td>
								<td class="pt-1 pb-1"><?=$name->id?></td>
							</tr>
						<?php  
						$counter++;
						endforeach;?>
					</tbody>
				</table>
				<p class="text-black">Perlu kami sampaikan bahwa dalam kegiatan tersebut ditempatkan dibagian administrasi keuangan
				dan dibimbing oleh <b><?=$detail->guide?></b></p>
				<p class="text-black">Demikian, atas perhatian dan kerjasamanya disampaikan terima kasih</p>				
			</div>
		</div>
		<div class="row">
			<div class="col-lg-7 col-md-7 col-xs-7"></div>
			<div class="col-lg-5 col-md-5 col-xs-5">
				<p style="margin:0" class="text-black"><b>An. Kepala Balai,</b></p>
				<p class="text-black" style="margin:0"><b>Kepala Seksi Kerjasama dan</b></p>
				<p class="text-black"style="margin:0"><b>Pelayanan Pengkajian</b></p>
				<br><br><br>
				<p style="margin:0" class="text-black"><b>RIKA ASNITA, SP, MSc</b></p>
				<p class="text-black"style="margin:0">NIP. 197205152002122001</p>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- <script>
		print();
	</script> -->
</body>

</html>
