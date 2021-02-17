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

    $orders = $db->Orders->find();
    
    
    

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
      <li><a href="deleteproduct.php">Delete Product</a></li>
        <li class="active"><a href="vieworders.php">Orders</a></li>
    </ul>
  </div>
</nav>
      
      <div class="container">
      <div class="row">
        <div class="col-12">
            <h2>Orders</h2>
            
             <table class="table table-bordered">
    <thead>
      <tr>
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>Date</th>
        <th>Products</th>
      </tr>
    </thead>
    <tbody>
        
        <?php 
        if($orders){
            foreach($orders as $order){ 
            $prods = '';
            $products = json_decode($order['products']);
                foreach($products as $product){
                    $prods .= '<li>'.$product->name.'</li>';
                }
        ?>
        
        
        <tr>
        <td><?=  $order['_id'] ?></td>
        <td><?=  $order['username'] ?></td>
        <td><?=  $order['date'] ?></td>
        <td><ul><?=  $prods ?></ul></td>
      </tr>
        
        
        <?php }
        } ?>
    </tbody>
  </table>
            
          </div> 
        </div>
      </div>
      
      

  </body>
        



</html>

