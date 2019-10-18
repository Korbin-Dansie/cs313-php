<?php
//Print the table in HTML
//Need to call the function in the other php file
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

    $statement = $db->query('SELECT * FROM products ' . $WHEREClause);
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    //Create the tableRows
    echo "<table>";
    for ($i=0; $i < count($results); $i++) {
      echo "<tr>";
      foreach ($results as $key => $value) {
        // code...
        echo "<td>$value</td>";
      }
      echo "</tr>";
    }
    echo "</table>";

    echo "<br/>";
    print_r($results);

  }//End of Try

  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
}

?>
