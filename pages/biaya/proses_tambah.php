<?php 
ob_start();
include ("../inc/koneksi.php");
$Biaya         = $_POST['kode_jenis_biaya'];
$Nama          = $_POST['nama_biaya']; 
$Tarif         = $_POST['tarif'];

if ($Biaya		== "" ||
	$Nama 		== "" ||
	$Tarif 		== ""  ) 
{
	echo "Harap Isi Data Dengan Lengkap";
}
else {
	$QUERY = mysqli_query($koneksi, "INSERT INTO `tb_jenis_biaya` VALUES ('$Biaya', '$Nama', '$Tarif');")
	or die(mysqlI_error($koneksi));
	

header('location:../../Admin/index.php?page=biaya');
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
