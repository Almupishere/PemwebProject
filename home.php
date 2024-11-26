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

<style>
  .download{
    color: aliceblue;
    font-family: "Castoro Titling", sans-serif;
    margin-top: 30px;
  }
</style>

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
    <link rel="stylesheet" href="home.css" />
    <script src="home.js"></script>
  </head>
  <body>
    <div class="container">
      <nav class="navbar">
        <div class="navbar-nav">
          <a href="#topics">Topics</a>
          <a href="#about">About</a>
          <a href="">Character</a>
          <a href="">Location</a>
          <a href="">Gameplay</a>
          <?php if ($islogin):?>
          <a href="">Download</a>
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

      <div id="topics" class="section">
        <div class="title">
          <h1>Welcome to the</h1>
          <img src="logo-re.svg" />
        </div>
      </div>

      <div id="about" class="section2"></div>
      <div id="char" class="section3"></div>
      <div id="loc" class="section4"></div>
      <div id="gplay" class="section5"></div>
      <div id="download" class="section6"></div>
    </div>
  </body>
</html>
