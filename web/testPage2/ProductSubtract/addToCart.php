<?php
header('Content-Type: text/plain; charset=utf-8');

if(isset($_POST['productid']) == false) {
  echo "Not Set";
  return;
}

if(is_numeric($_POST['productid']) == false) {
  echo "Not numaric";
  return;
}

include("../QueryOptions/AllProductQuery.php");
$inRange = AllProductQuery(" Where id = " . $_POST['productid'] );

if($inRange == ""){
  echo "Range Blank";
}
else {
  print_r($inRange);
}


if(!isset($_SESSION["shopping"])) {
  $_SESSION["shopping"] = array();
  array_push($_SESSION["shopping"], $_POST['productid']);
}else {
  array_push($_SESSION["shopping"], $_POST['productid']);
}

return;
 ?>
