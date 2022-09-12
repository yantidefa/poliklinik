
<?php 
$id = $_GET['id'];
$edit=" SELECT tb_pemeriksaan.*,tb_pasien.*,tb_pendaftaran.* FROM tb_pendaftaran 
        INNER JOIN tb_pemeriksaan on tb_pemeriksaan.no_pendaftaran = tb_pendaftaran.no_pendaftaran 
        INNER JOIN tb_pasien ON tb_pasien.kode_pas = tb_pendaftaran.kode_pas
        WHERE tb_pemeriksaan.kode_pemeriksaan='$id'";
$hasil=mysqli_query($koneksi,$edit);
while ($DATA=mysqli_fetch_array($hasil)) {
$NO;
$satu     =   $DATA['kode_pemeriksaan'];
$empat    =   $DATA['no_pendaftaran'];
$lima     =   $DATA['keluhan'];
$enam     =   $DATA['diagnosa'];
$tujuh    = $DATA['nama_pas'];
}
?>
<section class="invoice">
  
    
        <!-- Baris ke 2 -->
        <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-12 col-xl-12">
               
                    
                        <table>
                            <tr> 
                                <td><h1><u><b>#<?php echo $satu; ?></b></u></h1><br></td>
                            </tr>
                            <tr>
                                <td>Nama Pasien</td>
                                <td width="10">:</td>
                                <td><?php echo $tujuh; ?></td>
                            </tr>
                            <tr>
                                <td>Keluhan</td>
                                <td>:</td>
                                <td><?php echo $lima; ?></td>
                            </tr>
                            <tr>
                                <td>Diagnosa</td>
                                <td>:</td>
                                <td><?php echo $empat; ?></td>
                            </tr>
                            <tr>
                                <td>Rincian</td>
                                <td>:</td>
                                <td>
                                    <?php 
                              if ($DATA['rincian_pemeriksaan']== 0) {
                                echo "<span class='label label-warning'>Belum Konfirmasi</span>";
                              }
                              elseif ($DATA['rincian_pemeriksaan']== 1) {
                                echo "<span class='label label-info'>Konfirmasi Berhasil</span>";
                              }
                            ?>  
                        </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td>
                                  <?php 
                              if ($DATA['status_pemeriksaan']== 0) {
                                echo "<span class='label label-danger'>Belum Transaksi</span>";
                              }
                              elseif ($DATA['status_pemeriksaan']== 1) {
                                echo "<span class='label label-success'>Transaksi Berhasil</span>";
                              }
                            ?>
                                </td>
                            </tr>
                        </table>
                    
                

            
        </div>
 </div>
