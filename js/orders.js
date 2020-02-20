//Downloads JSON description of products from server
$.getScript('./js/checksession.js', function () {
    loadOrders();
});

function loadOrders() {
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayOrders(request.responseText);
        } else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("GET", "getorder.php");
    request.send();
}

//Loads products into page
function displayOrders(jsonOrders) {
    //Convert JSON to array of product objects
    let ordersArray = JSON.parse(jsonOrders);
    //Create HTML table containing product data
    let htmlStr = '';
    for (let i = 0; i < ordersArray.length; ++i) {
        htmlStr += '<h4>My Orders</h4>';
        htmlStr += '<h4>Date ' + ordersArray[i].date + '</h4>';
        htmlStr += '<h4>Time ' + ordersArray[i].time + '</h4>';
        htmlStr += '<h4>Products</h4>';
        for (let j = 0; j < ordersArray[i].products.length; j++) {
            htmlStr += '<p>' + ordersArray[i].products[j].name + '  quantity: ' + ordersArray[i].products[j].qty + '  price: ' + ordersArray[i].products[j].price + ' </p>';
        }
        htmlStr += '<p>Total :' + ordersArray[i].cost + '</p>';
        htmlStr += '<p>___________________________________________</p>'
    }
    //Finish off table and add to document
    document.getElementById("orders").innerHTML = htmlStr;
}