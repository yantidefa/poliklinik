<?php 
ob_start();
include ("koneksi.php");
$NO;
 $Resep         = $_POST['kode_resep'];
 $Dosis         = $_POST['dosis'];   
 $Jumlah        = $_POST['jumlah'];           

if ($Resep 		== "" ||
	$Dosis 		== "" ||
	$Jumlah 	== "" ) 
{
	echo "Harap Isi Data Dengan Lengkap";
}
else {
	$QUERY = mysqli_query($koneksi, "INSERT INTO `tb_resep` VALUES ('$Resep', '$Dosis','$Jumlah');")
	or die(mysqlI_error($koneksi));
	

header('location:../../Dokter/index.php?page=resep');
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
