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
  <style>
    .wrapper {
        margin-top: 12em;
        width:100%;
    }
    .std{
      -webkit-box-shadow: 7px 6px 13px -1px rgba(0,0,0,0.75);
-moz-box-shadow: 7px 6px 13px -1px rgba(0,0,0,0.75);
box-shadow: 7px 6px 13px -1px rgba(0,0,0,0.75);
background-color: rgba(255,255,255,0.3);
border-radius:8px; 
width: 40%;
font-size:30px;
padding:10px;
color:white;
    }
    .rcol{
      text-align:right;
      width:55%;
      padding-right:8px;
    }
    .sp{
      padding:10px;
      /* border-bottom:black solid 1px; */
      text-align:center;
      color:darkgray;
    }
</style>

<body>

    <div class="wrapper">
        <table style="width: 100%; margin-left: auto; margin-right: auto;" border="0" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td></td>
                    <td class="std">
                        <table style="margin-left: auto; margin-right: auto; width: 100%;" border="0" cellspacing="0" cellpadding="0">
                            <tbody >
                              <tr>
                                <td class="sp" colspan="3"><?php echo $_SESSION['status']; ?></td>
                              </tr>
                              <tr>
                                <td colspan="3"><hr/></td>
                              </tr>
                                <tr>
                                    <td class="rcol">Invoice No : </td>
                                    <td><?php echo $invoiceNo ?></td>
                                </tr>
                                <tr>
                                    <td class="rcol">Account Number : </td>
                                    <td><?php echo $accountNo ?></td>
                                </tr>
                                <tr>
                                    <td class="rcol">Bill Amount :</td>
                                    <td><?php echo $billAmount ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    
</body>
</html>
