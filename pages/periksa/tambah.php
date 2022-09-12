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
             <h3>Tambah Pasien</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/periksa/proses_tambah.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Kode Pemeriksaan</label>
                  <div class="col-lg-10">
                    <input type="text" id="kode_pemeriksaan" class="form-control" name="kode_pemeriksaan" value="<?php echo autonumber('tb_pemeriksaan','kode_pemeriksaan',7,'PRS'); ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Tanggal Pemeriksaan</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="date" class="form-control" name="tanggal_pemeriksaan" value="<?php echo date ('y-m-d'); ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                 <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Nama Dokter</label>
                  <div class="col-lg-10">
                      <select class="form-control show-tick" name="nama_dok" style="width: 30%">
                  <option>------ Pilih Dokter ------</option>
                  <?php 
                  $sql_pas = mysqli_query($koneksi, "SELECT * FROM tb_dokter") or die(mysqli_error($koneksi));
                  while ($data_pas = mysqli_fetch_array($sql_pas)) {
                    echo '<option value="'.$data_pas['kode_dok'].'">'.$data_pas['nama_dok'].' - '.$data_pas['alamat_dok'].'</option>';
                  }
                   ?>
                 </select>
                    
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">No Pendaftaran</label>
                  <div class="col-lg-10">
                    <select class="form-control show-tick" name="no_pendaftaran" style="width: 30%">
                  <option>------ Pilih No Pendaftaran ------</option>
                  <?php 
                  $sql_pen = mysqli_query($koneksi, "SELECT tb_jadwal_praktik.*, tb_pasien.*, tb_pegawai.*, tb_pendaftaran. * FROM tb_pendaftaran
                    INNER JOIN tb_jadwal_praktik on tb_jadwal_praktik.kode_jadwal = tb_pendaftaran.kode_jadwal
                    INNER JOIN tb_pasien on tb_pasien.kode_pas = tb_pendaftaran.kode_pas
                    INNER JOIN tb_pegawai on tb_pegawai.nip = tb_pendaftaran.nip") or die(mysqli_error($koneksi));
                  while ($data_pen = mysqli_fetch_array($sql_pen)) {
                    echo '<option value="'.$data_pen['no_pendaftaran'].'">'.$data_pen['no_pendaftaran'].' - Nama Pasien : '.$data_pen['nama_pas'].'</option>';
                  }
                   ?>
                 </select>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Diagnosa</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="diagnosa" class="form-control" name="diagnosa">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Keluhan</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="keluhan" class="form-control" name="keluhan">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Perawatan</label>
                  <div class="col-lg-10">
                    <textarea id="perawatan" class="form-control" name="perawatan"></textarea>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Tindakan</label>
                  <div class="col-lg-10">
                    <textarea id="tindakan" class="form-control" name="tindakan"></textarea>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Berat Badan</label>
                  <div class="col-lg-10">
                    <input type="number" placeholder="" id="berat_badan" class="form-control" name="berat_badan">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Tekanan Diastolik</label>
                  <div class="col-lg-10">
                    <input type="number" placeholder="" id="tensi_diastolik" class="form-control" name="tensi_diastolik">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Tensi Sistolik</label>
                  <div class="col-lg-10">
                    <input type="number" placeholder="" id="tensi_sistolik" class="form-control" name="tensi_sistolik">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Rincian</label>
                  <div class="col-lg-10">
                  <input type="radio" name="rincian_pemeriksaan" value="0" checked="checked">Belum Konfirmasi
                  <input type="radio" name="rincian_pemeriksaan" value="1">Sudah Konfirmasi
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Status</label>
                  <div class="col-lg-10">
                    <input type="radio" name="status_pemeriksaan" value="0" checked="checked">Belum Transaksi
                    <input type="radio" name="status_pemeriksaan" value="1">Transaksi Berhasil
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="glyphicon glyphicon-plus" value></i> Tambahkan</button>
  						      <a href="index.php?page=periksa" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
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