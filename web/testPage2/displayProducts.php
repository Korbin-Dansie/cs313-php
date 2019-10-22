<?php
/***********
* Possible values that should be returned with get
*  ProductName, PriceLow, PriceHigh, Category
*  Clear, Submit
*
* Names of rows for sql where
* Products.id,
*	Category.name,
*	Sub_Category.name,
*	Rarity.name,
*	Products.name,
*	Products.quantity,
*	Products.price
*
* The names of the coloms to diplay
* [productsid] => 1      [categoryname] => Sword       [sub_categoryname] => Short_Sword
* [rarityname] => Common [productsname] => Steel_Sword [productsquantity] => 100
* [productsprice] => 12
***********/

//Print the table in HTML
//Check if there are sorting variables
$WHEREclause = 'WHERE ';
if(isset($_GET)){
  $searchValues = array();
  if(isset($_GET['ProductName'])) {
    if($_GET['ProductName'] != ""){
      array_push($searchValues,"LOWER(Products.name) LIKE :pass");
    } //LOWER('%:pass%')
  }
  if(isset($_GET['PriceLow']) && isset($_GET['PriceHigh'])){
    if(($_GET['PriceLow'] != "") && ($_GET['PriceHigh'] != "")) {
      array_push($searchValues, "Products.price BETWEEN " . $_GET['PriceLow'] . ' and ' . $_GET['PriceHigh']);
    }
  }

  if(isset($_GET['Category'])){
    if($_GET['Category'] != ""){
      array_push($searchValues, "LOWER(Sub_Category.name) LIKE LOWER('%".$_GET['Category']."%')");
    }
  }


  //Add 'and' between search values
  foreach ($searchValues as $key) {
    $WHEREclause .= $key;
    if(end($searchValues) != $key){
      $WHEREclause .= " and ";
    }
  }
}

if($WHEREclause == 'WHERE ') {
  $WHEREclause = '';
}
//End of preparing Whereclause

//The string we will return when we end
$returnString = '';
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

  /***********
  * Returns an array with the following information
  * [productsid] => 1      [categoryname] => Sword       [sub_categoryname] => Short_Sword
  * [rarityname] => Common [productsname] => Steel_Sword [productsquantity] => 100
  * [productsprice] => 12
  ***********/
  $statment =
  'select
  Products.id AS ProductsID,
  Category.name AS CategoryName,
  Sub_Category.name AS Sub_CategoryName,
  Rarity.name AS RarityName,
  Products.name AS ProductsName,
  Products.quantity AS ProductsQuantity,
  Products.price AS ProductsPrice
  from products
  left OUTER JOIN Rarity
  ON products.rarityid = Rarity.id
  left OUTER JOIN Category
  ON products.sub_categoryid = Category.id
  left OUTER JOIN Sub_Category
  ON products.sub_categoryid = Sub_Category.id
  ';

  $dbquery = $db->prepare("\"" . $statment . " " . $WHEREclause . "\"");
  $dbquery->execute(
    [
      ':pass' => "LOWER('%$_GET['ProductName']%')"
    ]);

  echo "$dbquery";
  return;

  $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
  //Create the tableRows
  $returnString .= "<table id='productTable'>";
  //Create table headers
  $returnString .= "<tr>";
  $returnString .= "<th>ID</th>";       //Row Number
  $returnString .= "<th>Category</th>"; //Sub Category
  $returnString .= "<th>Name</th>";     //name
  $returnString .= "<th>Quantity</th>"; //Quantity
  $returnString .= "<th>Price</th>";    //Price
  $returnString .= "</tr>";

  //For per Row
  for ($i=0; $i < count($results); $i++) {
    $returnString .= "<tr>";
    $productsnameSTR = "";
    //For per column
    foreach ($results[$i] as $key => $value) {
      //Values we dont want
      if($key == "categoryname"){
        continue;
      }
      //Have rarity info come before product name
      else if($key == "rarityname"){
        $productsnameSTR .= "<td class=\"$value\">";
      }
      else if($key == "productsname"){
        $productsnameSTR .= "$value</td>";
        $returnString .= $productsnameSTR;
      }
      else {
        $returnString .= "<td>$value</td>";
      }
    }

    $returnString .= "</tr>";
  }

  $returnString .= "</table>";
  header('Content-Type: text/plain; charset=utf-8');
  echo "$returnString";
}//End of Try

catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>
