<?php 

$penjualan = array();
$ambil = $koneksi->query("SELECT * FROM penjualan LEFT JOIN produk ON penjualan.id_produk = produk.id_produk");
while($tiap = $ambil->fetch_assoc())
{
	$penjualan[] = $tiap;
}
// echo "<pre>";
// print_r ($penjualan);
// echo "</pre>";
$total_penjualan = count($penjualan);

$pembelian = array();
$ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN produk ON pembelian.id_produk = produk.id_produk");
while($tiap = $ambil->fetch_assoc())
{
  $pembelian[] = $tiap;
}
$total_pembelian = count($pembelian);

$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk");
while($tiap = $ambil->fetch_assoc())
{
	$produk[] = $tiap;
}

// tampilkan hasil dari stok produk 

// tampilkan jumlah stok_produk dimisalkan total dari tabel produk
$ambil_stok = $koneksi->query("SELECT SUM(stok_produk) AS total FROM produk");
$detail_stok = $ambil_stok->fetch_assoc();


// $total_p = array();
// $ambil_penjualan = $koneksi->query("SELECT SUM(nominal_penjualan) AS total FROM `penjualan` GROUP BY MONTH(tanggal_penjualan);");
// while($detail_penjualan = $ambil_penjualan->fetch_assoc())
// {
//   $total_p[] = $detail_penjualan;
// }


$bulan = array();
$ambil_bulan = $koneksi->query("SELECT tanggal_penjualan AS bulan FROM penjualan GROUP BY MONTH(tanggal_penjualan)");
while($tiap_bulan = $ambil_bulan->fetch_assoc())
{
  $bulan[] = $tiap_bulan;
}


$bulans['01'] = "Januari";
$bulans['02'] = "Februari";
$bulans['03'] = "Maret";
$bulans['04'] = "April";
$bulans['05'] = "Mei";
$bulans['06'] = "Juni";
$bulans['07'] = "Juli";
$bulans['08'] = "Agustus";
$bulans['09'] = "September";
$bulans['10'] = "Oktober";
$bulans['11'] = "November";
$bulans['12'] = "Desember";

$tahun = date("Y");

$grafik_penjualan = array();

foreach ($bulans as $nobul => $nabul) {
  $ambil = $koneksi->query("SELECT SUM(nominal_penjualan) AS jumlah FROM penjualan
    WHERE MONTH(tanggal_penjualan)='$nobul' AND YEAR(tanggal_penjualan)='$tahun' ");

  $tiap= $ambil->fetch_assoc();
  


  $grafik_penjualan[$nobul]['nama_bulan'] = $nabul;
  $grafik_penjualan[$nobul]['jumlah'] = $tiap['jumlah'];
} 

?>
<div class="d-inline input-group my-3">
	<h3 style="font-weight: 20;">Dashboard Admin <strong class="text-muted" style="font-weight: 7; font-size: 15px;">Selamat Datang <?php echo strtoupper($_SESSION["admin"]["nama_admin"]); ?></strong> </h3> 
</div>

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="card bg-primary border-0">
        <div class="card-body">
          <span class="text-white bi bi-cart icon"></span>
          <h1 class="text-white"><?php echo $detail_stok["total"]; ?></h1>    
        </div>
        <div class="card-body text-white">Stok Keseluruhan Produk</div>
      </div>

    </div>
    <div class="col-md-3">
      <div class="card bg-danger border-0">
        <div class="card-body">
          <h1 class="text-white"><?php echo $total_pembelian; ?></h1>    
        </div>
        <div class="card-body text-white">Pembelian</div>
      </div>

    </div>
    <div class="col-md-3">
      <div class="card bg-secondary border-0">
        <div class="card-body">
          <h1 class="text-white"><?php echo $total_penjualan ?></h1>    
        </div>
        <div class="card-body text-white">Penjualan</div>
      </div>

    </div>
  </div>
</div>

<div class="container">
  <div class="row mt-3">
    <?php foreach ($produk as $key => $value): ?>
      <div class="col-md-3">
        <div class="card bg-info border-0">
          <div class="card-body">
            <h1 class="text-dark" style="border-bottom: 1px solid black; width: 40%"><?php echo $value["stok_produk"]; ?></h1>    
          </div>
          <div class="card-body text-dark">Stok <?php echo $value["nama_produk"]; ?>

        </div>
      </div>

    </div>
  <?php endforeach ?>
</div>
</div>

<div class="container my-5 bg-white rounde p-5 shadow"> 
	<div id="isi_grafik">
		
	</div>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script>
    Highcharts.chart('isi_grafik', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Statistik Data Penjualan'
      },
      subtitle: {
        text: 'Source: aplikasipendataan.com'
      },
      xAxis: {
        categories: [
          <?php foreach ($grafik_penjualan as $key => $value): ?>


            '<?php echo $value['nama_bulan']; ?>',
          <?php endforeach ?>
          ],
        crosshair: true
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Rainfall (mm)'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: [{
        name: 'Penjualan',
        data: [

          <?php foreach ($grafik_penjualan as $key => $value): ?>
            <?php echo $value["jumlah"]; ?>,
          <?php endforeach ?>
          ]

      }]
    });
  </script>

</div>


