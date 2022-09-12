<?php
include"koneksi.php";
$ID = $_GET['id'];
$dua 		= mysqli_real_escape_string($koneksi,@$_POST['kode_resep']);

if ($ID == "" || $dua == "0"  )
{
?>
<div class="col-sm-12">
	<div class="alert alert-block alert-danger">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>

		<i class="icon-warning-sign red"></i>
		Pastikan Semua Form Terisi !!!	
	</div>
</div>
<?php
}
else
{
  $query = mysqli_query($koneksi,"INSERT INTO `tb_rekam_medis_resep` (kode_pemeriksaan_resep,kode_resep) VALUES ('$ID', '$dua');") or die (mysql_error());

?>
<div class="col-sm-12">
	<div class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>
		</button>

		<i class="icon-ok green"></i>
		<h4>Data Berhasil di Tambahkan !</h4>

	</div>
</div>

<meta http-equiv="refresh" content="1; url=index.php?page=rekam_medis&aksi=rincian_transaksi&id=<?php echo $ID; ?>">
<?php
}
?>