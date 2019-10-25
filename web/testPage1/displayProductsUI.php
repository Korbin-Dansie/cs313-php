<?php
header("Content-Type: text/plain");
 ?>

<?php //Create a query to add all options to Catagory
echo "Try";
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
  echo "Selects";
  $statment = 'Select category.name from public.category;';

  $dbquery = $db->query($statment);
  $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
  echo "Here2";
  catch (PDOException $ex)
  {
    echo 'Error!: ' . $ex->getMessage();
    die();
  }
  ?>
