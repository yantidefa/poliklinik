<?php 
ob_start();
include ("koneksi.php");

$Jadwal         = $_POST['kode_jadwal'];
$Hari           = $_POST['hari'];
$Mulai          = $_POST['jam_mulai'];
$Selesai        = $_POST['jam_selesai'];

if ($Jadwal 		== "" ||
	$Hari 			== "" ||
	$Mulai 			== "" ||
	$Selesai 		== "" ) 
{
	echo "Harap Isi Data Dengan Lengkap";
}
else {
	$QUERY = mysqli_query($koneksi, "INSERT INTO `tb_jadwal_praktik` VALUES ('$Jadwal', '$Hari', '$Mulai', '$Selesai');")
	or die(mysqlI_error($koneksi));
	

header('location:../../Admin/index.php?page=jadwal');
?>

<div class="alert alkert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="icon-remove"></i>
	</button>

	<i class="icon-ok green"></i>
	<h4>Data berhasil ditambahkan !</h4>
</div>

<?php 
}
 ?>
