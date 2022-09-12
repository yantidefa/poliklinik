<?php 
include "koneksi.php";
$satu		= mysqli_real_escape_string($koneksi,@$_POST['kode_obat']);
$dua		= mysqli_real_escape_string($koneksi,@$_POST['nama_obat']);
$tiga		= mysqli_real_escape_string($koneksi,@$_POST['merk']);
$empat		= mysqli_real_escape_string($koneksi,@$_POST['satuan']);
$lima		= mysqli_real_escape_string($koneksi,@$_POST['harga_jual']);


if ($satu 	== "" || 
	$dua	 == "" || 
	$tiga 	== "" || 
	$empat 	== "" || 
	$lima 	== ""  ) {
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
	$UPDATE1 = mysqli_query($koneksi, "UPDATE tb_obat SET 
		nama_obat 				= '$dua',
		merk					= '$tiga',
		satuan 					= '$empat',
		harga_jual 			    = '$lima' WHERE tb_obat.kode_obat='$satu';")
	
	or die("Gagal edit data".mysqli_error($koneksi));
//nip tidak di update karena field primary key di tb_pegawai

header('location:../../Admin/index.php?page=obat');

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

