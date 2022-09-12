 
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
                             <div>
                            <a href="index.php?page=periksa&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                            <a href="../laporan/laporan_medis.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tambah Data" target="_blank"><i class="glyphicon glyphicon-print"></i> Laporan</a>
                           </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Jenis Biaya</th>
                                            <th>Kode Rincian Biaya</th>
                                            <th>Nama Biaya</th>
                                            <th>Tarif</th>
                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php

                                          include ("../inc/koneksi.php");

                                          $query = mysqli_query($koneksi,"SELECT tb_rincian_jenis_biaya.*,tb_jenis_biaya.*. tb_pendaftaran FROM tb_pendaftaran
                                            INNER JOIN tb_rincian_jenis_biaya on tb_rincian_jenis_biaya.no_pendaftaran=tb_pendaftaran.no_pendaftaran
                                            INNER JOIN tb_jenis_biaya on tb_jenis_biaya.kode_jenis_biaya=tb_rincian_jenis_biaya.kode_jenis_biaya
                                           ");

                                            
                                          $NO = 1;
                                            while ($data=@mysqli_fetch_array($query)) {

                                              
                                              
                                          
                                       ?>
                                            <div class="col-lg-12">
                                               <ol class="breadcrumb" >
                                                 <p><h4><b>#<?php echo $data['no_pendaftaran']; ?></b></h4></p>
                                                 Tanggal Registrasi  : <?php echo $data['tanggal_daftar']; ?><br>
                                                 Tanggal Pemeriksaan : <?php echo $data['tanggal_pemeriksaan']; ?><br>
                                                 No Pendaftaran      : <?php echo $data['no_pendaftaran']; ?>
                                                </ol>
                                            </div>


                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $data['kode_jenis_biaya']; ?></td>
                                          <td><?php echo $data['kode_rincian_biaya']; ?></td>
                                          <td><?php echo $data['nama_biaya']; ?></td>
                                          <td><?php echo $data['Tarif']; ?></td> 
                                               
                                          <td>
                                            
                                            <a href="index.php?page=rekam_medis&aksi=Biaya&id=<?php echo $data['kode_pemeriksaan']; ?>"class="btn-md btn btn-theme" data-toogle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-money"></i></a></li>
                                                
                                            <a href="../pages/medis/Biaya.php?kode_pemeriksaan=<?php echo $data['kode_pemeriksaan'];?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i> </a>

                                            
                                           

                                            
                                              
                                          </td>
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