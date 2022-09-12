<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <section class="">
 	<header class="panel-heading">
 		
 	</header>
 	<?php 
 	@$page = $_GET['aksi'];
 	switch ($page) {
 		case 'tambah':
 			include "tambah.php";
 			break;
 		case 'proses_tambah':
 		    include "proses_tambah.php";
 		    break;
 		case 'edit':
 			include "edit.php";
 			break;
 		case 'edit':
 		    include "proses_edit.php";
 		    break;
 		case 'selengkapnya':
 			include "selengkapnya.php";
 			break;
 		case 'detail':
 			include "laporan_detail_.php";
 			break;
 		case 'Detail':
 			include "Detail.php";
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
 </section>

</body>
</html>