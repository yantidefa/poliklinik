 
   <?php 
    @$page = $_GET['aksi'];
     ?>
 
 
        <div class="">
          <div class="col-lg-12">
            <div class="">
              <div class="">
                <ol class="breadcrumb">
                  <li>
                     <a href="index.php">| Beranda | </a>
                  </li>
                 <li class="active">
                     <a href="?page=medis"> | Medis |</a>
                 </li>
                </ol>
               </div>
              </div>
            </div>
          </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4>Data Rekam Medis</h4>
                             <hr>
                             <div class="text-right">
                            <a href="../laporan/laporan_medis.php" class="btn btn-round btn-secondary" data-toogle="tooltip" data-placement="bottom" title="Tambah Data" target="_blank"><i class="glyphicon glyphicon-print"></i> Laporan</a>
                           </div>
                        </div>
                        <br>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Pemeriksaan</th>
                                            <th>Kode Pasien</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Rincian</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php

                                          $query = mysqli_query($koneksi,"SELECT tb_pemeriksaan.*,tb_pasien.*,tb_pendaftaran.* FROM tb_pendaftaran
                                            INNER JOIN tb_pemeriksaan on tb_pemeriksaan.no_pendaftaran=tb_pendaftaran.no_pendaftaran
                                            INNER JOIN tb_pasien on tb_pasien.kode_pas=tb_pendaftaran.kode_pas");

                                            
                                          $NO = 1;
                                            while ($data=@mysqli_fetch_array($query)) {

                                              $Rincian = $data['rincian_pemeriksaan'];
                                              $Status  =$data['status_pemeriksaan'];
                                              $kode  =$data['kode_pemeriksaan'];
                                              
                                          
                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $data['kode_pemeriksaan']; ?></td>
                                          <td><?php echo $data['kode_pas']; ?></td>
                                          <td><?php echo $data['nama_pas']; ?></td>
                                          <td><?php echo $data['alamat_pas']; ?></td> 
                                          <td>

                                            

                                             <?php if ($Rincian==1) {
                                                echo "<span class='custom-badge status-green'>Sudah Konfirmasi</span>" ;
                                             }elseif ($Rincian==0) {
                                               echo "<span class='custom-badge status-red'>Belum Konfirmasi</span>" ;
                                             }?>

                                            
                                          </td>
                                          <td>
                                            

                                             <?php if ($Status==1) {
                                                echo "<span class='custom-badge status-blue'>Transaksi Berhasil</span>" ;
                                             }elseif ($Status==0) {
                                               echo "<span class='custom-badge status-red'>Belum Transaksi</span>" ;
                                             }?>

                                             </td> 
                                             <td class="text-right">
                                        <?php
                                        if ($data['rincian_pemeriksaan']== 0) { ?>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="index.php?page=rekam_medis&aksi=rincian_transaksi&id=<?php echo $data['kode_pemeriksaan']; ?>"><i class="fa fa-edit"></i> Rincian Transaksi</a>                                            
                                            <a class="dropdown-item" href="index.php?page=rekam_medis&aksi=konfirmasi&id=<?php echo $data['kode_pemeriksaan']; ?> &value=1"><i class="fa fa fa-check text-success"></i> Konfirmasi Rincian</a>
                                        </div>
                                    </div>
                                            <?php  
                                            }
                                            elseif ($data['rincian_pemeriksaan']== 1) { ?>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="index.php?page=rekam_medis&aksi=detail_data&id=<?php echo $data['kode_pemeriksaan']; ?>"><i class="fa fa-edit"></i> Data Detail</a>                                            
                                            <a class="dropdown-item" href="../laporan/laporan_pemeriksaan_detail.php?id=<?php echo $data['kode_pemeriksaan']; ?>" target="_blank"><i class="fa fa fa-print"></i> Print Detail</a>
                                        </div>
                                    </div>
                                            <?php
                                            }
                                        ?>

                                </td> 



                                          <!--<td>
                                            
                                            <a href="index.php?page=rekam_medis&aksi=rincian_transaksi&id=<?php echo $data['kode_pemeriksaan']; ?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="rincian"><i class="fa fa-money"></i></a></li>
                                                
                                            <a href="../pages/medis/konfirmasi.php?kode_pemeriksaan=<?php echo $data['kode_pemeriksaan'];?>"class="btn-md btn btn-warning" data-toogle="tooltip" data-placement="bottom" title="konfirmasi"><i class="fa fa-check"></i> </a>

                                            
                                           

                                            
                                              
                                         </td>
                                         -->
                                        </tr>
                                      <?php 
                                    $NO++;
                                    }
                                     ?>
                                       
                                        </table>
                                       </form>

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>