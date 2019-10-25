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
 </div>
