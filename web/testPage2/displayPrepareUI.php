<?php  ?>
<div>
  <form method="get" action="" id="SendForm">
    <span>Name</span><input type="search" name="ProductName">
    <br/>
    <span>Price</span><input type="text" name="PriceLow">
    <br/>

    <span>Category</span>
    <select id="CatagoryField" name="Category" onchange="displaySubProducts()">
      <option value="None">None</option>
      <?php include("categoryOptions.php") ?>
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
      <?php include("rarityOptions.php") ?>
    </select>
    <br/>
    <input id="ResetButton" type="button"  name="Reset" value="Clear" onclick="resetForm(this.id)">
    <input id="SubmitButton" type="button" name="Submit" value="Submit" onclick="updateProducts()">
  </form>
</div>
