<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Baru</title>
</head>
<body> 
  <?php 

  include ("koneksi.php");
  $ID     =$_GET['id'];
  $TAMPIL = "SELECT * from tb_pendaftaran WHERE tb_pendaftaran.no_pendaftaran='$ID'" or die("Gagal melakukan query!!!".mysqli_error());
  $HASIL = mysqli_query($koneksi,$TAMPIL);

  while ($row=mysqli_fetch_array($HASIL)) {
    $NO;
   $Tanggal_Daftar  = $row['tanggal_reg'];
   $No              = $row['no_urut'];
   $NIP             = $row['nip'];
   $Kode_Pas        = $row['kode_pas']; 
   $Kode_Jadwal     = $row['kode_jadwal'];
                                                                                
  
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
                     <a href="?page=pendaftar"> | Pendaftar |</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page">| Edit Pendaftar |</li>
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
             <h3>Edit Resep</h3>
             <hr>
              <form role="form" class="form-horizontal style-form"  method="post" name="Input" action="../pages/pendaftaran/proses_edit.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Tanggal</label>
                  <div class="col-lg-10">
                    <input type="hidden" id="input" class="form-control" name="no_pendaftaran" value="<?php echo $ID; ?>" required readonly>
                    <input type="text" id="input" class="form-control" name="tanggal_reg" value="<?php echo $Tanggal_Daftar; ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">No Urut</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="no_urut" class="form-control" name="no_urut" value="<?php echo $No; ?>" readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Nama Pegawai</label>
                  <div class="col-lg-10">
                     <?php 
                    $query_user = mysqli_query($koneksi, "SELECT tb_login.*,tb_pegawai.* FROM tb_pegawai
                      INNER JOIN tb_login ON tb_login.nip=tb_pegawai.nip WHERE username='".$_SESSION['username']."'");
                    $user = @mysqli_fetch_array($query_user);
                     ?>
                    <input type="text" placeholder="" id="nip" class="form-control" name="nip" value="<?php echo $user['nip']; ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Nama Pasien</label>
                  <div class="col-lg-10">
                    <select required class="form-control show-tick" name="nama_pas" style="width: 30%">
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
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="glyphicon glyphicon-pencil" value></i> Edit</button>
              <a href="index.php?page=pendaftaran" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
            
</body>
</html>