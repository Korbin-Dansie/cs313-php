function addToCart(datebaseRowInfo){
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function (){
    if (xhr.readyState == 4 && xhr.status == 200) {
      if(this.responseText != ""){
        alert(this.responseText);
      }
    }
  }
  //Get String is prepared
  //Pass in the current GET Paramaters
  //Prepare the Get String
  var getString = "productid=" + datebaseRowInfo.toString();
  alert(getString);

  //Trim last charactar of the string to prevent errors
  console.log(location.href);      // https://developer.mozilla.org:8080/en-US/search?q=URL#search-results-close-container
  console.log(location.protocol);  // https:
  console.log(location.host);      // developer.mozilla.org:8080
  console.log(location.hostname);  // developer.mozilla.org
  console.log(location.port);      // 8080
  console.log(location.pathname);  // /en-US/search
  console.log(location.search);    // ?q=URL
  console.log(location.hash);      // #search-results-close-container
  console.log(location.origin);    // https://developer.mozilla.org:8080

  xhr.open("POST", "ProductSubtract/addToCart.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(getString);

}
