<?php 
ob_start();
include ("koneksi.php");
$Obat         = $_POST['kode_obat'];
$Nama         = $_POST['nama_obat']; 
$Merk         = $_POST['merk'];
$Satuan       = $_POST['satuan'];   
$Harga        = $_POST['harga_jual'];

if ($Obat 		== "" ||
	$Nama 		== "" ||
	$Merk 		== "" ||
	$Satuan 	== "" ||
	$Harga      == "" ) 
{
	echo "Harap Isi Data Dengan Lengkap";
}
else {
	$QUERY = mysqli_query($koneksi, "INSERT INTO `tb_obat` VALUES ('$Obat', '$Nama', '$Merk', '$Satuan', '$Harga');")
	or die(mysqlI_error($koneksi));
	

header('location:../../Admin/index.php?page=obat');
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
