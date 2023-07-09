<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username === 'admin' && $password === 'password') {
      header('Location: index.html');
      exit();
    } else {
      $error = 'Username atau password salah';
    }
  } else {
    $error = 'Harap isi semua field';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Sedot WC</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <?php if (isset($error)) { ?>
      <p class="error"><?php echo $error; ?></p>
    <?php } ?>
    <form action="" method="POST">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>
  </div>

  <footer>
    <p>&copy; 2023 Sedot WC. All rights reserved.</p>
  </footer>
</body>
</html>
