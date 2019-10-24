<?php

<div>
  <form method="get" action="" id="SearchForm" onreset="resetForm()">
    Name: <input type="text" name="ProductName">
    <br/>
    Price <input type="text" name="PriceLow"><input type="text" name="PriceHigh">
    <br/>
    Category <input type="text" name="Category">
    <br/>
    <input type="reset"  name="Reset" value="Clear">
    <input type="button" name="Submit" value="Submit" onclick="updateProducts()">
  </form>
</div>

 ?>
