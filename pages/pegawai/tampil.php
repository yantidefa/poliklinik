   <?php 
    @$page = $_GET['aksi'];
     ?>
 
 
        
                <ol class="breadcrumb">
                  <li>
                     <a href="index.php">| Beranda | </a>
                  </li>
                 <li class="active">
                     <a href="?page=pegawai"> | Pegawai |</a>
                 </li>
                </ol>
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h4>Data Pegawai</h4>
                             <hr>
                             <div>
                            <a href="index.php?page=pegawai&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Pegawai</a>
                            <a href="../laporan/laporan_pegawai.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data" target="_blank"><i class="glyphicon glyphicon-book"></i> Laporan</a>
                           </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NIP</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>JK</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          $TAMPIL = "SELECT tb_pegawai. *, tb_login. * FROM tb_pegawai INNER JOIN tb_login on tb_login.nip = tb_pegawai.nip ORDER BY tb_pegawai.nip ASC";
                                          $HASIL = mysqli_query($koneksi,$TAMPIL);
                                          $NO = 1;
                                            while ($row=mysqli_fetch_array($HASIL)) {
                                          $NO;
                                          $Nip         = $row['nip'];
                                          $Nama        = $row['nama_peg'];
                                          $Alamat      = $row['alamat_peg'];
                                          $Telp        = $row['telp_peg'];
                                          $jk          = $row['jenis_kelamin_peg'];
                                          $Username    = $row['username'];
                                          $Password    = $row['password'];
                                          $Status      = $row['type_user'];

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $Nip; ?></td>
                                          <td><?php echo $Nama; ?></td>
                                          <td><?php echo $Alamat ?></td>
                                          <td><?php echo $Telp; ?></td>
                                          <td><?php echo $jk; ?></td>
                                          <td><?php echo $Status; ?></td>
                                          <td>
                                             
                                                
                                                      <a href="index.php?page=pegawai&aksi=edit&id=<?php echo $Nip; ?>"class="btn-md btn btn-theme" data-toogle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
                                                      <a href="../pages/pegawai/hapus.php?nip=<?php echo $row['nip'];?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                                    
                                                  
                                             
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