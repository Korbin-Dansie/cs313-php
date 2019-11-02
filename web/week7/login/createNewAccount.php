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



for ($i=0; $i < count($results); $i++) {
  if($results[$i] == $_POST["UserName"]){
    echo "Username is already in use.";
    return; //Username is already in use
  }
}

//Check if username is unique
include ('../QueryOptions/UserQuery.php');

$usernameQuery = getUsernameQuery('admin1234');

for ($i=0; $i < count($usernameQuery); $i++) {
  if($usernameQuery[$i] == $_POST['Username']){
    echo "Username is not unique";
    return;
  }
}
//Username and Password are filled out and vaild
//Insert them and hash the password
$hash = password_hash($_POST["Password"], PASSWORD_DEFAULT);
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $statment = 'insert into customers
  (username,
  userpassword)
  VALUES
  ( :uname, :upassword)';
  $sth = $db->prepare($statment);
  $sth->bindParam(':uname', $_POST["UserName"], PDO::PARAM_STR);
  $sth->bindParam(':upassword', $hash, PDO::PARAM_STR);
  $sth->execute();
}
catch (PDOException $ex)
{
  echo "Insert<br/>";
  echo 'Error!: ' . $ex->getMessage();
  die();
}

header("Location: ../sign-in.php");
die();


?>
