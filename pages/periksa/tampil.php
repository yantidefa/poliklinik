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
                     <a href="?page=resep"> | Resep |</a>
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
                             <h4>Data Pemeriksaan</h4>
                             <hr>
                             <div class="text-right">
                            <a href="index.php?page=periksa&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Data Pemeriksaan</a>
                            <a href="../laporan/laporan_periksa.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tambah Data" target="_blank"><i class="glyphicon glyphicon-print"></i> Laporan</a>
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
                                            <th>Tanggal</th>
                                            <th>Kode Pasien</th>
                                            <th>Nama</th>
                                            <th>Diagnosa</th>
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
                                          
                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $data['kode_pemeriksaan']; ?></td>
                                          <td><?php echo $data['tanggal_pemeriksaan']; ?></td>
                                          <td><?php echo $data['kode_pas']; ?></td>
                                          <td><?php echo $data['nama_pas']; ?></td>
                                          <td><?php echo $data['diagnosa']; ?></td>   
                                          <td>
                                            
                                            <a href="index.php?page=periksa&aksi=edit&id=<?php echo $data['kode_pemeriksaan']; ?>"class="btn-md btn btn-secondary" data-toogle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a></li>
                                                
                                            <a href="../pages/periksa/hapus.php?kode_pemeriksaan=<?php echo $data['kode_pemeriksaan'];?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i> </a>

                                            <a href="index.php?page=periksa&aksi=Detail&id=<?php echo $data['kode_pemeriksaan']; ?>"class="btn-md btn btn-warning" data-toogle="tooltip" data-placement="bottom" title="Detail"><i class="fa fa-book"></i> </a>
                                            
                                            <a href="../laporan/laporan_detail.php"class="btn-md btn btn-info" data-toogle="tooltip" data-placement="bottom" title="laporan_detail"><i class="fa fa-print"></i> </a>
                                              
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