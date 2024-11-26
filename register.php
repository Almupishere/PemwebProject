<?php 
session_start();

if (isset($_POST['submit'])) {
    $id;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfir'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    include("connect.php");

    if ( $konfirmasi == $password ) {
        $result = mysqli_query($connect, "INSERT INTO user(username,password,email,telp) VALUES ('$username','$password','$email','$telp')");
        header("Location:login.php");
    }else {
        echo "<script> alert('Konfirmasi PAssword tidak sesuai ')</script>";
        return 0;
    }

    
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="register.css">
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Crimson+Pro&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
    
  </head>
  <body>
    <div class="header"><img src="logo-re.svg" /></div>
    <div class="form">
      <form method="post" action="register.php">
        <h1>Create New Account</h1>
        <br />
        <p>Create new account with your email and phone number!</p>
        <br />
        <label for="username"></label><br />
        <input type="text" placeholder="Username" name="username" /><br />
        <label for="password"></label><br />
        <input type="password" placeholder="Password" name="password" /><br />
        <label for="password"></label><br />
        <input
          type="password"
          placeholder="Confirm Password"
          name="konfir"
        /><br />
        <label for="email"></label><br />
        <input type="email" placeholder="Email" name="email" /><br />
        <label for="nohp"></label><br />
        <input type="text" placeholder="Phone Number" name="telp" /><br />
        <input class="button" type="submit" name="submit">
      </form>
    </div>
  </body>
</html>
