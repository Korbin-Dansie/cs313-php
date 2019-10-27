<?php
header('Content-Type: text/plain; charset=utf-8');

echo ($_POST['productid'] . " From php");
if(is_numeric($_POST['productid']) == false) {
  echo "Not numaric";
  return;
}
echo "is numaric";

//include("../QueryOptions/AllProductQuery.php");
//$inRange = AllProductQuery(" Where id = " . $_POST['productid'] );
return;

if($inRange == ""){
}



return;
 ?>
