<?php
session_start();

class Login extends Controller
{
  private $host = DBHOST;
  private $user = DBUSER;
  private $pass = DBPASS;
  private $db_name = DBNAME;

  public function index()
  {
    $db = mysqli_connect($this->host, $this->user, $this->pass, $this->db_name);

    // COOKIE
    if (isset($_COOKIE['no']) && isset($_COOKIE['key'])) {
      $no = $_COOKIE['no'];
      $key = $_COOKIE['key'];

      // Mengambil data id dari database
      $result = mysqli_query($db, "SELECT * FROM users WHERE id = $no");
      $row = mysqli_fetch_assoc($result);

      // Cek apakah username sama
      if (hash('ripemd256', $row['username']) == $key) {
        // Buat session
        $_SESSION['login'] = true;
      }
    }

    if (isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home/index');
      exit;
    } else {
      $this->view('login/index');
    }
  }

  public function cek()
  {
    if (isset($_POST['login'])) {
      if ($this->model('Login_model')->cekLogin($_POST)) {
        // Buat Session
        $_SESSION['login'] = true;
        header('Location: ' . BASEURL . '/home/index');
        exit;
      } else {
        echo "<script>
              alert('Login Gagal');
              window.location.href = 'http://localhost/belajar-login-system-php/public/login/index';
              </script>";
      }
    }
  }
}
