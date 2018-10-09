<?php

//session creation
session_start();
//set session variable for check user loging status
$_SESSION['LoginState'] = 'SET';

//setting a cookie for current session
$sessionID = session_id();
$SessionExpiry = time()+60*60*24;
setcookie('Session', $sessionID, $SessionExpiry, '', '', '', FALSE);

//Generate CSRF Token 
$CSRF_TOKEN = hash('sha256', $sessionID.rand(1000,10000));

//setting a cookie for CSRF Token
//sessionID use as cookie name for csrf token for map the session id and csrf token
$TokenExpiry = time()+60*60*24;
setcookie($sessionID, $CSRF_TOKEN, $TokenExpiry, '', '', '', FALSE);

header('Location: ./Home_Page.php');
?>
