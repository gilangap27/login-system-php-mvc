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
				<form action="" method="post">
					<label for="username">Username : </label>
					<input type="text" name="username" id="username">
					<label for="password">Password : </label>
					<input type="password" name="password" id="password">
					<div class="checkbox">
						<input type="checkbox" name="remember" id="remember">
						<label for="remember"> Remember me</label>
					</div>
					<button type="submit">Login</button>
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