function AddNewProduct(datebaseRowInfo){
  alert(datebaseRowInfo);
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      var responsetext = "";
      if(this.responseText != ""){
        responsetext = this.responseText;
      }

      //Get String is prepared
      //Pass in the current GET Paramaters
      //Prepare the Get String
      var getString = "";

      //Trim last charactar of the string to prevent errors
      getString = getString.substring(0, getString.length - 1);
      xhr.open("POST", "ProductSubtract/addToCart.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send(getString);
    }
  }
}
