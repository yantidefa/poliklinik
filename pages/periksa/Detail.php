<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4>DETAIL REKAM MEDIS</h4>
            <hr>
            <div class="row">
                <div class="col-lg-6 m-b-20">
                    <ul class="personal-info">
                      <?php 
                        include ("koneksi.php");

                     $ID=$_GET['id'];
                        $query = mysqli_query($koneksi,"SELECT tb_pemeriksaan.*,tb_pasien.*,tb_pendaftaran.* FROM tb_pendaftaran
                        INNER JOIN tb_pemeriksaan on tb_pemeriksaan.no_pendaftaran = tb_pendaftaran.no_pendaftaran
                        INNER JOIN tb_pasien on tb_pasien.kode_pas = tb_pendaftaran.kode_pas WHERE tb_pemeriksaan.kode_pemeriksaan='$ID'");
                        $data = @mysqli_fetch_array($query)

                                          
                        ?>

                        <li>
                        <h4s>#<?php echo $data['kode_pas']; ?></h4>
                        <li>
                            <span> Tanggal Registrasi </span>
                            <span>: <?php echo $data['tanggal_daftar']; ?></span>
                        </li>
                        <li>
                            <span>Tanggal Pemeriksaan </span>
                            <span>: <?php echo $data['tanggal_pemeriksaan']; ?></span>
                        </li>
                        <li>
                            <span>No Pendaftaran </span>
                            <span>: <?php echo $data['no_pendaftaran']; ?></span>
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
                    <b><?php echo $data['nama_pas']; ?></b>. <?php echo $data['tanggal_daftar']; ?><br>
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
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Keluhan</th>
                            <th>Perawatan</th>
                            <th>Tindakan</th>
                                            
                        </tr>
                    </thead>
                    <tbody>
                        <td><?php echo $data['keluhan']; ?></td>
                        <td><?php echo $data['perawatan']; ?></td>
                        <td><?php echo $data['tindakan']; ?></td>
                    </tbody>
                </table>
                                         
        </div>
    </div>
</div>

