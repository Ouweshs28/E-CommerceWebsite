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

        }
        else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("GET", "getcartjson.php");
    request.send();

}

function getCartJson(cartJson) {
    let cartArray = JSON.parse(cartJson);
    addProduct(ProductID);

}

function addProduct(ProductID) {
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;

            //Add data to page
                toastr.success(responseData);
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

