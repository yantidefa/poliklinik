<?php 
include "../inc/koneksi.php";
include "../inc/informasi.php";
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Admin-Poliklinik-Laporan</title>

  <!-- Favicons -->
  <link href="../Admin/img/favicon.png" rel="icon">
  <link href="../Admin/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../Admin/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css--> 
  <link href="../Admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../Admin/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../Admin/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../Admin/css/style.css" rel="stylesheet">
  <link href="../Admin/css/style-responsive.css" rel="stylesheet">
  <script src="../Admin/lib/chart-master/Chart.js"></script>

  
</head>

<body onload="window.print();">

    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        

        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#" class="logo">
          <img src="" width="35" height="35" alt=""><span> <?php echo @$DATA_INFO['nama_poliklinik']; ?></span>
        </a>
      <!--logo end-->

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="">Print Or Save</a></li>
          <li><a class="logout" href="javascript:window.open('','_self').close();">Close</a></li>
        </ul>
      </div>
    </header>


<!-- Container laporan -->

<div class="wrapper">
  <div class ="form-panel">
  <div class="container">
  <?php include @"kop_laporan.php"; ?>
    <div class="panel-body">
      <div class="table-responsive">
        <h5>Laporan Daftar Pasien</h5>
          <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Alamat Pasien</th>
                                            <th>Telp Pasien</th>
                                            <th>Tanggal Lahir Pasien</th>
                                            <th>Jenis Kelamin Pasien</th>
                                            <th>Tanggal Reg</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          
                                          $TAMPIL = "SELECT * FROM tb_pasien";
                                          $HASIL = @mysqli_query($koneksi,$TAMPIL);
                                          $NO = 1;
                                            while ($row=@mysqli_fetch_array($HASIL)) {
                                          $NO;
                                          $Pasien             = $row['kode_pas'];
                                          $Nama_Pas           = $row['nama_pas'];   
                                          $Alamat             = $row['alamat_pas']; 
                                          $Telp_Pas           = $row['telp_pas']; 
                                          $Tgl_Pas            = $row['tanggal_lahir_pas']; 
                                          $Jenkel             = $row['jenis_kelamin_pas'];
                                          $Tgl_Reg            = $row['tanggal_reg'];                                     

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $Pasien; ?></td>
                                          <td><?php echo $Nama_Pas; ?></td>
                                          <td><?php echo $Alamat; ?></td>
                                          <td><?php echo $Telp_Pas; ?></td>
                                          <td><?php echo $Tgl_Pas; ?></td>
                                          <td><?php echo $Jenkel; ?></td>
                                          <td><?php echo $Tgl_Reg; ?></td>

                                                                                      
                                         

                                        </tr>
                                      <?php 
                                    $NO++;
                                    }
                                     ?>
                                       
                                        </table>
          </div>
        </div>

        

      </div> 
</div>
</div>



</body>
</html>