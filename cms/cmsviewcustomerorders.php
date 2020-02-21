<?php
include('cmsmenu.php');//met to navbar

?>


    <link rel="stylesheet" type="text/css" href="styles/cmsviewcustomerorders.css" />

<!--Section - "CUSTOMER ORDER CMS" -->
<div class="w3-container w3-black" style="padding:64px 16px" id="cmscustomerorders">
    <h3 class="w3-center"><strong>CMS Customer Orders</strong></h3>
    <div id="Orders">
        <div id="viewOrders-Table">
            
        </div>
    </div>
    <br />
    <h3 class="w3-center"><a href="cmsmenu.php"><button class="cmsmenu">Return to CMS Menu</button></a></h3>
</div>


<script>
    


    displayProducts();

    function displayProducts() {

         
        let request = new XMLHttpRequest();


         
        request.open("GET", "cmsorderserver.php");

        
        request.send();


        
        request.onload = () => {
            
            if (request.status === 200) {
                
                displayCmsOrders(request.responseText);
                
            } else
                alert("Error communicating with server: " + request.status);
        };


        function displayCmsOrders(jsonProducts) {

            var array = JSON.parse(jsonProducts);
            console.log(jsonProducts);

            let htmlStr = "";
            htmlStr += '<table style="text-align:center;" id="OrdersTable">';
            htmlStr += '<col width="150">';
            htmlStr += '<col width="100">';
            htmlStr += '<col width="200">';
            htmlStr += '<col width="100">';
            htmlStr += '<col width="100">';
            htmlStr += '<col width="150">';
            htmlStr += '<col width="100">';
            htmlStr += '<tr>';
            htmlStr += '<th>ID</th>';
            htmlStr += '<th>Username</th>';
            htmlStr += '<th>Quantity</th>';
            htmlStr += '<th>Total Amount</th>';
            htmlStr += '<th>Delete Order</th>';
            htmlStr += '</tr>';

            for (let i = 0; i < array.length; i++) {
                htmlStr += '<tr>';
                htmlStr += '<td>' + array[i]._id.$oid + '</td>';
                htmlStr += '<td>' + array[i].username + '</td>';
                htmlStr += '<td>' + array[i].items + '</td>';
                htmlStr += '<td>' + array[i].cost + '</td>';
                htmlStr += '<td><i class="fa fa-trash fa-2x" aria-hidden="true"></i></td>';
                htmlStr += '</tr>';
            }
            htmlStr += '</table>';
            document.getElementById("viewOrders-Table").innerHTML = htmlStr;
        }
    }
</script>
