<?php  ?>
<div>
  <form method="get" action="" id="SearchForm">
    <span>Name</span><input type="search" name="ProductName">
    <br/>
    <span>Price</span><input type="text" name="PriceLow" placeholder="Min"><input type="text" name="PriceHigh" placeholder="Max">
    <br/>

    <span>Category</span>
    <select id="CatagoryField" name="Category" onchange="displaySubProducts()">
      <option value="None">None</option>
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
        $statment = 'Select name from category';

        $dbquery = $db->query($statment);
        $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
        for ($i=0; $i < count($results); $i++) {
          foreach ($results[$i] as $key => $value) {
            $safeChars = htmlspecialchars($value);
            echo "<option value=\"$safeChars\">$safeChars</option>";
          }
        }
      }
      catch (PDOException $ex)
      {
        echo 'Error!: ' . $ex->getMessage();
        die();
      }
      ?>
    </select>
    <br/>
    <span>Subcategory</span>
    <select id="SubCatagoryField" name="SubCategory">
      <option value="None">None</option>
    </select>
    <br/>
    <span>Rarity</span>
    <select class="" name="Rarity">
      <option value="None">None</option>
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
    </select>
    <br/>
    <input type="button" name="Hello" value="Hello" onclick="HelloWorld()">
    <input id="ResetButton" type="button"  name="Reset" value="Clear" onclick="resetForm()">
    <input id="SubmitButton" type="button" name="Submit" value="Submit" onclick="updateProducts()">
  </form>
</div>
