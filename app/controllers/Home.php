<?php
session_start();

class Home extends Controller
{
  public function index()
  {
    if ($_SESSION['login'] == true) {
      $this->view('home/index');
    } else {
      header('Location: ' . BASEURL . '/login/index');
      exit;
    }
  }
}
