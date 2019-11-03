<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/HomeButton.css" />
  <link rel="stylesheet" type="text/css" href="../css/productTable.css" />
  <link rel="icon" href="../img/KtechIcon.png">
  <title>Korbin Dansie's</title>
  <script src="QueryOptions/CategoriesUpdateAjax.js"></script>
  <script src="ProductDisplay/displayProductsAjax.js"></script>
  <script src="ProductAdd/prepareProductsAjax.js"></script>
  <script src="ProductSubtract/addToCartAjax.js"></script>


</head>

<body onload="updateProducts('SearchForm', 'productTable')">
  <h1><a href="../index.html" id="homeButton">CS 313 Assignments</a></h1>
  <h2>By: Korbin Dansie</h2>
  <br />
  <h1>Admin</h1>
  <h2><a href="homePage.php">Back</a></h2>

  <h2>Add Category</h2>
  <form class="" action="RunningoutofTime/addCategory.php" method="post">
    <input type="text" name="Category" value="">
    <input type="Submit" name="Submit" value="Submit">
  </form>

  <h2>Add Sub-Category</h2>
  <form class="" action="RunningoutofTime/addCategory.php" method="post">
    <select class="Category" name="">
      <option value="">None</option>
      <?php include('QueryOptions/categoryOptions.php'); ?>
    </select>
    <input type="text" name="Category" value="">
    <input type="Submit" name="Submit" value="Submit">
  </form>


  <h2>Add Product</h2>
  <div>
    <?php include("ProductAdd/displayPrepareUI.php"); ?>
  </div>

  <div id="prepareTable">

  </div>
  <h2>Display Product</h2>

  <div>
    <?php include("ProductDisplay/displayProductsUI.php"); ?>
  </div>

  <div id="productTable">
  </div>
</body>
