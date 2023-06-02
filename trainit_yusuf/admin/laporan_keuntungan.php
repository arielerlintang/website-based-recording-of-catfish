<div class="container">
	<div class="row">
		<div class="col-md-12 shadow rounded bg-white p-5 mt-5">
			<h6>Laporan Keuntungan</h6>
			
		</div>
	</div>
</div>

<!-- laporan pembelian -->
<?php 

$tampil_pembelian = array();
if (isset($_POST["mulai"]) AND $_POST["selesai"])
{
	$mulai = $_POST["mulai"];
	$selesai = $_POST["selesai"];

	$ambil_pembelian = $koneksi->query("SELECT * FROM pembelian WHERE tanggal_pembelian BETWEEN '$mulai' AND '$selesai' ");
}
else
{

	$mulai = '';
	$selesai = '';

	$ambil_pembelian = $koneksi->query("SELECT * FROM pembelian");
}

while($detail_pembelian = $ambil_pembelian->fetch_assoc())
{
	$tampil_pembelian[] = $detail_pembelian;
}
// echo "<pre>";
// print_r ($tampil_pembelian);
// echo "</pre>";
?>
<div class="container bg-white rounded p-5 shadow rounded my-5 border-top border-primary border-5">
	<div class="row">
		<h6>Laporan Pembelian</h6>
		<hr>
		<div class="col-md-4">
			<form method="post">
				<label>Mulai</label>
				<input type="date" name="mulai" class="form-control">
			</div>
			<div class="col-md-4">
				<label>Selesai</label>
				<input type="date" name="selesai" class="form-control">
			</div>
			<div class="col-md-4 mt-4">
				<button class="btn btn-primary" name="filter" type="submit">
					FILTER
				</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mt-2">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nominal</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php $total_pembelian = 0; ?>
					<?php foreach ($tampil_pembelian as $key => $value): ?>
						<?php $total_pembelian+=$value['nominal_pembelian']; ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo number_format($value["nominal_pembelian"]); ?></td>
							<td><?php echo $value["tanggal_pembelian"]; ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Total</th>
						<th>Rp.<?php echo number_format($total_pembelian); ?></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<!-- laporan pembelian -->

<!-- laporan penjualan -->
<?php 

$tampil_penjualan = array();
if (isset($_POST["mulai"]) AND $_POST["selesai"])
{
	$mulai = $_POST["mulai"];
	$selesai = $_POST["selesai"];

	$ambil_penjualan = $koneksi->query("SELECT * FROM penjualan WHERE tanggal_penjualan BETWEEN '$mulai' AND '$selesai' ");
}
else
{

	$mulai = '';
	$selesai = '';

	$ambil_penjualan = $koneksi->query("SELECT * FROM penjualan");
}

while($detail_penjualan = $ambil_penjualan->fetch_assoc())
{
	$tampil_penjualan[] = $detail_penjualan;
}
// echo "<pre>";
// print_r ($tampil_penjualan);
// echo "</pre>";
?>
<div class="container bg-white rounded p-5 shadow rounded my-5 border-top border-primary border-5">
	<div class="row">
		<h6>Laporan Penjualan</h6>
		<hr>
		<div class="col-md-4">
			<form method="post">
				<label>Mulai</label>
				<input type="date" name="mulai" class="form-control">
			</div>
			<div class="col-md-4">
				<label>Selesai</label>
				<input type="date" name="selesai" class="form-control">
			</div>
			<div class="col-md-4 mt-4">
				<button class="btn btn-primary" name="filter" type="submit">
					FILTER
				</button>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 mt-2">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>No</th>
						<th>Nominal</th>
						<th>Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php $total_penjualan = 0; ?>
					<?php foreach ($tampil_penjualan as $key => $value): ?>
						<?php $total_penjualan+=$value['nominal_penjualan']; ?>
						<tr>
							<td><?php echo $key+1 ?></td>
							<td><?php echo number_format($value["nominal_penjualan"]); ?></td>
							<td><?php echo $value["tanggal_penjualan"]; ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<tfoot>
					<th colspan="1">Total</th>
					<th><?php echo number_format($total_penjualan); ?></th>
					<th></th>
				</tfoot>
			</table>
		</div>
	</div>
</div>
<!-- laporan penjualan -->

<!-- rumus menghitung total keuntungan  -->
<?php 
$hasil = $total_penjualan-$total_pembelian;
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 shadow rounded bg-white p-5 mb-5">
			<h6>Total Keuntungan Rp.<?php echo number_format($hasil); ?></h6>
		</div>
	</div>
</div>