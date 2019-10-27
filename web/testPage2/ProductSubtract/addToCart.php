<?php
start_session();
header('Content-Type: text/plain; charset=utf-8');

print_r($_POST);
return;
echo $_POST['productid'] . " From php";

 ?>
