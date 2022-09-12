<?php 
include "koneksi.php";

$satu		= $_POST['kode_pemeriksaan'];
$dua		= $_POST['tanggal_pemeriksaan'];
$empat		= $_POST['no_pendaftaran'];
$lima		= $_POST['diagnosa'];
$abc        = $_POST['keluhan'];
$enam		= $_POST['perawatan'];
$tujuh		= $_POST['tindakan'];
$delapan	= $_POST['berat_badan'];
$sembilan	= $_POST['tensi_diastolik'];
$sepuluh	= $_POST['tensi_sistolik'];
$sebelas	= $_POST['rincian_pemeriksaan'];
$duabelas	= $_POST['status_pemeriksaan'];

if ($satu 	 == "" || 
	$dua 	 == "" ||
	$empat 	 == "" ||
	$lima 	 == "" ||
	$abc 	 == "" ||
	$enam 	 == "" ||
	$tujuh 	 == "" ||
	$delapan == "" ||
	$sembilan== "" ||
	$sepuluh == "" ||
	$delapan == "" ||
	$sembilan== ""  ) {
?>

<div class="alert alert-block alert-danger">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i>
	</button>
	<i class="icon-warnig-sign red"></i>
	Pastikan Semua Form Terisis !!!
</div>

<?php
}
else {
	$query = mysqli_query($koneksi, "INSERT INTO tb_pemeriksaan SET 
		kode_pemeriksaan 			= '$satu',
		tanggal_pemeriksaan 		= '$dua',
		no_pendaftaran 	 			= '$empat',
		diagnosa 					= '$lima',
		keluhan 					= '$abc',
		perawatan 					= '$enam',
		tindakan 					= '$tujuh',
		berat_badan 				= '$delapan',
		tensi_diastolik 			= 'sembilan',
		tensi_sistolik 				= '$sepuluh',
		rincian_pemeriksaan			= '$sebelas',
		status_pemeriksaan 			= 'duabelas' ;")


	or die("Gagal edit data".mysqli_error($koneksi));
//nip tidak di update karena field primary key di tb_pegawai

header('location:../../Dokter/index.php?page=periksa');

?>

<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i>
	</button>
	<i class="icon-ok green"></i>
	<h4>Edit Data Berhasil !</h4>
</div>
<?php
 }
 ?>

