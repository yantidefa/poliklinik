<div class="wrapper">
  <div class="row">
    <section>
      <header class="panel-heading">
        
      </header>
      <?php 
      @$page = $_GET['aksi'];
  switch ($page) {
    case 'proses_hapus':
      include "proses_hapus.php";
      break;
    default:
      include "tampil.php";
      break;
    }
       ?>
    </section>
  </div>
</div>