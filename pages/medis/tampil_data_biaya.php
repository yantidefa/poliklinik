                <!-- TABEL -->
                <div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered custom-table mb-0 table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Biaya</th>
                                <th class="text-center">Tarif</th>
                                <th class="text-center">Kode Pemeriksaan</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query_biaya = mysqli_query($koneksi,"SELECT tb_rekam_medis_biaya.*, tb_jenis_biaya.*
                                FROM tb_rekam_medis_biaya
                                INNER JOIN tb_jenis_biaya on tb_rekam_medis_biaya.kode_jenis_biaya = tb_jenis_biaya.kode_jenis_biaya WHERE kode_pemeriksaan = '$ID' ");
                                $no = 1;
                                while ($data = @mysqli_fetch_array($query_biaya))
                                {
                                    $Kode = $data['kode_pemeriksaan'];
                            ?>                    
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['nama_biaya'] ;?></td>
                                <td><?php echo $data['tarif'] ; ?></td>
                                <td><?php echo $Kode ?></td>
                                <td >
                                    <a href="../pages/medis/hapus_biaya.php?id_rekam_medis_biaya=<?=$data['id_rekam_medis_biaya'];?>&id=<?php echo $data['kode_pemeriksaan']; ?> " class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i> </a>
                                                                         

                                </td>
                            </tr>
                            <?php
                            $no++;
                            };
                            ?>                    
                        </tbody>
                    </table>
                </div>
            </div>
         </div>   
    </div>
</div>