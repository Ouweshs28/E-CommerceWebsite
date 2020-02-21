<?php
include('cmsmenu.php');//met to navbar

?>


    <link rel="stylesheet" type="text/css" href="styles/cmsproduct.css" />
<div class="w3-container w3-center w3-light-grey" style="padding:64px 16px" id="cmsproduct">
    <h1> <strong>INSERT NEW ITEMS</strong></h1>
    <br>

    <div class="formcontainer">
        <label for="pname"><b> Name</b></label>
        <input type="text" id="productname" placeholder="Enter Name" name="name">
        <br>
        <br>
        <label for="category"><b>Category</b></label>
        <input id="category" type="text" placeholder="Enter Category" name="category">
        <br>
        <br>
        <label for="price"><b>Product Price</b></label>
        <input id="price" type="text" placeholder="Enter Price" name="price">
        <br>
        <br>
        <label for="description"><b> Description</b></label>
        <input type="text" id="description" placeholder="Enter Description" name="description">
        <br>
        <br>
        <button type="submit" onclick="addproduct()" class="addprodbutton">Add Product</button>
        <br>
         <br>
            <label for="ram"><b>Edit ram</b></label>
            <input type="text" id="ram" placeholder="Enter ram" name="ram">
            <br>
            <br>
            <label for="screensize"><b>Edit screensize</b></label>
            <input type="text" id="screensize" placeholder="Enter screensize" name="screensize">
            <br>
            <br>
            <label for="ram"><b>Edit os</b></label>
            <input type="text" id="os" placeholder="Enter os" name="os">
            <br>
            <br>
            <label for="stock"><b>Edit stock</b></label>
            <input type="text" id="stock" placeholder="Enter stock" name="stock">
            <br>
            <br>
            <label for="brand"><b>Edit brand </b></label>
            <input type="text" id="brand" placeholder="Enter brand" name="brand">
            <br>
            <br>
            <label for="storage"><b>Edit stock</b></label>
            <input type="text" id="storage" placeholder="Enter storage" name="storage">
            <br>
            <br>
            <label for="cpu"><b>Edit cpu</b></label>
            <input type="text" id="cpu" placeholder="Enter cpu" name="cpu">
            <br>
            <br>
            <label for="modelno"><b>Edit modelno</b></label>
            <input type="text" id="modelno" placeholder="Enter modelno" name="modelno">
            <br>
    </div>

    <h3 class="w3-center"><a href="../cmsmenu.php"><button class="cmsbackbutton">Go to CMS Menu</button></a></h3>
</div>



<script>
    
    
    function addproduct() {
        
        let request = new XMLHttpRequest();

        
        request.onload = () => {
            
            if (request.status === 200) {
               
                let responseData = request.responseText;

                
                alert(responseData);
                window.location.href = "cmsmenu.php";
            } else
                alert("Error communicating with server: " + request.status);
        };

        
        request.open("POST", "cmsadd.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        
        let productname = document.getElementById("productname").value;
        let productcategory = document.getElementById("productcategory").value;
        let productprice = document.getElementById("productprice").value;
        let productdescription = document.getElementById("productdescription").value;


        request.send("productname=" + productname + "&productcategory=" + productcategory + "&productprice=" + productprice + "&productdescription=" + productdescription);
    }
</script>
