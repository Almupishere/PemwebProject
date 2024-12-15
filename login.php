<?php
session_start();
include("connect.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username==NULL || $password==NULL) {
        echo("<script>alert('username dan password tidak boleh kosong');</script>");
        header('Location:login.php');
        exit();
    }else {
        $result = mysqli_query($connect, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
        $_SESSION['username'] = $username;
        if (mysqli_num_rows($result)  == true) {
            header("Location: homepage.php");
            exit();
        }else {
                echo "<script>alert('Username atau password salah');</script>";
            }
    }

    if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit(); 
    }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="header"><img src="logo-re.svg" /></div>
    <div class="form">
      <form method="post" action="">
        <h1>Sign Into Your Account</h1>
        <br />
        <p>Your account has been cretaed!</p>
        <br />
        <label for="username"></label><br />
        <input type="text" placeholder="Username" name="username" /><br />
        <label for="password"></label><br /><br />
        <input type="password" placeholder="Password" name="password" /><br />
        <button class="button" type="submit" name="submit" onclick="submit">Sign In</button><br /><br />
        <p>
          Don't have an account? <a href="register.php"><b>Sign Up</b></a>
        </p>
      </form>
    </div>
  </body>
</html>
<style>
  button{
  transition: color 0.3s ease, transform 0.3s ease;
  font-family: "Cinzel", sans-serif;
  }
  button:hover {
  background-color: #ac1416;
  transform: scale(1.1);
}
</style>