<?php 
include "koneksi.php";
$satu		= mysqli_real_escape_string($koneksi,@$_POST['nip']);
$dua		= mysqli_real_escape_string($koneksi,@$_POST['nama_peg']);
$tiga		= mysqli_real_escape_string($koneksi,@$_POST['alamat_peg']);
$empat		= mysqli_real_escape_string($koneksi,@$_POST['telp_peg']);
$lima		= mysqli_real_escape_string($koneksi,@$_POST['jenis_kelamin_peg']);

$enam		= mysqli_real_escape_string($koneksi,@$_POST['username']);
$tujuh		= mysqli_real_escape_string($koneksi,@$_POST['password']);
$delapan	= mysqli_real_escape_string($koneksi,@$_POST['type_user']);

if ($satu == "" || 
	$dua == "" || 
	$tiga == "" || 
	$empat == "" || 
	$lima == "" || 
	$enam == "" || 
	$tujuh == "" || 
	$delapan == "" ) {
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
	$UPDATE1 = mysqli_query($koneksi, "UPDATE tb_pegawai INNER JOIN tb_login ON tb_pegawai.nip=tb_login.nip SET 
		nama_peg 				= '$dua',
		alamat_peg 				= '$tiga',
		telp_peg 				= '$empat',
		jenis_kelamin_peg	    = '$lima' WHERE tb_pegawai.nip='$satu';")
	or die("Gagal edit data".mysqli_error($koneksi));
//nip tidak di update karena field primary key di tb_pegawai

	$UPDATE2 = mysqli_query($koneksi, "UPDATE tb_login INNER JOIN tb_pegawai ON tb_pegawai.nip=tb_login.nip SET
		password 	= md5('$tujuh'),
		type_user 	= '$delapan' WHERE tb_login.nip='$satu';")
	or die("Gagal edit data".mysqli_error($koneksi));
//username tdk di update kr field primary di tb_login

header('location:../../Admin/index.php?page=pegawai');

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

