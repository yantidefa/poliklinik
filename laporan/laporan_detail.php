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
          <li><a class="logout" href="../Dokter/index.php?page=periksa">Close</a></li>
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
        <h5>Laporan Detail Pemeriksaan </h5>
                                           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Keluhan</th>
                                            <th>Perawatan</th>
                                            <th>Tindakan</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                           <?php 
                                            $ID=$_GET['id'];
                                              $query = mysqli_query($koneksi,"SELECT tb_pemeriksaan.*,tb_pasien.*,tb_pendaftaran.* FROM tb_pendaftaran
                                            INNER JOIN tb_pemeriksaan on tb_pemeriksaan.no_pendaftaran=tb_pendaftaran.no_pendaftaran
                                            INNER JOIN tb_pasien on tb_pasien.kode_pas=tb_pendaftaran.kode_pas");
                                                 
                                             $data = @mysqli_fetch_array($query)
                                          
                                            ?>
                                            
                                            <div class="col-lg-12">
                                               <ol class="breadcrumb" >
                                                 <p<h4><b>#<?php echo $data['kode_pas']; ?></b></h4></p>
                                                 Tanggal Registrasi  : <?php echo $data['tanggal_reg']; ?><br>
                                                 Tanggal Pemeriksaan : <?php echo $data['tanggal_reg']; ?>
                                                </ol>
                                            </div>

                                                      <div class="row">
                                                        <div class="col-sm-5 col-sm-offset-1" >
                                                          <h3>Data Pasien</h3>
                                                        #<?php echo $data['kode_pas']; ?><br>
                                                        <b><?php echo $data['nama_pas']; ?></b>. <?php echo $data['tanggal_daftar']; ?><br>
                                                        <?php echo $data['alamat_pas']; ?><br>
                                                        <?php echo $data['telp_pas']; ?>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <h3>Pasien</h3>
                                                        Berat Badan     : <?php echo $data['berat_badan']; ?> <?php echo "kg"; ?><br>
                                                        Tensi Diastolik : <?php echo $data['tensi_diastolik']; ?> <?php echo "mmHg"; ?><br>
                                                        Tensi Sistolik  : <?php echo $data['tensi_sistolik']; ?> <?php echo "mmHg"; ?><br>                                                        
                                                      </div>
                                                      </div>

                                                    <br>


                                          
                                          <td><?php echo $data['keluhan']; ?></td>
                                          <td><?php echo $data['perawatan']; ?></td>
                                          <td><?php echo $data['tindakan']; ?></td>
                                           
                                          
                                        </tr>
                                      
                                       
                                        </table>

                                  </div>
        </div>

        

      </div> 
</div>
</div>



</body>
</html>