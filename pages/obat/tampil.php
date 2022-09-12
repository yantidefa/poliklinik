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
                             <h4>Data Obat</h4>
                             <hr>
                             <div>
                            <a href="index.php?page=obat&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
                            <a href="../laporan/laporan_obat.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data" target="_blank"><i class="glyphicon glyphicon-book"></i> Laporan</a>
                           </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Obat</th>
                                            <th>Nama Obat</th>
                                            <th>Merk</th>
                                            <th>Satuan</th>
                                            <th>Harga Jula</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          $TAMPIL = "SELECT * FROM tb_obat";
                                          $HASIL = @mysqli_query($koneksi,$TAMPIL);
                                          $NO = 1;
                                            while ($row=@mysqli_fetch_array($HASIL)) {
                                          $NO;
                                          $Obat         = $row['kode_obat'];
                                          $Nama         = $row['nama_obat']; 
                                          $Merk         = $row['merk'];
                                          $Satuan       = $row['satuan'];   
                                          $Harga         = $row['harga_jual'];                                      

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $Obat; ?></td>
                                          <td><?php echo $Nama; ?></td>
                                          <td><?php echo $Merk ?></td>
                                          <td><?php echo $Satuan ?></td>
                                          <td><?php echo $Harga; ?></td>
                                          
                                          <td>
                                             <div class="btn-group">
                                                    <button type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
                                                      <span class="caret"></span>
                                                      </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                      <li><a href="index.php?page=obat&aksi=edit&id=<?php echo $Obat; ?>">Edit</a></li>
                                                      <li class="divider"></li>
                                                      <li><a href="../pages/obat/hapus.php?kode_obat=<?php echo $row['kode_obat'];?>">Delete</a></li>
                                                    
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