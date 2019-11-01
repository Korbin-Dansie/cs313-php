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


//Check for unique username
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

  $statment = 'Select username FROM customers';
  $dbquery = $db->query($statment);
  $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
  for ($i=0; $i < count($results); $i++) {
    if($results[$i] == $_POST["UserName"]){
      echo "Username is already in use.";
      return; //Username is already in use
    }
  }
}//End of try
catch (PDOException $ex)
{
  echo "Reading<br/>";
  echo 'Error!: ' . $ex->getMessage();
  die();
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
