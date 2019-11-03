<?php
function getMoneyQuery($username){
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

    $statment = "Select money FROM customers where username='" . $username . "'";
    $dbquery = $db->query($statment);
    $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
    return $results[0]['money'];
  }//End of try
  catch (PDOException $ex)
  {
    echo "Money get Error<br/>";
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}

function setMoneyQuery($username, $amount){
  if(!is_numeric($amount)){
    echo "Amonut is not a number";
    return;
  }
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

    $statment = "update customers SET money = :money where username='" . $username . "' ";
    $stmt = $db->prepare($statment);
    $stmt->bindParam(":money", $amount, PDO::PARAM_INT);
    $stmt->execute();
  }//End of try
  catch (PDOException $ex)
  {
    echo "Money Query Set error<br/>";
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}



 ?>
