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
    }

    //Prepare the Get String
    var getString = "?";
    var formLocation = document.getElementById("SearchForm");
    var formElements = formLocation.getElementsByTagName("INPUT");
    for (var i = 0, element; element = formElements[i++];) {
      if (element.value !== ""){
        getString += element.getAttribute("name") + "=" + element.value + "&";
      }
    }

    //Trim last charactar of the string to prevent errors
    getString = getString.substring(0, getString.length - 1);

    //Get String is prepared
    //Pass in the current GET Paramaters
    xhr.open("GET", "displayProducts.php" + location.search);
    xhr.send(null);
  }
  </script>
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
      <input type="Submit" name="Submit" value="Submit">
    </form>
  </div>

  <div id="productTable">

  </div>

  <script type="text/javascript">
  updateProducts();
</script>


</body>
