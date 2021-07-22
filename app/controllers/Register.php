<?php
session_start();

class Register extends Controller
{
  public function index()
  {
    if (isset($_SESSION['login'])) {
      header('Location: ' . BASEURL . '/home/index');
    } else {
      $this->view('register/index');
      exit;
    }
  }
  public function tambah()
  {
    if (isset($_POST['register'])) {
      if ($this->model('Register_model')->userBaru($_POST)) {
        header('Location: ' . BASEURL . '/login/index');
        exit;
      } else {
        echo "<script>
              alert('Register Gagal');
              window.location.href = 'http://localhost/belajar-login-system-php/phpmvc/public/register/index';
              </script>";
      }
    }
  }
}
