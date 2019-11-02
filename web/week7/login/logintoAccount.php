<?php
echo "Start<br>";
session_start();
echo "End<br>";
?>
<?php
//session_start();
//Check variables are correct
if(!isset($_POST["UserName"])) {
  echo "Username not set<br>";
  return;
}

if(!isset($_POST["Password"])) {
  echo "Password not set<br>";
  return;
}

if($_POST["UserName"] == "" || $_POST["Password"] == "") {
  echo "Username and password cannot be blank<br>";
  return;
}


//Check is password is valid

include('../QueryOptions/UserQuery.php');
$setPassword = getPasswordForUsername($_POST["UserName"]);

if(password_verify( $_POST["Password"], $setPassword)) {
  echo "Password varified.";
  $_SESSION['Username'] = $_POST["UserName"];
  header("Location: ../homePage.php");
  die();
  //Passwords are the same
}
else{
  echo "Password not valid.";
  header("Location: ../sign-in.php");
  die();
}
?>
