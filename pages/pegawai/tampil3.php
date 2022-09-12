
 <!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title></title>
 <!-- Favicons -->
  <link href="../Dokter/img/favicon.png" rel="icon">
  <link href="../Dokter/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../Dokter/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../Dokter/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="../Dokter/lib/advanced-datatable/css/demo_page.css" rel="stylesheet" />
  <link href="../Dokter/lib/advanced-datatable/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="../Admin/lib/advanced-datatable/css/DT_bootstrap.css" />
  <!-- Custom styles for this template -->
  <link href="../Dokter/css/style.css" rel="stylesheet">
  <link href="../Dokter/css/style-responsive.css" rel="stylesheet">
</head>
<body>
   <?php 
    @$page = $_GET['aksi'];
     ?>
 
        <div class="row mt">
          <div class="col-lg-12">
            <div class="">
              <div class="panel-body">
                <ol class="breadcrumb">
                  <li>
                     <a href="index.php">| Beranda | </a>
                  </li>
                 <li class="active">
                     <a href="?page=pegawai"> | Pegawai |</a>
                 </li>
                </ol>
               </div>
              </div>
            </div>
          </div>

  <div class="row mt">
    <div class="form-panel">
      <h4>Data Pegawai</h4>
       <div  class="navbar-form navbar-right" role="search">
           <div class="form-group">
               <input type="text" class="form-control" placeholder="Search">
           </div>
           <button type="submit" class="btn btn-theme"><i class="fa fa-search"></i></button>
       </div>
  <div>
    Show Entries <label>
    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
      <option value="10">10</option>
      <option value="25">25</option>
      <option value="50">50</option>
      <option value="100">100</option>
    </select> 
  </label>
  </div>
   <form action="" method="post" name="input">
    <table  border="0" cellpadding="0" cellspacing="0" class="table table-bordered dataTable">
      
    <tr>
      <th>NO</th>
      <th>NIP</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>No Telp</th>
      <th>JK</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
     <?php 
  include ("koneksi.php");
  $TAMPIL = "SELECT tb_pegawai. *, tb_login. * FROM tb_pegawai INNER JOIN tb_login on tb_login.nip = tb_pegawai.nip ORDER BY tb_pegawai.nip ASC";
  $HASIL = mysqli_query($koneksi,$TAMPIL);
  $NO = 1;
  while ($row=mysqli_fetch_array($HASIL)) {
    $NO;
$Nip         = $row['nip'];
$Nama        = $row['nama_peg'];
$Alamat      = $row['alamat_peg'];
$Telp        = $row['telp_peg'];
$jk          = $row['jenis_kelamin_peg'];
$Username    = $row['username'];
$Password    = $row['password'];
$Status      = $row['type_user'];

   ?>
    <tr>
      <td><?php echo $NO; ?></td>
      <td><?php echo $Nip; ?></td>
      <td><?php echo $Nama; ?></td>
      <td><?php echo $Alamat ?></td>
      <td><?php echo $Telp; ?></td>
      <td><?php echo $jk; ?></td>
      <td><?php echo $Status; ?></td>
      <td>
         <div class="btn-group">
                <button type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                  </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="index.php?page=pegawai&aksi=edit&id=<?php echo $Nip; ?>">Edit</a></li>
                  <li class="divider"></li>
                  <li><a href="../pages/pegawai/hapus.php?nip=<?php echo $row['nip'];?>">Delete</a></li>
                
                </ul>
          </div>
      </td>
    </tr>
 

<?php 
$NO++;
}
 ?>
   
    </table>
   </form>

 <div>
  <a href="index.php?page=pegawai&aksi=tambah" class="btn btn-round btn-success" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Pegawai</a>
  <a href="../laporan/laporan.php" class="btn btn-round btn-success" data-toogle="tooltip" data-placement="bottom" title="Tamba Data" target="_blank"><i class="glyphicon glyphicon-book"></i> Laporan</a>
 </div>
  
<div class="row mt">
  <div class="col-lg-12">
    <div class="row-fluid">
     <div class="span6">
      <div class="col-lg-10">
        <div class="dataTables_info" id="hidden-table-info_info">Showing 1 to 10 of 57 entries</div> 
      </div>
      </div>
       <div class="span6"><div class="dataTables_paginate paging_bootstrap pagination">
        <div>
          <ul>
            <li class="prev disabled">
              <a href="#">← Previous</a>
            </li>
            <li class="active">
              <a href="#">1</a>
            </li>
            <li>
              <a href="#">2</a>
            </li>
            <li>
              <a href="#">3</a>
            </li>
            <li>
              <a href="#">4</a>
            </li>
            <li>
              <a href="#">5</a>
             </li>
              <li class="next">
                <a href="#">Next → </a>
              </li>
          </ul>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
</div>
  

<script src="../Dokter/lib/jquery/jquery.min.js"></script>
  <script type="text/javascript" language="javascript" src="../Dokter/lib/advanced-datatable/js/jquery.js"></script>
  <script src="../Dokter/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../Dokter/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../Dokter/lib/jquery.scrollTo.min.js"></script>
  <script src="../Dokter/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script type="text/javascript" language="javascript" src="../Dokter/lib/advanced-datatable/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../Dokter/lib/advanced-datatable/js/DT_bootstrap.js"></script>
  <!--common script for all pages-->
  <script src="../Dokter/lib/common-scripts.js"></script>
  <script type="text/javascript">
    /* Formating function for row details */
    function fnFormatDetails(oTable, nTr) {
      var aData = oTable.fnGetData(nTr);
      var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
      sOut += '<tr><td>Rendering engine:</td><td>' + aData[1] + ' ' + aData[4] + '</td></tr>';
      sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
      sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
      sOut += '</table>';

      return sOut;
    }

    $(document).ready(function() {
      /*
       * Insert a 'details' column to the table
       */
      var nCloneTh = document.createElement('th');
      var nCloneTd = document.createElement('td');
      nCloneTd.innerHTML = '<img src="lib/advanced-datatable/images/details_open.png">';
      nCloneTd.className = "center";

      $('#hidden-table-info thead tr').each(function() {
        this.insertBefore(nCloneTh, this.childNodes[0]);
      });

      $('#hidden-table-info tbody tr').each(function() {
        this.insertBefore(nCloneTd.cloneNode(true), this.childNodes[0]);
      });

      /*
       * Initialse DataTables, with no sorting on the 'details' column
       */
      var oTable = $('#hidden-table-info').dataTable({
        "aoColumnDefs": [{
          "bSortable": false,
          "aTargets": [0]
        }],
        "aaSorting": [
          [1, 'asc']
        ]
      });

      /* Add event listener for opening and closing details
       * Note that the indicator for showing which row is open is not controlled by DataTables,
       * rather it is done here
       */
      $('#hidden-table-info tbody td img').live('click', function() {
        var nTr = $(this).parents('tr')[0];
        if (oTable.fnIsOpen(nTr)) {
          /* This row is already open - close it */
          this.src = "lib/advanced-datatable/media/images/details_open.png";
          oTable.fnClose(nTr);
        } else {
          /* Open this row */
          this.src = "lib/advanced-datatable/images/details_close.png";
          oTable.fnOpen(nTr, fnFormatDetails(oTable, nTr), 'details');
        }
      });
    });
  </script>
</body>
</html>