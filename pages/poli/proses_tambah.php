<?php 
ob_start();
include ("koneksi.php");
$NO;
$Poli         = $_POST['kode_poli'];
$Nama         = $_POST['nama_poli'];          

if ($Poli 		== "" ||
	$Nama 			== "" ) 
{
	echo "Harap Isi Data Dengan Lengkap";
}
else {
	$QUERY = mysqli_query($koneksi, "INSERT INTO `tb_poliklinik` VALUES ('$Poli', '$Nama');")
	or die(mysqlI_error($koneksi));
	

header('location:../../Admin/index.php?page=poli');
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
