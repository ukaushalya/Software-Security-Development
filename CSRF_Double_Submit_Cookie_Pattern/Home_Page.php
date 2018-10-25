<?php

session_start();
//check user login status
if (!isset ($_SESSION['LoginState'])){
    ob_start();
    header('Location: ./login.html');
    ob_end_flush();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="./js/token_request.js"></script>
    <title>HomePage</title>
  </head>
  <!--Invoking a javascript function to get CSRF token and set it in the hidden field of form -->
  <body onload="_tokenRequest('<?php echo $_COOKIE['Session'];?>')">
  <div class="wrapper">
    <form name="loginForm" action="Validate_Token.php"  method="post">
      <label style="margin-left: -25%; margin-right: auto; width: 100%;">Bill Payment Gateway</label>
      <input type="text" required="required" class="input-group mb-3" name="invoiceNo" placeholder="Invoice No :">
      <br>
      <input type="text" required="required" name="accountNo" placeholder="Account Number :">
      <br>
      <input type="text" required="required" name="billAmount" placeholder="Bill Amount :">
      <br>
      <input type="hidden" id="MyToken" name="MyToken" value="" />
      <input type="hidden" id="CSRFcookie" name="CSRFcookie" value="" />
      <input type="submit"  class="btn btn-submit"value="Submit">
    </form>
  </div>
  </body>
</html>
