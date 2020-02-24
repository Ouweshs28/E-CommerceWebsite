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

    if(isset($_GET['id'])){
            
        $editproduct = $db->Products->findOne(["_id" => new MongoDB\BSON\ObjectID($_GET['id'])]);
        
    }

    
    if($_POST && isset($_GET['id'])){
        //update & redirect to list products
        //Create a PHP array with our search criteria
        $findCriteria = [
            "_id" => new MongoDB\BSON\ObjectID($_GET['id'])
         ];
        $updateCriteria = [
        '$set' => $_POST
        ];
        
        $updateRes = $db->Products->updateOne($findCriteria, $updateCriteria);
        
        header('Location: productlist.php');
        
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
      <li><a href="addproduct.php">Add Product</a></li>
      <li><a href="productlist.php">List Products</a></li>
      <li class="active"><a href="editproduct.php">Edit Product</a></li>
      <li><a href="deleteproduct.php">Delete Product</a></li>
        <li><a href="vieworders.php">Orders</a></li>
    </ul>
  </div>
</nav>
      
      <div class="container">
      <div class="row">
         <div class="col-sm-12 col-md-6 col-md-offset-3">
           
            <div class="add" style=" border: solid 1px #f2f2f2; min-height: 400px; padding: 0 15px 0 15px;">
                 <h2 style="text-align: center">Edit Product</h2>
                <hr>
                
                
               <?php  if(isset($_GET['id']) && $editproduct){ ?>
                
                    <p><i>Edit product information</i></p>
                <form method='post'>
                <div class="row">
                <div class="col-md-6">
                    <label>Name*</label><br>
                    <input type="text" name="name" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['name'] ?>" required>
                </div>
                 <div class="col-md-6">
                    <label>Brand*</label><br>
                    <input type="text" name="glass_material" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['brand'] ?>" required>
                </div>
            </div>
                    <div class="row">
                <div class="col-md-6">
                    <label>Model No*</label><br>
                    <input type="text" name="color" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['modelno'] ?>" required>
                </div>
                 <div class="col-md-6">
                    <label>Ram*</label><br>
                    <input type="text" name="lens_color" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['ram'] ?>" required>
                </div>
            </div>
                    
                <div>
                    <label>Description*</label><br>
                    <textarea type="text"  style="padding:5px; width: 100%; border:solid 1px lightgray;" rows="4" required><?= $editproduct['description'] ?></textarea>
                </div>
                    <div class="row">
                <div class="col-md-6">
                    <label>Image URL*</label><br>
                    <input type="text" name="image_url" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['image_url'] ?>" required>
                </div>
                 <div class="col-md-6">
                    <label>Stock*</label><br>
                    <input type="text" name="lens_width" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['stock'] ?>" required>
                </div>
            </div>
                    <div class="row">
                <div class="col-md-6">
                    <label>Screen Size*</label><br>
                    <input type="text" name="bridge_width" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['screensize'] ?>" required>
                </div>
                 <div class="col-md-6">
                    <label>OS*</label><br>
                    <input type="text" name="temple_width" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['os'] ?>" required>
                </div>
            </div>
                <div class="row">
                <div class="col-md-6">
                    <label>Price (Rs)*</label><br>
                    <input type="text" name="price" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['price'] ?>" required>
                </div>
                <div class="col-md-6">
                    <label>Stock Unit*</label><br>
                    <input type="number" name="stock_count" style="padding:5px; border:solid 1px lightgray;" value="<?= $editproduct['stock'] ?>" required>
                </div>
                </div>
                
                <div style="text-align: center">
                <input type="submit" class="btn btn-success" style="width: 50%;height: 40px; border-radius: 20px; border: none" value="Save"></button>
                </div>
                </form>
                
                <?php }else{ ?>
                
                    <p><i>Kindly select product</i></p>
                
                <form action="editproduct.php">
                <div class="col-xs-8 col-sm-8 col-md-8" style="padding-left: 0; margin-bottom: 10px;">
                    <select style="height: 35px; width: 100%" name="id">
                        <?php
                            if($products){
                                foreach($products as $product){ ?>
                                  
                                        <option value="<?= $product['_id'] ?>"><?=  $product['_id'] .' - '.$product['name'] ?></option>
                        
                             <?php   }
                            }
                        ?>
                        
                    </select>
                </div>
                 <div class="col-xs-4 col-sm-4 col-md-4" style="padding-left: 5px;">
                    <input type="submit" style="width: 100px; " value="Edit" class="btn btn-primary">
                </div>
                </form>
                
               <?php  } ?>
                
                
             </div>
          </div>
        </div>
      </div>
      
      

  </body>
        

    <script>
    
        function showEdit(){
            
            $("#edit-box").show();
            $("#success-message").hide();
            
        }
        
        function showMessage(){
            
            $("#edit-box").hide();
            $("#success-message").show();
            
        }
    
    </script>


</html>

