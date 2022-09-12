<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Baru</title>
</head>
<body> 
  <?php 

  include ("koneksi.php");
  $ID     =$_GET['id'];
  $TAMPIL = "SELECT * from tb_poliklinik WHERE tb_poliklinik.kode_poli='$ID'";
  $HASIL = mysqli_query($koneksi,$TAMPIL);
  $NO = 1;
  while ($row=mysqli_fetch_array($HASIL)) {
    $NO;
    $Poli         = $row['kode_poli'];
    $Nama         = $row['nama_poli']; 
                                                                                
  
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
                     <a href="?page=poli"> | Jadwal |</a>
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
             <h3>Edit Poliklinik</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/poli/proses_edit.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Poli</label>
                  <div class="col-lg-10">
                    <input type="text" id="kode_poli" class="form-control" name="kode_poli" value="<?php echo $Poli; ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Nama Poli</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="nama_poli" class="form-control" name="nama_poli" value="<?php echo $Nama; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="fa fa-pencil" value></i> Edit</button>
              <a href="index.php?page=poli" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
            
</body>
</html>