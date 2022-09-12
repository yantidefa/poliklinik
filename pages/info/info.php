<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
@$page	=	$_GET['aksi'];
switch ($page) {
	//admin
	case 'tambah':
		include "tambah.php";
		break;
	case 'edit':
		include "edit.php";
		break;
	case 'selengkapnya':
		include "selengkapnya.php";
		break;
	case 'detail':
		include "detail.php";
		break;
	case 'hapus':
		include "hapus.php";
		break;
	case 'proses_hapus':
		include "proses_hapus.php";
		break;
	
	default:
		include "tampil.php";
		break;
 }
 ?>
</body>
</html>