<?php
include('cmsmenu.php');//met to navbar

?>


    <link rel="stylesheet" href="styles/cmsviewproducts.css">

<!--Section - "PRODUCTS LIST CMS" -->
<div class="w3-container w3-black" style="padding:64px 16px" id="products">
    <h3 class="w3-center">PRODUCTS LIST</h3>
    <div id="Products">
        <div id="viewProds-Table">
            
        </div>
    </div>
    <h3 class="w3-center"><a href="cmsmenu.php"><button class="cmsbackbutton">Go to CMS Menu</button></a></h3>
</div>
</div>



<script>
    
    

    displayProducts();

    function displayProducts() {

        
        let request = new XMLHttpRequest();


        
        request.open("GET", "cmsproductserver.php");

        
        request.send();


        
        request.onload = () => {
            
            if (request.status === 200) {
                
                displayCmsProducts(request.responseText);
            
            } else
                alert("Error communicating with server: " + request.status);
        };


        function displayCmsProducts(jsonProducts) {

            var array = JSON.parse(jsonProducts);

            let htmlStr = "";
            htmlStr += '<table style="text-align:center;" id="ProductsTable">';
            htmlStr += '<col width="150">';
            htmlStr += '<col width="150">';
            htmlStr += '<col width="100">';
            htmlStr += '<col width="100">';
            htmlStr += '<col width="100">';
            htmlStr += '<col width="400">';
            htmlStr += '<col width="200">';
            htmlStr += '<tr>';
            htmlStr += '<th>Photo</th>';
            htmlStr += '<th>ID</th>';
            htmlStr += '<th>Name</th>';
            htmlStr += '<th>Category</th>';
            htmlStr += '<th>Price (RS)</th>';
            htmlStr += '<th>Description</th>';
            htmlStr += '<th>Remove Product</th>';
            htmlStr += '</tr>';

            for (let i = 0; i < array.length; i++) {
                htmlStr += '<tr>';
                htmlStr += '<td><img src="' + array[i].Photo + '" style="width:125px;height:125px;"></td>';
                htmlStr += '<td>' + array[i]._id.$oid + '</td>';
                htmlStr += '<td>' + array[i].ProductName + '</td>';
                htmlStr += '<td>' + array[i].Category + '</td>';
                htmlStr += '<td>' + array[i].Price + '</td>';
                htmlStr += '<td>' + array[i].Description + '</td>';
                htmlStr += '<td><button class="btn"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></button></td>';
                htmlStr += '</tr>';
            }
            htmlStr += '</table>';
            document.getElementById("viewProds-Table").innerHTML = htmlStr;
        }
    }
</script>
