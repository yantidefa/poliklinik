<?php 
ob_start();
include "koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_resep WHERE kode_resep = '$_GET[kode_resep]' ")
or die(mysqli_error($koneksi));


header('location:../../Dokter/index.php?page=resep');
 ?>
