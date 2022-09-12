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
                             <h4>Data Poli</h4>
                             <hr>
                             <div>
                            <a href="index.php?page=poli&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Poliklinik</a>
                            <a href="../laporan/laporan_poli.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data" target="_blank"><i class="glyphicon glyphicon-book"></i> Laporan</a>
                           </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Poli</th>
                                            <th>Nama Poli</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          include ("koneksi.php");
                                          $TAMPIL = "SELECT * FROM tb_poliklinik";
                                          $HASIL = @mysqli_query($koneksi,$TAMPIL);
                                          $NO = 1;
                                            while ($row=@mysqli_fetch_array($HASIL)) {
                                          $NO;
                                          $Poli         = $row['kode_poli'];
                                          $Nama         = $row['nama_poli'];                                       

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $Poli; ?></td>
                                          <td><?php echo $Nama; ?></td>
                                          
                                          <td>
                                            
                                                  
                                            <a href="index.php?page=poli&aksi=edit&id=<?php echo $Poli; ?>"class="btn-md btn btn-theme" data-toogle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a>

                                                     <a href="../pages/poli/hapus.php?kode_poli=<?php echo $row['kode_poli'];?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i> </a>
                                                 
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