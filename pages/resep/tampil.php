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
                             <h4>Data Resep</h4>
                             <hr>
                             <div class="text-right">
                            <a href="index.php?page=resep&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Resep</a>
                            <a href="../laporan/laporan_resep.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data" target="_blank"><i class="glyphicon glyphicon-book"></i> Laporan</a>
                           </div>
                        </div>
                        <br>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Resep</th>
                                            <th>Dosis</th>
                                            <th>Jumlah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          $TAMPIL = "SELECT * FROM tb_resep";
                                          $HASIL = @mysqli_query($koneksi,$TAMPIL);
                                          $NO = 1;
                                            while ($row=@mysqli_fetch_array($HASIL)) {
                                          $NO;
                                          $Resep         = $row['kode_resep'];
                                          $Dosis         = $row['dosis'];   
                                          $Jumlah        = $row['jumlah'];                                    

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $Resep; ?></td>
                                          <td><?php echo $Dosis; ?></td>
                                          <td><?php echo $Jumlah; ?></td>

                                                                                      
                                          <td>
                                            
                                                  
                                                      <a href="index.php?page=resep&aksi=edit&id=<?php echo $Resep; ?>"class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a></li>
                                                      
                                                      <a href="../pages/resep/hapus.php?kode_resep=<?php echo $row['kode_resep'];?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i> </a>
                                              
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