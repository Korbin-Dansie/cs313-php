<?php
header('Content-Type: text/plain; charset=utf-8');

echo ($_POST['productid'] . " From php");
if(is_numeric($_POST['productid']) == false) {
  return;
}

include("../QueryOptions/AllProductQuery.php");
$inRange = AllProductQuery(" Where product.id = " . $_POST['productid']);
return;

if($inRange == ""){
}


if(!isset($_SESSION["shopping"]){
  $_SESSION["shopping"] = array();
  array_push($_SESSION["shopping"], $_POST['productid']);
}else {
  array_push($_SESSION["shopping"], $_POST['productid']);
}

return "Success";
 ?>
