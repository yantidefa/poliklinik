                <?php 
            $id=$_GET['id'];
            ?>
            <?php

             $EDIT = "SELECT * FROM tb_dokter WHERE tb_dokter.kode_dok='$id'" or die("Gagal melakukan query !!!".mysqli_error());
                  $HASILEDIT = mysqli_query($koneksi,$EDIT);
            
                 while ($ROW=mysqli_fetch_array($HASILEDIT)) {

              $KODE              =$ROW['kode_dok'];
              $NAMA              =$ROW['nama_dok'];
              $ALAMAT            =$ROW['alamat_dok'];
              $TLP               =$ROW['telp_dok'];

              $KODE_POLI         =$ROW['kode_poli'];
              $KODE_JADWAL       =$ROW['kode_jadwal'];

              }
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
                     <a href="?page=dokter"> | Dokter |</a>
                 </li>
                 <li class="breadcrumb-item active" aria-current="page">| Edit Dokter |</li>
                </ol>
               </div>
              </div>
            </div>
          </div>
        
             <?php 
             if (@$_POST['edit']) {
               include"proses_edit.php";
             }
              ?>
            <div class="form-panel">
             <h3>Edit Dokter</h3>
             <hr>
              <form role="form" method="POST" action="../pages/dokter/proses_edit.php" class="form-horizontal style-form">
             <div class="box-body">


                <div class="form-group has-success">
                  <label for="kode_dok" class="col-lg-2 control-label">Kode Dokter </label>
                  <div class="col-lg-10">
                  <input type="#" class="form-control" id="kode_dok" name="kode_dok" value="<?php echo $KODE; ?>" readonly>
                </div>
                </div>


                <div class="form-group has-success">
                  <label for="nama_peg" class="col-lg-2 control-label">Nama Dokter </label>
                  <div class="col-lg-10">
                  <input type="text" class="form-control" name="nama_dok" value="<?php echo $NAMA; ?>" required>
                </div>
                </div>
               
            
                <div class="form-group has-success">
                  <label for="alamat_poliklinik" class="col-lg-2 control-label">Alamat</label>
                  <div class="col-lg-10">
                  <textarea type="text" class="form-control" name="alamat_dok" required><?php echo $ALAMAT; ?></textarea>
                </div>
                </div>


                <div class="form-group has-success">
                  <label for="exampleInputPassword1" class="col-lg-2 control-label">Telepon</label>
                  <div class="col-lg-10">
                  <input type="#" class="form-control" id="telp_dok" name="telp_dok" value="<?php echo $TLP; ?>">
                </div>
                </div>


                

                <div class="form-group has-success">
                  <label for="Poli" class="col-lg-2 control-label">Poli</label>
                  <div class="col-lg-10">
             <select class="form-control show-tick" name="kode_poli">
                  
                  <?php $TAMPIL = mysqli_query($koneksi, "SELECT * FROM tb_poliklinik ORDER BY tb_poliklinik.kode_poli ASC");
                  $NO=1;
                  while ($ROW=@mysqli_fetch_array($TAMPIL)) {
                     $NO;
                     $KODE_POLI           =$ROW['kode_poli'];
                     $NAMA_POLI           =$ROW['nama_poli'];
                   
                   ?>
                   <option value="<?php echo $KODE_POLI; ?>"><?php echo $NAMA_POLI; ?></option>
                 <?php } ?>
                 </select>
               </div>
                </div>
                <div class="form-group has-success">
                  <label for="Jadwal" class="col-lg-2 control-label">Jadwal</label>
                  <div class="col-lg-10">
                  <select class="form-control show-tick" name="jadwal">
                    
                       <?php 
                       $TAMPIL = mysqli_query($koneksi, "SELECT * FROM tb_jadwal_praktik ORDER BY tb_jadwal_praktik.kode_jadwal ASC");
                                        $NO=1;
                                        while ($ROW=@mysqli_fetch_array($TAMPIL)) {
                                           $NO;
                                            $KODE             =$ROW['kode_jadwal'];
                                            $HARI             =$ROW['hari'];
                                            $JAMMULAI         =$ROW['jam_mulai'];
                                            $JAMMSELESAI      =$ROW['jam_selesai'];
                   
                   ?>
                   <option value="<?php echo $KODE ?>"><?php echo $HARI; echo ","; echo $JAMMULAI; echo "-"; echo $JAMMSELESAI; ?></option>
                 <?php } ?>
                 </select>
               </div>
                  </div>
                
              
            </div>
              <!-- /.box-body -->

              <div class="box-footer">
                 <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Edit" name="edit"><i class="fa fa-pencil" value></i> Edit</button>
                
                 <a href="index.php?page=dokter" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
              </div>

  

            </form>
         
            </div>
            <!-- /form-panel -->
