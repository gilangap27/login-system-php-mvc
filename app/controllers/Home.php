<?php
session_start();

class Home extends Controller
{
  public function index()
  {
    if (isset($_SESSION['login'])) {
      $this->view('home/index');
    } else {
      header('Location: ' . BASEURL . '/login/index');
      exit;
    }
  }
}
