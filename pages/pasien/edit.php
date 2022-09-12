<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Baru</title>
</head>
<body> 
  <?php 

  include ("koneksi.php");
  $ID     =$_GET['id'];
  $TAMPIL = "SELECT * from tb_pasien WHERE tb_pasien.kode_pas='$ID'";
  $HASIL = mysqli_query($koneksi,$TAMPIL);
  $NO = 1;
  while ($row=mysqli_fetch_array($HASIL)) {
    $NO;
   $Pasien             = $row['kode_pas'];
   $Nama_Pas           = $row['nama_pas'];   
   $Alamat             = $row['alamat_pas']; 
   $Telp_Pas           = $row['telp_pas']; 
   $Tgl_Pas            = $row['tanggal_lahir_pas']; 
   $Jenkel             = $row['jenis_kelamin_pas'];
   $Tgl_Reg            = $row['tanggal_reg']; 
                                                                                
  
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
             <h3>Edit Data Pasien</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/pasien/proses_edit.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Pasien</label>
                  <div class="col-lg-10">
                    <input type="text" id="kode_resep" class="form-control" name="kode_pas" value="<?php echo $Pasien; ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Nama Pasien</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="nama_pas" class="form-control" name="nama_pas" value="<?php echo $Nama_Pas; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Alamat Pasien</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="alamat_pas" class="form-control" name="alamat_pas" value="<?php echo $Alamat; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Telp Pasien</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="telp_pas" class="form-control" name="telp_pas" value="<?php echo $Telp_Pas; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Tanggal Lahir Pasien</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="date" class="form-control" name="tanggal_lahir_pas" value="<?php echo $Tgl_Pas; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Jenis Kelamin Pasien</label>
                  <div class="col-lg-10">
                    <input type="radio" name="jenis_kelamin_pas" id="Pria" value="Pria" <?php if($Jenkel=="Pria") {echo 'Checked';} ?> required="required">Pria
                    <input type="radio" name="jenis_kelamin_pas" id="Wanita" value="Wanita" <?php if($Jenkel=="Wanita") {echo 'Checked';} ?> required="required">Wanita
                   
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Tanggal Reg</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="date2" class="form-control" name="tanggal_reg" value="<?php echo $Tgl_Reg; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="glyphicon glyphicon-pencil" value></i> Edit</button>
              <a href="index.php?page=pasien" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
            
</body>
</html>