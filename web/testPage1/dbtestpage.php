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
    var formElements = formLocation.elements;
    alert(formElements);
    for (var i = 0,var element; element = formElements[i++];) {
      if (element.type === "INPUT" && element.value != ""){
        getString += element.getAttribute("name") + "=" + element.value;
      }
      else{
        alert()
      }
      alert(element.getAttribute("name") + "=" + element.value);
    }

    if(getString.length == 1){
      getString = "";
    }

    //Get String is prepared
    xhr.open("GET", "displayProducts.php" + getString);
    xhr.send();
  }
  </script>
</head>

<body>
  <h1><a href="../index.html" id="homeButton">CS 313 Assignments</a></h1>
  <h2>By: Korbin Dansie</h2>
  <br />

  <div>
    <form action="" id="SearchForm">
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
