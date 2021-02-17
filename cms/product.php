<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

 //Connect to MongoDB and select database
 $mongoClient = (new MongoDB\Client);
 $db = $mongoClient->ecommerce;
 $collection = $db->Products;

// encoding array into json 
 $query = array();
 $document = $collection->find($query);
 //for each loop to push details in array
 foreach ($document as $entry){
     array_push($query, $entry);
 }
 //encode data into JSON format
 echo json_encode($query, true);
 
 ?>

