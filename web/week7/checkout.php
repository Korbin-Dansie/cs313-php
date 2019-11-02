<?php
session_start();
if (isset($_POST["address"])) {
  $_SESSION['address'] = $_POST["address"];
  header("Location: checkout.php");
  return;
}
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
  <script type="text/javascript" src="assign06.js">
  </script>
  <script type="text/javascript">
  function hello()
  {
    alert("hello");
  }
  </script>
</head>

<body onload="resetForm()">
  <div id="body">
    <?php require_once('topNav.php');?>

      <div class="sideAdd">
      </div>


      <div class="mainContect">
        <h1>Check out</h1>

        <form method="post">
          <?php
          if (isset($_SESSION['address'])) {
            echo '<input type="text" name="address" value="'.$_SESSION["address"].'">';
          }
          else {
            echo '<input type="text" name="address" value="">';
          }
           ?>
           <input type="submit" name="sumbit" value="Submit">
        </form>

        <div>
          <a href="shopingCart.php">Back</a>
          <?php
          if (isset($_SESSION['address'])) {
            echo '<a href="Confirmation.php">Confirm Purchase</a>';
          }
          else {
            echo 'Submit Address';
          }
           ?>
        </div>
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
