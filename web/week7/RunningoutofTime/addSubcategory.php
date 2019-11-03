<?php
$var = $_POST['Subcategory'];

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

  $statment = "insert into sub_category (name, categoryid) VALUES ( :var, (SELECT id from category WHERE name='". $_POST['Category']."'))";
  $stmt = $db->prepare($statment);
  $stmt->bindParam(":var", $var, PDO::PARAM_STR);
  $stmt->execute();
}//End of try
catch (PDOException $ex)
{
  echo "Money Query Set error<br/>";
  echo 'Error!: ' . $ex->getMessage();
  die();
}

header('Location: ../dbtestpage.php');
die();
?>
