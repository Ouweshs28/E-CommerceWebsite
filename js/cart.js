let total = 0;
let items = 0;

function updateCart() {
//Create request object
    let request = new XMLHttpRequest();
    // sending data to server
    request.open("POST", "checkcart.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("cartSession=" + sessionStorage.basket
        + "&total=" + total
        + "&items=" + items);

}

function updateOrder() {
//Create request object
    let itemsorder = 0, totalorder = 0;
    let basket = getBasket();//Load or create basket
    // sending data to server
    for (let i = 0; i < basket.length; i++) {
        itemsorder = itemsorder + basket[i].qty;
        totalorder = totalorder + (itemsorder + basket[i].qty * itemsorder + basket[i].price);
    }
    let request = new XMLHttpRequest();
    request.open("POST", "checkout.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("cartSession=" + sessionStorage.basket
        + "&total=" + totalorder
        + "&items=" + itemsorder);
    sessionStorage.clear();
    alert("Order Preceded Thank you");
    window.location.href = "shop.php";

}

function getProductJson(ProductID) {
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server
            let responseData = request.responseText;
            if (responseData == "[]" || responseData == "out stock") {
                toastr.error("Out of stock")
            } else {

                let prodArray = JSON.parse(responseData);
                //Add data to page
                getBasket();
                addToBasket(prodArray[0]._id.$oid, prodArray[0].name, prodArray[0].price);
                total = total + prodArray[0].price;
                items++;
                updateCart();

            }
        } else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL
    request.open("POST", "addproductcart.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Send request
    request.send("_id=" + ProductID);
}

//Get basket from session storage or create one if it does not exist
function getBasket() {
    let basket;
    if (sessionStorage.basket === undefined || sessionStorage.basket === "") {
        basket = [];
    } else {
        basket = JSON.parse(sessionStorage.basket);
    }
    return basket;
}

function addToBasket(prodID, prodName, price) {
    let basket = getBasket();//Load or create basket

    //Add product to basket
    let exist = false;
    let j = 0;
    for (let i = 0; i < basket.length; i++) {
        if (basket[i].name == prodName) {
            j = i;
            exist = true;
            break;
        }
    }
    if (!exist) {
        basket.push({_id: prodID, name: prodName, price: price, qty: 1});
    } else {
        basket[j].qty++;
    }
    //Store in local storage
    sessionStorage.basket = JSON.stringify(basket);
}







