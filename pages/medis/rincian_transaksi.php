<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4>RINCIAN REKAM MEDIS</h4>
            <hr>
            <div class="row">
                <div class="col-lg-6 m-b-20">
                    <ul class="personal-info">
                      <?php
                        $ID=$_GET['id'];
                        $query = mysqli_query($koneksi,"SELECT tb_pemeriksaan.*,tb_pasien.*,tb_pendaftaran.* FROM tb_pendaftaran
                        INNER JOIN tb_pemeriksaan on tb_pemeriksaan.no_pendaftaran = tb_pendaftaran.no_pendaftaran
                        INNER JOIN tb_pasien on tb_pasien.kode_pas = tb_pendaftaran.kode_pas WHERE tb_pemeriksaan.kode_pemeriksaan = '$ID' ");
                        $data = @mysqli_fetch_array($query)

                        ?>
                        <li>
                        <h4 class="text-uppercase">#<?php echo $data['kode_pemeriksaan']; ?></h4>
                        <li>
                            <span class="title">Nama Pasien </span>
                            <span class="text">: <?php echo $data['nama_pas']; ?></span>
                        </li>
                        <li>
                            <span class="title">Keluhan </span>
                            <span class="text">: <?php echo $data['keluhan']; ?></span>
                        </li>
                        <li>
                            <span class="title">Diagnosa </span>
                            <span class="text">: <?php echo $data['diagnosa']; ?></span>
                        </li>
                        <li>
                            <span class="title">Rincian </span>
                            <span class="text">: 
                                <?php if ($data['rincian_pemeriksaan']==1) {
                                                echo "<span class='custom-badge status-green'>Sudah Konfirmasi</span>" ;
                                             }elseif ($data['rincian_pemeriksaan']==0) {
                                               echo "<span class='custom-badge status-red'>Belum Konfirmasi</span>" ;
                                             }?>
                            </span>
                        </li>
                        <li>
                            <span class="title">Status </span>
                            <span class="text">: 
                            <?php if ($data['status_pemeriksaan']==1) {
                                                echo "<span class='custom-badge status-blue'>Transaksi Berhasil</span>" ;
                                             }elseif ($data['status_pemeriksaan']==0) {
                                               echo "<span class='custom-badge status-red'>Belum Transaksi</span>" ;
                                             }?>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card-box">
        <ul class="nav nav-tabs nav-tabs nav-justified">
            <li class="nav-item"><a class="nav-link active" href="#biaya" data-toggle="tab">Biaya Pasien</a></li>
            <li class="nav-item"><a class="nav-link" href="#obat" data-toggle="tab">Obat Pasien</a></li>
            <li class="nav-item"><a class="nav-link" href="#resep" data-toggle="tab">Resep Obat</a></li>
        </ul>

        <div class="tab-content">
<!-- AWAL TAB 1 -->
            <div class="tab-pane show active" id="biaya">
                <div class="col-lg-12">
                    <div class="card-box">
                        <?php
                            if (@$_POST['tambah_biaya']) {
                            include 'proses_tambah_biaya.php';
                          }
                        ?>
                        <form method="post">
                            <div class="form-group row">
                                <input type="hidden" class="form-control" name="kode_pemeriksaan" value="<?php echo @$data['kode_pemeriksaan']; ?>" readonly="">
                                <label class="col-form-label col-md-2">Biaya Pasien</label>
                                <div class="col-md-10">
                                <select class="form-control" name="kode_jenis_biaya" id="kode_jenis_biaya" onchange="changeValueBiaya(this.value)" required="" >
                                <option value="0" required>-- Pilih Biaya --</option>
                                    <?php
                                    $result = mysqli_query($koneksi,"SELECT * FROM `tb_jenis_biaya`");
                                    $jsArray = "var biaya = new Array();\n";
                                    while ($data = mysqli_fetch_array($result)) {

                                        echo '<option name="kode_jenis_biaya" value="'.$data['kode_jenis_biaya'].'">'.$data['kode_jenis_biaya'].' - '.$data['nama_biaya'].'</option>';

                                        $jsArray .= "biaya['" . $data['kode_jenis_biaya'] . "'] = {nama_biaya:'" . addslashes($data['nama_biaya']) . "',tarif:'".addslashes($data['tarif'])."'};\n";
                                    }
                                    ?>
                              </select>
                                </div>
                                <label class="col-form-label col-md-2"></label>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label><br>Nama Pemeriksaan</label>
                                        <input type="text" id="nama_biaya" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label><br>Tarif</label>
                                        <input type="text" id="tarif" class="form-control" readonly>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                <?php echo $jsArray; ?>
                                function changeValueBiaya(kode_jenis_biaya){
                                document.getElementById('nama_biaya').value = biaya[kode_jenis_biaya].nama_biaya;
                                document.getElementById('tarif').value = biaya[kode_jenis_biaya].tarif;
                                };
                              </script>
                                <div class="text-right col-md-1 offset-md-2">
                                    <input type="submit" class="btn btn-primary" value="Proses" name="tambah_biaya">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <?php
                    include 'tampil_data_biaya.php';
                    ?>
            </div><!-- AKHIR TAB 1 -->
<!-- AWAL TAB 2 -->
            <div class="tab-pane" id="obat">
                 <?php
                            if (@$_POST['tambah_obat']) {
                            include 'proses_tambah_obat.php';
                          }
                        ?>
                
                <form method="post">
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Obat Pasien</label>
                                <div class="col-md-10">
                                <select class="form-control" name="kode_obat" id="kode_obat" onchange="changeValueObat(this.value)" required="" >
                                <option>------ Pilih Obat ------</option>
                                    <?php 
                                    $sql_pas = mysqli_query($koneksi, "SELECT * FROM `tb_obat`") or die(mysqli_error($koneksi));
                                    $jsArray1 = "var obat = new Array();\n";
                                    while ($data_pas = mysqli_fetch_array($sql_pas)) {
                                        echo '<option value="'.$data_pas['kode_obat'].'">'.$data_pas['nama_obat'].' - '.$data_pas['merk'].'- '.$data_pas['satuan'].'- '.$data_pas['harga_jual'].'</option>';

                                        $jsArray1 .= "obat['" . $data_pas['kode_obat'] . "'] = {

                                        nama_obat:'" . addslashes($data_pas['nama_obat']) . "',
                                        merk:'".addslashes($data_pas['merk'])."',
                                        satuan:'".addslashes($data_pas['satuan'])."',
                                        harga_jual:'".addslashes($data_pas['harga_jual'])."'};\n";
                                    }
                                    ?>
                              </select>
                                </div>

                                <label class="col-form-label col-md-2"></label>
                                <div class="col-md-5">
                                    <div class="form-group">
                                         <label>Nama Obat</label>
                                         <div class="">
                                             <textarea id="nama_obat" class="form-control" name="nama_obat" readonly=""></textarea>
                                             <p class="help-block"></p>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                       <label class="col-lg-6 col-md-6 control-label">Merk</label>
                                       <textarea id="merk" class="form-control" name="merk" readonly=""></textarea>                 
                                   </div>
                                </div>

                                <label class="col-form-label col-md-2"></label>
                                <div class="col-md-5">
                                    <div class="form-group">
                                       <label class="col-lg-6 col-md-6 control-label">Satuan</label>
                                        <input type="text" class="form-control" id="satuan" name="satuan" required readonly="">                 
                                   </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                       <label class="col-lg-6 col-md-6 control-label">Harga</label>
                                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" required readonly="">        
                                   </div>
                                </div>

                                <script type="text/javascript">
                                <?php echo $jsArray1; ?>
                                function changeValueObat(kode_obat){
                                document.getElementById('nama_obat').value = obat[kode_obat].nama_obat;
                                document.getElementById('merk').value = obat[kode_obat].merk;
                                document.getElementById('satuan').value = obat[kode_obat].satuan;
                                document.getElementById('harga_jual').value = obat[kode_obat].harga_jual
                                ;
                                };
                              </script>
                                <div class="text-right col-md-1 offset-md-2">
                                    <input type="submit" class="btn btn-primary" value="Proses" name="tambah_obat" >
                                </div>
                            </div>
                        </form>
                        <?php
                    include 'Obat.php';
                    ?>
            </div><!-- AKHIR TAB 2 -->
