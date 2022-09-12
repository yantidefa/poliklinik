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
                             <h4>Data Pasien</h4>
                             <hr>
                             <div>
                            <a href="index.php?page=pasien&aksi=tambah" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tamba Data"><i class="glyphicon glyphicon-plus"></i> Tambah Pasien</a>
                            <a href="../laporan/laporan_pasien.php" class="btn btn-round btn-primary" data-toogle="tooltip" data-placement="bottom" title="Tambah Data" target="_blank"><i class="glyphicon glyphicon-book"></i> Laporan</a>
                           </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Pasien</th>
                                            <th>Nama Pasien</th>
                                            <th>Alamat Pasien</th>
                                            <th>Telp Pasien</th>
                                            <th>Tanggal Lahir Pasien</th>
                                            <th>Jenis Kelamin Pasien</th>
                                            <th>Tanggal Reg</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          $TAMPIL = "SELECT * FROM tb_pasien";
                                          $HASIL = @mysqli_query($koneksi,$TAMPIL);
                                          $NO = 1;
                                            while ($row=@mysqli_fetch_array($HASIL)) {
                                          $NO;
                                          $Pasien             = $row['kode_pas'];
                                          $Nama_Pas           = $row['nama_pas'];   
                                          $Alamat             = $row['alamat_pas']; 
                                          $Telp_Pas           = $row['telp_pas']; 
                                          $Tgl_Pas            = $row['tanggal_lahir_pas']; 
                                          $Jenkel             = $row['jenis_kelamin_pas'];
                                          $Tgl_Reg            = $row['tanggal_reg'];                                     

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $Pasien; ?></td>
                                          <td><?php echo $Nama_Pas; ?></td>
                                          <td><?php echo $Alamat; ?></td>
                                          <td><?php echo $Telp_Pas; ?></td>
                                          <td><?php echo $Tgl_Pas; ?></td>
                                          <td><?php echo $Jenkel; ?></td>
                                          <td><?php echo $Tgl_Reg; ?></td>

                                                                                      
                                          <td>
                                            
                                                  
                                                      <a href="index.php?page=pasien&aksi=edit&id=<?php echo $Pasien; ?>"class="btn-md btn btn-theme" data-toogle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i></a></li>
                                                      
                                                      <a href="../pages/pasien/hapus.php?kode_pas=<?php echo $row['kode_pas'];?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i> </a>
                                              
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