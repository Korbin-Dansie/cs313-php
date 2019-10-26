<?php
echo "Get<br>";
print_r($_GET);
echo "<br>";
echo "Post<br>";
print_r($_POST);
/* $_POST values
* Array( [ProductName] => asdf [PriceList] => 100 [Category] => Sword [SubCategory] => Short_Sword [Rarity] => Common )
*
*/
echo "<br>";
foreach ($_POST as $key => $value) {
  echo "$key";
  echo "---";
  echo "$value";
  echo "<br>";
}

include ("Name_Categories_Rarity_Query.php");
echo NameCategoriesRarityQuery();
echo "<br>";
//Check to make sure all the variables are set
if( !(isset($_POST['ProductName']) && isset($_POST['PriceList']) &&
isset($_POST['Category']) && isset($_POST['SubCategory']) && isset($_POST['Rarity']))) {
  echo "All variables are not set!";
  return;
}

$correctValues = true;
//Check to make sure all variable have correct values
if($_POST['ProductName'] == ""){
  $correctValues = false;

}elseif (substr($_POST['ProductName'], 0, 5) == "@ERR:") {
  $correctValues = false;
  // code...
}

if(!is_numeric($_POST['PriceList'])){
  $correctValues = false;

}
?>
