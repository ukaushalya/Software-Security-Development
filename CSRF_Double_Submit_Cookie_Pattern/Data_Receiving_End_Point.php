<?php

session_start();
//check user's login status
if (!isset ($_SESSION['LoginState'])){
    ob_start();
    header('Location: ./login.html');
    ob_end_flush();
    die();
}

//extracting user data from cookie
if(isset($_COOKIE["Details"])){
    $pieces = explode(",", $_COOKIE["Details"]);
    //echo var_dump($pieces);
    $invoiceNo = $pieces[0];
    $accountNo = $pieces[1];
    $billAmount = $pieces[2];
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Data End-Point</title>
  </head>

  <body>
    <label><?php echo $_SESSION['status']; ?></label>
    <label><br>Invoice No : <?php echo $invoiceNo ?></label>
    <label><br><br>Account Number : <?php echo $accountNo ?></label>
    <label><br><br><br>Bill Amount : <?php echo $billAmount ?></label>
  </body>
</html>
