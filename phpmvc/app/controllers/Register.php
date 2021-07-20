<?php

class Register extends Controller
{
  public function index()
  {
    $this->view('register/index');
  }
  public function tambah()
  {
    if (isset($_POST['register'])) {
      if ($this->model('Register_model')->userBaru($_POST)) {
        header('Location: ' . BASEURL . '/login/index');
      } else {
        echo "<script>
              alert('Register Gagal');
              window.location.href = 'http://localhost/belajar-login-system-php/phpmvc/public/register/index';
              </script>";
      }
    }
  }
}
