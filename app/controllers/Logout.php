<?php
session_start();

class Logout
{
  public function index()
  {
    // SESSION
    $_SESSION = [];
    session_unset();
    session_destroy();

    // COOKIE
    // Tanda / di setcookie digunakan karena login.php dan logout.php berbeda path
    setcookie('no', '', time() - 3600, '/');
    setcookie('key', '', time() - 3600, '/');

    header('Location: ' . BASEURL . '/login/index');
    exit;
  }
}
