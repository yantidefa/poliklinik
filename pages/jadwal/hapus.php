<?php 
ob_start();
include "koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_jadwal_praktik WHERE kode_jadwal = '$_GET[kode_jadwal]' ")
or die(mysqli_error($koneksi));


header('location:../../Admin/index.php?page=jadwal');
 ?>
