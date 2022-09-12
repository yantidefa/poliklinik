<?php 


@$PAGE = $_GET['page'];


 ?>

<?php
function autonumber($tabel, $kolom, $lebar=0, $awalan){
  include 'koneksi.php';

  //proses auto number
  $auto = mysqli_query($koneksi, "select $kolom from $tabel order by $kolom desc limit 1") or die(mysqli_error());
  $jumlah_record = mysqli_num_rows($auto);
  if($jumlah_record == 0)
    $nomor = 1;

  else {
    $row = mysqli_fetch_array($auto);
    $nomor = intval(substr($row[0], strlen($awalan)))+1;
  }
  if ($lebar>0) 
  $angka = $awalan.str_pad ($nomor, $lebar, "0", STR_PAD_LEFT);
    else
    $angka=$awalan.$nomor;
    return $angka;
  }
//echo autonumber("tb_pegawai","nip",7,"PGW");
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
                 <li class="breadcrumb-item active" aria-current="page">| Tambah Dokter |</li>
                </ol>
               </div>
              </div>
            </div>
          </div>
          <div class="">
            <div class="form-panel">
             <h3>Tambah Data dokter</h3>
             <hr>
              <div class="box-header with-border">
             
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form  action="../pages/dokter/proses_tambah.php" role="form" method="POST" class="form-horizontal style-form">
             <div class="box-body">
                <div class="form-group has-success">
                  <label for="kode_dok" class="col-lg-2 control-label">Kode Dokter </label>
                   <div class="col-lg-10">
                  <input type="#" class="form-control" id="kode_dok" name="kode_dok" value="<?php echo autonumber("tb_dokter","kode_dok",6,"DOKT"); ?>" required readonly>
                  </div>
                </div>


                <div class="form-group has-success">
                  <label for="nama_dok" class="col-lg-2 control-label">Nama  </label>
                  <div class="col-lg-10">
                  <input type="nama_poliklinik" class="form-control" id="nama_dok" name="nama_dok" value="" >
                  </div>
                </div>
               
            
                <div class="form-group has-success">
                  <label for="alamat_dok" class="col-lg-2 control-label">Alamat</label>
                  <div class="col-lg-10">
                  <textarea type="text" class="form-control" id="alamat_dok" name="alamat_dok"></textarea>
                </div>
                </div>

                <div class="form-group has-success">
                  <label for="exampleInputPassword1" class="col-lg-2 control-label" >Telp</label>
                  <div class="col-lg-10">
                  <input type="#" class="form-control" id="telp_dok" name="telp_dok">
                </div>
                </div>
                <div class="form-group has-success">
                  <label for="Poli" class="col-lg-2 control-label">Poli</label>
                  <div class="col-lg-10">
             <select class="form-control show-tick" name="poli" style="width: 30%">
                  <option>------ Poliklinik ------</option>
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
                  <select class="form-control show-tick" name="jadwal"  style="width: 30%">
                    <option>------ Jadwal ------</option>
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
                <button type="submit" name="tambah" class="btn btn-primary" value="tambah data"><i class="fa fa-plus"></i> Tambah</button>
                <a href="index.php?page=dokter" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
              </div>

  

            </form>
          </div>
          <!-- /.box -->


            </div>
            <!-- /form-panel -->
          
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->   