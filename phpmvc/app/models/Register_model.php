<?php

class Register_model
{
  private $host = DBHOST;
  private $user = DBUSER;
  private $pass = DBPASS;
  private $db_name = DBNAME;

  public function userBaru($data)
  {
    $username = $data['username'];
    $password = $data['password'];
    $konpassword = $data['konpassword'];
    $db = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);

    // Untuk cek bila username mengandung spasi
    if (strpos($username, ' ')) {
      return false;
    }

    // Untuk cek bila username mengandung huruf kapital
    if (!ctype_lower($data["username"])) {
      return false;
    }

    // Buat varibel untuk menyimpan super global Post
    $username = stripslashes($data["username"]);
    $password = mysqli_real_escape_string($db, $data["password"]);
    $konpassword = mysqli_real_escape_string($db, $data["konpassword"]);

    // Cek jika password dan konfirmasi password sama atau tidak
    if ($password !== $konpassword) {
      return false;
    }

    // Enkripsi Password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO users VALUES ('','$username','$password')");
    return true;
  }
}
