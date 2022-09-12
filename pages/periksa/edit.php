<?php 

  $ID     =$_GET['id'];
  $EDIT = "SELECT * FROM tb_pemeriksaan WHERE tb_pemeriksaan.kode_pemeriksaan='$ID'" or die("Gagal Melakukan Query!!!".mysqli_error());
  $HASIL = mysqli_query($koneksi,$EDIT);
  while ($ROW=mysqli_fetch_array($HASIL)) {
$satu   = $ROW['kode_pemeriksaan'];
$dua    = $ROW['tanggal_pemeriksaan'];
$tiga   = $ROW['kode_dok'];
$empat  = $ROW['no_pendaftaran'];
$lima   = $ROW['diagnosa'];
$abc    = $ROW['keluhan'];
$enam   = $ROW['perawatan'];
$tujuh    = $ROW['tindakan'];
$delapan  = $ROW['berat_badan'];
$sembilan = $ROW['tensi_diastolik'];
$sepuluh  = $ROW['tensi_sistolik'];


  }

  ?>     

 
                <ol class="breadcrumb">
                  <li>
                     <a href="index.php">| Beranda | </a>
                  </li>
                 <li class="active">
                     <a href="?page=dokter"> | Priksa |</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page">| Edit Periksa |</li>
                </ol>
               
        
             <?php 
             if (@$_POST['edit']) {
               include"proses_edit.php";
             }
              ?>
            <div class="form-panel">
             <h3>Edit Periksa</h3>
             <hr>
              <form role="form" method="POST" action="../pages/periksa/proses_edit.php" class="form-horizontal style-form">
             <div class="box-body">


                <div class="form-group has-success">
                  <label for="kode_dok" class="col-lg-2 control-label">Kode Pemeriksaan</label>
                  <div class="col-lg-10">
                  <input type="#" class="form-control" id="kode_pemeriksaan" name="kode_pemeriksaan" value="<?php echo $satu; ?>" readonly>
                </div>
                </div>


                <div class="form-group has-success">
                  <label for="nama_peg" class="col-lg-2 control-label">Tanggal Pemeriksaan</label>
                  <div class="col-lg-10">
                  <input type="text" class="form-control" id="date" name="tanggal_pemeriksaan" value="<?php echo $dua; ?>" required>
                </div>
                </div>
               
            
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Nama Dokter</label>
                  <div class="col-lg-10">
                      <select class="form-control show-tick" name="nama_dok" id="kode_dok" style="width: 30%">
                  <option value="<?php echo $tiga; ?>" >------ Pilih Dokter ------</option>
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
                <div class="form-group has-success">
                 <label class="col-lg-2 control-label">No Pendaftaran</label>
                  <div class="col-lg-10">
                    <select class="form-control show-tick" name="no_pendaftaran" style="width: 30%">
                  <option value="<?php echo $empat; ?>">------ Pilih No Pendaftaran ------</option>
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
                    <input type="text" placeholder="" id="diagnosa" class="form-control" name="diagnosa" value="<?php echo $lima; ?>">
                  </div>
                </div>

                <div class="form-group has-success">
                  <label for="kode_dok" class="col-lg-2 control-label">Keluhan</label>
                  <div class="col-lg-10">
                  <input type="text" class="form-control" id="keluhan" name="keluhan" value="<?php echo $abc; ?>">
                </div>
                </div>

                <div class="form-group has-success">
                  <label for="kode_dok" class="col-lg-2 control-label">Perawatan</label>
                  <div class="col-lg-10">
                  <textarea type="text" class="form-control" id="perawatan" name="perawatan"><?php echo $enam; ?></textarea> 
                </div>
                </div>

                 <div class="form-group has-success">
                  <label for="kode_dok" class="col-lg-2 control-label">Tindakan</label>
                  <div class="col-lg-10">
                  <textarea type="text" class="form-control" id="tindakan" name="tindakan"><?php echo $tujuh; ?></textarea> 
                </div>
                </div>
                
                <div class="form-group has-success">
                  <label for="kode_dok" class="col-lg-2 control-label">Berat Badan</label>
                  <div class="col-lg-10">
                  <input type="number" class="form-control" id="berat_badan" name="berat_badan" value="<?php echo $delapan; ?>">
                </div>
                </div>

                <div class="form-group has-success">
                  <label for="kode_dok" class="col-lg-2 control-label">Tensi Diastolik</label>
                  <div class="col-lg-10">
                  <input type="number" class="form-control" id="tensi_diastolik" name="tensi_diastolik" value="<?php echo $sembilan; ?>">
                </div>
                </div>

                <div class="form-group has-success">
                  <label for="kode_dok" class="col-lg-2 control-label">Tensi Sistolik</label>
                  <div class="col-lg-10">
                  <input type="number" class="form-control" id="tensi_sistolik" name="tensi_sistolik" value="<?php echo $sepuluh; ?>">
                </div>
                </div>
              
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                 <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Edit" name="edit"><i class="fa fa-pencil" value></i> Edit</button>
                
                 <a href="index.php?page=dokter" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
              </div>

  

            </form>
         
            </div>
            <!-- /form-panel -->
