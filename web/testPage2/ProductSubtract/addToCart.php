<?php
session_start();

header('Content-Type: text/plain; charset=utf-8');

if(isset($_POST['productid']) == false) {
  return;
}

if(is_numeric($_POST['productid']) == false) {
  return;
}

include("../QueryOptions/AllProductQuery.php");
$productRow = AllProductQuery(" Where id = " . $_POST['productid'] );
$productRow = $productRow[0];
if($productRow == ""){
}
else {
  print_r($productRow);
}


if(isset($_SESSION["shopping"]) == false) {
  $_SESSION["shopping"] = array();
  array_push($_SESSION["shopping"], $_POST['productid']);
}else {
  array_push($_SESSION["shopping"], $_POST['productid']);
}
print_r($_SESSION["shopping"]);

//If we are out of the product dont contine
if($productRow['quantity'] <= 0){
  return;
}
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
  $statment = "update products SET quantity = " . ($productRow['quantity']-1) .
  " WHERE id = " . $productRow['id'];
  $sth = $db->prepare($statment);
  $sth->execute();
  echo "";
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>
