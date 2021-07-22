<?php
session_start();

class Home extends Controller
{
  public function index()
  {
    if ($_SESSION['login'] == true) {
      $this->view('home/index');
    } else {
      $this->view('login/index');
      exit;
    }
  }
}
