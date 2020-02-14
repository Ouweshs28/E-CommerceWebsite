<?php
session_start();

require __DIR__ . '/vendor/autoload.php';

$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

$collection = $db->Customers;

$username=$_SESSION['loggedInUsername'];

$findCriteria = [
    "username" => $username,
];

//Find all of the customers that match  this criteria
$cursor = $db->Customers->find($findCriteria);

//Output each customer as a JSON object with comma in between
$jsonStr = '['; //Start of array of customers in JSON

//Work through the customers
foreach ($cursor as $customer){
    //var_dump($customer);
    $jsonStr .= json_encode($customer);//Convert PHP representation of customer into JSON
    $jsonStr .= ',';//Separator between customers
}

//Remove last comma
$jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

//Close array
$jsonStr .= ']';

//Echo final string
echo $jsonStr;
