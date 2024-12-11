<?php
session_start();

$islogin = isset($_SESSION['username']);
if ($islogin) {
    $username=$_SESSION['username'];
}else {
    $username = NULL;
}

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Link ke font Google -->
    <link
      href="https://fonts.googleapis.com/css2?family=Castoro+Titling&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="stylehome.css" />
    <script src="home.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="section">
        <nav class="navbar">
          <div class="navbar-nav">
            <a href="#topics">Topics</a>
            <a href="#story">Story</a>
            <a href="#character">Character</a>
            <a href="#location">Location</a>
            <a href="#gameplay">Gameplay</a>
            <?php if ($islogin):?>
            <?php else: ?>
              <p class="download">Download</p>
            <?php endif; ?>
          </div>
          <?php if ($islogin):?>
          <div class="navbar-extra">
            <button><a href="?logout=true"><?= htmlspecialchars($username) ?></a></button>
          </div>
          <?php else :?>
          <div class="navbar-extra">
            <button><a href="login.php">Login</a></button>
          </div>
          <?php endif; ?>
        </nav>
        <div class="title">
          <h1>Welcome to the <br/>
          <img src="logo-re.svg" /></h1>
        </div>
        <div class="footer">
          <p>&copy; 2024 CAPCOM. All Rights Reserved.</p>
          <img src="asset/logo/capcom.png" alt="Capcom Logo" />
        </div>
      </div>
  </body>
</html>
