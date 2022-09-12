<?php 
ob_start();
include "koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_dokter WHERE kode_dok = '$_GET[kode_dok]' ")
or die(mysqli_error($koneksi));


header('location:../../Admin/index.php?page=dokter');
 ?>
