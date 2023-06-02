<?php


$id_kolam = $_GET["id"];
$ambil_kolam = $koneksi->query("SELECT * FROM kolam WHERE id_kolam = '$id_kolam' ");
$kolam = $ambil_kolam->fetch_assoc(); 
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-5 shadow rounded bg-white p-5 my-5">
			<p>Detail Kolam :</p>
			<table class="table-bordered table">
				<thead>
					<tr>
						<th>Nama</th>
						<td><?php echo $kolam["nama_kolam"]; ?></td>
					</tr>
					<tr>
						<th>Lebar</th>
						<td><?php echo $kolam["lebar_kolam"]; ?></td>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>