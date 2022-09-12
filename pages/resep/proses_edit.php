<?php 
include "koneksi.php";
$satu		= mysqli_real_escape_string($koneksi,@$_POST['kode_resep']);
$dua		= mysqli_real_escape_string($koneksi,@$_POST['dosis']);
$tiga		= mysqli_real_escape_string($koneksi,@$_POST['jumlah']);

if ($satu 	 == "" || 
	$dua 	 == "" ||
	$tiga 	 == "" ) {
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
	$UPDATE1 = mysqli_query($koneksi, "UPDATE tb_resep SET 
		dosis 				= '$dua',
		jumlah 				= '$tiga' WHERE tb_resep.kode_resep='$satu';")

	or die("Gagal edit data".mysqli_error($koneksi));
//nip tidak di update karena field primary key di tb_pegawai

header('location:../../Dokter/index.php?page=resep');

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

