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
  <link href="<?=base_url('Assets/')?>style.css" rel="stylesheet">

</head>

<body id="page-top" style="font-family:tahoma">
	<div class="container-fluid text-dark">
		<div class="row mt-3 mb-3">
			<div class="col-lg-12 col-md-12 col-xs-12 d-flex justify-content-between">
				<div class="row">
					<div class="col-lg-1 col-md-1 col-xs-1">
						<img src="<?=base_url('Assets/image/logoCetak.png')?>" height="80" width="85" class="mx-auto d-block mt-2 " >	
					</div>
					<div class="col-lg-9 col-md-9 col-xs-9 text-center">				
						<h5 style="margin:0;" class="text-primary pl-4"> KEMENTRIAN PERTANIAN </h5>
						<h5 style="margin:0;" class="text-primary pl-4">BADAN PENELITIAN PENGEMBANGAN PERTANIAN</h5>
						<h4 style="margin:0;" class="font-weight-bold text-primary pl-4">BALAI PENGKAJIAN TEKNOLOGI PERTANIAN JAWA TIMUR</h4>
						<h6 style="margin:0;" class="text-primary pl-4">JL. RAYA KARANGPLOSO KM 4 MALANG 65101 KOTAK POS 188 </h6>
						<h6 style="margin:0;" class="text-primary pl-4">TELEPONE (0341) 494052, 485055 FAXIMILI (0341) 471255</h6>
						<h6 style="margin:0;" class="text-primary pl-4"><span style="font-size: 12px">WEBSITE : </span>www.jatim.litbang.pertanian.go.id </h6>
						<h6 style="margin:0;" class="text-primary pl-4"><span style="font-size: 12px">EMAIL : </span> bptpjatim@yahoo.com, bptp-jatim@litbang.pertanian.go.id</h6>
					</div>
					<div class="col-lg-2 col-md-2 col-xs-2" >
						<div class="">
							<img src="
							<?= base_url('Assets/image/certificate.png')?>
							" height="80" width="150" class="mx-auto d-block mt-2">	
						</div>
					</div>
				</div>
			</div>
			<hr style="width: 98%; border: 2px solid; margin-top: 0" class="mt-2 border-primary">
			<hr style="width: 97%; border: 1px solid; margin-top: -13px" class="border-primary">	
		</div>		
		<div class="row mt-3 mb-3 ml-4 mr-5">
			<div class="col-lg-9 col-md-9 col-xs-9 text-black" style="font-size:20px">
				<table>
					<tr>
						<td>Nomor</td>
						<td class="pl-3">:</td>
						<td class="pl-1">B- <?=$nomorSurat?>/HM.240/H.12.15/<?=$bulan."/".$tahun?></td>
					</tr>
					<tr>
						<td>Sifat</td>
						<td class="pl-3">:</td>
						<td class="pl-1">Biasa</td>
					</tr>
					<tr>
						<td>Lampiran</td>
						<td class="pl-3">:</td>
						<td class="pl-1">
						<?php 
						if($nomorLampiran == 0){
							echo'-';
						}else{
							echo $nomorLampiran;
						}
						?></td>
					</tr>
					<tr>
						<td>Hal</td>
						<td class="pl-3">:</td>
						<td class="pl-1">Praktek Kerja Lapangan</td>
					</tr>
				</table>
				<br>
					<?php 
						$alamat = explode(" ",$penerima);	
						$length = count($alamat);
					?>
				<p style="margin:0" class="text-black text-capitalize"><b>Yth. 
					<?php
					foreach ($fullname as $name) {
						if($name->is_sekolah==1){
							echo $penerima."<br>".$institution->institute;
						}else{
							echo $penerima." ";

							if(preg_match("/pol/i", $institution->institute)){
								if(preg_match("/jurusan/i", $department->department)) {
									echo  $department->department;
								} else {
									echo "jurusan ". $department->department;
								}
								echo"<br>";
								if(preg_match("/fakultas/i", $faculty->faculty)) {
									echo  $faculty->faculty;
								} else {
									echo "Fakultas ". $faculty->faculty;
								}
								echo"<br>";
								echo $institution->institute;
							}else{
								if(preg_match("/jurusan/i", $department->department)) {
									echo  $department->department;
								} else {
									echo "jurusan ". $department->department;
								}
								echo"<br>";
								if(preg_match("/fakultas/i", $faculty->faculty)) {
									echo  $faculty->faculty;
								} else {
									echo "Fakultas ". $faculty->faculty;
								}
								echo"<br>";
								if(preg_match("/universitas/i", $institution->institute)) {
									echo  $institution->institute;
								} else {
									echo "universitas ". $institution->institute;
								}							
							}
						}
						break;
					}					
					?>
				</b></p>
				<p style="margin:0" class="text-black text-capitalize"><b>Di 
				<?=$tempatTujuan?>
				</b></p>
			</div>
			<div class="col-lg-3 col-md-3 col-xs-3" style="font-size:20px">
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
			<div class="col-lg-12 col-md-12 col-xs-12" style="font-size:20px">
				<p class="text-black text-justify">Menanggapi surat Saudara Nomor: <?=$nomorBalasan." tanggal "?><?php
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
				?>, perihal sebagaimana pada pokok surat. Kami memberikan izin untuk kegiatan Praktek 
				<span class="mr-1">Kerja</span> <span class="mr-1">Lapangan</span> <span class="mr-1">di</span> <span class="mr-1">BPTP</span> <span class="mr-1">Balitbangtan</span> <span class="mr-1">Jawa <span class="mr-1">Timur. <span class="mr-1">Pelaksanaan</span> <span class="mr-1">kegiatan</span> <span class="mr-1">tersebut</span> <span class="mr-1">sesuai </span>
				<span class="mr-1">dengan</span> <span class="mr-1">permintaan</span> <span class="mr-1">terhitung</span> <span class="mr-1">mulai</span> <span class="mr-1">tanggal</span> <b>
				<?=$detail->startDay." ".$detail->StartMonth." ".$detail->satrtYear." sd ".$detail->endDay." ".$detail->endMonth." ".$detail->endYear?>
				</b> 
				<?php foreach ($fullname as $name) {
					if($name->is_sekolah == 1){
						echo " bagi siswa berikut :";
					}else{
						$string = explode(' ',$studyProgram->studyProgram);
						$index = 0;
						for ($i=0; $i <count($string) ; $i++) { 
							$string[$i] = ucfirst($string[$i]);
						}
						echo "bagi mahasiswa
						Program Studi ".implode(' ',$string)." berikut:";
					}
					break;
				}
				?>
				 </p>				
				<table class="table table-bordered text-black border-table-black" style="font-size:20px">
					<thead>
						<tr>
							<th class="pt-1 pb-1" style="border: 1px solid #000 !important"> No.</th>
							<th class="pt-1 pb-1"  style="border: 1px solid #000 !important" width="65%">Nama</th>
							<th class="pt-1 pb-1"  style="border: 1px solid #000 !important" width="35%">		
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
								<td class="pt-1 pb-1" style="border: 1px solid #000 !important"><?=$counter?></td>
								<td class="pt-1 pb-1" style="border: 1px solid #000 !important"><?=$name->fullname?></td>
								<td class="pt-1 pb-1" style="border: 1px solid #000 !important"><?=$name->id?></td>
							</tr>
						<?php  
						$counter++;
						endforeach;?>
					</tbody>
				</table>				
				<p class="text-black text-justify">Perlu kami sampaikan bahwa dalam kegiatan tersebut ditempatkan dibagian <?=$detail->place?>
				dan dibimbing oleh <b><?=$detail->guide?></b>.</p>
				<p class="text-black text-justify">Demikian, atas perhatian dan kerjasamanya disampaikan terima kasih.</p>				
			</div>
		</div>
		<br><br>
		<div class="row">
			<div class="col-lg-7 col-md-7 col-xs-7"></div>
			<div class="col-lg-5 col-md-5 col-xs-5" style="font-size:21px; font-family:Arial">
				<p style="margin:0;font-size:21px" class="text-black"><b>An. Kepala Balai,</b></p>
				<p class="text-black" style="margin:0;font-size:21px"><b>Kepala Seksi Kerjasama dan</b></p>
				<p class="text-black"style="margin:0;font-size:21px"><b>Pelayanan Pengkajian</b></p>
				<br><br><br><br>
				<p style="margin:0;font-size:21px" class="text-black mt-4"><b>RIKA ASNITA, SP, MSc</b></p>
				<p class="text-black"style="margin:0;font-size:21px">NIP. 197205152002122001</p>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script>
		print();
	</script>
</body>

</html>
