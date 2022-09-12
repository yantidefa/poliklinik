<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Baru</title>
</head>
<body> 
  <?php 
  include ("koneksi.php");
  $ID     =$_GET['id'];
  $TAMPIL = "SELECT * from tb_obat WHERE tb_obat.kode_obat='$ID'" or die ("GAGAL".mysqli_error());
  $HASIL = mysqli_query($koneksi,$TAMPIL);
  while ($row=mysqli_fetch_array($HASIL)) {
    $NO;
   $Obat         = $row['kode_obat'];
   $Nama         = $row['nama_obat']; 
   $Merk         = $row['merk'];
   $Satuan       = $row['satuan'];   
   $Harga        = $row['harga_jual'];                                      
                                   
  
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
                     <a href="?page=obat"> | Obat |</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page">| Edit Obat |</li>
                </ol>
               </div>
              </div>
            </div>
          </div>
        
             <?php 
             if (@$_POST['edit']) {
               include"../pages/obat/proses_edit.php";
             }
              ?>
            <div class="form-panel">
             <h3>Edit Jadwal</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" action="../pages/obat/proses_edit.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Obat</label>
                  <div class="col-lg-10">
                    <input type="text" id="kode_obat" class="form-control" name="kode_obat" value="<?php echo $Obat; ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Nama Obat</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="nama_obat" class="form-control" name="nama_obat" value="<?php echo $Nama; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Merk</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" class="form-control" name="merk" value="<?php echo $Merk; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Satuan</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" class="form-control" name="satuan" value="<?php echo $Satuan; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Harga Jual</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" class="form-control" name="harga_jual" value="<?php echo $Harga; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" name="edit" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="glyphicon glyphicon-plus" value></i> Tambahkan</button>
              <a href="index.php?page=obat" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
            
</body>
</html>