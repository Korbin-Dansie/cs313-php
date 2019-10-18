<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" type="text/css" href="../css/HomeButton.css" />
  <link rel="icon" href="../img/KtechIcon.png">
  <title>Korbin Dansie's</title>
  <script type="text/javascript">
  function updateProducts(){
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function (){
      if (xhr.readyState == 4 && xhr.status == 200) {
        var divDom = document.getElementById("productTable");
        divDom.innerHTML = xhr.responseText;
      }
    };
    xhr.open("POST", "displayProducts.php");
    xhr.send(document.getElementById('SearchForm'));
  }
  </script>
</head>

<body>
  <h1><a href="../index.html" id="homeButton">CS 313 Assignments</a></h1>
  <h2>By: Korbin Dansie</h2>
  <br />

  <div id="SearchForm">
    <form action="">
      Name: <input type="text" name="ProductName">
      <input type="Button" name="Submit" value="Submit" onclick="updateProducts()">
    </form>
  </div>

  <div id="productTable">

  </div>

<script type="text/javascript">
  updateProducts();
</script>


</body>
