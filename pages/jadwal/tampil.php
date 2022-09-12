   <?php 
    @$page = $_GET['aksi'];
     ?>
 
 
        <div class="row mt">
          <div class="col-lg-12">
            <div class="">
              <div class="panel-body">
                <ol class="breadcrumb">
                  <li>
                     <a href="index.php">| Beranda | </a>
                  </li>
                 <li class="active">
                     <a href="?page=pegawai"> | Pegawai |</a>
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
                             <h4>Data Jadwal</h4>
                             <hr>
                             <div>
                            <a href="index.php?page=jadwal&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Jadwal</a>
                            <a href="../laporan/laporan_jadwal.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data" target="_blank"><i class="glyphicon glyphicon-book"></i> Laporan</a>
                           </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Jadwal</th>
                                            <th>Hari</th>
                                            <th>Waktu</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          include ("koneksi.php");
                                          $TAMPIL = "SELECT * FROM tb_jadwal_praktik";
                                          $HASIL = @mysqli_query($koneksi,$TAMPIL);
                                          $NO = 1;
                                            while ($row=@mysqli_fetch_array($HASIL)) {
                                          $NO;
                                          $Jadwal         = $row['kode_jadwal'];
                                          $Hari           = $row['hari'];
                                          $Mulai          = $row['jam_mulai'];
                                          $Selesai        = $row['jam_selesai'];
                                                                                    

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $Jadwal; ?></td>
                                          <td><?php echo $Hari; ?></td>
                                          <td><?php echo $Mulai; echo "-"; echo $Selesai; ?></td>
                                          <td>
                                             <div class="btn-group">
                                                    <button type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
                                                      <span class="caret"></span>
                                                      </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                      <li><a href="index.php?page=jadwal&aksi=edit&id=<?php echo $Jadwal; ?>">Edit</a></li>
                                                      <li class="divider"></li>
                                                      <li><a href="../pages/jadwal/hapus.php?kode_jadwal=<?php echo $row['kode_jadwal'];?>">Delete</a></li>
                                                    
                                                    </ul>
                                              </div>
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