<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/HomeButton.css" />
  <link rel="icon" href="../img/KtechIcon.png">
  <title>Korbin Dansie's</title>
</head>

<body>
  <h1><a href="../index.html" id="homeButton">CS 313 Assignments</a></h1>
  <h2>By: Korbin Dansie</h2>
  <br />


  <?php
  include("displayProducts.php");
  writeProductsTable('WHERE productid=1');
  ?>
</body>
