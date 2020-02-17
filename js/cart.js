function updateCart() {
//Create request object
    let request = new XMLHttpRequest();
    request.open("GET", "checkcart.php");
    request.send();

}

function getCartServer() {
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Add data from server to page
            getCartJson(request.responseText);
            return getCartJson;

        }
        else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("GET", "getcartjson.php");
    request.send();

}

function getCartJson() {
    let cartArray = JSON.parse(cartJson);
    return cartArray;
}

function getProductJson(ProductID) {
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;

            let prodArray = JSON.parse(responseData);
            //Add data to page
                //toastr.success(responseData);
            getDetails(prodArray);
        }
        else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL
    request.open("POST", "addproductcart.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Send request
    request.send("_id=" + ProductID);
}

function getDetails(prodArray) {
    console.log(prodArray);
    let cartJson=getCartJson();
    console.log(cartJson);

}

