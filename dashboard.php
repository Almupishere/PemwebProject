<?php 
session_start();
include("connect.php");

$islogin = isset($_SESSION['username']);
if ($islogin) {
    $username=$_SESSION['username'];
}else {
    $username = NULL;
    header('Location: login.php');
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
<nav class="navbar">
          <div class="navbar-nav">
            <a href="homepage.php">Home</a>
            <a href="Dashboard.php">Dashboard</a>
            <a href="admin-carousel.php">Carousel</a>
            <a href="admin-senjata.php">Senjata</a>
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
    <div class="video-container">
        <video autoplay muted loop>
            <source src="background-video.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <?php if ($islogin):?>
    <div class="welcome-text">Welcome Admin <?= htmlspecialchars($username) ?></div>
    <?php endif; ?>
</body>
</html>