</section>        
<section class="invoice">
  <div class="row">
    <div class="col-md-12">
                    <!-- Nav tabs -->
          <ul class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab"><strong>Biaya Pasien</strong></a></li>
              <li><a href="#profile" data-toggle="tab" style="margin-top:;"><strong>Obat Pasien</strong></a></li>
              <li><a href="#about" data-toggle="tab"><strong>Resep Obat</strong></a></li>
          </ul>
                        <!-- BIAYA -->
                <div class="tab-content mb30">
                    <div class="tab-pane active" id="home">

            <form  role="form" method="POST" action="../pages/rekam_medis/proses_tambah_biaya.php?page=rekam_medis&aksi=detail&id=<?php echo $satu; ?>">
                     <div class="box-body">
                        <label class="col-form-label col-md-2">Biaya Pasien</label>
                        <div class="col-md-10">
                        <select class="form-control" name="kode_jenis_biaya" id="kode_jenis_biaya" onchange="changeValueBiaya(this.value)" required="" >
                                <option value="0" required>-- Pilih Biaya --</option>
                                    <?php
                                    $result = mysqli_query($koneksi,"SELECT * FROM `tb_jenis_biaya`");
                                    $jsArray = "var biaya = new Array();\n";
                                    while ($ROW = mysqli_fetch_array($result)) {
                                        echo '<option name="kode_jenis_biaya" value="'.$ROW['kode_jenis_biaya'].'">'.$ROW['kode_jenis_biaya'].' - '.$ROW['nama_biaya'].'</option>';
                                        $jsArray .= "biaya['" . $ROW['kode_jenis_biaya'] . "'] = {nama_biaya:'" . addslashes($ROW['nama_biaya']) . "',tarif:'".addslashes($ROW['tarif'])."'};\n";
                                    }
                                    ?>
                              </select>
                        </div>
                      <label class="col-form-label col-md-2"></label><br>
                      <div class="col-md-4"> 
                        <div class="form-group">
                          <label><br> Nama Pemeriksaan</label>
                          <input type="text" class="form-control" id="nama_biaya" name="nama_biaya" required readonly>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label><br> Tarif</label>
                          <input type="text" class="form-control" id="tarif" name="tarif" required readonly>
                        </div>
                      </div>

                        <script type="text/javascript">
                                <?php echo $jsArray; ?>
                                function changeValueBiaya(kode_jenis_biaya){
                                document.getElementById('nama_biaya').value = biaya[kode_jenis_biaya].nama_biaya;
                                document.getElementById('tarif').value = biaya[kode_jenis_biaya].tarif;
                                };
                              </script>
                    </div>

                    <div class="box-footer">
                        <input type="submit" name="#" class="btn btn-primary">
                    </div><br>

            </form>
            <!-- AKHIR BIAYA -->
                    <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <thead>                                    
                                        <tr>
                                          <th>NO</th>
                                          <th>ID Biaya</th>
                                          <th>Tarif</th>
                                          <th>Kode Pemeriksaan</th>
                                          <th>Action</th>
                                        </tr>
                                  </thead>
                                      <?php
                                        $QUERRY = mysqli_query($koneksi,"SELECT * FROM tb_rekam_medis_biaya ORDER BY tb_rekam_medis_biaya.id_rekam_medis_biaya ASC");
                                        $NO=1;
                                        while ($DATA = mysqli_fetch_array($QUERRY)) {
                                      ?>                              
                                         <tr>
                                             <td><?php echo $NO;?></td>
                                             <td><?php echo $DATA['id_rekam_medis_biaya']; ?></td>
                                             <td><?php echo $DATA['kode_pemeriksaan']; ?></td>
                                             <td><?php echo $DATA['kode_jenis_biaya']; ?></td>
                                                
                                             <td>
                                       
                                        <a href="../pages/rekam_medis/delete_rekam_biaya.php?id_rekam_medis_biaya=<?=$DATA['id_rekam_medis_biaya'];?>&id=<?php echo $satu; ?>"><i class="fa fa-trash"></i></a>
                                       
                                  
                                 </td>
                                </tr>
                        <?php  
                        $NO++;
                        }
                        ?>
                    </table>
              </div>
                    </div>

                      <!-- OBAT -->
                      <div class="tab-pane" id="profile">       
              
            <form  role="form" method="POST" action="../pages/rekam_medis/proses_tambah_obat.php?page=rekam_medis&aksi=detail&id=<?php echo $satu; ?>">

                     <div class="box-body">
                      <label class="col-form-label col-md-2">Obat</label>
                      <div class="col-md-10">
                        <select class="form-control" name="kode_obat" id="kode_obat" onchange="changeValueObat(this.value)" required="" >

                                <option value="0" required>-- Pilih Obat --</option>
                                    <?php
                                    $result1 = mysqli_query($koneksi,"SELECT * FROM `tb_obat`");
                                    $jsArray1 = "var obat = new Array();\n";
                                    while ($ROW = mysqli_fetch_array($result1)) {
                                        echo '<option name="kode_obat" value="'.$ROW['kode_obat'].'">
                                        '.$ROW['kode_obat'].' - '.$ROW['nama_obat'].'
                                         - '.$ROW['merk'].' - '.' Rp '.$ROW['harga_jual'].'</option>';
                                        


                                        $jsArray1 .= "obat['" . $ROW['kode_obat'] . "'] = {
                                          nama_obat:'" . addslashes($ROW['nama_obat']) . "',
                                          merk:'".addslashes($ROW['merk'])."',
                      satuan:'".addslashes($ROW ['satuan'])."',
                      harga_jual:'".addslashes($ROW['harga_jual'])."'
                                          };\n";
                                    }
                                    ?>
                              </select>
                            </div>
                        <label class="col-form-label col-md-10"></label>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><br>Nama Obat</label>
                          <input type="text" class="form-control" id="nama_obat" name="nama_obat" required readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label><br> Merk</label>
                          <input type="text" class="form-control" id="merk" name="merk" required readonly>
                        </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group">
                          <label><br> Satuan</label>
                          <input type="text" class="form-control" id="satuan" name="satuan" required readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label><br> Harga</label>
                          <input type="text" class="form-control" id="harga_jual" name="harga_jual" required readonly>
                        </div>
                    </div>

                        <script type="text/javascript">
                                <?php 
                                  echo $jsArray1;
                                ?>
                                function changeValueObat(kode_obat){
                                  document.getElementById('nama_obat').value = obat[kode_obat].
                                  nama_obat;
                                  document.getElementById('merk').value = obat[kode_obat].
                                  merk;
                                  document.getElementById('satuan').value = obat[kode_obat].
                                  satuan;
                                  document.getElementById('harga_jual').value = obat[kode_obat].
                                  harga_jual;
                                }
                              </script>

                    </div>

                    <div class="box-footer">
                        <input type="submit" name="#" class="btn btn-primary">
                     </div><br>
            </form>

            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>ID Biaya</th>
                                            <th>Kode Pemeriksaan</th>
                                            <th>Kode Jenis Biaya</th>
                                            <th>Action</th>   
                                        </tr>

                                    </thead>
                                    <tbody>

                                        <?php
                                          $TAMPIL = "SELECT * FROM tb_rekam_medis_obat ORDER BY tb_rekam_medis_obat.id_rekam_medis_obat ASC ";
                                          $HASIL = mysqli_query($koneksi,$TAMPIL);
                                          $NO=1;
                                          while ($ROW = mysqli_fetch_array($HASIL)) {
                                            $NO;
                                            $ID_BIAYA           =$ROW['id_rekam_medis_obat'];
                                            $KODE_PEMERIKSAAN       =$ROW['kode_pemeriksaan_obat'];
                                            $KODE_JENIS_BIAYA       =$ROW['kode_obat'];
                                    
                                        ?>

                                        <tr>

                                                <td><?php echo $NO;?></td>
                                                <td><?php echo $ID_BIAYA; ?></td>
                                                <td><?php echo $KODE_PEMERIKSAAN; ?></td>
                                                <td><?php echo $KODE_JENIS_BIAYA; ?></td>
                                  <td>
                                       
                                        <a href="../pages/rekam_medis/delete_rekam_obat.php?id_rekam_medis_obat=<?=$ROW['id_rekam_medis_obat'];?>&id=<?php echo $satu; ?>"><i class="fa fa-trash"></i></a>
                                       

                                  </td>

                
                                        </tr>      
                                  
                                      <?php  
                    $NO++;
                    }
                    ?>
                    </tbody>
                                </table>
                            </div>

                                    </div><!-- tab-pane -->
                                  
                                    <div class="tab-pane" id="about">
                    
                    <form  role="form" method="POST" action="../pages/rekam_medis/proses_tambah_resep.php?page=rekam_medis&aksi=detail&id=<?php echo $satu; ?>">
                     
                            <div class="box-body">
                              <label class="col-form-label col-md-2">Resep</label>
                             <div class="col-md-10">
                                <select class="form-control" name="kode_resep" id="kode_resep" onchange="changeValueResep(this.value)" required="" >
                                        <option value="0" required>-- Pilih Resep --</option>
                                            <?php

                                            $result2= mysqli_query($koneksi,"SELECT * FROM `tb_resep`");

                                            $jsArray2 = "var resep = new Array();\n";

                                            while ($ROW = mysqli_fetch_array($result2)) {

                                                echo '<option name="kode_resep" value="'.$ROW['kode_resep'].'">
                                                '.$ROW['kode_resep'].' - '.$ROW['dosis'].'
                                                 - '.$ROW['jumlah'].' </option>';
                                                


                                                $jsArray2 .= "resep['" . $ROW['kode_resep'] . "'] = {
                                                  dosis:'" . addslashes($ROW['dosis']) . "',
                                                  jumlah:'".addslashes($ROW['jumlah'])."'
                                                  };\n";
                                            }
                                            ?>
                                      </select>
                                  </div>
                            <label class="col-form-label col-md-2"></label><br>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label><br>Dosis</label>
                                <input type="text" class="form-control" id="dosis" name="dosis" required readonly>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label> <br>Jumlah Obat</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" required readonly>
                              </div>
                            </div>

                              <script type="text/javascript">
                                      <?php 
                                        echo $jsArray2;
                                      ?>
                                      function changeValueResep(kode_resep){
                                        document.getElementById('dosis').value = resep[kode_resep].
                                        dosis;
                                        document.getElementById('jumlah').value = resep[kode_resep].
                                        jumlah;
                                      }
                                    </script>

                          </div>
                          <div class="box-footer">
                              <input type="submit" name="#" class="btn btn-primary">
                            </div><br>
            </form>

            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>ID Biaya</th>
                                            <th>Kode Resep</th>
                                            <th>Kode Pemeriksaan Resep</th>
                                            <th>Action</th>   
                                   
                                        </tr>
                                     </thead>
                              <?php
                              $TAMPIL = "SELECT * FROM tb_rekam_medis_resep ORDER BY tb_rekam_medis_resep.id_rekam_medis_resep ASC";
                              $HASIL = mysqli_query($koneksi,$TAMPIL);
                              $NO=1;
                              while ($ROW = mysqli_fetch_array($HASIL)) {
                                $NO;
                                $KODE_RESEP             =$ROW['id_rekam_medis_resep'];
                                $KODE_PEMERIKSAAN           =$ROW['kode_pemeriksaan_resep'];
                                $KODE_OBAT                =$ROW['kode_resep']
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $NO;?></td>
                              <td><?php echo $KODE_RESEP; ?></td>
                              <td><?php echo $KODE_PEMERIKSAAN; ?></td>
                              <td><?php echo $KODE_OBAT; ?></td>
                            
                              <td>
                                       
                                        <a href="../pages/rekam_medis/delete_rekam_resep.php?id_rekam_medis_resep=<?=$ROW['id_rekam_medis_resep'];?>&id=<?php echo $satu; ?>"><i class="fa fa-trash"></i></a>                                    

                                
                                </td>
                                        </tr>
                           
                                    <?php  
                              $NO++;
                              }
                              ?>
                                </table>
                            </div>

                                    </div><!-- tab-pane -->

                                </div><!-- tab-content -->
                                
                            </div><!-- col-md-6 -->
                    </div>


    <div class="text-left btn-invoice">
        <a href="index.php?page=rekam_medis"><button class="btn btn-warning btn-bordered">Back</button></a>
    </div>
    <div class="text-right btn-invoice">
        <a href="../laporan/laporan_pemeriksaan.php" target="_blank"><button class="btn btn-success btn-bordered">Laporan</button></a>
    </div>
</section>
