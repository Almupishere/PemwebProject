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
    <link rel="stylesheet" href="download.css">
    <title>Resident Evil</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Castoro+Titling&display=swap"
      rel="stylesheet"
    />
</head>
<body>
    <video class="video-background" autoplay muted loop>
        <source src="asset/logo/Dd3ydlVuKjw5LBWQ.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

<div class="konten">
<nav class="navbar">
          <div class="navbar-nav">
            <a href="homepage.php">Topics</a>
            <a href="homepage.php">Story</a>
            <a href="homepage.php">Character</a>
            <a href="homepage.php">Location</a>
            <a href="homepage.php">Gameplay</a>
            <?php if ($islogin):?>
            <a href="download.php">Download</a>
            <?php else :?>
            <a href="#" onclick="alert('Anda harus login terlebih dahulu untuk mendownload!');">Download</a>
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
    </div>

    <div class="content-re">       
    <div class="content">
        <div class="logo">
            <div class="re">
                <img src="asset/logo/re4.png" alt="Resident Evil 4 Logo">
            </div>
            <div class="line"></div> <!-- Elemen garis -->
            <div class="teks-download">
                Download Now
            </div>
        </div>
    </div>
</div>

<div class="bg-content" style="height:1vh;" >
<div class="content-container">
    <div class="platform-selection">
        <h1>Select a Platform</h1>
        <div class="platform-buttons">
            <img id="ps4" src="asset/logo/button-hitamps4.png" alt="PS4" onclick="changePlatform('ps4')">
            <img id="ps5" src="asset/logo/button-hitamps5.png" alt="PS5" onclick="changePlatform('ps5')">
            <img id="steam" src="asset/logo/button-hitamsteam.png" alt="Steam" onclick="changePlatform('steam')">
            <img id="xbox" src="asset/logo/button-hitamxbox.png" alt="Xbox" onclick="changePlatform('xbox')">
            <img id="pc" src="asset/logo/button-hitampcsx.png" alt="PC" onclick="changePlatform('pc')">
        </div>
    </div>

    <div class="game-box">
        <img id="game-image" src="asset/logo/re-ps5.jpg" alt="Resident Evil 4 PS5">
        <a id="store-link" href="#" class="download-button">PlayStation@Store</a>
    </div>
</div>


    <div class="footer-banner">
        <img src="asset/logo/re-iklan.jpg" alt="Resident Evil Remake Trilogy">
    </div>
</div>
        <script src="downloads.js"></script>
</body>
</div>
</html>