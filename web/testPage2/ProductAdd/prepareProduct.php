<?php
echo "Get<br>";
print_r($_GET);
echo "<br>";
echo "Post<br>";
print_r($_POST);
/* $_POST values
* Array( [ProductName] => asdf [PriceLow] => 100 [Category] => Sword [SubCategory] => Short_Sword [Rarity] => Common )
*
*/
echo "<br>";
  foreach ($_POST as $key => $value) {
    echo "$key";
    echo "---";
    echo "$value";
    echo "<br>";
  }


 ?>
