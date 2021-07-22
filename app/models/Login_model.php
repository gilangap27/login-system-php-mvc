<?php

class Login_model
{
  private $host = DBHOST;
  private $user = DBUSER;
  private $pass = DBPASS;
  private $db_name = DBNAME;

  public function cekLogin()
  {
    $db = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);

    // Buat varibel untuk menyimpan super global Post
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = $_POST["password"];

    // Cari tabel dengan query sql sesuai dengan username yang kita input
    $hasil = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    // cek hasil query sql $hasil jika lebih dari 1 maka benar
    if (mysqli_num_rows($hasil) >= 1) {
      $row = mysqli_fetch_assoc($hasil);

      // cek password apakah sama dengan yang ada di database
      if (password_verify($password, $row["password"])) {
        // cek jika checkbox remember me ditekan
        if (isset($_POST['remember'])) {
          // set cookie dengn interval 1jam
          // Tanda / di setcookie digunakan karena login.php dan logout.php berbeda path
          setcookie('no', $row['id'], time() + 3600, '/');
          setcookie('key', hash('ripemd256', $row['username']), time() + 3600, '/');
        }
        return true;
      }
    }
  }
}
