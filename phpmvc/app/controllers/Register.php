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
        header("Location: " . BASEURL . "/login/index");
      } else {
        header("Location: " . BASEURL . "/register/index");
      }
    }
  }
}
