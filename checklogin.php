<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection
$collection = $db->Customers;

//Extract the data that was sent to the server
$username= filter_input(INPUT_POST, 'c_username', FILTER_SANITIZE_STRING);
$password= filter_input(INPUT_POST, 'c_pass', FILTER_SANITIZE_STRING);

$findCriteria = [
    "username" => $username,
    "password" => $password
];

$result=$collection->count($findCriteria);
if($result==1) {
    echo "success";
}else{
    echo "error";
}