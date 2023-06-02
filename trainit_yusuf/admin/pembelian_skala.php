<?php 
$tampil = array();
$ambil = $koneksi->query("SELECT * FROM pembelian_skala LEFT JOIN pakan ON pakan.id_pakan = pembelian_skala.id_pakan LEFT JOIN kolam ON kolam.id_kolam = pembelian_skala.id_kolam");
while($detail = $ambil->fetch_assoc())
{
	$tampil[] = $detail;
}
// echo "<pre>";
// print_r ($tampil);
// echo "</pre>";

?>
<div class="container">
	<div class="row">
		<div class="col-md-12 shadow rounded bg-white p-5 my-5">
			<h6>Data Pembelian Skala</h6>
			<hr>
			<div class="table-responsive'">
				<table class="table table-bordered table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>Kategori</th>
							<th>Nama</th>
							<th>Deskrispi</th>
							
						</tr>
					</thead>
					<tbody>
						<?php foreach ($tampil as $key => $value): ?>
							<tr>
								<?php 
								if ($value["id_kolam"]==0)
								{
								include 'data.php';
								}
								else
								{
									include 'data2.php';
								}
								?>

							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
				<a href="index.php?page=pembelian_skala_tambah" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Tambah</a>
			</div>
		</div>
	</div>
</div>