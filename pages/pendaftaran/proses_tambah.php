<?php 
include "koneksi.php";

$satu		= $_POST['no_pendaftaran'];
$dua		= $_POST['no_urut'];
$tiga		= $_POST['nip'];
$empat		= $_POST['nama_pas'];
$lima		= $_POST['kode_jadwal'];
$enam		= $_POST['tanggal_reg'];

if ($satu 	 == "" || 
	$dua 	 == "" ||
	$tiga 	 == "" ||
	$empat 	 == "" ||
	$lima 	 == "" ) {
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
	$QUERY = mysqli_query($koneksi, "INSERT INTO `tb_pendaftaran` VALUES ('$satu', '$enam','$dua', '$tiga', '$empat', '$lima');")
	or die(mysqlI_error($koneksi));
//nip tidak di update karena field primary key di tb_pegawai

header('location:../../Pendaftar/index.php?page=pendaftaran');

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

