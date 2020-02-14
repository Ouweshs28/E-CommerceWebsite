//Download products when page loads
$.getScript('./js/checksession.js', function()
{
    loadProducts();
});

//Downloads JSON description of products from server
function loadProducts(){
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Add data from server to page
            displayProducts(request.responseText);
        }
        else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("GET", "loadshop.php");
    request.send();
}

//Loads products into page
function displayProducts(jsonProducts){
    //Convert JSON to array of product objects
    let prodArray = JSON.parse(jsonProducts);

    //Create HTML table containing product data
    let htmlStr = '';
    for(let i=0; i<prodArray.length; ++i){
        htmlStr += '<li class="list-group-item">' +
            '<div class="media align-items-lg-center flex-column flex-lg-row p-3">'+
            '                            <div class="media-body order-2 order-lg-1">';
        htmlStr += '<h5 class="mt-0 font-weight-bold mb-2">'+ prodArray[i].name + " ("+ prodArray[i].modelno+ ")"+ '</h5>';
        htmlStr += '<p class="font-italic text-muted mb-0 small">'+ prodArray[i].storage+ ' | ' +prodArray[i].ram+ ' | ' + prodArray[i].camera.Rear + " Rear Camera | "+ prodArray[i].camera.Front+ " Front Camera"+ " | "+ prodArray[i].cpu+ " | "+ prodArray[i].os+"</p>";
        htmlStr += '<div class="d-flex align-items-center justify-content-between mt-1">';
        htmlStr += '<h6 class="font-weight-bold my-2">Rs' + prodArray[i].price + "</h6></div>";
        htmlStr += '<img src="images/'+prodArray[i].imageUrl+'"width="200" class="ml-lg-5 order-1 order-lg-2">';
        htmlStr += '<a type="button" class="btn btn-success pull-right">ADD TO CART</a>\n' +
            '                        </div> <!-- End -->\n' +
            '                    </li>';
    }
    //Finish off table and add to document
    document.getElementById("shop").innerHTML = htmlStr;
}