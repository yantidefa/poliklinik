<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Baru</title>
</head>
<body> 
  <?php 
  include ("koneksi.php");
  $ID     =$_GET['id'];
  $TAMPIL = "SELECT * from tb_jadwal_praktik WHERE tb_jadwal_praktik.kode_jadwal='$ID'" or die ("GAGAL".mysqli_error());
  $HASIL = mysqli_query($koneksi,$TAMPIL);
  while ($row=mysqli_fetch_array($HASIL)) {
    $NO;
    $Jadwal         = $row['kode_jadwal'];
    $Hari           = $row['hari'];
    $Mulai          = $row['jam_mulai'];
    $Selesai        = $row['jam_selesai'];
                                                                                
  
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
                     <a href="?page=jadwal"> | Jadwal |</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page">| Edit Jadwal |</li>
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
             <h3>Edit Jadwal</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/jadwal/proses_edit.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Jadwal</label>
                  <div class="col-lg-10">
                    <input type="text" id="kode_jadwal" class="form-control" name="kode_jadwal" value="<?php echo $Jadwal; ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Hari</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="hari" class="form-control" name="hari" value="<?php echo $Hari; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Jam Mulai</label>
                  <div class="col-lg-10">
                    <input type="time" placeholder="" class="form-control" name="jam_mulai" value="<?php echo $Mulai; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Jam Selesai</label>
                  <div class="col-lg-10">
                    <input type="time" placeholder="" class="form-control" name="jam_selesai" value="<?php echo $Selesai; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="edit"><i class="fa fa-pencil" value></i> Edit</button>
              <a href="index.php?page=jadwal" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
            
</body>
</html>