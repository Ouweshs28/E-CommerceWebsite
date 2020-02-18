function updateCart() {
//Create request object
    let request = new XMLHttpRequest();
    request.open("GET", "checkcart.php");
    request.send();

}

function getCartServer(cartArray) {
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Add data from server to page
            let getCartJson=JSON.parse(request.responseText);
           let finalCart=new Array();
           finalCart.push(getCartJson[0],cartArray);
           console.log(finalCart);

        }
        else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("GET", "getcartjson.php");
    request.send();

}

function getProductJson(ProductID) {
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;
            console.log(responseData);
            if(responseData=="[]" || responseData=="out stock"){
                toastr.error("Out of stock")
            }else{

            let prodArray = JSON.parse(responseData);
            //Add data to page
                //toastr.success(responseData);
                getBasket();
               addToBasket(prodArray[0]._id.$oid, prodArray[0].name,prodArray[0].price);

        }
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
//Get basket from session storage or create one if it does not exist
function getBasket(){
    let basket;
    if(sessionStorage.basket === undefined || sessionStorage.basket === ""){
        basket = [];
    }
    else {
        basket = JSON.parse(sessionStorage.basket);
    }
    return basket;
}

function addToBasket(prodID, prodName,price){
    let basket = getBasket();//Load or create basket

    //Add product to basket
    let exist=false;
    let j=0;
        for (let i=0;i<basket.length;i++){
        if (basket[i].name==prodName){
            j=i;
            exist=true;
            break;
        }
    }
    if (!exist) {
        basket.push({_id: prodID, name: prodName, qty: 1});
    }
    else{
        basket[j].qty++;
    }
    //Store in local storage
    sessionStorage.basket = JSON.stringify(basket);
    getCartServer(basket);
}



