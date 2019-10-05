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
<body>
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
        <h1>Confirmation</h1>
        <table>
          <tr>
            <th>Product</th>
            <th>Price</th>
          </tr>
          <?php
          $totalPrice = 0;
          foreach ($_SESSION["newIteams"] as $key => $value){
            echo '<tr>';
            echo '<td>'.$_SESSION["newIteams"][$key]["itemName"].'</td>';
            echo '<td>'. $_SESSION["newIteams"][$key]["itemPrice"] . '</td>';
            echo '</tr>';
            $totalPrice += $_SESSION["newIteams"][$key]["itemPrice"];
          }
          ?>
          <tr>
            <td>Total</td>
            <td><?php  echo "$totalPrice";?></td>
          </tr>
        </table>

        <table>
          <tr>
            <td>Address</td>
            <td><?php echo $_SESSION["address"]; ?></td>
          </tr>
        </table>


        <div>
          <a href="week3.php">Home</a>
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

      <?php
      session_destroy();
      ?>
