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


//Check to make sure all the variables are set
if( !(isset($_POST['ProductName']) && isset($_POST['PriceList']) &&
isset($_POST['SubCategory']) && isset($_POST['Rarity']) && isset($_POST['Rarity']))) {
  echo "All variables are not set!";
  return;
}

echo "All variables set.";
?>
