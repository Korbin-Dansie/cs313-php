function getUserName($passwordStr = ""){
if($passwordStr != "admin1234"){
  return;
}

//Check for unique username
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

  $statment = 'Select username FROM customers';
  $dbquery = $db->query($statment);
  $results = $dbquery->fetchAll(PDO::FETCH_ASSOC);
  for ($i=0; $i < count($results); $i++) {
    if($results[$i] == $_POST["UserName"]){
      echo "Username is already in use.";
      return; //Username is already in use
    }
  }
}//End of try
catch (PDOException $ex)
{
  echo "Reading<br/>";
  echo 'Error!: ' . $ex->getMessage();
  die();
}

}
