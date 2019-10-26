<?php  ?>
<div>
  <form method="get" action="" id="SearchForm">
    <span>Name</span><input type="search" name="ProductName">
    <br/>
    <span>Price</span><input type="text" name="PriceLow" placeholder="Min"><input type="text" name="PriceHigh" placeholder="Max">
    <br/>

    <span>Category</span>
    <select id="CatagoryField" name="Category" onchange="displaySubProducts(&quot;CatagoryField&quot;, &quot;SubCatagoryField&quot;)">
      <option value="None">None</option>
      <?php include("../QueryOptions/categoryOptions.php") ?>
    </select>
    <br/>
    <span>Subcategory</span>
    <select id="SubCatagoryField" name="SubCategory">
      <option value="None">None</option>
    </select>
    <br/>
    <span>Rarity</span>
    <select class="" name="Rarity">
      <option value="None">None</option>
      <?php include("../QueryOptions/rarityOptions.php") ?>
    </select>
    <br/>
    <input id="ResetButton" type="button"  name="Reset" value="Clear"
    onclick="resetForm(this.parentElement.id, &quot;productTable&quot;, &quot;CatagoryField&quot;, &quot;SubCatagoryField&quot;)">
    <input id="SubmitButton" type="button" name="Submit" value="Submit" onclick="updateProducts(this.parentElement.id, &quot;productTable&quot;)">
  </form>
</div>
