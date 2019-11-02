<?php
session_start();
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
  echo "Username and password cannot be blank<br>";
  return;
}


//Check is password is valid
include('../QuperyOptions/UserQuery.php');
$setPassword = getPasswordForUsername($_POST["UserName"]);
if(password_verify( $_POST["Password"], $setPassword) ) {
  $_Session['Username'] = $_POST["UserName"];
  header("Location: ../homePage.php");
  die();
  //Passwords are the same
}
else{
  header("Location: ../sign-in.php");
  die();

}
?>
