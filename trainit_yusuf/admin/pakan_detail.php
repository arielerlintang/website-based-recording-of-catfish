<?php 
$id_pakan = $_GET["id"];
$ambil_pakan = $koneksi->query("SELECT * FROM pakan WHERE id_pakan = '$id_pakan' ");
$pakan = $ambil_pakan->fetch_assoc();

 ?>
<div class="container">
	<div class="row">
		<div class="col-md-5 shadow rounded bg-white p-5 my-5">
			<p>Detail Pakan :</p>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Nama</th>
						<td><?php echo strtoupper($pakan["nama_pakan"]); ?></td>
					</tr>
					<tr>
						<th>Harga</th>
						<td><?php echo number_format($pakan["harga_pakan"]); ?></td>
					</tr>
					<tr>
						<th>Berat</th>
						<td><?php echo number_format($pakan["berat_pakan"]); ?></td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td><?php echo number_format($pakan["jumlah_pakan"]); ?></td>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>