<!-- AWAL TAB 3 -->
            <div class="tab-pane" id="resep">
                 <?php
                            if (@$_POST['tambah_resep']) {
                            include 'proses_tambah_resep.php';
                          }
                          ?>
                <form method="post">
                            <div class="form-group row">
                                <input type="hidden" class="form-control" name="kode_pemeriksaan_resep" value="<?php echo @$data['kode_pemeriksaan_resep']; ?>" readonly="">
                                <label class="col-form-label col-md-2">Resep Obat</label>
                            
                                <div class="col-md-10">
                                <select class="form-control" name="kode_resep" id="kode_resep" onchange="changeValueResep(this.value)" required="" >
                                <option>------ Pilih Resep ------</option>
                                    <?php
                                    $result = mysqli_query($koneksi,"SELECT * FROM `tb_resep`");
                                    $jsArray = "var resep = new Array();\n";
                                    while ($data = mysqli_fetch_array($result)) {

                                        echo '<option name="kode_resep" value="'.$data['kode_resep'].'">'.$data['dosis'].' - '.$data['jumlah'].'</option>';

                                        $jsArray .= "resep['" . $data['kode_resep'] . "'] = {dosis:'" . addslashes($data['dosis']) . "',jumlah:'".addslashes($data['jumlah'])."'};\n";
                                    }
                                    ?>
                                    
                              </select>
                                </div>
                                <label class="col-form-label col-md-2"></label>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label><br>Dosis</label>
                                        <input type="text" id="dosis" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label><br>Jumlah</label>
                                        <input type="text" id="jumlah" class="form-control" readonly>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                <?php echo $jsArray; ?>
                                function changeValueResep(kode_resep){
                                document.getElementById('dosis').value = resep[kode_resep].dosis;
                                document.getElementById('jumlah').value = resep[kode_resep].jumlah;
                                };
                              </script>
                                <div class="text-right col-md-1 offset-md-2">
                                    <input type="submit" class="btn btn-primary" value="Proses" name="tambah_resep">
                                </div>
                            </div>
                        </form>
                        <?php
                    include 'Resep.php';
                    ?>
            </div><!-- AKHIR TAB 3 -->
        </div> <!-- Akhir tab-contet -->
    </div>