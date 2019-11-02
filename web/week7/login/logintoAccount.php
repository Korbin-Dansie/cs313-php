<?php
//Check variables are correct
if(!isset($_POST["UserName"])) {
  return;
}

if(!isset($_POST["Password"])){
  return;
}

if($_POST["UserName"] == "" || $_POST["Password"] == ""){
  return;
}


//Check is password is valid
include('../QueryOptions/UserQuery.php');
$setPassword = getPasswordForUsername($_POST["UserName"], "admin1234");
if(password_verify($_POST["Password"], $setPassword)) {
echo "Passwords are the same";
}
 ?>
