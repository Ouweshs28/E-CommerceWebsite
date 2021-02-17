<?php

$msg = false;
session_start();

if($_POST){
    
    require __DIR__ . '/vendor/autoload.php';
    
    
    $mongoClient = (new MongoDB\Client);


    $db = $mongoClient->ecommerce;
    
    
    $user = $db->Staffs->findOne(['username'=>$_POST['user']]);
    
    if($user != NULL){
        
        if($user['password'] == $_POST['password']){
            
            $_SESSION["user"] = $_POST['user'];
            
        }else{
            
            $msg = 'Password incorrect';
            
        }
        
    }else{
        $msg = 'User does not exist';
    }
    
}


if(isset($_GET['logout'])){
   session_destroy();
    header('Location: cms.php');
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
      
      
  <body>
      
      <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="cms.php">Ecommerce CMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="cms.php">Home</a></li>
      <li><a href="addproduct.php">Add Product</a></li>
      <li><a href="productlist.php">List Products</a></li>
      <li><a href="editproduct.php">Edit Product</a></li>
      <li><a href="deleteproduct.php">Delete Product</a></li>
        <li><a href="vieworders.php">Orders</a></li>
    </ul>
  </div>
</nav>
      
      <div class="container">
      <div class="row">
        <div class="col-md-12 col-md-4 col-md-offset-4">
            <h2 style="text-align:center">Welcome to the CMS</h2>
            
            <?php 
            
            if(isset($_SESSION["user"]) && !empty($_SESSION["user"])){
                
                echo '<p>Hello '.$_SESSION["user"].', Use the navigation to manage content</p> <a href="cms.php?logout=1"><button class="btn btn-danger">Logout</button></a>';
                
            }else{ ?>
            
            <div class="add" style=" border: solid 1px #f2f2f2; min-height: 300px; padding: 0 15px 0 15px; margin-top: 30px;">
                
                <?= (isset($_GET['auth'])) ? '<br><p style="color:red; text-align:center"> Kindly login to continue</p>' : '' ?>
                
                <h2 style="text-align: center">Login</h2>
                <hr>
                
                <form action="cms.php" method="post">
                
                    <div class="row">
                        <div class="col-md-12">
                            <label>User*</label><br>
                            <input type="text" name="user" style="padding:5px; border:solid 1px lightgray;" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <label>Password*</label><br>
                            <input type="password" name="password" style="padding:5px; border:solid 1px lightgray;" required>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            <?= ($msg) ? '<p style="color:red">'.$msg.'</p>' : '' ?>
                        </div>
                    </div>
                    
                    
                    <div style="text-align: center">
                <input type="submit" class="btn btn-success" style="width: 50%;height: 40px; border-radius: 20px; border: none" value="Login"></button>
                </div>
                
                </form>
                
                
            </div>
          
          <?php } ?>
          </div> 
        </div>
      </div>
      
      

  </body>
        



</html>

