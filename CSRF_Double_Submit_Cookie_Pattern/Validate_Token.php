<?php

session_start();
//check user's login status
if (!isset ($_SESSION['LoginState'])){
    ob_start();
    header('Location: ./login.html');
    ob_end_flush();
    die();
}
//getting user submitted CSRF Token value
$userCSRF = $_POST['MyToken'];
//getting user submitted CSRF token cookie
$cookieCSRF = $_POST['CSRFcookie'];
$cookieValue = $_COOKIE[$cookieCSRF];

//compare user submitted CSRF token with  user submitted cookie's value
if ($userCSRF == $cookieValue){
  $_SESSION['status'] = "Details submitted!!! ";
  setcookie("Details",$_POST['invoiceNo'].",".$_POST['accountNo'].",".$_POST['billAmount']);
}else{
  $_SESSION['status'] = "Invalid Token!!!";
  setcookie("Details","".",".","."");
}
header('Location: ./Data_Receiving_End_Point.php');
?>
