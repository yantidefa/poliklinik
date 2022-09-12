<?php 
ob_start();
include "koneksi.php";


mysqli_query($koneksi, "DELETE FROM tb_login WHERE nip = '$_GET[nip]' ")
or die(mysqli_error($koneksi));


mysqli_query($koneksi, "DELETE FROM tb_pegawai WHERE nip = '$_GET[nip]' ")
or die(mysqli_error($koneksi));

header('location:../../Admin/index.php?page=pegawai');
 ?>