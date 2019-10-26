<?php  ?>
<div>
  <form method="get" action="" id="PrepareFrom">
    <span>Name</span><input type="search" name="ProductName">
    <br/>
    <span>Price</span><input type="text" name="PriceLow" placeholder="Min">
    <br/>

    <span>Category</span>
    <select id="CatagoryField2" name="Category" onchange="displaySubProducts(this.id;, &quot;SubCatagoryField2&quot;)">
      <option value="None">None</option>
      <?php include("categoryOptions.php") ?>
    </select>
    <br/>
    <span>Subcategory</span>
    <select id="SubCatagoryField2" name="SubCategory">
      <option value="None">None</option>
    </select>
    <br/>
    <span>Rarity</span>
    <select class="" name="Rarity">
      <option value="None">None</option>
      <?php include("rarityOptions.php") ?>
    </select>
    <br/>
    <input id="PrepareResetButton2" type="button"  name="Reset" value="Clear"
    onclick="resetForm(this.parentElement.id, &quot;DisplayReults&quot;, &quot;CatagoryField2&quot;, &quot;SubCatagoryField2&quot;)">
    <input id="SubmitButton2" type="button" name="Submit" value="Submit" onclick="">
  </form>
</div>
