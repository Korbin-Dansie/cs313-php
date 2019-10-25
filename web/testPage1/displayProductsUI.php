<?php  ?>
 <div>
  <form method="get" action="" id="SearchForm" onreset="resetForm()">
    <span>Name:</span><input type="search" name="ProductName">
     <span>Price</span><input type="text" name="PriceLow" placeholder="Min"><input type="text" name="PriceHigh" placeholder="Max">
     <span>Category</span>
     <select id="CatagoryField" name="Category">
       <option value="None">None</option>
     </select>

     <input id="ResetButton" type="reset"  name="Reset" value="Clear">
     <input id="SubmitButton" type="button" name="Submit" value="Submit" onclick="updateProducts()">
   </form>
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
     echo "$results";

     foreach ($results as $key => $value) {
      echo "<option value=\"$value\">$value</option>";
     }

   catch (PDOException $ex)
   {
     echo 'Error!: ' . $ex->getMessage();
     die();
   }
    ?>
 </div>
