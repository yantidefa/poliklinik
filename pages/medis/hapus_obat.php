<?php 
ob_start();
include "koneksi.php";

$kode=$_GET['id_rekam_medis_obat'];

mysqli_query($koneksi, "DELETE FROM tb_rekam_medis_obat WHERE id_rekam_medis_obat = '$kode' ")
or die(mysqli_error($koneksi));


 ?>
<meta http-equiv="refresh" content="1; url=index.php?page=rekam_medis&aksi=rincian_transaksi&id=<?php echo $data['kode_pemeriksaan_obat']; ?> ">

