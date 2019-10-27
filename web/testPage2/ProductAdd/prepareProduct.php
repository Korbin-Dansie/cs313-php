<?php

$returnStringArray = array();
$subCategoryID;
$rarityID;

/***********
* Returns an array with the following information
* [categoryname] => Sword   [sub_categoryname] => Short_Sword
* [rarityname] => Common    [productsname] => Steel_Sword
* Dont know if I need this or not but is good to have if needed
***********/
//include("../QueryOptions/Name_Categories_Rarity_Query.php");
//$dbInfo = NameCategoriesRarityQuery();

//Check to make sure all the variables are set
if( !(isset($_POST['ProductName']) && isset($_POST['PriceList']) && isset($_POST['Quantity']) &&
isset($_POST['Category']) && isset($_POST['SubCategory']) && isset($_POST['Rarity'])) ) {
  array_push($returnStringArray, "All variables are not set!");
  echo json_encode($returnStringArray);
  return;
}

$correctValues = true;
//Check to make sure all variable have correct values
if($_POST['ProductName'] == ""){
  $correctValues = false;
  array_push($returnStringArray, "Name Cannot Be Blank");

}elseif (substr($_POST['ProductName'], 0, 5) == "@ERR:") {
  $correctValues = false;
  array_push($returnStringArray, "Name Cannot start with @ERR:");

  // code...
}elseif ( strpos($_POST['ProductName'], "'") == true) {
  $correctValues = false;
  array_push($returnStringArray, "Name Cannot contain a ' ");
}

if(!is_numeric($_POST['PriceList'])){
  $correctValues = false;
  array_push($returnStringArray, "Price needs to be a number");
}

if(!is_numeric($_POST['Quantity'])){
  $correctValues = false;
  array_push($returnStringArray, "Quantity needs to be a number");
}

//Check if subcategorys are $correctValues
//[Category] => Sword [SubCategory] => Short_Sword
include("../QueryOptions/CategoriesQuery.php");
$dbInfoCategories = CategoriesQuery();

for ($i=0; $i <= count($dbInfoCategories); $i++) {
  if($i == count($dbInfoCategories)){
    $correctValues = false;
    array_push($returnStringArray, "Category or SubCategory is incorrect");
  }
  else if($dbInfoCategories[$i]['categoryname'] == ($_POST['Category'])){
    if ($dbInfoCategories[$i]['sub_categoryname'] == ($_POST['SubCategory'])) {
      $subCategoryID = $dbInfoCategories[$i]['sub_categoryid'];
      break;
    }
  }
}


//Check if rarity matches up
include("../QueryOptions/RarityQuery.php");
$dbInfoRarity = RarityQuery();
for ($i=0; $i <= count($dbInfoRarity); $i++) {
  if($i == count($dbInfoRarity)){
    $correctValues = false;
    array_push($returnStringArray, "Rarity is incorrect");
  }
  if($dbInfoRarity[$i]['name'] == $_POST['Rarity']){
    $rarityID = $dbInfoRarity[$i]['id'];
    break;
  }
}

if($correctValues == false){
  echo json_encode($returnStringArray);
  return;
}
//All input correct add to dataBase
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
  $statment = 'insert into products
  (rarityid,
  name,
  quantity,
  price,
  sub_categoryid)
  VALUES (:rid, :pname, :quantity, :price, :subid)';
  $db->prepare($statment);
  $db->bindParam(':rid', $rarityID, PDO::PARAM_INT);
  $db->bindParam(':pname', $_POST['ProductName'], PDO::PARAM_STR);
  $db->bindParam(':quantity', $_POST['Quantity'], PDO::PARAM_INT);
  $db->bindParam(':price', $_POST['PriceList'], PDO::PARAM_INT);
  $db->bindParam(':subid', $subCategoryID, PDO::PARAM_INT);
  $db->execute();
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}


?>
