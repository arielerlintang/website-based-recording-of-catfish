<?php 
include '../koneksi.php';

// jika tidak ada sesi admin maka alihkan dia ke halaman login
if (!isset($_SESSION["admin"]))
{
  echo "<script>alert('Anda Harus Login')</script>";
  echo "<script>location='../index.php'</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <style type="text/css">
    ul li
    {
      transition: 1s;
    }
    ul li:hover
    {
     background-color: #d9dad9;
   }
   #dashboard{
    background-color: #727575;
  }
</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.108.0">
<title>Trainit Yusuf</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script src="../assets/js/jquery-3.5.1.js"></script>

<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
<link href="../assets/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="../assets/css/dashboard.css" rel="stylesheet">
<!-- j query button -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
<script src="../asset/js/jquery-3.5.1.js"></script>
<style type="text/css">
 .logo
 {
  width: 200px;
}

</style>
</head>
<body>
  <header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="#">APK Pendataan</a>
    <div class="text-white ms-auto"><i class="bi bi-calendar-day"></i> <span id="tanggalwaktu"></span>|</div>
    <script>
      var tw = new Date();
      if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
        else (a=tw.getTime());
      tw.setTime(a);
      var tahun= tw.getFullYear ();
      var hari= tw.getDay ();
      var bulan= tw.getMonth ();
      var tanggal= tw.getDate ();
      var hariarray=new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
      var bulanarray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
      document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun+"/ Jam : " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes() + (" W.I.B ");
    </script>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="nav-item text-nowrap">

      <a class="nav-link px-3 text-white" href="logout.php"><i class="bi bi-box-arrow-right"></i> Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark text-white shadow sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <div class="text-center mb-2">
          <img src="../assets/logo/logo.png" class="img-fluid w-50 rounded-circle">
          <h6>Hi <?php echo $_SESSION["admin"]["nama_admin"];  ?></h6>
        </div>
        <ul class="nav flex-column">
          <li class="nav-item" id="dashboard">
            <a class="nav-link active" aria-current="page" href="index.php">
              <i class="bi bi-house"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?page=profil" style="color: gray;">
              <i class="bi bi-person-circle"></i>
              Profil
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?page=produk" style="color: gray;">
              <i class="bi bi-boxes"></i>
              Produk
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?page=kolam"  style="color: gray;">
              <i class="bi bi-droplet"></i>
              Kolam
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?page=pakan" style="color: gray;">
              <i class="bi bi-database"></i>
              Pakan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?page=peremajaan" style="color: gray;">
              <i class="bi bi-clipboard2-data"></i>
              Peremajaan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?page=pembelian" style="color: gray;">
              <i class="bi bi-cart"></i>
              Pembelian
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?page=pembelian_skala" style="color: gray;">
              <i class="bi bi-cart"></i>
              Pembelian Skala
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?page=penjualan" style="color: gray;">
              <i class="bi bi-tag"></i>
              Penjualan
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <span>Laporan</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle" class="align-text-bottom"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=laporan_pembelian" style="color: gray;">
              <i class="bi bi-calendar"></i>
              Laporan Pembelian
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=laporan_penjualan" style="color: gray;">
              <i class="bi bi-calendar"></i>
              Laporan Penjualan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=laporan_keuntungan" style="color: gray;">
              <i class="bi bi-wallet"></i>
              Laporan Keuntungan
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 bg-light vh-100">
      <?php 
// jika tidak ada page di url maka include (panggil halaman dashboard)
      if (!isset($_GET["page"]))
      {
        include 'dashboard.php';
      }
