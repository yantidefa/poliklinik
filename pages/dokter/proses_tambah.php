<?php
ob_start();
include 'koneksi.php';


$KODE     	   	=$_POST['kode_dok'];
$NAMA     	   	=$_POST['nama_dok'];
$ALAMAT    	  	=$_POST['alamat_dok'];
$TLP     	    =$_POST['telp_dok'];
$KODE_POLI 		=$_POST['poli'];
$KODE_JADWAL 	=$_POST['jadwal'];


if ($KODE==""  || 
	$NAMA==""  || 
	$ALAMAT==""|| 
	$TLP==""||
	$KODE_JADWAL==""||
	$KODE_POLI==""  ) {



?>

<div class='alert alert-danger' role='alert'>
    	<strong>error!</strong>A<a href="#" class="alert-link">Pastikan </a>Semua data terisi.
    	<button type="button" class="close" data-dismiss="alert" arial-label="close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>
<?php

	}
	else
	{
	$QUERY1=mysqli_query($koneksi,"INSERT INTO tb_dokter SET 
	kode_dok	='$KODE',
	nama_dok	='$NAMA',
	alamat_dok	='$ALAMAT',
	telp_dok	='$TLP',
	kode_poli	='$KODE_POLI',
	kode_jadwal	='$KODE_JADWAL'
	;")
		or die('Gagal Memasukan Data Baru'.mysqli_error($koneksi));


?>

	<div class='alert alert-success' role='alert'>
    	<strong>Edit informasi sukses</strong>
    	<h5>Dalam Waktu 3 Detik halaman akan di alihkan.</h5>
    	<button type="button" class="close" data-dismiss="alert" arial-label="close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>

<?php
header("location:../../Admin/index.php?page=dokter");

}
