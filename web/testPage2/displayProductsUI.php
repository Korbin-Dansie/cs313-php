<?php

$returnString = "";



 ?>
 <div>
  <form method="get" action="" id="SearchForm" onreset="resetForm()">
    <span>Name:</span><input type="text" name="ProductName">
     <span>Price</span><input type="text" name="PriceLow"><input type="text" name="PriceHigh">
     <span>Category</span><input type="text" name="Category">
     <input id="ResetButton" type="reset"  name="Reset" value="Clear">
     <input id="SubmitButton" type="button" name="Submit" value="Submit" onclick="updateProducts()">
   </form>
 </div>
