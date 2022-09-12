<?php 
ob_start();
include "koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_pasien WHERE kode_pas = '$_GET[kode_pas]' ")
or die(mysqli_error($koneksi));


header('location:../../Pendaftar/index.php?page=pasien');
 ?>
