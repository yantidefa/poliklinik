<?php 
include "koneksi.php";
$satu		= $_POST['no_pendaftaran'];
$dua		= $_POST['tanggal_reg'];
$tiga		= $_POST['no_urut'];
$empat		= $_POST['nip'];
$lima		= $_POST['nama_pas'];
$enam		= $_POST['kode_jadwal'];

if ($satu 	 == "" || 
	$dua 	 == "" ||
	$tiga 	 == "" ||
	$empat 	 == "" ||
	$lima 	 == "" ||
	$enam 	 == "") {
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
	$query = mysqli_query($koneksi, "UPDATE `tb_pendaftaran` SET 
		tanggal_reg 				= '$dua',
		no_urut 					= '$tiga',
		nip  	 					= '$empat',
		kode_pas 					= '$lima',
		kode_jadwal 				= '$enam' WHERE tb_pendaftaran.no_pendaftaran='$satu';")

	or die("Gagal edit data".mysqli_error($koneksi));
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