// selain itu jika page samadengan input maka include input.php
      elseif ($_GET["page"]=="input")
      {
        include 'input.php';
      }
      elseif ($_GET["page"]=="produk")
      {
        include 'produk.php';
      }
      elseif ($_GET["page"]=="produk_tambah")
      {
        include 'produk_tambah.php';
      } 
      elseif ($_GET["page"]=="produk_ubah")
      {
        include 'produk_ubah.php';
      }
      elseif ($_GET["page"]=="produk_detail")
      {
        include 'produk_detail.php';
      }
      elseif ($_GET["page"]=="produk_hapus")
      {
        include 'produk_hapus.php';
      }
      elseif ($_GET["page"]=="pembelian")
      {
        include 'pembelian.php';
      }
      elseif ($_GET["page"]=="pembelian_tambah")
      {
        include 'pembelian_tambah.php';
      }
      elseif ($_GET["page"]=="pembelian_detail")
      {
        include 'pembelian_detail.php';
      }
      elseif ($_GET["page"]=="pembelian_ubah")
      {
        include 'pembelian_ubah.php';
      }
      elseif ($_GET["page"]=="pembelian_hapus")
      {
        include 'pembelian_haus.php';
      }
      elseif ($_GET["page"]=="pakan")
      {
        include 'pakan.php';
      }
      elseif ($_GET["page"]=="pakan_tambah")
      {
        include 'pakan_tambah.php';
      }
      elseif ($_GET["page"]=="pakan_ubah")
      {
        include 'pakan_ubah.php';
      }
      elseif ($_GET["page"]=="pakan_hapus")
      {
        include 'pakan_hapus.php';
      }
      elseif ($_GET["page"]=="pakan_detail")
      {
        include 'pakan_detail.php';
      }
      elseif ($_GET["page"]=="kolam")
      {
        include 'kolam.php';
      }
      elseif ($_GET["page"]=="kolam_tambah")
      {
        include 'kolam_tambah.php';
      }
      elseif ($_GET["page"]=="kolam_ubah")
      {
        include 'kolam_ubah.php';
      }
      elseif ($_GET["page"]=="kolam_hapus")
      {
        include 'kolam_hapus.php';
      }
      elseif ($_GET["page"]=="kolam_detail")
      {
        include 'kolam_detail.php';
      }
      elseif ($_GET["page"]=="penjualan")
      {
        include 'penjualan.php';
      }
      elseif ($_GET["page"]=="penjualan_tambah")
      {
        include 'penjualan_tambah.php';
      }
      elseif ($_GET["page"]=="penjualan_ubah")
      {
        include 'penjualan_ubah.php';
      }
      elseif ($_GET["page"]=="penjualan_hapus")
      {
        include 'penjualan_hapus.php';
      }
      elseif ($_GET["page"]=="penjualan_detail")
      {
        include 'penjualan_detail.php';
      }
      elseif ($_GET["page"]=="peremajaan")
      {
        include 'peremajaan.php';
      }
      elseif ($_GET["page"]=="peremajaan_tambah")
      {
        include 'peremajaan_tambah.php';
      }
      elseif ($_GET["page"]=="peremajaan_ubah")
      {
        include 'peremajaan_ubah.php';
      }
      elseif ($_GET["page"]=="peremajaan_detail")
      {
        include 'peremajaan_detail.php';
      }
      elseif ($_GET["page"]=="profil")
      {
        include 'profil.php';
      }
      elseif ($_GET["page"]=="laporan_pembelian")
      {
        include 'laporan_pembelian.php';
      }
      elseif ($_GET["page"]=="laporan_penjualan")
      {
        include 'laporan_penjualan.php';
      }
     elseif ($_GET["page"]=="pembelian_skala")
      {
        include 'pembelian_skala.php';
      }
      elseif ($_GET["page"]=="pembelian_skala_tambah")
      {
        include 'pembelian_skala_tambah.php';
      }
      elseif ($_GET["page"]=="laporan_keuntungan")
      {
        include 'laporan_keuntungan.php';
      }
      elseif ($_GET["page"]=="print_penjualan")
      {
        include 'print_penjualan.php';
      }

      ?>

    </main>
  </div>
</div>


<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap5.min.js"></script>

<!--  -->
 <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script>
      $('#table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
        ]
      } );
    </script>

<!--  -->

<script>
  $(document).ready(function () {
    $('#table').DataTable();
  });
</script>


</body>
</html>
