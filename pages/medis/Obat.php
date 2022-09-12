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
                                <th class="text-center">Nama Obat</th>
                                <th class="text-center">Merk</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query_biaya = mysqli_query($koneksi,"SELECT tb_rekam_medis_obat.*, tb_obat.*
                                FROM tb_rekam_medis_obat
                                INNER JOIN tb_obat on tb_rekam_medis_obat.kode_obat = tb_obat.kode_obat WHERE kode_pemeriksaan_obat = '$ID' ");
                                $no = 1;
                                while ($data = @mysqli_fetch_array($query_biaya))
                                {
                            ?>                    
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $data['nama_obat'] ;?></td>
                                <td><?php echo $data['merk'] ; ?></td>
                                <td><?php echo $data['satuan']; ?></td>
                                <td><?php echo $data['harga_jual']; ?></td>
                                <td >
                                    <a href="../pages/medis/hapus_obat.php?id_rekam_medis_obat=<?=$data['id_rekam_medis_obat'];?>&id=<?php echo $data['kode_pemeriksaan_obat']; ?> " class="btn-md btn btn-danger" data-toogle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-o"></i> </a>
                                                                         

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