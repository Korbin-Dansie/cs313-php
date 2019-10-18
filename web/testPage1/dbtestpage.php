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

  <div id="SearchForm">
    <form action="">
      Name: <input type="text" name="ProductName">
      <input type="Button" name="Submit" value="Submit" onclick="updateProducts()">
    </form>




  </div>
  <?php
  include("displayProducts.php");
  ?>

  <script type="text/javascript">
  function updateProducts(){
    var xhr = new XMLHttpRequest();
    xhr.onreadyState = function (){
      if (xhr.readyState == 4 && xhr.status == 200) {
        //Do Stuff
        <?php
        //var divDom = document.getElementById("producTable");
        //divDom.innerHTML = xhr.writeProductsTable();
        ?>
      }
    }
    xhr.open("GET", "displayProducts.php");
    xhr.send(document.getElementById("SearchForm"));
  }

  </script>
</body>
