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
                     <a href="?page=dokter"> | Dokter |</a>
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
                             <h4>Data Dokter</h4>
                             <hr>
                             <div>
                            <a href="index.php?page=dokter&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                            <a href="../laporan/laporan_dok.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data" target="_blank"><i class="glyphicon glyphicon-book"></i> Laporan</a>
                           </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Dokter</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Telp</th>
                                            <th>Poli</th>
                                            <th>Jadwal</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          include ("koneksi.php");

                               $TAMPIL = mysqli_query($koneksi, "SELECT * FROM 
                               tb_dokter 
                              INNER JOIN tb_poliklinik ON tb_dokter.kode_poli=tb_poliklinik.kode_poli
                              INNER JOIN tb_jadwal_praktik ON tb_dokter.kode_jadwal=tb_jadwal_praktik.kode_jadwal
                              ORDER BY tb_dokter.kode_dok ASC");


                                          
                                          $NO = 1;
                                            while ($row=@mysqli_fetch_array($TAMPIL)) {
                                          $NO;
                                          $Dokter         = $row['kode_dok'];
                                          $Nama         = $row['nama_dok'];
                                          $Alamat           = $row['alamat_dok'];
                                          $Telp          = $row['telp_dok'];

                                          $Poli         = $row['kode_poli'];
                                          $Nama_poli    = $row['nama_poli'];

                                          $Jadwal        = $row['kode_jadwal'];
                                          $Hari          = $row['hari'];
                                          $Mulai         = $row['jam_mulai'];
                                          $Selesai       = $row['jam_selesai'];
                                                                                    

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $Dokter; ?></td>
                                          <td><?php echo $Nama; ?></td>
                                          <td><?php echo $Alamat; ?></td>
                                          <td><?php echo $Telp; ?></td>
                                          <td><?php echo $Nama_poli; ?></td>
                                          <td><?php echo $Hari; echo ","; echo $Mulai; echo "-"; echo $Selesai; ?></td>
                                          <td>

                                             <a href="index.php?page=dokter&aksi=edit&id=<?php echo $Dokter; ?>"class="btn-md btn btn-theme" data-toogle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>
                                            
                                             <a href="../pages/dokter/hapus.php?kode_dok=<?php echo $row['kode_dok'];?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i></a>
                                                    

                                            
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