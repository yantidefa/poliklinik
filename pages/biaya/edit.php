<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Baru</title>
</head>
<body> 
  <?php 

  include ("../inc/koneksi.php");
  $ID     =$_GET['id'];
  $TAMPIL = "SELECT * from tb_jenis_biaya WHERE tb_jenis_biaya.kode_jenis_biaya='$ID'";
  $HASIL = mysqli_query($koneksi,$TAMPIL);
  $NO = 1;
  while ($row=mysqli_fetch_array($HASIL)) {
    $NO;
    $Biaya         = $row['kode_jenis_biaya'];
    $Nama         = $row['nama_biaya']; 
    $Tarif         = $row['tarif'];
                                                                                
  
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
             <h3>Edit Jenis Biaya</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/biaya/proses_edit.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Jenis Biaya</label>
                  <div class="col-lg-10">
                    <input type="text" id="kode_jenis_biaya" class="form-control" name="kode_jenis_biaya" value="<?php echo $Biaya; ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Nama Biaya</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="nama_biaya" class="form-control" name="nama_biaya" value="<?php echo $Nama; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Tarif</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" class="form-control" name="tarif" value="<?php echo $Tarif; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
               
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="fa fa-pencil" value></i> Edit</button>
              <a href="index.php?page=biaya" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
            
</body>
</html>