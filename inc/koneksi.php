<?php 
//Definisikan koneksi ke database
$Server="sql212.epizy.com";
$Username="epiz_26547080";
$Password="56xrclHlv1h6X";
$Database="epiz_26547080_poliklinik";

$koneksi = mysqli_connect($Server,$Username,$Password,$Database);
//check koneksi
if (mysqli_connect_error()) {
	echo "koneksi database gagal!" .mysqli_connect_error($koneksi);
}



 ?>