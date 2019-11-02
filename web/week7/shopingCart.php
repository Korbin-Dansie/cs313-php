<?php
session_start();
if (isset($_POST["removeFromCart"])) {
  \array_splice($_SESSION["newIteams"], $_POST["cartIndex"], 1);
  header("Location: shopingCart.php");
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
<body>
  <div id="body">
    <?php require_once('topNav.php');?>

      <div class="sideAdd">
      </div>


      <div class="mainContect">
        <h1>Shopping Cart</h1>

        <form class="" action="index.html" method="post">

        </form>
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
