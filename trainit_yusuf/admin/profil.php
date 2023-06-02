<?php 

// dapatkan id_pelogin
$id_admin = $_SESSION["admin"]["id_admin"];
// menampilkan data admin yang id_admin = '$id_admin'
$ambil_admin = $koneksi->query("SELECT * FROM admin WHERE id_admin = '$id_admin' ");

$admin = $ambil_admin->fetch_assoc();

// echo "<pre>";
// print_r ($admin);
// echo "</pre>";

?>

<div class="container">
	<div class="row">
		<div class="col-md-7 offset-md-2 shadow rounded bg-white p-5 my-5 border-top border-primary border-5">
			<p>Ubah Profil :</p>
			<form method="post">
				<div class="mb-3">
					<label>Username</label>
					<input type="text" name="username_admin" class="form-control" value="<?php echo $admin['username_admin']; ?>">
				</div>
					<div class="mb-3">
					<label>Password</label>
					<input type="password" name="password_admin" class="form-control" value="">
				</div>
				<div class="mb-3">
					<label>Nama</label>
					<input type="text" name="nama_admin" class="form-control" value="<?php echo $admin['nama_admin']; ?>">
				</div>
				<button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
			</form>
		</div>
	</div>
</div>
<?php
// php dapatkan semua inputan dari form
if (isset($_POST["ubah"])) 
{
	$username_admin = $_POST["username_admin"];
	$password_admin = sha1($_POST["password_admin"]);
	$nama_admin = $_POST["nama_admin"];

	// jika tidak kosong password maka ubah data admin dengan merubah password
	if (!empty($password_admin))
	{
		$koneksi->query("UPDATE admin SET username_admin = '$username_admin',
			password_admin = '$password_admin',
			nama_admin = '$nama_admin' WHERE id_admin = '$id_admin' ");
	}
	// selain itu maka ubah data tanpa mengubah password
	else
	{
		
		$koneksi->query("UPDATE admin SET username_admin = '$username_admin',
			nama_admin = '$nama_admin' WHERE id_admin = '$id_admin' ");
	}

	// pop up 
	echo "<script>alert('Data Admin Di Ubah')</script>";
	echo "<script>location='index.php?page=profil'</script>";
}

?>