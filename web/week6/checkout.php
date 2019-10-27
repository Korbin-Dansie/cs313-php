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

  <style media="screen">
  #finePrint{
    font-size: x-small;
    font-family: monospace;
  }

  span{
    font-size: large;
    font-family: sans-serif;
  }

  .mainContect h1{
    border-bottom: #9966ff solid 2px;
  }

  .mainContect{
    min-height: 600px;
  }

  #navagation{
    width: 900px;
    display: inline-block;
  }

  .topnav nav ul{
    float: left;
    padding-left: 5px;
    margin-top: 0px;
  }

  table img{
    display: inline-block;
    height: 100px;
    width: 100px;
  }
</style>

</head>

<body onload="resetForm()">
  <header>
    <h1><a href="../index.php" id="homeButton">CS 313 Assignments</a></h1>
    <h2>By: Korbin Dansie</h2>
    <p>Assignment 3</p>
    <hr />
  </header>

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
