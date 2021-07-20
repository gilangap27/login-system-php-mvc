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
        return true;
      }
    }
  }
}
