<?php
session_start();
//If we do not have a signed person return
if(!isset($_SESSION['Username'])){
  header('Location: ../shopingCart.php');
  die();
}

//If nuber is not valid return
if(!isset($_POST['addMoney'])) {
  header('Location: ../shopingCart.php');
  die();
} else if(!is_numeric($_POST['addMoney'])) {
  header('Location: ../shopingCart.php');
  die();
}

//Add money to account

include('../QueryOptions/moneyQuery.php');
$money = getMoneyQuery($_SESSION['Username']);
if($money != null){
  echo "Got Here";
  setMoneyQuery($_SESSION['Username'], ($_POST['addMoney'] + $money));
}
else {
  setMoneyQuery($_SESSION['Username'], $_POST['addMoney']);
}
header('Location: ../shopingCart.php');
die();

?>
