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
             <h3>Tambah Rekam Medis Biaya</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/medis/proses_tambah.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Pemeriksaan</label>
                  <div class="col-lg-10">
                    <input type="text" id="kode_pemeriksaan" class="form-control" name="kode_pemeriksaan" value="<?php echo autonumber('tb_pemeriksaan','kode_pemeriksaan',7,'PRS'); ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Kode Pasien</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="kode_pas" class="form-control" name="kode_pas" value="<?php echo autonumber('tb_pasien','kode_pas',7,'PAS'); ?>" required readonly>
                    <p class="help-block"></p>
                </div>
              </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Nama</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="nama_pas" class="form-control" name="nama_pas">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Alamat</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" class="form-control" name="alamat_pas">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Rincian</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" class="form-control" name="rincian_pemeriksaan">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Status</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" class="form-control" name="status_pemeriksaan">
                    <p class="help-block"></p>
                  </div>
                </div>
                  
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="glyphicon glyphicon-plus" value></i> Tambahkan</button>
  						<a href="index.php?page=rekam_medis" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
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