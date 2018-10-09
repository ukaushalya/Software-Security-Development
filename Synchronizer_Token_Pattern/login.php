<?php
session_start();
require_once 'token.php';

const username = 'admin';
const password = '123';

if (isset($_POST['username']) && isset($_POST['password'])) //when form submitted
{
  if ($_POST['username'] === username && $_POST['password'] === password)
  {
    $_SESSION['username'] = $_POST['username']; //write username to server storage
    setcookie("id", session_id());
    Token::generate_token(session_id());
    header('Location: ./counter.php'); //redirect to main
  }
  else
  {
    echo "<script>alert('Check username and password');</script>";
    echo "<noscript>Check username and password</noscript>";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./custom.css">

    <title>Assignment 1</title>
  </head>
  <body>
    <div class="container custom-padding-top-5">
      <strong>User Account</strong>
      <hr>
      <form method="post">
        Username:<br><input name="username"><br>
        Password:<br><input type="password" name="password"><br>
        <input type="submit" value="Login">
      </form>
    
    </div>

    

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>