<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

$collection = $db->Products;

$rangeQuery = ['stock' => ['$gt' => 0 ]];

$result=$collection->find($rangeQuery);

echo json_encode(iterator_to_array($result));