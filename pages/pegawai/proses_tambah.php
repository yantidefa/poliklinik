<?php 
ob_start();
include ("koneksi.php");

$Nip 			= $_POST['nip'];
$Nama 			= $_POST['nama_peg'];
$Alamat 		= $_POST['alamat_peg'];
$Telp	 		= $_POST['telp_peg'];
$jk 			= $_POST['jenis_kelamin_peg'];
$Username 		= $_POST['username'];
$Password		= $_POST['password'];
$Status 		= $_POST['type_user'];

if ($Nip 		== "" ||
	$Nama 		== "" ||
	$Alamat 	== "" ||
	$Telp 		== "" ||
	$jk 		== "" ||
	$Username 	== "" ||
	$Password 	== "" ||
	$Status 	== "" ) 
{
	echo "Harap Isi Data Dengan Lengkap";
}
else {
	$QUERY = mysqli_query($koneksi, "INSERT INTO `tb_pegawai` VALUES ('$Nip', '$Nama', '$Alamat', '$Telp', '$jk');")
	or die(mysqlI_error($koneksi));
	$QUERY2 = mysqli_query($koneksi, "INSERT INTO `tb_login` VALUES ('$Username', md5 ('$Password'), '$Status', '$Nip');")
	or die(mysqli_error($koneksi));

header('location:../../Admin/index.php?page=pegawai');
?>

<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i>
	</button>

	<i class="icon-ok green"></i>
	<h4>Data berhasil ditambahkan !</h4>
</div>

<?php 
}
 ?>
