<?php 
$foto 	= @$_FILES['foto']['tmp_name'];
$target = '../pages/images/';
$gambar = @$_FILES['foto']['name'];

if ($gambar=="")
 {
 	?>
	<div class='alert alert-danger alert-dismissible fade show' role='alert'>
		<div class='alert-icon'>
			<i class="fas fa-check-circle"></i>
		</div>
		<strong>GAGAL!</strong> pastikan semua data terisi
		<button type='button' class="close" data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>
					<i class='fas fa-frown'></i>
				</span>
		</button>
	</div>
<?php
}else {
	$update_logo = move_uploaded_file($foto, $target.$gambar);
	if ($update_logo) {
		$query = mysqli_query($koneksi,"UPDATE `tb_informasi` SET logo_poliklinik='$gambar' WHERE `id_informasi`='1' ") or die(mysqli_error());}
	?>
	<div class='alert alert-danger alert-dismissible fade show' role='alert'>
		<div class='alert-icon'>
			<i class='fas fa-check-circle'></i>
		</div>
		<strong>SUKSES!</strong> Dalam waktu 3 detik halaman akan dialihkan
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				<span aria-hidden='true'>
					&times;
				</span>
		</button>
	</div>
		<meta http-equiv="refresh" content="3; url=?page=info">
<?php
}
 ?>