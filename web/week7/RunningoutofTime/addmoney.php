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
echo $_POST['addMoney']."<br>";
echo "Add " . $money + $_POST['addMoney']."<br>";
if($money != 0){
  echo "Got Here if";
  setMoneyQuery($_SESSION['Username'], ($_POST['addMoney'] + $money) );
}
else {
  echo "Got Here else";
  setMoneyQuery($_SESSION['Username'],  ($_POST['addMoney']));
}
//header('Location: ../shopingCart.php');
//die();

?>
