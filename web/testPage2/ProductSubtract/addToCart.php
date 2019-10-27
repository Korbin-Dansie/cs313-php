<?php
start_session();

include("QueryOptions/AllProductQuery.php");
AllProductQuery();
echo $_POST['productid'] . " From php";

 ?>
