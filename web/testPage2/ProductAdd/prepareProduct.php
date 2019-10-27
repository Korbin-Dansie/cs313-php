<?php

$returnStringArray = array();
echo "Get<br>";
print_r($_GET);
echo "<br>";
echo "Post<br>";
print_r($_POST);
/* $_POST values
* Array( [ProductName] => asdf [PriceList] => 100 [Category] => Sword [SubCategory] => Short_Sword [Rarity] => Common )
*/
echo "<br>";
foreach ($_POST as $key => $value) {
  echo "$key";
  echo "---";
  echo "$value";
  echo "<br>";
}


/***********
* Returns an array with the following information
* [categoryname] => Sword   [sub_categoryname] => Short_Sword
* [rarityname] => Common    [productsname] => Steel_Sword
* Dont know if I need this or not but is good to have if needed
***********/
//include("../QueryOptions/Name_Categories_Rarity_Query.php");
//$dbInfo = NameCategoriesRarityQuery();

echo "<br>";
//Check to make sure all the variables are set
if( !(isset($_POST['ProductName']) && isset($_POST['PriceList']) &&
isset($_POST['Category']) && isset($_POST['SubCategory']) && isset($_POST['Rarity'])) ) {
  echo "All variables are not set!";
  return;
}
?>
