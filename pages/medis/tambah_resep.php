<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Baru</title>
</head>
<body> 
  <?php 
  
  @$page = $_GET['tambah'];
  @$PAGE = $_GET['aksi'];

   ?>

   
<?php
function autonumber($tabel, $kolom, $lebar=0, $awalan){
  include 'koneksi.php';

  //proses auto number
  $auto = mysqli_query($koneksi, "select $kolom from $tabel order by $kolom desc limit 1") or die(mysqli_error());
  $jumlah_record = mysqli_num_rows($auto);
  if($jumlah_record == 0)
    $nomor = 1;

  else {
    $row = mysqli_fetch_array($auto);
    $nomor = intval(substr($row[0], strlen($awalan)))+1;
  }
  if ($lebar>0) 
  $angka = $awalan.str_pad ($nomor, $lebar, "0", STR_PAD_LEFT);
    else
    $angka=$awalan.$nomor;
    return $angka;
  }
//echo autonumber("tb_pegawai","nip",7,"PGW");
?>
        <!-- BASIC FORM VALIDATION -->
          
          <div class="">
            <div class="form-panel">
             <h3>Tambah Rekam Medis</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/medis/proses_tambah_biaya.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">ID Rekam Medis</label>
                  <div class="col-lg-10">
                   <?php 
                    $auto=mysqli_query($koneksi, "SELECT * FROM tb_rekam_medis_biaya order by id_rekam_medis_biaya desc limit 1");
                    $no = mysqli_fetch_array($auto);
                    $angka=$no['id_rekam_medis_biaya']+1;
                     ?>
                    <input type="text" required id="id_rekam_medis_biaya" class="form-control" name="id_rekam_medis_biaya" value="<?php echo $angka; ?>" readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Kode Pemeriksaan</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="kode_pemeriksaan" class="form-control" name="kode_pemeriksaan" value="<?php echo autonumber('tb_rekam_medis_biaya','kode_pemeriksaan',7,'PRS'); ?>" required readonly>
                    <p class="help-block"></p>
                </div>
              </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Kode Jenis Biaya</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="kode_jenis_biaya" class="form-control" name="kode_jenis_biaya" value="<?php echo autonumber('tb_rekam_medis_biaya','kode_jenis_biaya',6,'BIYA'); ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                
                  
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="glyphicon glyphicon-plus" value></i> Tambahkan</button>
              <a href="index.php?page=obat" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->   
</body>
</html>