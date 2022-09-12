<?php 
@session_start();
include "../inc/koneksi.php";
if (@$_SESSION['username']) 
{
  if (@!$_SESSION['type_user'] =="Admin")  
    {
      header("location:Admin/index.php");
    }
  else{
    if (@$_SESSION['type_user'] =="Kasir") 
      {
        header("location:Kasir/index.php");
    }
  elseif (@$_SESSION['type_user'] =="Dokter") 
    {
      header("location:Dokter/index.php");
    }
  elseif (@$_SESSION['type_user'] =="Pendaftar") 
    {
      header("location:Pendaftar/index.php");
    }
  }
}
else{
  header("location:../inc/login.php");
}

 ?>
 <?php 
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
  <title>Admin-Poliklinik- <?php echo $DATA_INFO ['nama_poliklinik']; ?></title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <script src="lib/chart-master/Chart.js"></script>
  <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>POLI<span>KLINIK</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
         
          <!-- settings end -->
               </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">

        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/PicsArt_07-22-05.05.39.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Putri Defa</h5>
          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>

          </li>
          <?php @$page = $_GET['page']; ?>
         
              <li <?php if ($page == "pegawai") { ?> class = "active" <?php }  ?>>
                <a href="?page=pegawai">Data Pegawai</a></li>
              <li <?php if ($page == "dokter") { ?> class = "active" <?php }  ?>>
                <a href="?page=dokter">Data Dokter</a></li>
              <li <?php if ($page == "poli") { ?> class = "active" <?php }  ?>>
                <a href="?page=poli">Data Poliklinik</a></li>
              <li <?php if ($page == "obat") { ?> class = "active" <?php }  ?>>
                <a href="?page=obat">Data Obat</a></li>
              <li <?php if ($page == "biaya") { ?> class = "active" <?php }  ?>>
                <a href="?page=biaya">Jenis Biaya</a></li>
              <li <?php if ($page == "jadwal") { ?> class = "active" <?php }  ?>>
                <a href="?page=jadwal">Jadwal</a></li>
              <li <?php if ($page == "info") { ?> class = "active" <?php }  ?>>
                <a href="?page=info">Info Poliklinik</a></li>
              <!-- <li <?php if ($page == "database") { ?> class = "active" <?php }  ?>>
                <a href="?page=database">Database</a></li> -->
          </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <div class="wrapper">
      <div id="main-content">
        <div class="row">
          <div class="col-lg-12 main-chart">
              <?php  
              include "../inc/informasi.php";
              include "../inc/menu.php";
             
              ?>
          </div>
        </div>
      </div>
    </div>
       

      </section>
    </section>
    <!--main content end-->
    </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
       <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
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
