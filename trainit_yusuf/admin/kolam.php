<?php 
$kolam = array();
$ambil = $koneksi->query("SELECT * FROM kolam");
while($tiap = $ambil->fetch_assoc())
{
	$kolam[] = $tiap;
}
// echo "<pre>";
// print_r ($kolam);
// echo "</pre>";

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 bg-white rounded p-5 my-5 shadow border-top border-primary border-5">
			<h6 class="text-muted">Tampil Kolam :</h6>
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Lebar</th>
							<th>Opsi</th>
							
						</tr>
					</thead>
					<tbody>
						<?php foreach ($kolam as $key => $value): ?>
							<tr>
								<td><?php echo $key+1; ?></td>
								<td><?php echo $value["nama_kolam"]; ?></td>
								<td><?php echo $value["lebar_kolam"]; ?></td>		<td class="d-inline">
									<a href="index.php?page=kolam_detail&id=<?php echo $value['id_kolam']; ?>" class="btn btn-info btn-sm">
										<i class="bi bi-journal-text"></i></a>
										<a href="index.php?page=kolam_ubah&id=<?php echo $value['id_kolam']; ?>" class="btn btn-warning btn-sm"><i class="bi bi-nut"></i></a>
										<a href="index.php?page=kolam_hapus&id=<?php echo $value['id_kolam']; ?>" onclick="return confirm('Hapus Data Kolam ?')" class="btn btn-danger btn-sm bi bi-trash-fill"></a>
									</td>					
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
					<a href="index.php?page=kolam_tambah" class="btn btn-outline-primary"><i class="btn-btn-plus-circle"></i>Tambah</a>
				</div>
			</div>
		</div>
	</div>
