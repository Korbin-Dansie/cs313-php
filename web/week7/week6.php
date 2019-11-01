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


  <script type="text/javascript" src="assign06.js">
  </script>
  <script src="QueryOptions/CategoriesUpdateAjax.js"></script>
  <script src="ProductDisplay/displayProductsAjax.js"></script>
  <script src="ProductAdd/prepareProductsAjax.js"></script>
  <script src="ProductSubtract/addToCartAjax.js"></script>

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

<body onload="updateProducts('SearchForm', 'productTable')">
  <header>
    <h1><a href="../index.php" id="homeButton">CS 313 Assignments</a></h1>
    <h2>By: Korbin Dansie</h2>
    <hr />
  </header>

  <div id="body">
    <?php require_once('topNav.php');?>

    <div class="sideAdd">
      <?php include("ProductDisplay/displayProductsUI.php"); ?>
    </div>


    <div class="mainContect">
      <h1>Shopping Cart</h1>
      <div id="productTable">
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
