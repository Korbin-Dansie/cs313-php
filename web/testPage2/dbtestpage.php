<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/HomeButton.css" />
  <link rel="stylesheet" type="text/css" href="../css/productTable.css" />
  <link rel="icon" href="../img/KtechIcon.png">
  <title>Korbin Dansie's</title>
  <script src="displayProductsUIAjax.js"></script>
  <script src="displayProductsAjax.js"></script>

</head>

<body onload="updateProducts(this.id, productTable)">
  <h1><a href="../index.html" id="homeButton">CS 313 Assignments</a></h1>
  <h2>By: Korbin Dansie</h2>
  <br />

  <div>
    <?php include("displayPrepareUI.php") ?>
  </div>

  <div id="prepareTable">

  </div>

  <div>
    <?php include("displayProductsUI.php"); ?>
  </div>

  <div id="productTable">
  </div>
</body>
