<?php 
$pakan = array();
$ambil = $koneksi->query("SELECT * FROM pakan");
while($tiap = $ambil->fetch_assoc())
{
	$pakan[] = $tiap;
}
// echo "<pre>";
// print_r ($pakan);
// echo "</pre>";

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 bg-white rounded p-5 my-5 shadow border-top border-primary border-5">
			<p>Tampil pakan :</p>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Harga</th>
							<th>Berat</th>
							<th>Jumlah</th>
							<th>Opsi</th>
							
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pakan as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value["nama_pakan"]; ?></td>
								<td><?php echo $value["harga_pakan"]; ?></td>		
								<td><?php echo $value["berat_pakan"]; ?></td>		
								<td><?php echo $value["jumlah_pakan"]; ?></td>
								<td class="d-inline">
									<a href="index.php?page=pakan_detail&id=<?php echo $value['id_pakan']; ?>" class="btn btn-info btn-sm">
										<i class="bi bi-journal-text"></i></a>
										<a href="index.php?page=pakan_ubah&id=<?php echo $value['id_pakan']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-nut"></i></a>
										<a href="index.php?page=pakan_hapus&id=<?php echo $value['id_pakan']; ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill" onclick="return confirm('Anda Yakin ?')"></i></a>
									</td>									
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<a href="index.php?page=pakan_tambah" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i>Tambah</a>
				</div>
			</div>
		</div>
	</div>
