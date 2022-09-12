



<div class="panel-body" >
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Jenis Biaya</th>
                                            <th>Nama Biaya</th>
                                            <th>Tarif</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                          <?php 
                                          include ("../inc/koneksi.php");
                                          $TAMPIL = "SELECT * FROM tb_jenis_biaya";
                                          $HASIL = @mysqli_query($koneksi,$TAMPIL);
                                          $NO = 1;
                                            while ($row=@mysqli_fetch_array($HASIL)) {
                                          $NO;
                                          $Biaya         = $row['kode_jenis_biaya'];
                                          $Nama         = $row['nama_biaya']; 
                                          $Tarif         = $row['tarif'];
                                                                               

                                       ?>
                                          <td><?php echo $NO; ?></td>
                                          <td><?php echo $Biaya; ?></td>
                                          <td><?php echo $Nama; ?></td>
                                          <td><?php echo $Tarif ?></td>
                                          
                                          
                                          <td>
                                             <div class="btn-group">
                                                    <button type="button" class="btn btn-theme03 dropdown-toggle" data-toggle="dropdown">
                                                      <span class="caret"></span>
                                                      </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                      <li><a href="index.php?page=biaya&aksi=edit&id=<?php echo $Biaya; ?>">Edit</a></li>
                                                      <li class="divider"></li>
                                                      <li><a href="../pages/biaya/hapus.php?kode_jenis_biaya=<?php echo $row['kode_jenis_biaya'];?>">Delete</a></li>
                                                    
                                                    </ul>
                                              </div>
                                          </td>
                                        </tr>
                                      <?php 
                                    $NO++;
                                    }
                                     ?>
                                       
                                       

                                    </tbody>
                                </table>
                            </div>
                            
                        </div>