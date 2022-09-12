<?php 
ob_start();
include "koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_pendaftaran WHERE no_pendaftaran = '$_GET[no_pendaftaran]' ")
or die(mysqli_error($koneksi));


header('location:../../Pendaftar/index.php?page=pendaftaran');
 ?>
