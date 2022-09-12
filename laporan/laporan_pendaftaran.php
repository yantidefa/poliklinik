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
        <h5>Laporan Jenis Biaya</h5>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            
                                            <th>No Urut</th>
                                            <th>Nama Pegawai</th>
                                            <th>Kode Pasien</th>
                                            <th>Jadwal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          
                                           $query = mysqli_query($koneksi, "SELECT tb_pendaftaran.*, tb_pasien.*, tb_pegawai.*, tb_jadwal_praktik. * FROM 
                                           tb_pendaftaran 
                                            JOIN tb_pegawai ON tb_pendaftaran.nip=tb_pegawai.nip
                                            JOIN tb_pasien ON tb_pendaftaran.kode_pas=tb_pasien.kode_pas
                                            JOIN tb_jadwal_praktik ON tb_pendaftaran.kode_jadwal=tb_jadwal_praktik.kode_jadwal
                                            ORDER BY tb_pendaftaran.no_pendaftaran ASC");

                                          $NO = 1;
                                            while ($data=@mysqli_fetch_array($query)) {
                                         
                                                                               

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $data['tanggal_daftar']; ?></td>
                                          <td><?php echo $data['no_urut']; ?></td>
                                          <td><?php echo $data['nama_peg']; ?></td>
                                          <td><?php echo $data['nama_pas']; ?></td>
                                          <td><?php echo $data['hari'].",".$data['jam_mulai']."-".$data['jam_selesai']; ?></td>
                                        
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