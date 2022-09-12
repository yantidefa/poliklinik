<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Admin-Poliklinik</title>

  <!-- Favicons -->
  <link href="Admin/img/favicon.png" rel="icon">
  <link href="Admin/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="Admin/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="Admin/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="Admin/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="Admin/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="Admin/css/style.css" rel="stylesheet">
  <link href="Admin/css/style-responsive.css" rel="stylesheet">
  <script src="Admin/lib/chart-master/Chart.js"></script>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>

<?php

include'../inc/koneksi.php';

$QUERY = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username='".$_SESSION['username']."'");
while ($DATA=mysqli_fetch_array($QUERY))
$NIP = $DATA['nip']; 
{
	$QUERY2 = mysqli_query ($koneksi, "SELECT * FROM tb_pegawai WHERE tb_pegawai.nip='$NIP'");
	while ($DATA2=mysqli_fetch_array($QUERY2)) 
	{
		if ($_SESSION['username']) 
		{
			if ($_SESSION['type_user']== "Admin") 
			{
				echo "
        <div class='col-lg-12 main-chart'>
            <!--CUSTOM CHART START -->
            <div class='border-head'>
              <h3>DASHBOARD ADMIN</h3>
            <div class='alert alert-info'><h5>Selamat Datang di Poliklinik</h5><b><h3>Putri Defa Yanti . $DATA2[nama_peg]</h3></b></div>
             <!--custom chart end-->
             <div class='row mt'>
              <!-- SERVER STATUS PANELS -->
              <!-- awal admin-->
              <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA PEGAWAI</h5>
                  </div>
                  <a href='?page=pegawai'>
                    <i class='fa fa-stethoscope fa-5x'></i>
                  </a>
                </div>
              </div>
               <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA DOKTER</h5>
                  </div>
                  <a href='?page=dokter'>
                    <i class='fa fa-user-md fa-5x'></i>
                  </a>
                  </div>
                </div>
               <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA POLKLINIK</h5>
                  </div>
                  <a href='?page=poli'>
                    <i class='fa fa-book fa-5x'></i>
                  </a>
                  </div>
                </div>
                <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA OBAT</h5>
                  </div>
                  <a href='?page=obat'>
                    <i class='fa fa-square-o fa-5x'></i>
                  </a>
                </div>
                </div>
                <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA BIAYA</h5>
                  </div>
                  <a href='?page=biaya'>
                    <i class='fa fa-money fa-5x'></i>
                  </a>
                  </div>
                </div>
            ";
			}else if ($_SESSION['type_user']== "Dokter") 
			{
				echo"
        <div class='border-head'>
              <h3>DASHBOARD DOKTER</h3>
           <div class='alert alert-info'><h5>Selamat Datang di Poliklinik</h5><b><h3>Putri Defa Yanti . $DATA[nama_peg]</h3></b></div>
             <!--custom chart end-->
             <div class='row mt'>
              <!-- SERVER STATUS PANELS -->
                <!--awal dokter-->
            <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA RESEP OBAT</h5>
                  </div>
                  <a href='?page=resep'>
                    <i class='fa fa-edit fa-5x'></i>
                  </a>
                  </div>
                </div>
                <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA PEMERIKSAAN</h5>
                  </div>
                  <a href='?page=periksa'>
                    <i class='fa fa-wheelchair fa-5x'></i>
                  </a>
                  </div>
                </div>
                 <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>REKAM MEDIS</h5>
                  </div>
                  <a href='?page=rekam_medis'>
                    <i class='fa fa-calendar fa-5x'></i>
                  </a>
                  </div>
                </div>
                <!--akhir dokter-->
            
        ";
			}else if ($_SESSION['type_user']== "Kasir") 
			{
				echo" <div class='border-head'>
              <h3>DASHBOARD KASIR</h3>
            <div class='alert alert-info'><h5>Selamat Datang di Poliklinik</h5><b><h3>Putri Defa Yanti . $DATA[nama_peg]</h3></b></div>
             <!--custom chart end-->
             <div class='row mt'>
              <!-- SERVER STATUS PANELS -->
                <!--awal kasir-->
                 <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA RINCIAN BIAYA</h5>
                  </div>
                  <a href=''>
                    <i class='fa fa-money fa-5x'></i>
                  </a>
                  </div>
                </div>'
                <!--akhir kasir-->
           ";
			}else if ($_SESSION['type_user']== "Pendaftar") 
			{
				echo"<div class='col-lg-12 main-chart'>
            <!--CUSTOM CHART START -->
            <div class='border-head'>
              <h3>DASHBOARD PENDAFTAR</h3>
            <div class='alert alert-info'><h5>Selamat Datang di Poliklinik</h5><b><h3>Putri Defa Yanti . $DATA[nama_peg]</h3></b></div>
             <!--custom chart end-->
             <div class='row mt'>
              <!-- SERVER STATUS PANELS -->
              <!--awal pendaftar-->
              <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA PASIEN</h5>
                  </div>
                  <a href='?page=pasien'>
                    <i class='fa fa-book fa-5x'></i>
                  </a>
                  </div>
                </div>
                 <div class='col-md-3 col-sm-3 mb'>
                <div class='grey-panel donut-chart'>
                  <div class='grey-header'>
                    <h5>DATA PENDAFTAR</h5>
                  </div>
                  <a href='?page=pendaftar'>
                    <i class='fa fa-calendar-o fa-5x'></i>
                  </a>
                  </div>
                </div>
              <!--akhir pendaftar-->";
			}
		}
	};
};

?>


    <!--main content start-->
    
    <!--main content end-->
    </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="Admin/lib/jquery/jquery.min.js"></script>

  <script src="Admin/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="Admin/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="Admin/lib/jquery.scrollTo.min.js"></script>
  <script src="Admin/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="Admin/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="Admin/lib/common-scripts.js"></script>
  <script type="text/javascript" src="Admin/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="Admin/lib/sparkline-chart.js"></script>
  <script src="Admin/lib/zabuto_calendar.js"></script>
  <script type="text/javascript">
    
  </script>
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
</body>

</html>
