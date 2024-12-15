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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['weapon_image'])) {
    $weapon_name = $_POST['weapon_name'];
    $description = $_POST['deskripsi'];
    $image_name = $_FILES['weapon_image']['name'];
    $image_temp = $_FILES['weapon_image']['tmp_name'];
    $image_path = 'asset/uploads/' . $image_name;

    move_uploaded_file($image_temp, $image_path);

    $sql = "INSERT INTO weapons (nama_senjata, gambar_senjata, deskripsi) VALUES ('$weapon_name', '$image_path','$description')";
    if ($connect->query($sql) === TRUE) {
        echo "Senjata berhasil ditambahkan!";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}

$connect->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Senjata Resident Evil</title>
    <link rel="stylesheet" href="admin-senjata.css">
    <style>
        form {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
        }

        label, input, button {
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            cursor: pointer;
        }
    </style>
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
    <div id="admin-section">
        <h2>Weapons Resident Evil</h2>
        <form id="addWeaponForm" method="POST" enctype="multipart/form-data">
            <label for="weapon_name">Nama Senjata:</label>
            <input type="text" id="weapon_name" name="weapon_name" required>
            
            <label for="deskripsi">Nama Senjata:</label>
            <input type="text" id="deskripsi" name="deskripsi" required>

            <label for="weapon_image">Gambar Senjata:</label>
            <input type="file" id="weapon_image" name="weapon_image" required>
            
            <button type="submit">Tambah Senjata</button>
        </form>
    </div>
</body>
</html>
