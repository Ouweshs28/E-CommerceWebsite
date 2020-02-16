<?php

$productID= filter_input(INPUT_POST, '_id', FILTER_SANITIZE_STRING);

$findCriteria = [
    "_id" => new MongoDB\BSON\ObjectID("5e221f5c31dd24a9b600e19f")//replace when done
];

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

$collection = $db->Products;


$result=$collection->find($findCriteria);

foreach ($result as $document) {
    $pid=$document["_id"];
    $pname= $document["name"];
    $price= $document["price"];
}

session_start();
$db = $mongoClient->ecommerce;

$username=$_SESSION['loggedInUsername'];

//Create a PHP array with our search criteria
$findCriteria = [
    'username' => $username
];

//Specify how the documents will be updated
$updateCriteria = [
    '$set' => ["cost"=>$price,
        "products" => [
        "_id"=>new MongoDB\BSON\ObjectID($pid),
        "name"=>$pname,
        "qty"=>1,
        "price"=>$price
    ] ]
];

//Update all of the customers that match  this criteria
$updateRes = $db->Carts->updateOne($findCriteria, $updateCriteria);