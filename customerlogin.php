<?php

session_start();

//Extract the data that was sent to the server
$username= filter_input(INPUT_POST, 'c_username', FILTER_SANITIZE_STRING);
$password= filter_input(INPUT_POST, 'c_pass', FILTER_SANITIZE_STRING);

$findCriteria = [
    "username" => $username,
    "password" => $password
];

//Include libraries
require __DIR__ . '/vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection
$collection = $db->Customers;

$result=$collection->countDocuments($findCriteria);
if($result==1) {
    echo "success";
    //Start session for this user
    $_SESSION['loggedInUsername'] = $username;

}else{
    echo "error";
}