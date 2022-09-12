   <?php 
    @$page = $_GET['aksi'];
     ?>
 
 
        <div class="">
          <div class="col-lg-12">
            <div class="">
              <div class="panel-body">
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
                             <h4>Data Pendaftaran</h4>
                             <hr>
                             <div>
                            <a href="index.php?page=pendaftaran&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Pendaftar</a>
                            <a href="../laporan/laporan_pendaftaran.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tambah Data" target="_blank"><i class="glyphicon glyphicon-print"></i> Laporan</a>
                           </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal</th>
                                            
                                            <th>No Urut</th>
                                            <th>Nama Pegawai</th>
                                            <th>Kode Pasien</th>
                                            <th>Jadwal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                           $query = mysqli_query($koneksi, "SELECT tb_pendaftaran.*, tb_pasien.*, tb_pegawai.*, tb_jadwal_praktik. * FROM 
                                           tb_pendaftaran 
                                            JOIN tb_pegawai ON tb_pendaftaran.nip=tb_pegawai.nip
                                            JOIN tb_pasien ON tb_pendaftaran.kode_pas=tb_pasien.kode_pas
                                            JOIN tb_jadwal_praktik ON tb_pendaftaran.kode_jadwal=tb_jadwal_praktik.kode_jadwal
                                            ORDER BY tb_pendaftaran.no_pendaftaran ASC");

                                          $NO = 1;
                                            while ($data=@mysqli_fetch_array($query)) {
                                         
                                                                               

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $data['tanggal_reg']; ?></td>
                                          <td><?php echo $data['no_urut']; ?></td>
                                          <td><?php echo $data['nama_peg']; ?></td>
                                          <td><?php echo $data['nama_pas']; ?></td>
                                          <td><?php echo $data['hari'].",".$data['jam_mulai']."-".$data['jam_selesai']; ?></td>
                                          

                                                                                      
                                          <td>
                                            
                                                  
                                                      <a href="index.php?page=pendaftaran&aksi=edit&id=<?php echo $data['no_pendaftaran']; ?>"class="btn-md btn btn-theme" data-toogle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a></li>
                                                      
                                                      <a href="../pages/pendaftaran/hapus.php?no_pendaftaran=<?php echo $data['no_pendaftaran'];?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i> </a>
                                              
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