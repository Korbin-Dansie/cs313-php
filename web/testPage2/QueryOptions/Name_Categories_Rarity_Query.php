<?php //Create a query to add all options to Catagory
//header("Content-Type: text/plain");
function NameCategoriesRarityQuery() {
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
    * [productsid] => 1      [categoryname] => Sword       [sub_categoryname] => Short_Sword
    * [rarityname] => Common [productsname] => Steel_Sword [productsquantity] => 100
    * [productsprice] => 12
    ***********/
    $statment = 'select
    Products.name AS ProductsName,
    Category.name AS CategoryName,
    Sub_Category.name AS Sub_CategoryName,
    Rarity.name AS RarityName
    from products
    left OUTER JOIN Rarity
    ON products.rarityid = Rarity.id
    left OUTER JOIN Sub_Category
    ON products.sub_categoryid = Sub_Category.id
    left OUTER JOIN Category
    ON Sub_Category.categoryid = Category.id';

    $dbquery = $db->query($statment);
    $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
    return $results;

  }
  catch (PDOException $ex)
  {
    die();
    return "'Error!: ' . $ex->getMessage()";
  }
}
?>
