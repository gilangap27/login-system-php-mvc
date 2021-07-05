
<?php 
session_start();
require 'assets/functions.php';

// SESSION
if ( isset($_SESSION['login']) ) {
	header("Location: index.php");
	exit;
}

// cek
if ( isset($_POST['login']) ) {
	if ( login($_POST) ) {
		// Buat SESSION
		$_SESSION['login'] = true;

		header("Location: index.php");
		exit;
	} 
	$error = true;
}

 ?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login</title>
		<!-- My CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		<!-- Icon Bootstrap -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	</head>
	<body>
		<div class="container">
			<div class="side-tab">
				<div class="bullet-lg"></div>
				<div class="bullet-md"></div>
			</div>
			<div class="register-tab">
				<h1 class="judul">Login</h1>
				<?php if( isset($error) ) : ?>
					<b class="error">Username/Password Anda salah</b>
				<?php endif; ?>
				<form action="" method="post">
					<label for="username">Username : </label>
					<input type="text" name="username" id="username" required>
					<label for="password">Password : </label>
					<input type="password" name="password" id="password" required>
					<div class="checkbox">
						<input type="checkbox" name="remember" id="remember">
						<label for="remember"> Remember me</label>
					</div>
					<button type="submit" name="login">Login</button>
				</form>
				<p>Belum punya <a href="register.php">akun</a>?</p>
				<div class="icon">
					<a href=""><i class="bi bi-facebook"></i></a>
					<a href=""><i class="bi bi-instagram"></i></a>
					<a href=""><i class="bi bi-twitter"></i></a>
				</div>
			</div>
		</div>
	</body>
</html>