function displaySubProducts(){
  var input = document.getElementById("CatagoryField");
  if(input.value != "None"){
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function (){
      if (xhr.readyState == 4 && xhr.status == 200) {
        var subCatagorys = document.getElementById("OtherSubCatagoryOptions");
        subCatagorys.innerHTML = xhr.responseText;
      }
    };
    //Get String is prepared
    //Pass in the current GET Paramaters
    var paramaters = "?Catagory=" + input.value;

    xhr.open("GET", "subCatagorysQuery.php" + paramaters);
    xhr.send();
  }
  else {
    var subCatagorys = document.getElementById("OtherSubCatagoryOptions");
    subCatagorys.innerHTML = "";
  }
}
