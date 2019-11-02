<?php
//Check variables are correct
if(!isset($_POST["UserName"])) {
  echo "username not set<br>";
  return;
}

if(!isset($_POST["Password"])){
  echo "password not set<br>";
  return;
}

if($_POST["UserName"] == "" || $_POST["Password"] == ""){
  return;
}


//Check is password is valid
include('../QueryOptions/UserQuery.php');
$setPassword = getPasswordForUsername($_POST["UserName"], "admin1234");
echo "SetPassword:$setPassword<br>";
if(password_verify($setPassword, $_POST["Password"])) {
echo "Passwords are the same";
}
else{
  echo "Passwords are NOT the same";
}
 ?>
