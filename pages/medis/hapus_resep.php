<?php 
ob_start();
include "koneksi.php";



mysqli_query($koneksi, "DELETE FROM tb_rekam_medis_resep WHERE id_rekam_medis_resep = '$_GET[id_rekam_medis_resep]' ")
or die(mysqli_error($koneksi));



 ?>

<meta http-equiv="refresh" content="1; url=index.php?page=rekam_medis&aksi=rincian_transaksi&id=<?php echo $data['kode_pemeriksaan_resep']; ?>">
