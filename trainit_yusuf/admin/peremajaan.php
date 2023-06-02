<?php
$peremajaan = array();
$ambil = $koneksi->query("SELECT * FROM peremajaan LEFT JOIN produk ON peremajaan.id_produk = produk.id_produk LEFT JOIN pakan ON peremajaan.id_pakan = pakan.id_pakan LEFT JOIN kolam ON peremajaan.id_kolam = kolam.id_kolam");
while($tiap = $ambil->fetch_assoc())
{
	$peremajaan[] = $tiap;
} 
// echo "<pre>";
// print_r ($peremajaan);
// echo "</pre>";
?>
<div class="container">
	<div class="row">
		<div class="col-md-12 bg-white shadow rounded p-5 my-5 border-top border-primary border-5">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Produk</th>
							<th>Pakan</th>
							<th>Kolam</th>
							<th>Jumlah</th>
							<th>Status</th>
							<th>Tanggal Mulai</th>
							<th>Tanggal Selesai</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($peremajaan as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value["nama_produk"]; ?></td>
								<td><?php echo $value["nama_pakan"]; ?></td>
								<td><?php echo $value["nama_kolam"]; ?></td>
								<td><?php echo $value["jumlah_produk"]; ?></td>
								<td class="fw-bold badge bg-info"><?php echo strtoupper($value["status_peremajaan"]); ?></td>
								<td><?php echo $value["tanggal_mulai_peremajaan"]; ?></td>
								<td><?php echo $value["tanggal_selesai_peremajaan"]; ?></td>
								<td class="d-inline">
									<a href="index.php?page=peremajaan_detail&id=<?php echo $value['id_peremajaan']; ?>" class="btn btn-info btn-sm">
										<i class="bi bi-journal-text"></i></a>
										<a href="index.php?page=peremajaan_ubah&id=<?php echo $value['id_peremajaan']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-nut"></i></a>
										<a href="index.php?page=pakan_hapus&id=<?php echo $value['id_pakan']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill" onclick="return confirm('Anda Yakin ?')"></i></a>
									</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="index.php?page=peremajaan_tambah" class="btn btn-outline-primary">Tambah</a>
			</div>
		</div>
	</div>
</div>