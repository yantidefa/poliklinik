<?php 
include "koneksi.php";
$satu		= mysqli_real_escape_string($koneksi,@$_POST['kode_jadwal']);
$dua		= mysqli_real_escape_string($koneksi,@$_POST['hari']);
$tiga		= mysqli_real_escape_string($koneksi,@$_POST['jam_mulai']);
$empat		= mysqli_real_escape_string($koneksi,@$_POST['jam_selesai']);

if ($satu == "" || 
	$dua == "" || 
	$tiga == "" || 
	$empat == "" ) {
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
	$UPDATE1 = mysqli_query($koneksi, "UPDATE tb_jadwal_praktik SET 
		hari 				= '$dua',
		jam_mulai 				= '$tiga',
		jam_selesai 				= '$empat' WHERE tb_jadwal_praktik.kode_jadwal='$satu';")

	or die("Gagal edit data".mysqli_error($koneksi));
//nip tidak di update karena field primary key di tb_pegawai

header('location:../../Admin/index.php?page=jadwal');

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

