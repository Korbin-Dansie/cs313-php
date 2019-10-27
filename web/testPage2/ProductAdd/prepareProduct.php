<?php

$returnStringArray = array();
/***********
* Returns an array with the following information
* [categoryname] => Sword   [sub_categoryname] => Short_Sword
* [rarityname] => Common    [productsname] => Steel_Sword
* Dont know if I need this or not but is good to have if needed
***********/
//include("../QueryOptions/Name_Categories_Rarity_Query.php");
//$dbInfo = NameCategoriesRarityQuery();

//Check to make sure all the variables are set
if( !(isset($_POST['ProductName']) && isset($_POST['PriceList']) &&
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
  array_push($returnStringArray, "Price need to be a number");
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
      //Correct value and subCategory
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
    //Correct value and subCategory
    break;
  }
}

if($correctValues == false){
  echo json_encode($returnStringArray);
  return;
}
//All input correct add to dataBase

?>
