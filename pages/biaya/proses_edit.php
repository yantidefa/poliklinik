<?php 
include "../inc/koneksi.php";
$satu		= mysqli_real_escape_string($koneksi,@$_POST['kode_jenis_biaya']);
$dua		= mysqli_real_escape_string($koneksi,@$_POST['nama_biaya']);
$tiga		= mysqli_real_escape_string($koneksi,@$_POST['tarif']);


if ($satu == "" || 
	$dua == "" || 
	$tiga == ""  ) {
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
	$UPDATE1 = mysqli_query($koneksi, "UPDATE tb_jenis_biaya SET 
		nama_biaya 				= '$dua',
		tarif					= '$tiga' WHERE tb_jenis_biaya.kode_jenis_biaya='$satu';")
	
	or die("Gagal edit data".mysqli_error($koneksi));
//nip tidak di update karena field primary key di tb_pegawai

header('location:../../Admin/index.php?page=biaya');

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

