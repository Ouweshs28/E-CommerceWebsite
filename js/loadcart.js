$.getScript('./js/checksession.js', function()
{
    loadCart();
});

//Downloads JSON description of products from server
function loadCart(){
    //Create request object
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Add data from server to page
            displayCart(request.responseText);
        }
        else
            toastr.error("Error communicating with server: " + request.status);
    };

    //Set up request and send it
    request.open("GET", "getcart.php");
    request.send();
}

function displayCart(jsonCart){
    //Convert JSON to array of product objects
    let cartArray = JSON.parse(jsonCart);
    console.log(cartArray)

    //Create HTML table containing product data
    let htmlStr = '';
    for(let i=0; i<cartArray[0].products.length; ++i){
        htmlStr += '<tr>';
        htmlStr+='<td>'+cartArray[0].products[i].name+'</td>';
        htmlStr+='<td>In stock</td>';
        htmlStr+='<td>'+cartArray[0].products[i].qty+'</td>';
        htmlStr+='<td class="text-right">Rs '+cartArray[0].products[i].price+'</td>';
        htmlStr+='</tr>';
    }
    htmlStr+='<tr>' +
        '                                                <td></td>' +
        '                                                <td></td>' +
        '                                                <td></td>' +
        '                                                <td></td>' +
        '                                                <td><strong>Total</strong></td>' +
        '                                                <td class="text-right"><strong>'+cartArray[0].cost+'</strong></td>\n' +
        '                                            </tr>'
    //Finish off table and add to document
    document.getElementById("cartdisplay").innerHTML = htmlStr;
    document.getElementById("cartItemNo").innerText="You currently have "+cartArray[0].items +" item(s) in your cart"
}