<?php
//Print the table in HTML
function writeProductsTable($WHEREClause = '')
{
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


    $statement = $db->query('SELECT * FROM products ');
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    print_r($results);

  }//End of Try

  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}

?>
