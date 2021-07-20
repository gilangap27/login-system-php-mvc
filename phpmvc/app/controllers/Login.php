<?php

class Login extends Controller
{
  public function index()
  {
    $this->view('login/index');
  }
  public function cek()
  {
    if (isset($_POST['login'])) {
      if ($this->model('Login_model')->cekLogin($_POST)) {
        header('Location: ' . BASEURL . '/home/index');
        exit;
      } else {
        echo "<script>
              alert('Login Gagal');
              window.location.href = 'http://localhost/belajar-login-system-php/phpmvc/public/login/index';
              </script>";
      }
    }
  }
}
