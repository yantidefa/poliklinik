<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<?php 
$query_informasi = mysqli_query($koneksi, "SELECT * FROM tb_informasi WHERE id_informasi = '1' ");
$informasi = @mysqli_fetch_array($query_informasi);

 ?>


 <!-- BASIC FORM ELELEMNTS -->
<style type="text/css">
  hr {
    width: 1200px;
  border-top: 3px solid #9999;
  }
</style>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <div class="panel-body">
                <ol class="breadcrumb">
                  <li>
                     <a href="index.php">| Beranda | </a>
                  </li>
                 <li class="active">
                     <a href="?page=info"> | Informasi Poliklinik |</a>
                 </li>
                </ol>
               </div>
               <hr>
              <h3 class="mb">Data Informasi Instansi Poliklinik</h3>
              <?php 
              if (@$_POST['edit_info']) {
                include "proses_edit.php";
              }
              if (@$_POST['edit_logo']) {
                include "proses_edit_logo.php";
              }
               ?>
              <form class="form-horizontal style-form" role="form" method="post">
                <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Nama Instansi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_poliklinik" name="nama_poliklinik" value="<?php echo $informasi ['nama_poliklinik']?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Deskripsi</label>
                  <div class="col-sm-10">
                    <textarea type="text" class="form-control round-form" id="deskripsi_poliklinik" name="deskripsi_poliklinik" required><?php echo $informasi ['deskripsi_poliklinik']?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" id="alamat_poliklinik" name="alamat_poliklinik" required type="text" value="This is focused..."><?php echo $informasi ['alamat_poliklinik']?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Kecamatan</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="kec_poliklinik" name="kec_poliklinik" type="text" value="<?php echo $informasi ['kec_poliklinik']?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Kabupaten</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="kab_poliklinik" name="kab_poliklinik" value="<?php echo $informasi ['kab_poliklinik']?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Provinsi</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="prov_poliklinik" name="prov_poliklinik" value="<?php echo $informasi ['prov_poliklinik']?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Kode Pos</label>
                  <div class="col-lg-10">
                    <input type="number" name="kode_pos_poliklinik" id="kode_pos_poliklinik" class="form-control" value="<?php echo $informasi ['kode_pos_poliklinik']?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Telepon</label>
                  <div class="col-lg-10">
                    <input type="number" name="telp_poliklinik" id="telp_poliklinik" class="form-control" value="<?php echo $informasi ['telp_poliklinik']?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 col-md-12 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_poliklinik" name="email_poliklinik" value="<?php echo $informasi ['email_poliklinik']?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="submit" id="edit_info" class="btn btn-theme" name="edit_info" value="Perbarui Informasi">
                  </div>
                </div>
                </form>

                <form role="form" method="post" enctype="multipart/form-data" class="form-horizontal style-form">
                  <div class="form-group">
                  <label class="col-lg-10" for="foto">foto sebelumnya</label>
                  <div class="ol-lg-12 col-md-12">
                  <img src="../pages/images/<?php echo $informasi ['logo_poliklinik'] ?>" alt="logo" width="200px" />
                   </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-2 col-md-2" for="foto">Perbarui Foto</label>
                  <div class="col-lg-3 col-md-3">
                    <input class="form-control" type="file" id="foto" name="foto">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                    <input type="submit" name="edit_logo" class="btn btn-theme" value="Perbarui Logo">
                  </div>
                </div>
                </form>
              
            </div>
          </div>
          <!-- col-lg-12-->
        </div>
        <!-- /row -->
        
        
          </div>
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
</body>
</html>