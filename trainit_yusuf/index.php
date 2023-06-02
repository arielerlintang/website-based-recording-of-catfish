<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<title>login</title>
</head>
<body class="bg-light">

	<div class="container">
		<div class="row">
			<div class="col-md-5 offset-md-3 mt-5 shadow rounded bg-white p-5">
				<form method="post">
					<div class="mb-3">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="mb-3">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<button class="btn btn-primary" name="login" type="submit">LOGIN</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
<?php 
// jika ada tombol login maka 
if (isset($_POST["login"]))
{
	$username = $_POST["username"];
	$password = sha1($_POST["password"]);



	// ambil data admin yang usernmae = '$' dan password_admin = '$'
	$tampil_admin = $koneksi->query("SELECT * FROM admin WHERE username_admin = '$username' AND password_admin = '$password' "); 

	$cek = $tampil_admin->num_rows;

	// jika cek samadengan 1 maka alihkan dia ke halaman admin
	if ($cek==1)
	{
		$login = $tampil_admin->fetch_assoc();
		$_SESSION["admin"] = $login;
		
		echo "<script>alert('Anda Berhasil Login')</script>";
		echo "<script>location='admin/index.php'</script>";
	}
	else
	{
		echo "<script>alert('Anda Gagal Login')</script>";
		echo "<script>location='index.php'</script>";
	}

	// selain itu tetap di haaman login
}

// dapatkan inputan dari formulir


?>