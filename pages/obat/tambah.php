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
             <h3>Tambah Obat</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/obat/proses_tambah.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Obat</label>
                  <div class="col-lg-10">
                    <input type="text" id="kode_obat" class="form-control" name="kode_obat" value="<?php echo autonumber('tb_obat','kode_obat',6,'OBT'); ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Nama</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="nama_obat" class="form-control" name="nama_obat">
                    <p class="help-block"></p>
                </div>
              </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Merk</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="merk" class="form-control" name="merk">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Satuan</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" class="form-control" name="satuan">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Harga Jual</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" class="form-control" name="harga_jual">
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