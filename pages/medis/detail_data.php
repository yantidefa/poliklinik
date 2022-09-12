<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4>DETAIL REKAM MEDIS</h4>
            <hr>
            <div class="row">
                <div class="col-lg-6 m-b-20">
                    <ul class="personal-info">
                      <?php 
 $ID=$_GET['id'];
                        $query = mysqli_query($koneksi,"SELECT tb_pemeriksaan.*,tb_pasien.*,tb_pendaftaran.* FROM tb_pendaftaran
                        INNER JOIN tb_pemeriksaan on tb_pemeriksaan.no_pendaftaran = tb_pendaftaran.no_pendaftaran
                        INNER JOIN tb_pasien on tb_pasien.kode_pas = tb_pendaftaran.kode_pas WHERE tb_pemeriksaan.kode_pemeriksaan='$ID'");
                        $data = @mysqli_fetch_array($query)

                        ?>
                        <li>
                        <h4 class="text-uppercase">#<?php echo $data['kode_pas']; ?></h4>
                        <li>
                            <span class="title"> Tanggal Registrasi </span>
                            <span class="text">: <?php echo $data['tanggal_reg']; ?></span>
                        </li>
                        <li>
                            <span class="title">Tanggal Pemeriksaan </span>
                            <span class="text">: <?php echo $data['tanggal_pemeriksaan']; ?></span>
                        </li>
                        <li>
                            <span class="title">No Pendaftaran </span>
                            <span class="text">: <?php echo $data['no_pendaftaran']; ?></span>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <div class="row">

                <div class="col-sm-5 col-sm-offset-1" >
                    <h3>Data Pasien</h3>
                    #<?php echo $data['kode_pas']; ?><br>
                    <b><?php echo $data['nama_pas']; ?></b>. <?php echo $data['tanggal_reg']; ?><br>
                    <?php echo $data['alamat_pas']; ?><br>
                    <?php echo $data['telp_pas']; ?>
                    </div>

                    <div class="col-sm-6">
                    <h3>Pasien</h3>
                    Berat Badan     : <?php echo $data['berat_badan']; ?> <?php echo "kg"; ?><br>
                    Tensi Diastolik : <?php echo $data['tensi_diastolik']; ?> <?php echo "mmHg"; ?><br>
                    Tensi Sistolik  : <?php echo $data['tensi_sistolik']; ?> <?php echo "mmHg"; ?><br> 

                    </div>
                </div>
                <br>

                <!--biaya-->
                                                <!-- TABEL -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered custom-table mb-0 table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Biaya</th>
                                                <th class="text-center">Tarif</th>
                                                <th class="text-center">Kode Pemeriksaan</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $ID=$_GET['id'];
                                                $query_biaya = mysqli_query($koneksi,"SELECT tb_rekam_medis_biaya.*, tb_jenis_biaya.*
                                                FROM tb_rekam_medis_biaya
                                                INNER JOIN tb_jenis_biaya on tb_rekam_medis_biaya.kode_jenis_biaya = tb_jenis_biaya.kode_jenis_biaya WHERE kode_pemeriksaan = '$ID' ");
                                                $no = 1;
                                                while ($data = @mysqli_fetch_array($query_biaya))
                                                {
                                                    $Kode = $data['kode_pemeriksaan'];
                                            ?>                    
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['nama_biaya'] ;?></td>
                                                <td><?php echo $data['tarif'] ; ?></td>
                                                <td><?php echo $Kode ?></td>
                                                
                                            </tr>
                                            <?php
                                            $no++;
                                            };
                                            ?>                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>   
                    </div>
                </div>
                <br>
                <!--obat-->
                <!-- TABEL -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered custom-table mb-0 table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Obat</th>
                                                <th class="text-center">Merk</th>
                                                <th class="text-center">Satuan</th>
                                                <th class="text-center">Harga</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $query_biaya = mysqli_query($koneksi,"SELECT tb_rekam_medis_obat.*, tb_obat.*
                                                FROM tb_rekam_medis_obat
                                                INNER JOIN tb_obat on tb_rekam_medis_obat.kode_obat = tb_obat.kode_obat WHERE kode_pemeriksaan_obat = '$ID' ");
                                                $no = 1;
                                                while ($data = @mysqli_fetch_array($query_biaya))
                                                {
                                            ?>                    
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['nama_obat'] ;?></td>
                                                <td><?php echo $data['merk'] ; ?></td>
                                                <td><?php echo $data['satuan']; ?></td>
                                                <td><?php echo $data['harga_jual']; ?></td>
                                                
                                            </tr>
                                            <?php
                                            $no++;
                                            };
                                            ?>                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>   
                    </div>
                </div>

                <!--resep-->
                <br>

<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>NO</th>
                                            
                    <th>Dosis</th>
                    <th>Jumlah</th>
              
                </tr>
            </thead>
            <tbody>
                <tr>
                  <?php
                    $query_biaya = mysqli_query($koneksi,"SELECT tb_rekam_medis_resep.*, tb_resep.*
                                FROM tb_rekam_medis_resep
                    INNER JOIN tb_resep on tb_rekam_medis_resep.kode_resep = tb_resep.kode_resep WHERE kode_pemeriksaan_resep = '$ID' ");
                    $NO = 1;
                   while ($data = @mysqli_fetch_array($query_biaya))
                    {
                   ?>
                    <td><?php echo $NO; ?></td>
                                          
                    <td><?php echo $data['dosis']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                                          
                    
                </tr>
                <?php 
              $NO++;
              }
                ?>
            </tbody>
                                       
        </table>
                                       
                                    
                              
         </div>
                            
      </div>
     

        </div>
    </div>
</div>

