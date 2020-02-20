<?php
//Include libraries

session_start();
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

$collection = $db->Orders;
$username=$_SESSION['loggedInUsername'];

//Create a PHP array with our search criteria
$findCriteria = [
    "username" => $username,
];

$result = $collection->find($findCriteria);

echo json_encode(iterator_to_array($result));