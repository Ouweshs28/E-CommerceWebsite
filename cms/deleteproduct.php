<?php

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

if(!isset($_SESSION["user"]) || empty($_SESSION["user"])){
  header('Location: cms.php?auth=1');  
}

    require __DIR__ . '/vendor/autoload.php';
    
    
    $mongoClient = (new MongoDB\Client);


    $db = $mongoClient->ecommerce;

    $products = $db->Products->find();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CMS | Ecommerce Website</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
      
      <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="cms.php">Ecommerce CMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="cms.php">Home</a></li>
      <li><a href="addproduct.php">Add Product</a></li>
      <li><a href="productlist.php">List Products</a></li>
      <li><a href="editproduct.php">Edit Product</a></li>
      <li class="active"><a href="deleteproduct.php">Delete Product</a></li>
        <li><a href="vieworders.php">Orders</a></li>
    </ul>
  </div>
</nav>
      
      <div class="container">
      <div class="row">
        <div class="col-12">
            <h2>Delete Products</h2>
                
            <table class="table table-bordered">
    <thead>
      <tr>
         <th>ID</th>
        <th>Name</th>
        <th>Brand</th>
        <th>Storage</th>
        <th>CPU</th>
        <th>Image Url</th>
        <th>CPU</th>
        <th>Price(Rs)</th>
        <th>Stock Unit</th>
          <th></th>
      </tr>
    </thead>
    <tbody>
      <?php 
        if($products){
            foreach($products as $product){ ?>
        
        
        <tr>
        <td><?=  $product['_id'] ?></td>
        <td><?=  $product['name'] ?></td>
        <td><?=  $product['brand'] ?></td>
        <td><?=  $product['storage'] ?></td>
        <td><?=  $product['cpu'] ?></td>
        <td><?=  $product['image_url'] ?></td>
        <td><?=  $product['os'] ?></td>
        <td><?=  $product['price'] ?></td>
        <td><?=  $product['stock'] ?></td>
        <td style="text-align: center;"><a href="removeproduct.php?id=<?= $product['_id'] ?>"><button class="btn btn-danger" style="border: none;">Delete</button></a></td>
      </tr>
        
        
        <?php }
        } ?>
      
    </tbody>
  </table>
            
          </div> 
        </div>
      </div>
      
      

  </body>
        

<script>
    
    function deleteProduct(){
        confirm("Are you sure you want to delete");
    }
    
</script>


</html>
