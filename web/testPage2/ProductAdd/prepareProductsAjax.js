function AddNewProduct(formLocationID, toElementID){
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      var divDom = document.getElementById(toElementID);
      divDom.innerHTML = JSON.parse(this.responseText);
    }
  }
  //Get String is prepared
  //Pass in the current GET Paramaters
  //Prepare the Get String
  var getString = "";
  var formLocation = document.getElementById(formLocationID);
  var formElements = formLocation.getElementsByTagName("INPUT");
  for (var i = 0, element; element = formElements[i++];) {
    if (element.value !== "" &&
        (!(element.getAttribute("name") == "Submit" || element.getAttribute("name") == "Reset" ))) {
      getString += element.getAttribute("name") + "=" + element.value + "&";
    }
  }
  var selectElements = formLocation.getElementsByTagName("SELECT");
  for (var i = 0, element; element = selectElements[i++];) {
    if (element.value != "" && element.value != "None") {
      getString += element.getAttribute("name") + "=" + element.value + "&";
    }
  }
  //Trim last charactar of the string to prevent errors
  getString = getString.substring(0, getString.length - 1);
  xhr.open("POST", "ProductAdd/prepareProduct.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(getString);
}
//TODO: Remove toLocation after testing is done
function resetPrepareForm(formLocationID, toElementID, categoryID, subCategoryID){
  document.getElementById(formLocationID).reset();
  AddNewProduct(formLocationID, toElementID);
  displaySubProducts(categoryID, subCategoryID);
}
