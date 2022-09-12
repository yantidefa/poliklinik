<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Baru</title>
</head>
<body> 
  <?php 

  include ("../inc/koneksi.php");
  $ID     =$_GET['id'];
  $TAMPIL = "SELECT * from tb_resep WHERE tb_resep.kode_resep='$ID'";
  $HASIL = mysqli_query($koneksi,$TAMPIL);
  $NO = 1;
  while ($row=mysqli_fetch_array($HASIL)) {
    $NO;
   $Resep         = $row['kode_resep'];
   $Dosis         = $row['dosis'];   
   $Jumlah        = $row['jumlah'];  
                                                                                
  
  }
  ?>     
     <!-- BASIC FORM VALIDATION -->
        <div class="">
          <div class="col-lg-12">
            <div class="">
              <div class="panel-body">
                <ol class="breadcrumb">
                  <li>
                     <a href="index.php">| Beranda | </a>
                  </li>
                 <li class="active">
                     <a href="?page=resep"> | Jadwal |</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page">| Edit Resep |</li>
                </ol>
               </div>
              </div>
            </div>
          </div>
        
             <?php 
             if (@$_POST['edit']) {
               include"proses_edit.php";
             }
              ?>
            <div class="form-panel">
             <h3>Edit Resep</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/resep/proses_edit.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Resep</label>
                  <div class="col-lg-10">
                    <input type="text" id="kode_resep" class="form-control" name="kode_resep" value="<?php echo $Resep; ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Dosis</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="dosis" class="form-control" name="dosis" value="<?php echo $Dosis; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Jumlah</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="jumlah" class="form-control" name="jumlah" value="<?php echo $Jumlah; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="glyphicon glyphicon-pencil" value></i> Edit</button>
              <a href="index.php?page=resep" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
            
</body>
</html>