<?php 

if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
}

if(!isset($_SESSION["user"]) || empty($_SESSION["user"])){
  header('Location: cms.php?auth=1');  
}

$success = false;
$error = false;

if($_POST){
    
    require __DIR__ . '/vendor/autoload.php';
    
    
    
    $mongoClient = (new MongoDB\Client);


    $db = $mongoClient->ecommerce;
    
    $insertResult = $db->Products->insertOne($_POST);
    
    if($insertResult->getInsertedCount()==1){
        
        $success = 'Product added successfully';
    }
    
    else {
    
        $error = 'unable to add product';
    
    }
    
}




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
    <style>
        label{
            color: gray;
            font-weight: 400;
        }
        .add div{
            margin-bottom: 10px;
        }
        
        input{
            width: 100%;
        }
    </style>
  <body>
      
      <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="cms.php">Ecommerce CMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="cms.php">Home</a></li>
      <li class="active"><a href="addproduct.php">Add Product</a></li>
      <li><a href="productlist.php">List Products</a></li>
      <li><a href="editproduct.php">Edit Product</a></li>
      <li><a href="deleteproduct.php">Delete Product</a></li>
        <li><a href="vieworders.php">Orders</a></li>
    </ul>
  </div>
</nav>
      
      <div class="container">
      <div class="row">
          
           <div class="col-sm-12 col-md-6 col-md-offset-3" style="margin-top:50px;">
               <?php 
                    
                    if($success){
                            echo '<p style="color:green;">'.$success.'</p><br>';
                    }elseif($error){
                        echo '<p style="color:red;">'.$error.'</p><br>';
                    }
                
               ?>
          </div>
          
        <div class="col-sm-12 col-md-6 col-md-offset-3">
           
            <div class="add" style=" border: solid 1px #f2f2f2; min-height: 400px; padding: 0 15px 0 15px;">
                 <h2 style="text-align: center">Add Product</h2>
                <hr>
                <p><i>Kindly provide the product information required below</i></p>
                <form method='post' action='addproduct.php'>
                <div class="row">
                <div class="col-md-6">
                    <label>Name*</label><br>
                    <input type="text" name="name" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
                 <div class="col-md-6">
                    <label>Model No*</label><br>
                    <input type="text" name="glass_material" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
            </div>
                    <div class="row">
                <div class="col-md-6">
                    <label>Ram*</label><br>
                    <input type="text" name="color" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
                 <div class="col-md-6">
                    <label>Storage*</label><br>
                    <input type="text" name="lens_color" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
            </div>
                    
                <div>
                    <label>Description*</label><br>
                    <textarea type="text"  style="padding:5px; width: 100%; border:solid 1px lightgray;" rows="4" required></textarea>
                </div>
                    <div class="row">
                <div class="col-md-6">
                    <label>Image URL*</label><br>
                    <input type="text" name="image_url" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
                 <div class="col-md-6">
                    <label>Screensize*</label><br>
                    <input type="text" name="lens_width" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
            </div>
                    <div class="row">
                <div class="col-md-6">
                    <label>OS*</label><br>
                    <input type="text" name="bridge_width" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
                 <div class="col-md-6">
                    <label>CPU*</label><br>
                    <input type="text" name="temple_width" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
            </div>
                <div class="row">
                <div class="col-md-6">
                    <label>Price ($)*</label><br>
                    <input type="text" name="price" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
                <div class="col-md-6">
                    <label>Stock Unit*</label><br>
                    <input type="number" name="stock_count" style="padding:5px; border:solid 1px lightgray;" required>
                </div>
                </div>
                
                <div style="text-align: center">
                <input type="submit" class="btn btn-success" style="width: 50%;height: 40px; border-radius: 20px; border: none" value="Add Product"></button>
                </div>
                </form>
            </div>
          
          </div> 
        </div>
      </div>
      
      

  </body>
        



</html>

