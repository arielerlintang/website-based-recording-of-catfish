<?php 
$produk = array();
$ambil = $koneksi->query("SELECT * FROM produk");
while($tiap = $ambil->fetch_assoc())
{
	$produk[] = $tiap;
}
// echo "<pre>";
// print_r ($produk);
// echo "</pre>";


?>
<div class="container">
	<div class="row">
		<div class="col-md-12 my-5 p-5 shadow rounded bg-white border-top border-primary border-5">
			<p>Data Produk:</p>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode</th>
							<th>Jenis</th>
							<th>Nama</th>
							<th>Harga</th>
							<th>Berat</th>
							<th>Stok</th>
							<th>Deskripsi</th>
							<th>Foto</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($produk as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value["kode_produk"]; ?></td>
								<td><?php echo $value["jenis_produk"]; ?></td>
								<td><?php echo $value["nama_produk"]; ?></td>
								<td><?php echo number_format($value["harga_produk"]); ?></td>
								<td><?php echo $value["berat_produk"]; ?> Kg</td>
								<td><?php echo number_format($value["stok_produk"]); ?></td>
								<td><?php echo $value["deskripsi_produk"]; ?></td>
								<td>
									<img src="../assets/foto_produk/<?php echo $value["foto_produk"]; ?>" class="img-fluid w-50">
								</td>
								<td nowrap="nowrap">
									<a href="index.php?page=produk_detail&id=<?php echo $value['id_produk']; ?>" class="btn btn-info btn-sm">
										<i class="bi bi-journal-text"></i></a>
										<a href="index.php?page=produk_ubah&id=<?php echo $value['id_produk']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-nut"></i></a>
										<a href="index.php?page=produk_hapus&id=<?php echo $value['id_produk']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill" onclick="return confirm('Anda Yakin ?')"></i></a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<a href="index.php?page=produk_tambah" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Tambah</a>
				</div>
			</div>
		</div>
	</div>