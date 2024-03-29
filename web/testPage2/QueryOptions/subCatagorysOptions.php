<?php
header("Content-Type: text/plain");

if(isset($_GET["Catagory"])) {
  if($_GET["Catagory"] != "")
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

      /***********
      * Returns an array with the following information
      * [productsid] => 1      [categoryname] => Sword       [sub_categoryname] => Short_Sword
      * [rarityname] => Common [productsname] => Steel_Sword [productsquantity] => 100
      * [productsprice] => 12
      ***********/
      $statment =
      'Select sub_category.name
      from
      category
      left outer Join sub_category on
      sub_category.categoryid = category.id
      where category.name =
      ';
      $whereClause = " '" . stripslashes($_GET["Catagory"]) . "'";
      //. " '" . $_GET["Catagory"] . "'"
      $dbquery = $db->query($statment . $whereClause);
      $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
      $returnString = "";
      for ($i=0; $i < count($results); $i++) {
        foreach ($results[$i] as $key => $value) {
          $safeChars = htmlspecialchars($value);
          $returnString .= "<option value=\"$safeChars\">$safeChars</option>";
        }
      }
      echo $returnString;
    }//End of Try
    catch (PDOException $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }
  }
}
?>
