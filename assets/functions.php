


<?php 
// Menyambungkan ke mysql
$db = mysqli_connect("localhost","root","","login");

function userBaru($data) {
	global $db;

	// Untuk cek bila username mengandung spasi
	if ( strpos($data["username"], ' ') ) {
		echo  "<script>
				alert('Username tidak boleh mengandung spasi');
			  </script>";
		return false;
	}

	// Untuk cek bila username mengandung huruf kapital
	if ( !ctype_lower($data["username"]) ) {
    	echo  "<script>
				alert('Username tidak boleh mengandung huruf kapital');
			  </script>";
		return false;
	}

	// Buat varibel untuk menyimpan super global Post
	$username = stripslashes($data["username"]);
	$password = mysqli_real_escape_string($db, $data["password"]);
	$konpassword = mysqli_real_escape_string($db, $data["konpassword"]);

	// Cek jika password dan konfirmasi password sama atau tidak
	if ( $password !== $konpassword ) {
		echo "<script>
				alert('Password konfirmasi berbeda');
			</script>";
		return false;
	}

	// Enkripsi Password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// query sql ntuk memasukkan username dan password ke database
	mysqli_query($db, "INSERT INTO users VALUES ('','$username','$password')");
	return true;
}


function login($data) {
	global $db;

	// Buat varibel untuk menyimpan super global Post
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = $data["password"];

	// Cari tabel dengan query sql sesuai dengan username yang kita input
	$hasil = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

	// cek hasil query sql $hasil jika lebih dari 1 maka benar
	if ( mysqli_num_rows($hasil) >= 1 ) {
		$row = mysqli_fetch_assoc($hasil);

		// cek password apakah sama dengan yang ada di database
		if ( password_verify($password, $row["password"]) ) {
			return true;
		}
	}

}


 ?>