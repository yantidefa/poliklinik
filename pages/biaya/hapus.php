<?php 
ob_start();
include "../inc/koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_jenis_biaya WHERE kode_jenis_biaya = '$_GET[kode_jenis_biaya]' ")
or die(mysqli_error($koneksi));


header('location:../../Admin/index.php?page=biaya');
 ?>
