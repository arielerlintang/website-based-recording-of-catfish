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

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 bg-white rounded p-5 my-5 shadow border-top border-primary border-5">
			<p>Tampil Penjualan :</p>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Produk</th>
							<th>Tanggal</th>
							<th>Jumlah</th>
							<th>Nominal</th>
							<th>Opsi</th>
							
						</tr>
					</thead>
					<tbody>
						<?php foreach ($penjualan as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td style="text-transform: capitalize;"><?php echo $value["nama_produk"]; ?></td>
								<td><?php echo date("d M Y", strtotime($value["tanggal_penjualan"])); ?></td>
								<td><?php echo number_format($value["jumlah_penjualan"]); ?></td>
								<td><?php echo number_format($value["nominal_penjualan"]); ?></td>
								<td class="d-inline">
									<a href="index.php?page=penjualan_detail&id=<?php echo $value['id_penjualan']; ?>" class="btn btn-info btn-sm">
										<i class="bi bi-journal-text"></i></a>
										
										
										<a href="index.php?page=penjualan_hapus&id=<?php echo $value['id_penjualan'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin ?')"><i class="bi bi-trash-fill"></i></a>
									</td>	
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<a href="index.php?page=penjualan_tambah" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i>Tambah</a>
				</div>
			</div>
		</div>
	</div>
