<?php 
ob_start();
include "koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_pemeriksaan WHERE kode_pemeriksaan = '$_GET[kode_pemeriksaan]' ")
or die(mysqli_error($koneksi));


header('location:../../Dokter/index.php?page=periksa');
 ?>
