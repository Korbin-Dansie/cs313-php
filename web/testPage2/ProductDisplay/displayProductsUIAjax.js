function displaySubProducts(catagoryFieldID, subCatagoryFieldID) {
  var subCatagorys = document.getElementById(subCatagoryFieldID);
  var displayNone = "<option value=\"None\">None</option>";
  var input = document.getElementById(catagoryFieldID);
  if(input.value != "None"){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function (){
      if (xhr.readyState == 4 && xhr.status == 200) {
        subCatagorys.innerHTML = displayNone + xhr.responseText;
      }
    };
    //Get String is prepared
    //Pass in the current GET Paramaters
    var paramaters = "?Catagory=" + input.value;

    xhr.open("GET", "subCatagorysQuery.php" + paramaters);
    xhr.send();
  }
  else {
    subCatagorys.innerHTML = displayNone;
  }
}
