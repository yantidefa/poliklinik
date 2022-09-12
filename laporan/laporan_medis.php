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
                                            <th>Kode Pemeriksaan</th>
                                            <th>Kode Pasien</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Rincian</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php

                                          $query = mysqli_query($koneksi,"SELECT tb_pemeriksaan.*,tb_pasien.*,tb_pendaftaran.* FROM tb_pendaftaran
                                            INNER JOIN tb_pemeriksaan on tb_pemeriksaan.no_pendaftaran=tb_pendaftaran.no_pendaftaran
                                            INNER JOIN tb_pasien on tb_pasien.kode_pas=tb_pendaftaran.kode_pas");

                                            
                                          $NO = 1;
                                            while ($data=@mysqli_fetch_array($query)) {

                                              $Rincian = $data['rincian_pemeriksaan'];
                                              $Status  =$data['status_pemeriksaan'];
                                              
                                          
                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $data['kode_pemeriksaan']; ?></td>
                                          <td><?php echo $data['kode_pas']; ?></td>
                                          <td><?php echo $data['nama_pas']; ?></td>
                                          <td><?php echo $data['alamat_pas']; ?></td> 
                                          <td>

                                            <span style=" border-radius: 4px;
                                             display: inline-block;
                                             font-size: 12px;
                                             min-width: 95px;
                                             padding: 1px 10px;
                                             text-align: center;
                                             background-color: #fef5e4;
                                             border: 1px solid #ff9b01;
                                             color: #ff9b01;">

                                             <?php if ($Rincian==1) {
                                                echo "sudah konfirmasi";
                                             }elseif ($Rincian==0) {
                                               echo "belum konfirmasi";
                                             }?></span>

                                            
                                          </td>
                                          <td>
                                            <button style=" border-radius: 4px;
                                             display: inline-block;
                                             font-size: 12px;
                                             min-width: 95px;
                                             padding: 1px 10px;
                                             text-align: center;
                                             background-color: #f3e7fd;
                                             border: 1px solid #8f13fd;
                                             color: #8f13fd;">

                                             <?php if ($Status==1) {
                                                echo "sudah transaksi";
                                             }elseif ($Status==0) {
                                               echo "belum transaksi";
                                             }?></button>

                                             </td>     
                                          
                                          
                                          
                                        </tr>
                                      <?php 
                                    $NO++;
                                    }
                                     ?>
                                       
                                     </tbody>
            </table>
          </div>
        </div>

        

      </div> 
</div>
</div>



</body>
</html>