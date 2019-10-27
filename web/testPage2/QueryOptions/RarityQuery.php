<?php //Create a query to add all options to Catagory
//header("Content-Type: text/plain");
function RarityQuery() {
  try{
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
    * [categoryname] => Sword              [Categoryid] => 1
    * [sub_categoryname] => Short_Sword    [Sub_Categoryid] => 1
    ***********/
    $statment = 'select
    rarity.name, rarity.id
    from rarity;';

    $dbquery = $db->query($statment);
    $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
    return ($results);

  }
  catch (PDOException $ex)
  {
    die();
    return   "'Error!: ' . $ex->getMessage()";
  }
}
?>
