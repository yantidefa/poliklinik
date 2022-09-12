<?php 
ob_start();
include "koneksi.php";



mysqli_query($koneksi, "DELETE FROM tb_rekam_medis_biaya WHERE id_rekam_medis_biaya = '$_GET[id_rekam_medis_biaya]' ")
or die(mysqli_error($koneksi));


 ?>
<meta http-equiv="refresh" content="1; url=../Dokter/index.php?page=rekam_medis&aksi=rincian_transaksi&id=<?php echo $data['kode_pemeriksaan']; ?>">
