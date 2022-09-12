<?php 
ob_start();
include "koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_obat WHERE kode_obat = '$_GET[kode_obat]' ")
or die(mysqli_error($koneksi));


header('location:../../Admin/index.php?page=obat');
 ?>
