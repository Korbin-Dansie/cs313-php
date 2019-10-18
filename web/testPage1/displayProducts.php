<?php
//Print the table in HTML
//Need to call the function in the other php file
$returnString = '';
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
  $returnString .= "<table id='producTable'>";
  //Create table headers
  $returnString .= "<tr>";
  $returnString .= "<th>ID</th>";
  $returnString .= "<th>Name</th>";
  $returnString .= "<th>Quantity</th>";
  $returnString .= "<th>Price</th>";
  $returnString .= "</tr>";
  for ($i=0; $i < count($results); $i++) {
    $returnString .= "<tr>";
    foreach ($results[$i] as $key => $value) {
      // code...
      $returnString .= "<td>$value</td>";
    }
    $returnString .= "</tr>";
  }
  $returnString .= "</table>";
  echo "$returnString";
}//End of Try

catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}


?>
