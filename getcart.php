<?php

//Include libraries

require __DIR__ . '/vendor/autoload.php';

session_start();

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Selecting Cart DB
$collection = $db->Carts;

//Getting logged in username
$username=$_SESSION['loggedInUsername'];

$findCriteria = [
    "username" => $username,
];

$result = $collection->find($findCriteria);

echo json_encode(iterator_to_array($result));