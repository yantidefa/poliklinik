<?php 


@$page = $_GET['aksi'];




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
      
          <!-- general form elements -->
        
            

            <!-- /.box-header -->
            <!-- form start -->
            <?php
@$page = $_GET ['tambah']
            ?>
            
            <div class="form-panel">
             <h3>Tambah Pegawai</h3>
             <hr>
              <form role="form" class="form-horizontal style-form "  method="post" name="Input" action="../pages/pegawai/proses_tambah.php">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">NIP</label>
                  <div class="col-lg-10">
                    <input type="text" id="nip" class="form-control" name="nip" value="<?php echo autonumber('tb_pegawai','nip',7,'PGW'); ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Nama</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="nama_peg" class="form-control" name="nama_peg">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Alamat</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="email2" class="form-control" name="alamat_peg">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">No Telp</label>
                  <div class="col-lg-10">
                    <input type="number" placeholder="" id="email2" class="form-control" name="telp_peg">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">JK</label>
                  <div class="col-lg-10">
                    <input type="radio" name="jenis_kelamin_peg" value="1" checked="checked">Pria
                    <input type="radio" name="jenis_kelamin_peg" value="2">Wanita
                    <p class="help-block"></p>
                  </div>
                </div>
                
                 <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Status</label>
                  <div class="col-lg-10">
                  <select name="type_user" style="width: 50%" class="form-control select2">
                    <option required>-- Status --</option>
                    <option value="Admin">Admin</option>
                    <option value="Dokter">Dokter</option>
                    <option value="Kasir">Kasir</option>
                    <option value="Pendaftar">Pendaftar</option>
                  </select>
                </div>
                </div>

                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Username</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="email2" class="form-control" name="username">
                    <p class="help-block"></p>
                  </div>
                </div>

                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Password</label>
                  <div class="col-lg-10">
                    <input type="password" placeholder="" id="email2" class="form-control" name="password">
                    <p class="help-block"></p>
                  </div>
                </div>
                
               
              <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="tambah"><i class="glyphicon glyphicon-plus" value></i> Tambahkan</button>
              <a href="index.php?page=pegawai&aksi=tampil" class="btn-md btn btn-primary" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
                </form>
            </div>
          <!-- /.box -->


