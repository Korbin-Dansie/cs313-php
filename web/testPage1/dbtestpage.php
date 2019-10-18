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

<<<<<<< HEAD



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

        var divDom = document.getElementById("producTable");
        divDom.innerHTML = xhr.responseText;
=======
  <?php

  try
  {
    $dbUrl = getenv('DATABASE_URL');
    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"],'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $statement = $db->query('SELECT * FROM products');
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    print_r($results);

  }//End of Try
>>>>>>> d9e3e93482bc9625f3cbefc211dbfab276f21b6c

      }
    }
    xhr.open("GET", "displayProducts.php");
    xhr.send(document.getElementById("SearchForm"));
  }

  </script>
</body>
