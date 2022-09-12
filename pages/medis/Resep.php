<?php $ID     =$_GET['id']; ?>

<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr>
                    <th>NO</th>
                                            
                    <th>Dosis</th>
                    <th>Jumlah</th>
                                          
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                  <?php
                    $query_biaya = mysqli_query($koneksi,"SELECT tb_rekam_medis_resep.*, tb_resep.*
                                FROM tb_rekam_medis_resep
                    INNER JOIN tb_resep on tb_rekam_medis_resep.kode_resep = tb_resep.kode_resep WHERE kode_pemeriksaan_resep = '$ID' ");
                    $NO = 1;
                   while ($data = @mysqli_fetch_array($query_biaya))
                    {
                   ?>
                    <td><?php echo $NO; ?></td>
                                          
                    <td><?php echo $data['dosis']; ?></td>
                    <td><?php echo $data['jumlah']; ?></td>
                                          
                    <td>
                                            
                    <a href="../pages/medis/hapus_resep.php?id_rekam_medis_resep=<?=$data['id_rekam_medis_resep']?>"class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i> </a>

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
     