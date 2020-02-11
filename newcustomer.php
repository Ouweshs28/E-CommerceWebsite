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
$fname= filter_input(INPUT_POST, 'c_fname', FILTER_SANITIZE_STRING);
$lname= filter_input(INPUT_POST, 'c_lname', FILTER_SANITIZE_STRING);
$username= filter_input(INPUT_POST, 'c_username', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'c_email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'c_pass', FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'c_address', FILTER_SANITIZE_STRING);
$country = filter_input(INPUT_POST, 'c_country', FILTER_SANITIZE_STRING);
$postalcode = filter_input(INPUT_POST, 'c_postalcode', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_POST, 'c_contact', FILTER_SANITIZE_STRING);

//Convert to PHP array
$dataArray = [
    "fistName" => $fname,
    "lastName"=>$lname,
    "username" => $username,
    "email" => $email,
    "password" => $password,
    "address" => $address,
    "country" => $country,
    "postalCode" => $postalcode,
    "phone" => $phone
];

//Add the new customer to the database
$insertResult = $collection->insertOne($dataArray);
if($insertResult->getInsertedCount()==1) {
    echo 'Thank you for registering ' . $username;
}
