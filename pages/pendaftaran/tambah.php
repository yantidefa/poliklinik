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
             <h3>Tambah Pendaftar</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/pendaftaran/proses_tambah.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Tanggal</label>
                  <div class="col-lg-10">
                    <input type="text" id="date" class="form-control" name="tanggal_reg" value="<?php echo date ('y-m-d'); ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">No Pendaftaran</label>
                  <div class="col-lg-10">
                    <?php 
                    $auto=mysqli_query($koneksi, "SELECT * FROM tb_pendaftaran order by no_urut desc limit 1");
                    $no = mysqli_fetch_array($auto);
                    $angka1=$no['no_pendaftaran']+1;
                     ?>
                    <input type="text" required id="no_pendaftaran" class="form-control" name="no_pendaftaran" value="<?php echo $angka1; ?>" readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">No Urut</label>
                  <div class="col-lg-10">
                    <?php 
                    $auto=mysqli_query($koneksi, "SELECT * FROM tb_pendaftaran order by no_urut desc limit 1");
                    $no = mysqli_fetch_array($auto);
                    $angka=$no['no_urut']+1;
                     ?>
                    <input type="text" required id="no_urut" class="form-control" name="no_urut" value="<?php echo $angka; ?>" readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                 <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Nip</label>
                  <div class="col-lg-10">
                    <?php 
                    $query_user= mysqli_query($koneksi,"SELECT tb_login.*, tb_pegawai.* FROM tb_pegawai
                      INNER JOIN tb_login ON tb_login.nip=tb_pegawai.nip WHERE username='".$_SESSION['username']."'");
                    $user = @mysqli_fetch_array($query_user);
                     ?>
                    <input type="text" placeholder="" id="nama_peg" class="form-control" name="nip" value="<?php echo $user['nip']; ?>" readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Nama Pasien</label>
                  <div class="col-lg-10">
                    <select class="form-control show-tick" name="nama_pas" style="width: 30%">
                  <option>------ Pilih Pasien ------</option>
                  <?php 
                  $sql_pas = mysqli_query($koneksi, "SELECT * FROM tb_pasien") or die(mysqli_error($koneksi));
                  while ($data_pas = mysqli_fetch_array($sql_pas)) {
                    echo '<option value="'.$data_pas['kode_pas'].'">'.$data_pas['nama_pas'].' - '.$data_pas['alamat_pas'].'</option>';
                  }
                   ?>
                 </select>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Jadwal</label>
                  <div class="col-lg-10">
                    <select class="form-control show-tick" name="kode_jadwal"  style="width: 30%">
                    <option>------ Jadwal ------</option>
                       <?php 
                       $TAMPIL = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_praktik ORDER BY tb_jadwal_praktik.kode_jadwal ASC");
                                        $NO=1;
                                        while ($ROW=@mysqli_fetch_array($TAMPIL)) {
                                           $NO;
                                            $KODE             =$ROW['kode_jadwal'];
                                            $HARI             =$ROW['hari'];
                                            $JAMMULAI         =$ROW['jam_mulai'];
                                            $JAMMSELESAI      =$ROW['jam_selesai'];
                   
                   ?>
                   <option value="<?php echo $KODE ?>"><?php echo $HARI; echo ","; echo $JAMMULAI; echo "-"; echo $JAMMSELESAI; ?></option>
                 <?php } ?>
                 </select>
                    <p class="help-block"></p>
                  </div>
                </div>
              
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="glyphicon glyphicon-plus" value></i> Tambahkan</button>
  						<a href="index.php?page=pendaftar" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
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