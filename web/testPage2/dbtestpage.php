<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/HomeButton.css" />
  <link rel="icon" href="../img/KtechIcon.png">
  <title>Korbin Dansie's</title>
  <script src="displayProductsAjax.js"></script>
</head>

<body>
  <h1><a href="../index.html" id="homeButton">CS 313 Assignments</a></h1>
  <h2>By: Korbin Dansie</h2>
  <br />

  <div>
    <form method="get" action="" id="SearchForm">
      Name: <input type="text" name="ProductName">
      <br/>
      Price <input type="text" name="PriceLow"><input type="text" name="PriceHigh">
      Catagory <input type="text" name="" value="">
      <input type="reset"  name="Reset" value="Clear">
      <input type="button" name="Submit" value="Submit" onclick="updateProducts()">
    </form>
  </div>

  <div id="productTable">
  </div>

  <script type="text/javascript">
  updateProducts();
  </script>


</body>
