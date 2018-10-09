<?php 
  session_start();
  require_once 'token.php';
  $display_msg = "";
  if(isset($_POST['accnumber'], $_POST['wallet'], $_POST['amount'], $_POST['csrf-token'])){
      $accnumber = $_POST['accnumber'];
      $wallet = $_POST['wallet'];
      $amount = $_POST['amount'];
      $csrf_token = $_POST['csrf-token'];
      if(!empty($accnumber) && !empty($wallet) && !empty($amount) && !empty($csrf_token)){
        if(Token::check_token($csrf_token)){
          $msg = "Transaction successfull! " . $amount . " Amount added to the resceiver's account \"" . $wallet . "\"";
          $display_msg = "<p class=\"text-success\"><strong>".$msg."</strong></p>";
        }
        else{
          $msg = "Error";
          $display_msg = "<p class=\"text-danger\"><strong>".$msg."</strong></p>";
        }
      }
      else{
        echo "<script>alert('Check your details');</script>";
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
      <?php
        if (session_id() == '' || !isset($_SESSION['username'])) { 
          header('Location: ./index.php');
      ?>
      <?php
        } 
        else {
          echo "Hi, " . $_SESSION['username'] . " | ";
      ?>
      <a class="red" href="./logout.php">Logout</a>
      <hr>
      <br>
      <form action="" method="POST">
        <strong>Bill Payment Gateway</strong> 
        <br>
        Invoice Number:<br><input name="accnumber"><br>
        Account Number:<br><input name="wallet"><br>
        Bill Amount:<br><input name="amount"><br>
        <input type="hidden" name="csrf-token" id="csrf-token" value="">
        <input type="submit" value="Purchase">
      </form>
      <?php
        echo $display_msg;
        }
      ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./script.js"></script>
  </body>
</html>