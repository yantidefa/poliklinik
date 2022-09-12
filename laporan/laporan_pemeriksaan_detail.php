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
   <style type="text/css">
      .custom-badge {
    border-radius: 4px;
    display: inline-block;
    font-size: 12px;
    min-width: 95px;
    padding: 1px 10px;
    text-align: center;
}
.status-red,
a.status-red {
    background-color: #ffe5e6;
    border: 1px solid #fe0000;
    color: #fe0000;
}
.status-green,
a.status-green {
    background-color: #e5faf3;
    border: 1px solid #00ce7c;
    color: #00ce7c;
}

.status-blue,
a.status-blue {
    background-color: #e5f3fe;
    border: 1px solid #008cff;
    color: #008cff;
}
  </style>

  
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
          <li><a class="logout" href="../dokter/index.php?page=rekam_medis">Close</a></li>
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
        <h3>Laporan Detail Rekam Medis </h3>
                                           <div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="row">
                <div class="col-lg-12 m-b-20">
                    <ul class="personal-info">
                      <?php 
                            $query = mysqli_query($koneksi,"SELECT tb_pemeriksaan.*,tb_pasien.*,tb_pendaftaran.* FROM tb_pendaftaran
                        INNER JOIN tb_pemeriksaan on tb_pemeriksaan.no_pendaftaran=tb_pendaftaran.no_pendaftaran
                        INNER JOIN tb_pasien on tb_pasien.kode_pas=tb_pendaftaran.kode_pas");
                                                                      
                            $data = @mysqli_fetch_array($query)
                                          
                        ?>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="breadcrumb">
                              <h4><b>#<?php echo $data['kode_pemeriksaan']; ?></b></h4>
                               <li>
                                 <span class="title"> Nama Pasien </span>
                                  <span class="text">: <?php echo $data['nama_pas']; ?></span>
                             </li><br>
                              <li>Keluhan </span>
                            <span class="text">: <?php echo $data['keluhan']; ?></span>
                        </li><br>
                         <li>
                            <span class="title"> Diagnosa </span>
                            <span class="text">: <?php echo $data['diagnosa']; ?></span>
                        </li><br>
                              <li>
                        <span class="title">Rincian </span>
                            <span class="text">: 
                                <?php if ($data['rincian_pemeriksaan']==1) {
                                                echo "<span class='custom-badge status-green'>Sudah Konfirmasi</span>" ;
                                             }elseif ($data['rincian_pemeriksaan']==0) {
                                               echo "<span class='custom-badge status-red'>Belum Konfirmasi</span>" ;
                                             }?>
                            </span>
                        </li>
                        <br>
                        <li>
                            <span class="title">Status </span>
                            <span class="text">: 
                            <?php if ($data['status_pemeriksaan']==1) {
                                                echo "<span class='custom-badge status-blue'>Transaksi Berhasil</span>" ;
                                             }elseif ($data['status_pemeriksaan']==0) {
                                               echo "<span class='custom-badge status-red'>Belum Transaksi</span>" ;
                                             }?>
                            </span>
                        </li><br>
                        <li>
                            <span class="title"> Tanggal Registrasi </span>
                            <span class="text">: <?php echo $data['tanggal_daftar']; ?></span>
                        </li><br>
                        <li>
                            <span class="title">Tanggal Pemeriksaan </span>
                            <span class="text">: <?php echo $data['tanggal_pemeriksaan']; ?></span>
                        </li><br>
                        <li>
                            <span class="title">No Pendaftaran </span>
                            <span class="text">: <?php echo $data['no_pendaftaran']; ?></span>
                        </li>
                            </div>
                          </div>
                        </div>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="row">

                <div class="col-sm-5 col-sm-offset-1" >
                    <h3>Data Pasien</h3>
                    #<?php echo $data['kode_pas']; ?><br>
                    <b><?php echo $data['nama_pas']; ?></b>. <?php echo $data['tanggal_daftar']; ?><br>
                    <?php echo $data['alamat_pas']; ?><br>
                    <?php echo $data['telp_pas']; ?>
                    </div>

                    <div class="col-sm-6">
                    <h3>Pasien</h3>
                    Berat Badan     : <?php echo $data['berat_badan']; ?> <?php echo "kg"; ?><br>
                    Tensi Diastolik : <?php echo $data['tensi_diastolik']; ?> <?php echo "mmHg"; ?><br>
                    Tensi Sistolik  : <?php echo $data['tensi_sistolik']; ?> <?php echo "mmHg"; ?><br> 

                    </div>
                </div>
                <br>
                <!--biaya-->
                                                <!-- TABEL -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered custom-table mb-0 table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Biaya</th>
                                                <th class="text-center">Tarif</th>
                                                <th class="text-center">Kode Pemeriksaan</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ID=$_GET['id'];
                                                $query_biaya = mysqli_query($koneksi,"SELECT tb_rekam_medis_biaya.*, tb_jenis_biaya.*
                                                FROM tb_rekam_medis_biaya
                                                INNER JOIN tb_jenis_biaya on tb_rekam_medis_biaya.kode_jenis_biaya = tb_jenis_biaya.kode_jenis_biaya WHERE kode_pemeriksaan = '$ID' ");
                                                $no = 1;
                                                while ($data = @mysqli_fetch_array($query_biaya))
                                                {
                                                    $Kode = $data['kode_pemeriksaan'];
                                            ?>                    
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['nama_biaya'] ;?></td>
                                                <td><?php echo $data['tarif'] ; ?></td>
                                                <td><?php echo $Kode ?></td>
                                                
                                            </tr>
                                            <?php
                                            $no++;
                                            };
                                            ?>                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>   
                    </div>
                </div>
                <br>
                <!--obat-->
                <!-- TABEL -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered custom-table mb-0 table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Obat</th>
                                                <th class="text-center">Merk</th>
                                                <th class="text-center">Satuan</th>
                                                <th class="text-center">Harga</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query_biaya = mysqli_query($koneksi,"SELECT tb_rekam_medis_obat.*, tb_obat.*
                                                FROM tb_rekam_medis_obat
                                                INNER JOIN tb_obat on tb_rekam_medis_obat.kode_obat = tb_obat.kode_obat WHERE kode_pemeriksaan_obat = '$ID' ");
                                                $no = 1;
                                                while ($data = @mysqli_fetch_array($query_biaya))
                                                {
                                            ?>                    
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['nama_obat'] ;?></td>
                                                <td><?php echo $data['merk'] ; ?></td>
                                                <td><?php echo $data['satuan']; ?></td>
                                                <td><?php echo $data['harga_jual']; ?></td>
                                                
                                            </tr>
                                            <?php
                                            $no++;
                                            };
                                            ?>                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>   
                    </div>
                </div>

                <!--resep-->
                <br>
              <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                          <div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>NO</th>
                                            
                    <th>Dosis</th>
                    <th>Jumlah</th>
              
                </tr>
            </thead>
            <tbody>
                <tr>
                  <?php
                    $query_biaya = mysqli_query($koneksi,"SELECT tb_rekam_medis_resep.*, tb_resep.*
                                FROM tb_rekam_medis_resep
                    INNER JOIN tb_resep on tb_rekam_medis_resep.kode_resep = tb_resep.kode_resep WHERE kode_pemeriksaan_resep = '$ID' ");
                    $NO = 1;
                   while ($data = @mysqli_fetch_array($query_biaya))
                    {
                   ?>
                    <td><?php echo $NO; ?></td>
                                          
                    <td><?php echo $data['dosis']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                                          

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

     

        </div>
    </div>
</div>


</body>
</html>