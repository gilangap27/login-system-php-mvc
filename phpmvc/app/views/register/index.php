<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- My CSS -->
  <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/style.css">
</head>

<body>
  <div class="container">
    <div class="side-tab">
      <div class="bullet-lg"></div>
      <div class="bullet-md"></div>
    </div>
    <div class="register-tab">
      <h1 class="judul">Register</h1>
      <form action="<?= BASEURL; ?>/register/tambah" method="post">
        <label for="username">Username : </label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password : </label>
        <input type="password" name="password" id="password" required>
        <label for="konpassword">Konfirmasi Password : </label>
        <input type="password" name="konpassword" id="konpassword" required>
        <button type="submit" name="register">Register</button>
      </form>
    </div>
  </div>
</body>

</html>