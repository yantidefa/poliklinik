<?php 
include "koneksi.php";

$satu		= $_POST['kode_pemeriksaan'];
$dua		= $_POST['kode_pas'];
$tiga		= $_POST['nama_pas'];
$empat		= $_POST['alamat_pas'];
$lima		= $_POST['rincian_pemeriksaan'];
$enam		= $_POST['status_pemeriksaan'];

if ($satu 	 == "" || 
	$dua 	 == "" ||
	$tiga 	 == "" ||
	$empat 	 == "" ||
	$lima 	 == "" ||
	$enam 	 == "" ) {
?>

<div class="alert alert-block alert-danger">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i>
	</button>
	<i class="icon-warnig-sign red"></i>
	Pastikan Semua Form Terisi !!!
</div>

<?php
}
else {
	$QUERY = mysqli_query($koneksi, "INSERT INTO tb_pemeriksaan SET 
		kode_pemeriksaan = '$satu',
		kode_pas = '$dua',
		nama_pas = '$tiga',
		alamat_pas = '$empat',
		rincian_pemeriksaan = '$lima',
		status_pemeriksaan = '$enam';")
	or die(mysqli_error($koneksi));

//nip tidak di update karena field primary key di tb_pegawai

header('location:../../Dokter/index.php?page=rekam_medis');

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

