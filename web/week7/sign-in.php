<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Test Page</title>
  <link rel="icon" href="images/KtechIcon.png">
  <link rel="stylesheet" type="text/css" href="assign04.css" />
  <link rel="stylesheet" type="text/css" href="../css/HomeButton.css" />
  <link rel="stylesheet" type="text/css" href="assign06.css">
  <link rel="stylesheet" type="text/css" href="../css/productTable.css" />
  <link rel="stylesheet" type="text/css" href="../css/productTableUI.css" />
</head>

<body onload="updateProducts('SearchForm', 'productTable')">
  <div id="body">
    <?php require_once('topNav.php');?>

    <div class="mainContect">
      <h1>Sign In</h1>

      <form class="" action="login/logintoAccount.php" method="post">
            <input type="text" name="UserName" value="admin" placeholder="Username">
            <input type="text" name="Password" value="1234" placeholder="Password">
            <input type="Submit" name="Submit" value="Login">
      </form>

      <p><a href="sign-up.php">Create a new account.</a></p>

    </div><!--End of Main mainContect-->

    <footer>
      <h2>This is a made up page</h2>
      <p>We do not sell weapons and everything else on this site
        is made up informaiton.</p>
        <p>Also since this is made for school many of the links are broken.</p>
        Copyright 2019. All Rights Reserved
        <p id="finePrint"><small>We make <strong>no promise</strong> what so ever. Everything up above is made up.
          If you order a weapon from up it may <strong>never even show up.</strong></small></p>

        </footer>

      </div><!--End of body-->

    </body>
    </html>
