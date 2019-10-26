<?php //Create a query to add all options to Catagory
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

  /***********
  * Returns an array with the following information
  * [productsid] => 1      [categoryname] => Sword       [sub_categoryname] => Short_Sword
  * [rarityname] => Common [productsname] => Steel_Sword [productsquantity] => 100
  * [productsprice] => 12
  ***********/
  $statment = 'Select name from rarity';

  $dbquery = $db->query($statment);
  $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
  for ($i=0; $i < count($results); $i++) {
    foreach ($results[$i] as $key => $value) {
      $safeChars = htmlspecialchars($value);
      $classVar = "class=\"" . $safeChars . "\"";
      echo "<option value=\"$safeChars\" $classVar>$safeChars</option>";
    }
  }
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>
