<?php
include 'koneksi.php';

$satu     = mysqli_real_escape_string($koneksi, $_POST['kode_pemeriksaan']);
$dua      = mysqli_real_escape_string($koneksi, $_POST['tanggal_pemeriksaan']);
$empat     = mysqli_real_escape_string($koneksi, $_POST['no_pendaftaran']);
$lima      = mysqli_real_escape_string($koneksi, $_POST['keluhan']);
$enam    = mysqli_real_escape_string($koneksi, $_POST['diagnosa']);
$tujuh    = mysqli_real_escape_string($koneksi, $_POST['perawatan']);
$delapan    = mysqli_real_escape_string($koneksi, $_POST['tindakan']);
$sembilan     = mysqli_real_escape_string($koneksi, $_POST['berat_badan']);
$sepuluh      = mysqli_real_escape_string($koneksi, $_POST['tensi_diastolik']);
$sebelas   = mysqli_real_escape_string($koneksi, $_POST['tensi_sistolik']);




  

    if ($satu     =="" || 
	$dua      =="" ||  
	$empat    =="" || 
	$lima     =="" || 
	$enam     =="" || 
	$tujuh    =="" || 
	$sembilan =="" || 
	$sepuluh  =="" || 
	$sebelas  =="") {
		?>

<div class='alert alert-primary alert-dismissible fade show' role='alert'>
	 <i class='fas fa-check-circle'></i>
 <strong>UPDATE GAGAL !</strong>
				
			
			<span aria-hidden='true'>&times;</span>
	</button>
</div>
<?php
}
else
{
	$UPDATE1 = mysqli_query($koneksi, "UPDATE tb_pemeriksaan SET
		tanggal_pemeriksaan      ='$dua',
		no_pendaftaran           ='$empat',
		keluhan                  ='$lima',
		diagnosa                 ='$enam',
		perawatan                ='$tujuh',
		tindakan                 ='$delapan',
		berat_badan              ='$sembilan',
		tensi_diastolik          ='$sepuluh',
		tensi_sistolik           ='$sebelas' WHERE tb_pemeriksaan.kode_pemeriksaan='$satu';")
	
	  or die ("GAGAL GAIS".mysqli_error($koneksi));
	
 ?>
	

<div class='alert alert-primary alert-dismissible fade show' role='alert'>
	 <i class='fas fa-check-circle'></i>
				
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			<span aria-hidden='true'>&times;</span>
	</button>
</div>
 
  <?php
  header('location:../../Dokter/index.php?page=periksa');
}
?>