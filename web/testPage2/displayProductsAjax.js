function HelloWorld() {
  alert("Hello");
}

function updateProducts(formLocationID, toElementID){
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      var divDom = document.getElementById(toElementID);
      divDom.innerHTML = xhr.responseText;
    }
  }
  //Get String is prepared
  //Pass in the current GET Paramaters
  var paramaters = "";
  //Prepare the Get String
  var getString = "?";
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
  //Add paramaters to url with page refreash
  if(getString.length > 0){
    window.history.replaceState(null, null, getString);
  }

  if(location.search != null)
  {
    paramaters = location.search.toString();
  }
  xhr.open("GET", "displayProducts.php" + paramaters);
  xhr.send();
}

function resetForm(formLocationID){
  document.getElementById(formLocationID).reset();
  window.history.replaceState(null, null, location.pathname);
  updateProducts();
  displaySubProducts();
}
