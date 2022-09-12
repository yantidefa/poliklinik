<?php 
@session_start();
include('koneksi.php');
$USER      =   addslashes($_POST['username']);
$PASS      =   addslashes($_POST['password']);
$QUERY     =   mysqli_query($koneksi, "SELECT * FROM `tb_login` WHERE `username` = '$USER' AND `password` = md5('$PASS')");

$HASIL     =   mysqli_num_rows($QUERY);
$DATA      =   mysqli_fetch_array($QUERY);

if ($HASIL==1) {
	$_SESSION['username']    =$DATA['username'];
	$_SESSION['type_user']   =$DATA['type_user'];


	if ($DATA['type_user']=="Admin") {
		header("location:../Admin/index.php");

	}

	elseif ($DATA['type_user']=="Pendaftar") {
		header("location:../Pendaftar/index.php");
	}

	elseif ($DATA['type_user']=="Dokter") {
		header("location:../Dokter/index.php");
	}

	elseif ($DATA['type_user']=="Kasir") {
		header("location:../Kasir/index.php");
	}
	echo("
		<div class='alert alert-danger'>
			<center>
				<strong>LOGIN GAGAL</strong>
				Periksa Kembali Username dan Password Anda!
			<center>
		</div>
		<meta http-equiv='refresh' content=2;'>	");
}
	
	else {
		echo("
		<div class='alert alert-success'>
			<center>
				<strong>LOGIN BERHASIL</strong>
				Anda akan redirect secara otomatis..!
			<center>
		</div>
		<meta http-equiv='refresh' content=2;'> ");
	}

 ?>



