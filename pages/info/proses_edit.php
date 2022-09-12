<?php 



$nama_poliklinik 			= 	mysqli_real_escape_string($koneksi,$_POST['nama_poliklinik']);
$deskripsi_poliklinik	    = 	mysqli_real_escape_string($koneksi,$_POST['deskripsi_poliklinik']);
$alamat_poliklinik 			= 	mysqli_real_escape_string($koneksi,$_POST['alamat_poliklinik']);

$kec_poliklinik	   		    = 	mysqli_real_escape_string($koneksi,$_POST['kec_poliklinik']);
$kab_poliklinik 			= 	mysqli_real_escape_string($koneksi,$_POST['kab_poliklinik']);
$prov_poliklinik	   	    = 	mysqli_real_escape_string($koneksi,$_POST['prov_poliklinik']);

$kode_pos_poliklinik 		= 	mysqli_real_escape_string($koneksi,$_POST['kode_pos_poliklinik']);
$telp_poliklinik	   	    = 	mysqli_real_escape_string($koneksi,$_POST['telp_poliklinik']);
$email_poliklinik	   	    = 	mysqli_real_escape_string($koneksi,$_POST['email_poliklinik']);


if ($nama_poliklinik 			== "" || 
	$deskripsi_poliklinik 		== "" || 
	$alamat_poliklinik 			== "" || 
	$kec_poliklinik 			== "" || 
	$kab_poliklinik 			== "" || 
	$prov_poliklinik 			== "" || 
	$kode_pos_poliklinik	    == "" || 
	$telp_poliklinik 			== "" || 
	$email_poliklinik 			== "" )
 {
?>
<div class='alert alert-danger alert-dismissible fade show' role='alert'>
	<strong>Error!</strong> Pastikan Semua Data Terisi.
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
	</button>
</div>
<?php
}
else {
	$query1 = mysqli_query($koneksi," UPDATE `tb_informasi` SET 
		`nama_poliklinik` = '$nama_poliklinik', 
		`deskripsi_poliklinik` ='$deskripsi_poliklinik', 
		`alamat_poliklinik` = '$alamat_poliklinik', 
		`kec_poliklinik` = '$kec_poliklinik', 
		`kab_poliklinik` = '$kab_poliklinik', 
		`prov_poliklinik` = '$prov_poliklinik', 
		`kode_pos_poliklinik` = '$kode_pos_poliklinik', 
		`telp_poliklinik` = '$telp_poliklinik', 
		`email_poliklinik` = '$email_poliklinik' 
		WHERE `tb_informasi`. `id_informasi` = 1;" ) or die(mysqli_error($koneksi));
 ?>

 <div class='alert alert-success alert-dismissible fade show' role='alert'>
	<strong>Update Logo Success!!</strong> 
	<h5>Dalam waktu 3 detik akan dialihkan.</h5>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<span aria-hidden='true'>&times;</span>
	</button>
</div>

<meta http-equiv="refresh" content="3; url=?page=info">
<?php
}
?>