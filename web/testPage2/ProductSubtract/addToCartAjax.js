function addToCart(datebaseRowInfo){

  if(datebaseRowInfo == ""){
    return;
  }

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if(this.responseText != ""){
        alert(this.responseText);
      }
      //Get String is prepared
      //Pass in the current GET Paramaters
      //Prepare the Get String
      var getString = "productid=" + datebaseRowInfo;

      //Trim last charactar of the string to prevent errors
      xhr.open("POST", "ProductSubtract/addToCart.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send(getString);
    }
  }
}
