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
echo "Got Here 1<br>";
$money = getMoneyQuery($_SESSION['Username']);
echo "$money<br>";
if($money != 0){
  echo "Got Here if";
  setMoneyQuery($_SESSION['Username'], intval(intval($_POST['addMoney']) + intval($money) ) );
}
else {
  echo "Got Here else";
  setMoneyQuery($_SESSION['Username'], intval ($_POST['addMoney']));
}
//header('Location: ../shopingCart.php');
//die();

?>
