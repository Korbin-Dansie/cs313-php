<?php
session_start();
?>

<div class="topnav">
  <nav>
    <h1><a href="homePage.php" id="shopHomeButton">Shadow-Steel Weapons</a></h1>
    <div id="navagation">
      <div id="Products">
        <ul>
          <li><a href="homePage.php?Category=Sword">Swords</a>
            <ul>
              <li><a href="homePage.php?Category=Sword&Rarity=Common">Common Sword</a></li>
              <li><a href="homePage.php?Category=Sword&Rarity=Uncommon">Uncommon Sword</a></li>
              <li><a href="homePage.php?Category=Sword&Rarity=Rare">Rare Sword</a></li>
            </ul>
          </li>
          <li><a href="addProduct.php">Add Product</a>
          </li>
          <li><a href="dbtestpage.php">Admin</a>
          </li>
        </ul>
        <div id="loginbar">
          <div id="loginButton">
            <!--Start of signin -->
            <?php
            if(!isset($_SESSION['Username'])){
              echo '<a href="sign-in.php">';
              echo '<img src="img/PersonIcon.png" alt="Login Icon">';
              echo 'Login</a>';
            }
            else {
              //Username is set
              echo '<a href="Profile.php">';
              echo '<img src="img/PersonIcon.png" alt="Login Icon">';
              echo $_SESSION['Username'] . '</a>';
            }
            ?>

              <!--End of signin -->
            </div>
            <a href="shopingCart.php">
              <img src="img/ShopingCart.png" alt="Shoping Cart Icon">
            </a>
          </div>

        </div>
      </div>
    </nav>
  </div><!--End of top nav-->
