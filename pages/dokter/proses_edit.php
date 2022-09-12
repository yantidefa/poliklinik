<?php
include 'koneksi.php';

$KODE                      	    = mysqli_real_escape_string($koneksi, @$_POST['kode_dok']);
$NAMA                   	   = mysqli_real_escape_string($koneksi, @$_POST['nama_dok']);
$ALAMAT                         = mysqli_real_escape_string($koneksi, @$_POST['alamat_dok']);
$TLP                           = mysqli_real_escape_string($koneksi, @$_POST['telp_dok']);
$KODE_POLI                     = mysqli_real_escape_string($koneksi, @$_POST['kode_poli']);
$KODE_JADWAL                   = mysqli_real_escape_string($koneksi, @$_POST['jadwal']);


if ($KODE=="" || 
    $NAMA=="" || 
    $ALAMAT=="" || 
    $TLP=="" || 
    $KODE_POLI=="" || 
    $KODE_JADWAL=="") {

?>

    <div class='alert alert-danger' role='alert'>
        <strong>error!</strong>A<a href="#" class="alert-link">Pastikan </a>Semua data terisi.
        <button type="button" class="close" data-dismiss="alert" arial-label="close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    
<?php

    }else{
        $QUERY1=mysqli_query($koneksi,"UPDATE tb_dokter SET
        
        nama_dok              ='$NAMA',
        alamat_dok            ='$ALAMAT',
        telp_dok              ='$TLP',
        kode_poli             ='$KODE_POLI',
        kode_jadwal           ='$KODE_JADWAL' WHERE tb_dokter.kode_dok='$KODE';")
        or die('Gagal'.mysqli_error($koneksi));

?>

	<div class='alert alert-success' role='alert'>
    	<strong>Edit Data sukses</strong>
    	<h5>Dalam Waktu 3 Detik halaman akan di alihkan.</h5>
    	<button type="button" class="close" data-dismiss="alert" arial-label="close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>

    



<?php

}

header("location:../../Admin/index.php?page=dokter");
?>
