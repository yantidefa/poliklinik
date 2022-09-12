<!DOCTYPE html>
<html>
<head>
  <title>Form Input Data Baru</title>
</head>
<body> 
<?php 
$ID     =$_GET['id'];
$EDIT   ="SELECT tb_pegawai.*, tb_login.* FROM tb_pegawai INNER JOIN tb_login on tb_login.nip=tb_pegawai.nip WHERE tb_pegawai.nip='$ID' " or die("Gagal melakukan query !!!".mysqli_error());
$HASILEDIT  =   mysqli_query($koneksi, $EDIT);
while ($ROW =   mysqli_fetch_array($HASILEDIT)) {
$Nip        =   $ROW['nip'];
$Nama       =   $ROW['nama_peg'];
$Alamat     =   $ROW['alamat_peg'];
$Telp       =   $ROW['telp_peg'];
$jk         =   $ROW['jenis_kelamin_peg'];
$Username   =   $ROW['username'];
$Password   =   $ROW['password'];
$Status     =   $ROW['type_user'];

}
 ?>
        <!-- BASIC FORM VALIDATION -->
        <div class="">
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
                 <li class="breadcrumb-item active" aria-current="page">| Edit Pegawai |</li>
                </ol>
               </div>
              </div>
            </div>
          </div>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
             <h3>Edit Data Pegawai</h3>
             <hr>
             <?php 
             if (@$_POST['edit']) {
               include"proses_edit.php";
             }
              ?>
          <form role="form" class="form-horizontal style-form" action="../pages/pegawai/proses_edit.php" method="post" name="Input">
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">NIP</label>
                  <div class="col-lg-10">
                    <input type="text" id="nip" class="form-control" name="nip" value="<?php echo $Nip; ?>" required readonly>
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">Nama</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="l-name" class="form-control" name="nama_peg" value="<?php echo $Nama; ?>">
                    <p class="help-block" ></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Alamat</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="email2" class="form-control" name="alamat_peg" value="<?php echo $Alamat; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">No Telp</label>
                  <div class="col-lg-10">
                    <input type="number" id="telp_peg" class="form-control" name="telp_peg" value="<?php echo $Telp; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-error">
                  <label class="col-lg-2 control-label">JK</label>
                  <div class="col-lg-10">
                    <input type="radio" name="jenis_kelamin_peg" id="Pria" value="Pria" <?php if($jk=="Pria") {echo 'Checked';} ?> required="required">Pria
                    <input type="radio" name="jenis_kelamin_peg" id="Wanita" value="Wanita" <?php if($jk=="Wanita") {echo 'Checked';} ?> required="required">Wanita
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-lg-2 control-label">Status</label>
                  <div class="col-lg-10">
                  <select name="type_user" style="width: 50%" class="form-control select2">
                    <option required>-- Status --</option>
                    <option value="Admin" <?php if($Status=="Admin") {echo "selected=\"selected=\"";} ?>>Admin</option>
                    <option value="Dokter" <?php if($Status=="Dokter") {echo "selected=\"selected=\"";} ?>>Dokter</option>
                    <option value="Kasir" <?php if($Status=="Kasir") {echo "selected=\"selected=\"";} ?>>Kasir</option>
                    <option value="Pendaftar" <?php if($Status=="Pendaftar") {echo "selected=\"selected=\"";} ?>>Pendaftar</option>
                  </select>
                </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Username</label>
                  <div class="col-lg-10">
                    <input type="text" placeholder="" id="email2" class="form-control" name="username" value="<?php echo $Username; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group has-warning">
                  <label class="col-lg-2 control-label">Password</label>
                  <div class="col-lg-10">
                    <input type="password" placeholder="" id="email2" class="form-control" name="password" value="<?php echo $Password; ?>">
                    <p class="help-block"></p>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10">
                    <button class="btn-md btn btn-theme" data-toogle="tooltip" data-placement="bottom" title="Edit" name="edit"><i class="fa fa-edit" value></i>Edit</button>
                    <button type="reset" class="btn-md btn btn-theme">Hapus</button>
                    <a href="index.php?page=pegawai&aksi=tampil" class="btn-md btn btn-theme" data-toogle="tooltip" data-placement="bottom" title="Batal"><i class="fa fa-times"></i> Batal</a>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->   
</body>
</html>