
<link rel="stylesheet" type="text/css" href="../styles/cmsmenu.css" />
<div class="w3-container w3-center w3-light-grey" style="padding:64px 16px" id="cmsmenu">
    <h3> <strong> CMS MENU</strong></h3>
    <br>
    <h3><a href="cmsadd.php"><button class="addproductbutton">Add Product</button></a></h3>
    <h3><a href="cmseditpro.php"><button class="editproductbutton">Edit Product</button></a></h3>
    <h3><a href="cmsviewproducts.php"><button class="viewproductbutton">List or Remove Products</button></a></h3>
    <h3><a href="cmsviewcustomerorders.php"><button class="viewcustomerorderproductbutton">List or Remove Customer Orders</button></a></h3>
    <h3><a href="cmslogin.php"><button class="cmslogoutbutton" onclick="logout()">CMS Logout</button></a></h3>
</div>

<script>
    
    

    
    function checkLogin() {
        
        request.open("GET", "checklogin.php");
        request.send();
    }

   
    function logout() {
        
        request.onload = function() {
            checkLogin();
        };
        
        request.open("GET", "logout.php");
        request.send();
    }
</script>

