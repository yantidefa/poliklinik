<link href="../assets/css/style.css" rel="stylesheet" />
<!-- page start-->
        <section class="">
            <header class="panel-heading">
            </header>
            <?php
            @$page = $_GET['aksi'];
            switch ($page) {
                case 'tambah':
                    include 'tambah.php';
                    break;
                case 'tambah_biaya':
                    include 'proses_tambah_biaya.php';
                    break;
                case 'edit':
                    include 'edit.php';
                    break;
                case 'rincian_transaksi':
                    include 'rincian_transaksi.php';
                    break;
                case 'detail_data':
                    include 'detail_data.php';
                    break;
                case 'konfirmasi':
                        include 'konfirmasi.php';
                        break;
                case 'hapus':
                    include 'hapus.php';
                    break;
                case 'hapus_biaya':
                    include 'hapus_biaya.php';
                    break;
                default:
                    include 'tampil.php';
                    break;
            }
            ?>
        </section>

<!-- page end-->
