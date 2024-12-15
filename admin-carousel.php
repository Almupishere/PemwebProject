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

$uploadDir = "asset/uploads/";

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imagePath = $uploadDir . basename($imageName);
    
    if (move_uploaded_file($imageTmpName, $imagePath)) {
        $sql = "INSERT INTO carousel (title, description, image_url) VALUES (?, ?, ?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sss", $title, $description, $imagePath);
        $stmt->execute();
        header("Location: admin-carousel.php");
        exit();
    } else {
        echo "Gagal mengunggah gambar.";
    }
}

// Update Data
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imagePath = $uploadDir . basename($imageName);

        if (move_uploaded_file($imageTmpName, $imagePath)) {
            $sql = "UPDATE carousel SET title = $title, description = $description, image_url = ? WHERE id = $id";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("sssi", $title, $description, $imagePath, $id);
        } else {
            echo "Gagal mengunggah gambar.";
            exit();
        }
    } else {
        $sql = "UPDATE carousel SET title = $title, description = $description WHERE id = $id";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssi", $title, $description, $id);
    }

    $stmt->execute();
    header("Location: admin-carousel.php");
    exit();
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];


    $sql = "SELECT image_url FROM carousel WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if (file_exists($data['image_url'])) {
        unlink($data['image_url']);
    }

    // Hapus data dari database
    $sql = "DELETE FROM carousel WHERE id = ?";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: admin-carousel.php");
    exit();
}

$sql = "SELECT * FROM carousel";
$result = $connect->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Teko&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Castoro+Titling&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Crimson+Pro&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="admin-carousel.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid rgba(255, 255, 255, 0.459);;
        }
        th, td {
            padding: 10px;
        }
        img {
            max-width: 100px;
            height: auto;
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
    <h1>Halaman Admin - Carousel Resident Evil 4</h1>
    <div class="data">
    <h2>Tambah Data Baru</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        <input type="text" class="name" name="title" placeholder="Judul" required><br>
        <textarea name="description" placeholder="Deskripsi" required></textarea><br>
        <input type="file" name="image" accept="image/*" required><br>
        <button type="submit" name="add">Tambah</button>
    </form>
    <hr>
    <h2>Daftar Data Carousel</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['description'] ?></td>
                    <td><img src="<?= $row['image_url'] ?>" alt="Gambar"></td>
                    <td>
                        <a href="admin-carousel.php?edit=<?= $row['id'] ?>">Edit</a> |
                        <a href="admin-carousel.php?delete=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php if (isset($_GET['edit'])): 
        $id = $_GET['edit'];
        $sql = "SELECT * FROM carousel WHERE id = ?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
    ?>
        <hr>
        <h2>Update Data</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <input type="text" name="title" value="<?= $data['title'] ?>" required><br>
            <textarea name="description" required><?= $data['description'] ?></textarea><br>
            <input type="file" name="image" accept="image/*"><br>
            <small>Unggah file baru jika ingin mengganti gambar.</small><br>
            <button type="submit" name="update">Update</button>
        </form>
    <?php endif; ?>
    </div>

</body>
</html>
