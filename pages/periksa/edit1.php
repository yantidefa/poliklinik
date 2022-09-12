<?php 
  $ID = $_GET['id'];
  $EDIT ="SELECT * FROM tb_pemeriksaan WHERE tb_pemeriksaan.kode_pemeriksaan='$ID' ";
  $HASILEDIT=mysqli_query($koneksi,$EDIT);
  while ($ROW=mysqli_fetch_array($HASILEDIT)) {
   
     $KODE      = $ROW['kode_pemeriksaan'];
     $TGL       = $ROW['tanggal_pemeriksaan'];
     $ALAMAT    = $ROW['kode_dok'];
     $TELP      = $ROW['no_pendaftaran'];
     $KELUHAN   = $ROW['keluhan'];
     $DIAGNOSA  = $ROW['diagnosa'];
     $PERAWATAN = $ROW['perawatan'];
     $TINDAKAN  = $ROW['tindakan'];
     $BB        = $ROW['berat_badan'];
     $TD        = $ROW['tensi_diastolik'];
     $TS        = $ROW['tensi_sistolik'];

   }
  ?>

  <form  action="../pages/periksa/proses_edit.php" role="form" method="POST" >

             <div class="box-body">
 

 <div class="panel-body">
  <div class="alert alert-primary">
<li>
  <a href="index.php">  Beranda   </a>
</li>


<li class="active">
   <a>  Informasi Pasien  </a>
</div>
</div>

</li>


 <div class="box box-primary">

            <div class="box-header with-border">
              <h5>Edit Pasien</h5>
              <hr>
              </div>
            </div>
             
              <?php
if (@$_POST['edit']){ 
  include "proses_edit.php";
}
  ?>
            
                <div class="form-group">
                  <label>Kode Pemeriksaan </label>
                  <input type="text" class="form-control" id="kode_pemeriksaan" name="kode_pemeriksaan" value="<?php echo $KODE; ?>" placeholder="" required>
                </div>

               <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Pemeriksaan</label>
                  <input type="text" class="form-control" name="tanggal_pemeriksaan" value="<?php echo $TGL; ?>" placeholder="" required>
                </div>

            
                <div class="form-group">
                <label>Nama Dokter</label>
                <select class="form-control select2" style="width: 100%;" name="nama_dok">
                  <option selected="selected">-- Nama Dokter --</option>
                 <?php
                  $q_pendaftaran = mysqli_query($koneksi,"SELECT * FROM tb_dokter") or die(mysqli_error());
                  while ($pendaftaran = mysqli_fetch_array($q_pendaftaran)) {
                    echo '<option value="'.$pendaftaran['kode_dok']
                    .'">'.$pendaftaran['nama_dok'].'-
                     '.$pendaftaran['alamat_dok'].'</otion>';
                  }
                  ?>
                 </select>
              </div>

                 <div class="form-group">
                <label>No Pendaftaran</label>
                <select class="form-control select2" style="width: 100%;" name="no_pendaftaran">
                  <option selected="selected">-- No Pendaftaran --</option>
                  <?php
                  $q_pendaftaran = mysqli_query($koneksi,"SELECT tb_jadwal_praktik.*,tb_pasien.*,tb_pegawai.*,tb_pendaftaran.*
                  FROM tb_pendaftaran
                  INNER JOIN tb_jadwal_praktik on tb_jadwal_praktik.kode_jadwal = 
                  tb_pendaftaran.kode_jadwal
                  INNER JOIN tb_pasien on tb_pasien.kode_pas = tb_pendaftaran.kode_pas
                  INNER JOIN tb_pegawai on tb_pegawai.nip = tb_pendaftaran.nip") or die(mysqli_error());
                  while ($data_pendaftaran = mysqli_fetch_array($q_pendaftaran)) {
                    echo '<option value="'.$data_pendaftaran['no_pendaftaran']
                    .'">'.$data_pendaftaran['no_pendaftaran'].' - Nama Pasien :
                     '.$data_pendaftaran['nama_pas'].'</otion>';
                  }
                  ?>
                </select>
              </div>


            
                <div class="form-group">
                  <label for="exampleInputPassword1">Keluhan</label>
                  <input type="text" class="form-control" name="keluhan" value="<?php echo $KELUHAN; ?>" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Diagnosa</label>
                  <input type="text" class="form-control" name="diagnosa" value="<?php echo $DIAGNOSA; ?>" placeholder="" required>
                </div>

            
                <div class="form-group">
                  <label for="exampleInputPassword1">Perawatan</label>
                  <input type="text" class="form-control" name="perawatan" value="<?php echo $PERAWATAN; ?>" placeholder="" required>
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Tindakan</label>
                  <input type="text" class="form-control" name="tindakan" value="<?php echo $TINDAKAN; ?>" placeholder="" required>
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Berat Badan</label>
                  <input type="text" class="form-control" name="berat_badan" value="<?php echo $BB; ?>" placeholder="" required>
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Tensi Diastolik</label>
                  <input type="text" class="form-control" name="tensi_diastolik" value="<?php echo $TD; ?>" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Tensi Sistolik</label>
                  <input type="text" class="form-control" name="tensi_sistolik" value="<?php echo $TS; ?>" placeholder="" required>
                </div>

              
              <div class="box-footer">
                <button type="submit" name="edit" class="btn btn-primary" value="edit">Edit</button>
              </div>


</form>
</div>
</div>
