<?php 
ob_start();
include "koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_poliklinik WHERE kode_poli = '$_GET[kode_poli]' ")
or die(mysqli_error($koneksi));


header('location:../../Admin/index.php?page=poli');
 ?>
