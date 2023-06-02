<?php 
$pembelian = array();
$ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN produk ON pembelian.id_produk = produk.id_produk");
while($tiap = $ambil->fetch_assoc())
{
	$pembelian[] = $tiap;
}
// echo "<pre>";
// print_r ($pembelian);
// echo "</pre>";

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 bg-white rounded p-5 my-5 shadow border-top border-primary border-5">
			<p>Tampil Pembelian :</p>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Produk</th>
							<th>Tanggal</th>
							<th>Jumlah Pembelian</th>
							<th>Nominal</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pembelian as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo strtoupper($value["nama_produk"]); ?></td>
								<td><?php echo date("d M Y", strtotime($value["tanggal_pembelian"])); ?></td>
								<td><?php echo number_format($value["jumlah_pembelian"]); ?></td>
								<td><?php echo number_format($value["nominal_pembelian"]); ?></td>	
								<td class="d-inline">
									<a href="index.php?page=pembelian_detail&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-info btn-sm">
										<i class="bi bi-journal-text"></i></a>
										
										
										<a href="index.php?page=pembelian_hapus&id=<?php echo $value['id_pembelian']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin ?')"><i class="bi bi-trash-fill"></i></a>
									</td>	
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="index.php?page=pembelian_tambah" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i>Tambah</a>
			</div>
		</div>
	</div>
</div>
