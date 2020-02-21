let ProductArray;
//Download products when page loads
$.getScript('./js/checksession.js', function () {
    loadProducts();
});

"use strict";

//Import recommender class
import {Recommender} from '../js/recommender.js';

//Create recommender object - it loads its state from local storage
let recommender = new Recommender();

/* Set up button to call search function. We have to do it here
    because search() is not visible outside the module. */
document.getElementById("SearchButton").onclick = search;

//Display recommendation
window.onload = showRecommendation;

//Searches for products in database
function search(){

    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server
            let responseData = request.responseText;

            //Add data to page
            displayProducts(responseData);

        } else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL
    request.open("POST", "loadshop.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Extract registration data
    let search = document.getElementById("user_query").value;
    //Extract the search text
    //Add the search keyword to the recommender
    recommender.addKeyword(search);
    showRecommendation();

    //Send request
    request.send("search="+search);
}

//Display the recommendation in the document
function showRecommendation(){
    document.getElementById("RecomendationDiv").innerHTML = recommender.getTopKeyword();
}

//Downloads JSON description of products from server
function loadProducts() {

    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayProducts(request.responseText);
        } else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("POST", "loadshop.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("search="+recommender.getTopKeyword());
}

//Loads products into page
function displayProducts(jsonProducts) {
    //Convert JSON to array of product objects
    let prodArray = JSON.parse(jsonProducts);
    ProductArray = prodArray;

    //Create HTML table containing product data
    let htmlStr = '';
    for (let i = 0; i < prodArray.length; ++i) {
        htmlStr += '<li class="list-group-item">' +
            '<div class="media align-items-lg-center flex-column flex-lg-row p-3">' +
            '                            <div class="media-body order-2 order-lg-1">';
        htmlStr += '<h5 class="mt-0 font-weight-bold mb-2">' + prodArray[i].name + " (" + prodArray[i].modelno + ")" + '</h5>';
        htmlStr += '<p class="font-italic text-muted mb-0 small">' + prodArray[i].storage + ' | ' + prodArray[i].ram + ' | ' + prodArray[i].camera.Rear + " Rear Camera | " + prodArray[i].camera.Front + " Front Camera" + " | " + prodArray[i].cpu + " | " + prodArray[i].os + "</p>";
        htmlStr += '<div class="d-flex align-items-center justify-content-between mt-1">';
        htmlStr += '<h6 class="font-weight-bold my-2">Rs' + prodArray[i].price + "</h6></div>";
        htmlStr += '<img src="server/images/' + prodArray[i].imageUrl + '"width="200" class="ml-lg-5 order-1 order-lg-2">';
        htmlStr += '<a type="button" class="btn btn-success pull-right" onclick="getProductJson(\'' + prodArray[i]._id.$oid + '\')">ADD TO CART</a></div></li>';
    }
    //Finish off table and add to document
    document.getElementById("shop").innerHTML = htmlStr;
}

function PriceDesc() {
    let needsort = true;
    for (let i = 1; i < ProductArray.length && needsort; i++) {
        needsort = false;
        for (let j = 0; j < ProductArray.length - 1; j++) {
            if (ProductArray[j].price < ProductArray[j + 1].price) {
                let temp = ProductArray[j + 1];
                ProductArray[j + 1] = ProductArray[j];
                ProductArray[j] = temp;
                needsort = true;
            }

        }
    }
    displayProducts(JSON.stringify(ProductArray));
}

function PriceAsc() {
    let needsort = true;
    for (let i = 1; i < ProductArray.length && needsort; i++) {
        needsort = false;
        for (let j = 0; j < ProductArray.length - 1; j++) {
            if (ProductArray[j].price > ProductArray[j + 1].price) {
                let temp = ProductArray[j + 1];
                ProductArray[j + 1] = ProductArray[j];
                ProductArray[j] = temp;
                needsort = true;
            }

        }
    }
    displayProducts(JSON.stringify(ProductArray));
}

function StorageAsc() {
    let needsort = true;
    for (let i = 1; i < ProductArray.length && needsort; i++) {
        needsort = false;
        for (let j = 0; j < ProductArray.length - 1; j++) {
            if (ProductArray[j].storage > ProductArray[j + 1].storage) {
                let temp = ProductArray[j + 1];
                ProductArray[j + 1] = ProductArray[j];
                ProductArray[j] = temp;
                needsort = true;
            }

        }
    }
    displayProducts(JSON.stringify(ProductArray));
}

function StorageDsc() {
    let needsort = true;
    for (let i = 1; i < ProductArray.length && needsort; i++) {
        needsort = false;
        for (let j = 0; j < ProductArray.length - 1; j++) {
            if (ProductArray[j].storage < ProductArray[j + 1].storage) {
                let temp = ProductArray[j + 1];
                ProductArray[j + 1] = ProductArray[j];
                ProductArray[j] = temp;
                needsort = true;
            }

        }
    }
    displayProducts(JSON.stringify(ProductArray));
}

function SortBrand() {
    let needsort = true;
    for (let i = 1; i < ProductArray.length && needsort; i++) {
        needsort = false;
        for (let j = 0; j < ProductArray.length - 1; j++) {
            if ((ProductArray[j].brand).localeCompare(ProductArray[j + 1].brand) > 0) {
                let temp = ProductArray[j + 1];
                ProductArray[j + 1] = ProductArray[j];
                ProductArray[j] = temp;
                needsort = true;
            }

        }
    }
    displayProducts(JSON.stringify(ProductArray));
}


