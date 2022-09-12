<?php 
ob_start();
include ("koneksi.php");
$NO;
 $Pasien             = $_POST['kode_pas'];
 $Nama_Pas           = $_POST['nama_pas'];   
 $Alamat             = $_POST['alamat_pas']; 
 $Telp_Pas           = $_POST['telp_pas']; 
 $Tgl_Pas            = $_POST['tanggal_lahir_pas']; 
 $Jenkel             = $_POST['jenis_kelamin_pas'];
 $Tgl_Reg            = $_POST['tanggal_reg'];           

if ($Pasien 		== "" ||
	$Nama_Pas 		== "" ||
	$Alamat 		== "" ||
	$Telp_Pas 		== "" ||
	$Tgl_Pas 		== "" ||
	$Jenkel 		== "" ||
	$Tgl_Reg 		== "" ) 
{
	echo "Harap Isi Data Dengan Lengkap";
}
else {
	$QUERY = mysqli_query($koneksi, "INSERT INTO `tb_pasien` VALUES ('$Pasien', '$Nama_Pas','$Alamat', '$Telp_Pas', '$Tgl_Pas', '$Jenkel', '$Tgl_Reg');")
	or die(mysqlI_error($koneksi));
	

header('location:../../Pendaftar/index.php?page=pasien');
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
