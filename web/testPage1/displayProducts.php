<?php
//Print the table in HTML
//Check if there are sorting variables
$WHEREclause = 'WHERE ';
if(isset($_GET))
{
  $searchValues = array();
  if(isset($_GET['ProductName'])) {
    if($_GET['ProductName'] != ""){
      array_push($searchValues,"LOWER(name) LIKE LOWER('%".$_GET['ProductName']."%')");
    }
  }
  if(isset($_GET['PriceLow']) && isset($_GET['PriceHigh'])){
    if(($_GET['PriceLow'] != "") && ($_GET['PriceHigh'] != "")) {
      array_push($searchValues, "Price BETWEEN " . $_GET['PriceLow'] . ' and ' . $_GET['PriceHigh']);
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
  * [id] => 1         [rarityid] => 1 [name] => Steel_Sword
  * [quantity] => 100 [price] => 12   [sub_categoryid] => 1
  ***********/
  $statment =
  'select
  Products.id,
  Category.name,
  Sub_Category.name,
  Rarity.name,
  Products.name,
  Products.quantity,
  Products.price
  from products
  left OUTER JOIN Rarity
  ON products.rarityid = Rarity.id
  left OUTER JOIN Category
  ON products.sub_categoryid = Category.id
  left OUTER JOIN Sub_Category
  ON products.sub_categoryid = Sub_Category.id
  ';

  $dbquery = $db->query($statment . $WHEREclause . ';');
  $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
  print_r($results);
  //Create the tableRows
  $returnString .= "<table id='productTable'>";
  //Create table headers
  $returnString .= "<tr>";
  $returnString .= "<th>ID</th>";
  $returnString .= "<th>Name</th>";
  $returnString .= "<th>Quantity</th>";
  $returnString .= "<th>Price</th>";
  $returnString .= "</tr>";
  for ($i=0; $i < count($results); $i++) {
    $returnString .= "<tr>";
    foreach ($results[$i] as $key => $value) {
      // code...
      $returnString .= "<td>$value</td>";
    }
    $returnString .= "</tr>";
  }
  $returnString .= "</table>";
  echo "$returnString";
}//End of Try

catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}


?>
